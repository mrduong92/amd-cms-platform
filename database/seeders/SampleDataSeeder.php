<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductSpec;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Database\Seeder;

class SampleDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Product Categories
        $categories = [
            [
                'name' => 'Pin Lithium Xe Nâng',
                'type' => 'product',
                'icon' => 'battery_charging_full',
                'description' => 'Pin lithium chất lượng cao dành cho xe nâng công nghiệp',
                'order' => 1,
            ],
            [
                'name' => 'Pin Lithium Năng Lượng Mặt Trời',
                'type' => 'product',
                'icon' => 'solar_power',
                'description' => 'Hệ thống lưu trữ năng lượng mặt trời',
                'order' => 2,
            ],
            [
                'name' => 'Camera AI',
                'type' => 'product',
                'icon' => 'videocam',
                'description' => 'Camera an ninh tích hợp trí tuệ nhân tạo',
                'order' => 3,
            ],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }

        // Create Service Categories
        $serviceCategories = [
            [
                'name' => 'Dịch vụ Xe Nâng',
                'type' => 'service',
                'icon' => 'precision_manufacturing',
                'order' => 1,
            ],
            [
                'name' => 'Dịch vụ Năng Lượng',
                'type' => 'service',
                'icon' => 'bolt',
                'order' => 2,
            ],
        ];

        foreach ($serviceCategories as $cat) {
            Category::create($cat);
        }

        // Create Post Categories
        $postCategories = [
            [
                'name' => 'Tin tức',
                'type' => 'post',
                'icon' => 'newspaper',
                'order' => 1,
            ],
            [
                'name' => 'Dự án',
                'type' => 'post',
                'icon' => 'engineering',
                'order' => 2,
            ],
        ];

        foreach ($postCategories as $cat) {
            Category::create($cat);
        }

        // Create Sample Products
        $lithiumCat = Category::where('name', 'Pin Lithium Xe Nâng')->first();

        $products = [
            [
                'category_id' => $lithiumCat->id,
                'name' => 'Pin Lithium LFP 48V 200Ah',
                'short_description' => 'Pin lithium sắt phosphate hiệu suất cao cho xe nâng',
                'description' => '<p>Pin Lithium LFP 48V 200Ah là giải pháp hoàn hảo cho xe nâng điện với nhiều ưu điểm vượt trội:</p>
                <ul>
                    <li>Tuổi thọ cao: 3000+ chu kỳ sạc</li>
                    <li>An toàn tuyệt đối với công nghệ LFP</li>
                    <li>Sạc nhanh trong 2-3 giờ</li>
                    <li>Bảo hành 3 năm</li>
                </ul>',
                'badge' => 'Bán chạy',
                'price' => 45000000,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'category_id' => $lithiumCat->id,
                'name' => 'Pin Lithium LFP 80V 300Ah',
                'short_description' => 'Pin lithium công suất lớn cho xe nâng hạng nặng',
                'description' => '<p>Pin Lithium LFP 80V 300Ah được thiết kế cho các xe nâng hạng nặng trong môi trường công nghiệp khắc nghiệt.</p>',
                'badge' => 'Giảm giá',
                'price' => 85000000,
                'sale_price' => 75000000,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'category_id' => $lithiumCat->id,
                'name' => 'Pin Lithium LFP 24V 100Ah',
                'short_description' => 'Pin lithium nhỏ gọn cho xe nâng tay điện',
                'description' => '<p>Dòng pin lithium nhỏ gọn phù hợp cho xe nâng tay điện và các thiết bị vận chuyển nhẹ.</p>',
                'price' => 18000000,
                'is_featured' => false,
                'order' => 3,
            ],
        ];

        foreach ($products as $prod) {
            $product = Product::create($prod);

            // Add sample specs
            $specs = [
                ['spec_name' => 'Điện áp', 'spec_value' => str_contains($prod['name'], '48V') ? '48V' : (str_contains($prod['name'], '80V') ? '80V' : '24V'), 'order' => 1],
                ['spec_name' => 'Dung lượng', 'spec_value' => str_contains($prod['name'], '200Ah') ? '200Ah' : (str_contains($prod['name'], '300Ah') ? '300Ah' : '100Ah'), 'order' => 2],
                ['spec_name' => 'Công nghệ', 'spec_value' => 'LiFePO4 (LFP)', 'order' => 3],
                ['spec_name' => 'Chu kỳ sạc', 'spec_value' => '3000+', 'order' => 4],
                ['spec_name' => 'Bảo hành', 'spec_value' => '3 năm', 'order' => 5],
            ];

            foreach ($specs as $spec) {
                ProductSpec::create(array_merge($spec, ['product_id' => $product->id]));
            }
        }

        // Create Sample Services
        $services = [
            [
                'name' => 'Cho thuê xe nâng',
                'icon' => 'local_shipping',
                'short_description' => 'Dịch vụ cho thuê xe nâng ngắn hạn và dài hạn với giá cả cạnh tranh',
                'description' => '<p>Chúng tôi cung cấp dịch vụ cho thuê xe nâng linh hoạt theo nhu cầu của khách hàng.</p>',
                'order' => 1,
            ],
            [
                'name' => 'Bảo trì & Sửa chữa',
                'icon' => 'build',
                'short_description' => 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi',
                'description' => '<p>Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng hỗ trợ bảo trì và sửa chữa 24/7.</p>',
                'order' => 2,
            ],
            [
                'name' => 'Tư vấn giải pháp năng lượng',
                'icon' => 'lightbulb',
                'short_description' => 'Tư vấn và thiết kế hệ thống năng lượng mặt trời cho doanh nghiệp',
                'description' => '<p>Chuyên gia của chúng tôi sẽ tư vấn giải pháp năng lượng phù hợp nhất cho doanh nghiệp của bạn.</p>',
                'order' => 3,
            ],
            [
                'name' => 'Lắp đặt hệ thống pin',
                'icon' => 'engineering',
                'short_description' => 'Dịch vụ lắp đặt và chuyển đổi hệ thống pin lithium cho xe nâng',
                'description' => '<p>Chúng tôi cung cấp dịch vụ lắp đặt và nâng cấp hệ thống pin lithium cho xe nâng.</p>',
                'order' => 4,
            ],
            [
                'name' => 'Đào tạo vận hành',
                'icon' => 'school',
                'short_description' => 'Đào tạo nhân viên vận hành xe nâng an toàn và hiệu quả',
                'description' => '<p>Khóa đào tạo chuyên nghiệp giúp nhân viên vận hành xe nâng an toàn.</p>',
                'order' => 5,
            ],
            [
                'name' => 'Cung cấp phụ tùng',
                'icon' => 'inventory_2',
                'short_description' => 'Phụ tùng xe nâng chính hãng với giá ưu đãi',
                'description' => '<p>Cung cấp đầy đủ phụ tùng thay thế cho các loại xe nâng phổ biến.</p>',
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }

        // Create Sample Sliders
        $sliders = [
            [
                'title' => 'Giải pháp Pin Lithium',
                'subtitle' => 'Công nghệ xanh cho tương lai',
                'description' => 'Nâng cao hiệu suất, tiết kiệm chi phí với pin lithium chất lượng cao',
                'button_text' => 'Xem sản phẩm',
                'button_url' => '/san-pham',
                'image' => '',
                'order' => 1,
            ],
            [
                'title' => 'Dịch vụ Xe Nâng Chuyên Nghiệp',
                'subtitle' => 'Cho thuê - Bảo trì - Sửa chữa',
                'description' => 'Đội ngũ kỹ thuật viên giàu kinh nghiệm, hỗ trợ 24/7',
                'button_text' => 'Liên hệ ngay',
                'button_url' => '/lien-he',
                'image' => '',
                'order' => 2,
            ],
        ];

        foreach ($sliders as $slider) {
            Slider::create($slider);
        }

        // Create Header Menu
        $headerMenus = [
            ['name' => 'Trang chủ', 'url' => '/', 'order' => 1, 'location' => 'header'],
            ['name' => 'Giới thiệu', 'url' => '/gioi-thieu', 'order' => 2, 'location' => 'header'],
            ['name' => 'Sản phẩm', 'url' => '/san-pham', 'order' => 3, 'location' => 'header'],
            ['name' => 'Dịch vụ', 'url' => '/dich-vu', 'order' => 4, 'location' => 'header'],
            ['name' => 'Tin tức', 'url' => '/tin-tuc', 'order' => 5, 'location' => 'header'],
            ['name' => 'Liên hệ', 'url' => '/lien-he', 'order' => 6, 'location' => 'header'],
        ];

        foreach ($headerMenus as $menu) {
            Menu::create($menu);
        }

        // Create Footer Menu
        $footerMenus = [
            ['name' => 'Chính sách bảo hành', 'url' => '/chinh-sach-bao-hanh', 'order' => 1, 'location' => 'footer'],
            ['name' => 'Chính sách đổi trả', 'url' => '/chinh-sach-doi-tra', 'order' => 2, 'location' => 'footer'],
            ['name' => 'Điều khoản sử dụng', 'url' => '/dieu-khoan-su-dung', 'order' => 3, 'location' => 'footer'],
            ['name' => 'Chính sách bảo mật', 'url' => '/chinh-sach-bao-mat', 'order' => 4, 'location' => 'footer'],
        ];

        foreach ($footerMenus as $menu) {
            Menu::create($menu);
        }
    }
}
