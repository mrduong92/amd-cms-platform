<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductImportTemplate implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            new class implements FromArray, WithHeadings, WithTitle {
                public function title(): string
                {
                    return 'Pin xe nâng điện';
                }

                public function headings(): array
                {
                    return [
                        'STT',
                        'Mã sản phẩm',
                        'Tên sản phẩm',
                        'Điện áp định danh (V)',
                        'Dung lượng (Ah)',
                        'Xe áp dụng',
                        'Loại cell',
                        'Giao tiếp',
                        'Chống nước',
                        'Bảo hành',
                        'Thời gian sạc đầy',
                    ];
                }

                public function array(): array
                {
                    return [
                        [1, 'NMT-LFP-24V-230Ah-V1', 'Bình lithium xe nâng điện 24V 230Ah', 24, 230, 'Xe nâng điện', 'LiFePO4', 'CAN/RS485', 'IP54', '5 năm hoặc 10.000 chu kỳ', '2-4h'],
                    ];
                }
            },

            new class implements FromArray, WithHeadings, WithTitle {
                public function title(): string
                {
                    return 'Bộ sạc xe điện';
                }

                public function headings(): array
                {
                    return [
                        'STT',
                        'Mã sản phẩm',
                        'Tên sản phẩm',
                        'Tên gọi',
                        'Điện áp (V)',
                        'Công suất sạc đầu ra tối đa (A)',
                        'Điện áp đầu vào',
                        'Xe áp dụng',
                        'Bảo hành',
                    ];
                }

                public function array(): array
                {
                    return [
                        [1, 'NMT-CHR-24V-60A-V1', 'Bộ sạc nhanh Lithium 24V 60A', 'Bộ sạc - Trạm sạc', 24, 60, '220V AC', 'Xe nâng điện, xe điện', '24 tháng'],
                    ];
                }
            },
        ];
    }
}
