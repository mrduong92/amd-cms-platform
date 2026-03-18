<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSpec;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductSheetImport implements ToCollection
{
    private string $categoryName;
    private ProductImport $parent;

    public function __construct(string $categoryName, ProductImport $parent)
    {
        $this->categoryName = $categoryName;
        $this->parent = $parent;
    }

    public function collection(Collection $rows)
    {
        if ($rows->count() < 2) {
            return;
        }

        // Row 0 = header row (raw column names)
        $headers = $rows->first()->toArray();

        // Detect format:
        // Old format: A=STT, B=SKU, C=Name, D+=Specs
        // New format: A=SKU, B=Name, C=description (e.g. "Xe áp dụng"), no specs
        $isNewFormat = strtolower(trim($headers[0] ?? '')) !== 'stt';

        // Get or create the category from the sheet name
        $category = Category::firstOrCreate(
            ['name' => $this->categoryName],
            ['type' => 'product', 'is_active' => true]
        );

        // Data rows start at index 1
        foreach ($rows->skip(1) as $row) {
            $arr = $row->toArray();

            if ($isNewFormat) {
                $sku  = trim($arr[0] ?? '');
                $name = trim($arr[1] ?? '');
                $desc = trim($arr[2] ?? '');
            } else {
                $sku  = trim($arr[1] ?? '');
                $name = trim($arr[2] ?? '');
                $desc = '';
            }

            if ($name === '') {
                continue;
            }

            // Skip if a product with this SKU already exists
            if ($sku !== '' && Product::where('sku', $sku)->exists()) {
                $this->parent->incrementSkipped();
                continue;
            }

            $product = Product::create([
                'category_id' => $category->id,
                'name'        => $name,
                'sku'         => $sku ?: null,
                'description' => $desc ?: null,
                'is_active'   => true,
                'is_featured' => false,
                'order'       => 0,
            ]);

            if (!$isNewFormat) {
                // Columns 3+ become product specs
                $specOrder = 0;
                for ($i = 3; $i < count($headers); $i++) {
                    $specName  = trim($headers[$i] ?? '');
                    $specValue = trim((string) ($arr[$i] ?? ''));

                    if ($specName !== '' && $specValue !== '') {
                        ProductSpec::create([
                            'product_id' => $product->id,
                            'spec_name'  => $specName,
                            'spec_value' => $specValue,
                            'order'      => $specOrder++,
                        ]);
                    }
                }
            }

            $this->parent->incrementCount();
        }
    }
}
