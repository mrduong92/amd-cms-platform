<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSpec;
use ZipArchive;
use DOMDocument;

class XlsxImporter
{
    private ZipArchive $zip;
    private array $sharedStrings = [];

    /**
     * Parse and import products from an xlsx file path.
     * Returns ['imported' => int, 'skipped' => int, 'categories' => int]
     */
    public function import(string $path): array
    {
        $this->zip = new ZipArchive();
        if ($this->zip->open($path) !== true) {
            throw new \RuntimeException('Không thể mở file xlsx.');
        }

        try {
            $this->sharedStrings = $this->loadSharedStrings();
            $sheetNames          = $this->getSheetNames();

            $imported   = 0;
            $skipped    = 0;
            $newCats    = 0;

            foreach ($sheetNames as $i => $categoryName) {
                $rows = $this->readSheet($i + 1);
                if (count($rows) < 2) {
                    continue;
                }

                $headers = $rows[0]; // first row = column headers

                [$created, $category] = $this->findOrCreateCategory($categoryName);
                if ($created) {
                    $newCats++;
                }

                // Data starts at row index 1
                for ($r = 1; $r < count($rows); $r++) {
                    $row  = $rows[$r];
                    $name = trim($row[2] ?? '');

                    if ($name === '') {
                        continue;
                    }

                    $sku = trim($row[1] ?? '');

                    if ($sku !== '' && Product::where('sku', $sku)->exists()) {
                        $skipped++;
                        continue;
                    }

                    $product = Product::create([
                        'category_id' => $category->id,
                        'name'        => $name,
                        'sku'         => $sku ?: null,
                        'is_active'   => true,
                        'is_featured' => false,
                        'order'       => 0,
                    ]);

                    // Columns 3+ become product specs
                    $specOrder = 0;
                    for ($c = 3; $c < count($headers); $c++) {
                        $specName  = trim($headers[$c] ?? '');
                        $specValue = trim((string) ($row[$c] ?? ''));

                        if ($specName !== '' && $specValue !== '') {
                            ProductSpec::create([
                                'product_id' => $product->id,
                                'spec_name'  => $specName,
                                'spec_value' => $specValue,
                                'order'      => $specOrder++,
                            ]);
                        }
                    }

                    $imported++;
                }
            }

            return compact('imported', 'skipped', 'newCats');
        } finally {
            $this->zip->close();
        }
    }

    // ── Private helpers ──────────────────────────────────────────────────────

    private function loadSharedStrings(): array
    {
        $xml = $this->zip->getFromName('xl/sharedStrings.xml');
        if (!$xml) {
            return [];
        }

        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $strings = [];

        foreach ($dom->getElementsByTagName('si') as $si) {
            // Collect all <t> text nodes within the <si> element
            $text = '';
            foreach ($si->getElementsByTagName('t') as $t) {
                $text .= $t->textContent;
            }
            $strings[] = $text;
        }

        return $strings;
    }

    private function getSheetNames(): array
    {
        $xml = $this->zip->getFromName('xl/workbook.xml');
        preg_match_all('/name="([^"]+)"/', $xml, $m);
        return $m[1] ?? [];
    }

    private function readSheet(int $sheetNumber): array
    {
        $xml = $this->zip->getFromName("xl/worksheets/sheet{$sheetNumber}.xml");
        if (!$xml) {
            return [];
        }

        $dom = new DOMDocument();
        $dom->loadXML($xml);
        $ns = 'http://schemas.openxmlformats.org/spreadsheetml/2006/main';

        $rows = [];

        foreach ($dom->getElementsByTagNameNS($ns, 'row') as $rowNode) {
            $cells   = [];
            $maxCol  = 0;

            foreach ($rowNode->getElementsByTagNameNS($ns, 'c') as $cell) {
                $ref = $cell->getAttribute('r');
                preg_match('/^([A-Z]+)/', $ref, $colMatch);
                $colIndex = $this->colToIndex($colMatch[1] ?? 'A');

                $type   = $cell->getAttribute('t');
                $vNodes = $cell->getElementsByTagNameNS($ns, 'v');
                $value  = $vNodes->length > 0 ? $vNodes->item(0)->textContent : '';

                if ($type === 's') {
                    $value = $this->sharedStrings[(int) $value] ?? '';
                }

                $cells[$colIndex] = $value;
                $maxCol = max($maxCol, $colIndex);
            }

            // Build dense row array filling any gaps with empty string
            $row = [];
            for ($i = 0; $i <= $maxCol; $i++) {
                $row[] = $cells[$i] ?? '';
            }

            if (!empty(array_filter($row, fn($v) => trim($v) !== ''))) {
                $rows[] = $row;
            }
        }

        return $rows;
    }

    /**
     * Convert column letters (A, B, ... Z, AA, AB ...) to 0-based index.
     */
    private function colToIndex(string $col): int
    {
        $index = 0;
        foreach (str_split(strtoupper($col)) as $char) {
            $index = $index * 26 + (ord($char) - 64);
        }
        return $index - 1;
    }

    private function findOrCreateCategory(string $name): array
    {
        $existing = Category::where('name', $name)->first();
        if ($existing) {
            return [false, $existing];
        }

        $category = Category::create([
            'name'      => $name,
            'type'      => 'product',
            'is_active' => true,
        ]);

        return [true, $category];
    }
}
