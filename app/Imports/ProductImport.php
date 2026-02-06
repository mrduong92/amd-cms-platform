<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    private int $rowCount = 0;

    public function model(array $row)
    {
        $name = $row['ten_san_pham'] ?? null;

        if (empty($name)) {
            return null;
        }

        $this->rowCount++;

        return new Product([
            'name' => $name,
            'sku' => $row['ma_san_pham'] ?? null,
            'is_active' => true,
            'is_featured' => false,
            'order' => Product::max('order') + $this->rowCount,
        ]);
    }

    public function getRowCount(): int
    {
        return $this->rowCount;
    }
}
