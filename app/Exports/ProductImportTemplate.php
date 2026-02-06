<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductImportTemplate implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'Tên sản phẩm',
            'Mã sản phẩm',
        ];
    }

    public function array(): array
    {
        return [
            ['Sản phẩm mẫu 1', 'SP001'],
            ['Sản phẩm mẫu 2', 'SP002'],
        ];
    }
}
