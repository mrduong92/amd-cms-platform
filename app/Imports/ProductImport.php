<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ProductImport implements WithMultipleSheets
{
    private array $sheetNames;
    private int $importedCount = 0;
    private int $skippedCount  = 0;

    public function __construct(array $sheetNames)
    {
        $this->sheetNames = $sheetNames;
    }

    /**
     * Return one SheetImport per sheet, keyed by 0-based index.
     */
    public function sheets(): array
    {
        $sheets = [];
        foreach ($this->sheetNames as $index => $name) {
            $sheets[$index] = new ProductSheetImport($name, $this);
        }
        return $sheets;
    }

    public function incrementCount(): void  { $this->importedCount++; }
    public function incrementSkipped(): void { $this->skippedCount++; }
    public function getImportedCount(): int  { return $this->importedCount; }
    public function getSkippedCount(): int   { return $this->skippedCount; }
}
