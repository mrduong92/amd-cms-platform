<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;
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
        // $categories = [
        //     [
        //         'name' => 'Bình ắc quy pin lithium cho xe nâng điện',
        //         'type' => 'product',
        //         'icon' => 'battery_charging_full',
        //         'description' => 'Pin lithium chất lượng cao dành cho xe nâng công nghiệp, thay thế pin axit truyền thống',
        //         'order' => 1,
        //     ],
        //     [
        //         'name' => 'Hệ thống Camera AI an toàn cho xe nâng và máy công trình',
        //         'type' => 'product',
        //         'icon' => 'videocam',
        //         'description' => 'Camera AI tích hợp cảnh báo va chạm, phát hiện người và vật cản',
        //         'order' => 2,
        //     ],
        //     [
        //         'name' => 'Phụ tùng và linh kiện xe nâng và máy công trình',
        //         'type' => 'product',
        //         'icon' => 'settings',
        //         'description' => 'Phụ tùng thay thế chính hãng cho các loại xe nâng và máy công trình',
        //         'order' => 3,
        //     ],
        //     [
        //         'name' => 'Giải pháp lưu trữ năng lượng mặt trời (ESS)',
        //         'type' => 'product',
        //         'icon' => 'solar_power',
        //         'description' => 'Hệ thống lưu trữ năng lượng mặt trời cho gia đình và doanh nghiệp',
        //         'order' => 4,
        //     ],
        //     [
        //         'name' => 'Dịch vụ sửa chữa, bảo trì xe nâng',
        //         'type' => 'product',
        //         'icon' => 'build',
        //         'description' => 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi 24/7',
        //         'order' => 5,
        //     ],
        //     [
        //         'name' => 'Dịch vụ cho thuê xe nâng điện và xe nâng dầu',
        //         'type' => 'product',
        //         'icon' => 'local_shipping',
        //         'description' => 'Cho thuê xe nâng ngắn hạn và dài hạn với nhiều loại xe đa dạng',
        //         'order' => 6,
        //     ],
        // ];

        // foreach ($categories as $cat) {
        //     Category::create($cat);
        // }

        // // Create Service Categories
        // $serviceCategories = [
        //     [
        //         'name' => 'Dịch vụ Xe Nâng',
        //         'type' => 'service',
        //         'icon' => 'precision_manufacturing',
        //         'order' => 1,
        //     ],
        //     [
        //         'name' => 'Dịch vụ Năng Lượng',
        //         'type' => 'service',
        //         'icon' => 'bolt',
        //         'order' => 2,
        //     ],
        // ];

        // foreach ($serviceCategories as $cat) {
        //     Category::create($cat);
        // }

        // // Create Post Categories
        // $postCategories = [
        //     [
        //         'name' => 'Tin tức',
        //         'type' => 'post',
        //         'icon' => 'newspaper',
        //         'order' => 1,
        //     ],
        //     [
        //         'name' => 'Dự án',
        //         'type' => 'post',
        //         'icon' => 'engineering',
        //         'order' => 2,
        //     ],
        // ];

        // foreach ($postCategories as $cat) {
        //     Category::create($cat);
        // }

        // // Create Sample Products
        // $lithiumCat = Category::where('name', 'Pin Lithium Xe Nâng')->first();
        // $solarCat = Category::where('name', 'Pin Lithium Năng Lượng Mặt Trời')->first();
        // $cameraCat = Category::where('name', 'Camera AI')->first();

        // $products = [
        //     [
        //         'category_id' => $lithiumCat->id,
        //         'name' => 'Pin Lithium LFP 48V 200Ah',
        //         'short_description' => 'Pin lithium sắt phosphate hiệu suất cao cho xe nâng',
        //         'description' => '<p>Pin Lithium LFP 48V 200Ah là giải pháp hoàn hảo cho xe nâng điện với nhiều ưu điểm vượt trội:</p>
        //         <ul>
        //             <li>Tuổi thọ cao: 3000+ chu kỳ sạc</li>
        //             <li>An toàn tuyệt đối với công nghệ LFP</li>
        //             <li>Sạc nhanh trong 2-3 giờ</li>
        //             <li>Bảo hành 3 năm</li>
        //         </ul>',
        //         'badge' => 'Bán chạy',
        //         'price' => 45000000,
        //         'is_featured' => true,
        //         'order' => 1,
        //     ],
        //     [
        //         'category_id' => $lithiumCat->id,
        //         'name' => 'Pin Lithium LFP 80V 300Ah',
        //         'short_description' => 'Pin lithium công suất lớn cho xe nâng hạng nặng',
        //         'description' => '<p>Pin Lithium LFP 80V 300Ah được thiết kế cho các xe nâng hạng nặng trong môi trường công nghiệp khắc nghiệt.</p>',
        //         'badge' => 'Giảm giá',
        //         'price' => 85000000,
        //         'sale_price' => 75000000,
        //         'is_featured' => true,
        //         'order' => 2,
        //     ],
        //     [
        //         'category_id' => $lithiumCat->id,
        //         'name' => 'Pin Lithium LFP 24V 100Ah',
        //         'short_description' => 'Pin lithium nhỏ gọn cho xe nâng tay điện',
        //         'description' => '<p>Dòng pin lithium nhỏ gọn phù hợp cho xe nâng tay điện và các thiết bị vận chuyển nhẹ.</p>',
        //         'price' => 18000000,
        //         'is_featured' => true,
        //         'order' => 3,
        //     ],
        //     [
        //         'category_id' => $solarCat->id,
        //         'name' => 'Hệ thống lưu trữ 10kWh',
        //         'short_description' => 'Hệ thống lưu trữ năng lượng mặt trời gia đình',
        //         'description' => '<p>Hệ thống lưu trữ năng lượng mặt trời 10kWh phù hợp cho hộ gia đình và văn phòng nhỏ.</p>',
        //         'badge' => 'Mới',
        //         'price' => 65000000,
        //         'is_featured' => true,
        //         'order' => 4,
        //     ],
        //     [
        //         'category_id' => $solarCat->id,
        //         'name' => 'Hệ thống lưu trữ 50kWh',
        //         'short_description' => 'Hệ thống lưu trữ năng lượng công nghiệp',
        //         'description' => '<p>Hệ thống lưu trữ năng lượng 50kWh cho nhà máy và doanh nghiệp lớn.</p>',
        //         'price' => 280000000,
        //         'is_featured' => true,
        //         'order' => 5,
        //     ],
        //     [
        //         'category_id' => $cameraCat->id,
        //         'name' => 'Camera AI Nhận diện Khuôn mặt',
        //         'short_description' => 'Camera an ninh thông minh với AI nhận diện khuôn mặt',
        //         'description' => '<p>Camera tích hợp AI nhận diện khuôn mặt với độ chính xác cao, phù hợp cho văn phòng và nhà máy.</p>',
        //         'badge' => 'Hot',
        //         'price' => 8500000,
        //         'is_featured' => true,
        //         'order' => 6,
        //     ],
        // ];

        // foreach ($products as $prod) {
        //     $product = Product::create($prod);

        //     // Add sample specs based on category
        //     if ($prod['category_id'] == $lithiumCat->id) {
        //         $specs = [
        //             ['spec_name' => 'Điện áp', 'spec_value' => str_contains($prod['name'], '48V') ? '48V' : (str_contains($prod['name'], '80V') ? '80V' : '24V'), 'order' => 1],
        //             ['spec_name' => 'Dung lượng', 'spec_value' => str_contains($prod['name'], '200Ah') ? '200Ah' : (str_contains($prod['name'], '300Ah') ? '300Ah' : '100Ah'), 'order' => 2],
        //             ['spec_name' => 'Công nghệ', 'spec_value' => 'LiFePO4 (LFP)', 'order' => 3],
        //             ['spec_name' => 'Chu kỳ sạc', 'spec_value' => '3000+', 'order' => 4],
        //             ['spec_name' => 'Bảo hành', 'spec_value' => '3 năm', 'order' => 5],
        //         ];
        //     } elseif ($prod['category_id'] == $solarCat->id) {
        //         $specs = [
        //             ['spec_name' => 'Dung lượng', 'spec_value' => str_contains($prod['name'], '10kWh') ? '10kWh' : '50kWh', 'order' => 1],
        //             ['spec_name' => 'Công nghệ', 'spec_value' => 'LiFePO4', 'order' => 2],
        //             ['spec_name' => 'Hiệu suất', 'spec_value' => '95%+', 'order' => 3],
        //             ['spec_name' => 'Bảo hành', 'spec_value' => '10 năm', 'order' => 4],
        //         ];
        //     } else {
        //         $specs = [
        //             ['spec_name' => 'Độ phân giải', 'spec_value' => '4K Ultra HD', 'order' => 1],
        //             ['spec_name' => 'AI', 'spec_value' => 'Nhận diện khuôn mặt', 'order' => 2],
        //             ['spec_name' => 'Tầm nhìn đêm', 'spec_value' => '30m', 'order' => 3],
        //             ['spec_name' => 'Bảo hành', 'spec_value' => '2 năm', 'order' => 4],
        //         ];
        //     }

        //     foreach ($specs as $spec) {
        //         ProductSpec::create(array_merge($spec, ['product_id' => $product->id]));
        //     }
        // }

        // // Create Sample Services
        // $services = [
        //     [
        //         'name' => 'Cho thuê xe nâng',
        //         'icon' => 'local_shipping',
        //         'short_description' => 'Dịch vụ cho thuê xe nâng ngắn hạn và dài hạn với giá cả cạnh tranh',
        //         'description' => '<p>Chúng tôi cung cấp dịch vụ cho thuê xe nâng linh hoạt theo nhu cầu của khách hàng.</p>',
        //         'order' => 1,
        //     ],
        //     [
        //         'name' => 'Bảo trì & Sửa chữa',
        //         'icon' => 'build',
        //         'short_description' => 'Dịch vụ bảo trì định kỳ và sửa chữa xe nâng tận nơi',
        //         'description' => '<p>Đội ngũ kỹ thuật viên chuyên nghiệp sẵn sàng hỗ trợ bảo trì và sửa chữa 24/7.</p>',
        //         'order' => 2,
        //     ],
        //     [
        //         'name' => 'Tư vấn giải pháp năng lượng',
        //         'icon' => 'lightbulb',
        //         'short_description' => 'Tư vấn và thiết kế hệ thống năng lượng mặt trời cho doanh nghiệp',
        //         'description' => '<p>Chuyên gia của chúng tôi sẽ tư vấn giải pháp năng lượng phù hợp nhất cho doanh nghiệp của bạn.</p>',
        //         'order' => 3,
        //     ],
        //     [
        //         'name' => 'Lắp đặt hệ thống pin',
        //         'icon' => 'engineering',
        //         'short_description' => 'Dịch vụ lắp đặt và chuyển đổi hệ thống pin lithium cho xe nâng',
        //         'description' => '<p>Chúng tôi cung cấp dịch vụ lắp đặt và nâng cấp hệ thống pin lithium cho xe nâng.</p>',
        //         'order' => 4,
        //     ],
        //     [
        //         'name' => 'Đào tạo vận hành',
        //         'icon' => 'school',
        //         'short_description' => 'Đào tạo nhân viên vận hành xe nâng an toàn và hiệu quả',
        //         'description' => '<p>Khóa đào tạo chuyên nghiệp giúp nhân viên vận hành xe nâng an toàn.</p>',
        //         'order' => 5,
        //     ],
        //     [
        //         'name' => 'Cung cấp phụ tùng',
        //         'icon' => 'inventory_2',
        //         'short_description' => 'Phụ tùng xe nâng chính hãng với giá ưu đãi',
        //         'description' => '<p>Cung cấp đầy đủ phụ tùng thay thế cho các loại xe nâng phổ biến.</p>',
        //         'order' => 6,
        //     ],
        // ];

        // foreach ($services as $service) {
        //     Service::create($service);
        // }

        // // Create Sample Sliders
        // $sliders = [
        //     [
        //         'title' => 'Giải pháp Pin Lithium',
        //         'subtitle' => 'Công nghệ xanh cho tương lai',
        //         'description' => 'Nâng cao hiệu suất, tiết kiệm chi phí với pin lithium chất lượng cao',
        //         'button_text' => 'Xem sản phẩm',
        //         'button_url' => '/san-pham',
        //         'image' => '',
        //         'order' => 1,
        //     ],
        //     [
        //         'title' => 'Dịch vụ Xe Nâng Chuyên Nghiệp',
        //         'subtitle' => 'Cho thuê - Bảo trì - Sửa chữa',
        //         'description' => 'Đội ngũ kỹ thuật viên giàu kinh nghiệm, hỗ trợ 24/7',
        //         'button_text' => 'Liên hệ ngay',
        //         'button_url' => '/lien-he',
        //         'image' => '',
        //         'order' => 2,
        //     ],
        // ];

        // foreach ($sliders as $slider) {
        //     Slider::create($slider);
        // }

        // // Create Sample Posts
        // $newsCat = Category::where('name', 'Tin tức')->where('type', 'post')->first();
        // $projectCat = Category::where('name', 'Dự án')->where('type', 'post')->first();

        // $posts = [
        //     [
        //         'title' => 'NMT AUTO triển khai dự án chuyển đổi pin lithium cho kho logistics lớn',
        //         'excerpt' => 'Dự án chuyển đổi 50 xe nâng từ pin axit sang pin lithium tại kho logistics ABC đã hoàn thành thành công, giúp tiết kiệm 40% chi phí năng lượng.',
        //         'content' => '<p>Vừa qua, NMT AUTO đã hoàn thành thành công dự án chuyển đổi hệ thống pin cho 50 xe nâng tại kho logistics ABC, một trong những trung tâm logistics lớn nhất miền Nam.</p>
        //         <h3>Thách thức</h3>
        //         <p>Khách hàng đang sử dụng pin axit-chì truyền thống với nhiều hạn chế:</p>
        //         <ul>
        //             <li>Thời gian sạc kéo dài 8-10 tiếng</li>
        //             <li>Chi phí bảo trì cao</li>
        //             <li>Phải thay pin giữa ca làm việc</li>
        //         </ul>
        //         <h3>Giải pháp</h3>
        //         <p>NMT AUTO đã triển khai giải pháp pin lithium LFP với các ưu điểm:</p>
        //         <ul>
        //             <li>Sạc nhanh chỉ 2-3 tiếng</li>
        //             <li>Không cần bảo trì</li>
        //             <li>Tuổi thọ gấp 3 lần pin axit</li>
        //         </ul>
        //         <h3>Kết quả</h3>
        //         <p>Sau 6 tháng vận hành, khách hàng đã tiết kiệm được 40% chi phí năng lượng và tăng 25% năng suất vận hành.</p>',
        //         'type' => 'project',
        //         'category_id' => $projectCat?->id,
        //         'is_featured' => true,
        //         'published_at' => now()->subDays(5),
        //         'user_id' => 1,
        //     ],
        //     [
        //         'title' => 'Xu hướng sử dụng pin lithium trong ngành logistics năm 2024',
        //         'excerpt' => 'Pin lithium đang trở thành xu hướng tất yếu trong ngành logistics với nhiều ưu điểm vượt trội so với pin truyền thống.',
        //         'content' => '<p>Trong những năm gần đây, ngành logistics Việt Nam đang chứng kiến sự chuyển đổi mạnh mẽ từ pin axit-chì truyền thống sang pin lithium cho các thiết bị xử lý vật liệu.</p>
        //         <h3>Tại sao pin lithium?</h3>
        //         <p>Pin lithium mang lại nhiều lợi ích quan trọng:</p>
        //         <ul>
        //             <li><strong>Hiệu suất cao:</strong> Hiệu suất năng lượng đạt trên 95%</li>
        //             <li><strong>Sạc nhanh:</strong> Chỉ cần 1-3 tiếng để sạc đầy</li>
        //             <li><strong>Tuổi thọ dài:</strong> 3000+ chu kỳ sạc, gấp 3-4 lần pin axit</li>
        //             <li><strong>Không bảo trì:</strong> Không cần bổ sung nước, không khí thải độc hại</li>
        //         </ul>
        //         <h3>Triển vọng tương lai</h3>
        //         <p>Dự báo đến năm 2025, 60% xe nâng tại các kho logistics lớn sẽ sử dụng pin lithium.</p>',
        //         'type' => 'news',
        //         'category_id' => $newsCat?->id,
        //         'is_featured' => true,
        //         'published_at' => now()->subDays(10),
        //         'user_id' => 1,
        //     ],
        //     [
        //         'title' => 'Hướng dẫn bảo dưỡng xe nâng điện đúng cách',
        //         'excerpt' => 'Bảo dưỡng định kỳ xe nâng điện giúp kéo dài tuổi thọ thiết bị và đảm bảo an toàn vận hành.',
        //         'content' => '<p>Xe nâng điện là thiết bị quan trọng trong kho bãi, việc bảo dưỡng đúng cách sẽ giúp thiết bị hoạt động ổn định và bền bỉ.</p>
        //         <h3>Lịch bảo dưỡng định kỳ</h3>
        //         <ul>
        //             <li><strong>Hàng ngày:</strong> Kiểm tra mức nạp pin, vệ sinh xe</li>
        //             <li><strong>Hàng tuần:</strong> Kiểm tra lốp, phanh, hệ thống thủy lực</li>
        //             <li><strong>Hàng tháng:</strong> Kiểm tra tổng thể, bôi trơn các bộ phận</li>
        //             <li><strong>6 tháng:</strong> Bảo dưỡng lớn, thay dầu thủy lực</li>
        //         </ul>
        //         <h3>Lưu ý quan trọng</h3>
        //         <p>Luôn sử dụng phụ tùng chính hãng và tuân thủ hướng dẫn của nhà sản xuất.</p>',
        //         'type' => 'news',
        //         'category_id' => $newsCat?->id,
        //         'is_featured' => false,
        //         'published_at' => now()->subDays(15),
        //         'user_id' => 1,
        //     ],
        //     [
        //         'title' => 'Dự án lắp đặt hệ thống năng lượng mặt trời 500kWp cho nhà máy sản xuất',
        //         'excerpt' => 'NMT AUTO hoàn thành lắp đặt hệ thống điện mặt trời áp mái 500kWp, giúp nhà máy tiết kiệm 30% chi phí điện.',
        //         'content' => '<p>NMT AUTO vừa hoàn thành dự án lắp đặt hệ thống điện mặt trời áp mái công suất 500kWp cho nhà máy sản xuất XYZ tại Bình Dương.</p>
        //         <h3>Thông số dự án</h3>
        //         <ul>
        //             <li>Công suất: 500kWp</li>
        //             <li>Diện tích: 3,500m² mái nhà</li>
        //             <li>Số tấm pin: 1,000 tấm Longi 500W</li>
        //             <li>Inverter: Huawei SUN2000</li>
        //         </ul>
        //         <h3>Hiệu quả đạt được</h3>
        //         <p>Sau khi vận hành, hệ thống sản xuất trung bình 2,000 kWh/ngày, giúp nhà máy tiết kiệm khoảng 1.5 tỷ đồng tiền điện mỗi năm.</p>',
        //         'type' => 'project',
        //         'category_id' => $projectCat?->id,
        //         'is_featured' => true,
        //         'published_at' => now()->subDays(3),
        //         'user_id' => 1,
        //     ],
        // ];

        // foreach ($posts as $post) {
        //     Post::create($post);
        // }

        // // Create Sample Pages
        // $pages = [
        //     [
        //         'title' => 'Về chúng tôi',
        //         'slug' => 'about',
        //         'content' => '<div class="space-y-8">
        //             <div class="flex gap-6">
        //                 <div class="shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md">
        //                     <span class="material-symbols-outlined text-primary">verified</span>
        //                 </div>
        //                 <div>
        //                     <h4 class="font-bold text-xl mb-1">Chuyên môn kỹ thuật vượt trội</h4>
        //                     <p class="text-slate-600">Các kỹ sư của chúng tôi được đào tạo chính quy với hơn 10 năm kinh nghiệm trong hệ thống năng lượng và thiết bị công nghiệp.</p>
        //                 </div>
        //             </div>
        //             <div class="flex gap-6">
        //                 <div class="shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md">
        //                     <span class="material-symbols-outlined text-primary">support_agent</span>
        //                 </div>
        //                 <div>
        //                     <h4 class="font-bold text-xl mb-1">Hỗ trợ 24/7</h4>
        //                     <p class="text-slate-600">Hạ tầng quan trọng không bao giờ nghỉ. Chúng tôi cũng vậy. Đội ngũ hỗ trợ luôn sẵn sàng phục vụ bạn mọi lúc.</p>
        //                 </div>
        //             </div>
        //             <div class="flex gap-6">
        //                 <div class="shrink-0 w-12 h-12 bg-white rounded-full flex items-center justify-center shadow-md">
        //                     <span class="material-symbols-outlined text-primary">high_quality</span>
        //                 </div>
        //                 <div>
        //                     <h4 class="font-bold text-xl mb-1">Đảm bảo chất lượng cao cấp</h4>
        //                     <p class="text-slate-600">Mọi sản phẩm và dịch vụ đều đáp ứng các tiêu chuẩn an toàn và chất lượng quốc tế khắt khe nhất.</p>
        //                 </div>
        //             </div>
        //         </div>',
        //         'template' => 'about',
        //         'is_active' => true,
        //     ],
        //     [
        //         'title' => 'Chính sách bảo hành',
        //         'slug' => 'chinh-sach-bao-hanh',
        //         'content' => '<h2>Chính sách bảo hành sản phẩm</h2>
        //         <p>NMT AUTO cam kết bảo hành chính hãng cho tất cả sản phẩm được mua trực tiếp từ công ty.</p>
        //         <h3>Thời gian bảo hành</h3>
        //         <ul>
        //             <li>Pin lithium xe nâng: 3 năm</li>
        //             <li>Hệ thống lưu trữ năng lượng: 10 năm</li>
        //             <li>Camera AI: 2 năm</li>
        //         </ul>
        //         <h3>Điều kiện bảo hành</h3>
        //         <ul>
        //             <li>Sản phẩm còn trong thời hạn bảo hành</li>
        //             <li>Có phiếu bảo hành và hóa đơn mua hàng</li>
        //             <li>Sản phẩm bị lỗi do nhà sản xuất</li>
        //         </ul>
        //         <h3>Không bảo hành</h3>
        //         <ul>
        //             <li>Hư hỏng do sử dụng sai cách</li>
        //             <li>Sản phẩm đã qua sửa chữa bên ngoài</li>
        //             <li>Hư hỏng do thiên tai, cháy nổ</li>
        //         </ul>',
        //         'template' => 'default',
        //         'is_active' => true,
        //     ],
        //     [
        //         'title' => 'Chính sách đổi trả',
        //         'slug' => 'chinh-sach-doi-tra',
        //         'content' => '<h2>Chính sách đổi trả hàng</h2>
        //         <p>Quý khách có thể đổi trả sản phẩm trong vòng 7 ngày kể từ ngày nhận hàng.</p>
        //         <h3>Điều kiện đổi trả</h3>
        //         <ul>
        //             <li>Sản phẩm còn nguyên vẹn, chưa qua sử dụng</li>
        //             <li>Còn đầy đủ bao bì, phụ kiện đi kèm</li>
        //             <li>Có hóa đơn mua hàng</li>
        //         </ul>
        //         <h3>Quy trình đổi trả</h3>
        //         <ol>
        //             <li>Liên hệ hotline: 1900 1234</li>
        //             <li>Cung cấp thông tin đơn hàng và lý do đổi trả</li>
        //             <li>Gửi sản phẩm về địa chỉ công ty</li>
        //             <li>Nhận sản phẩm mới hoặc hoàn tiền trong 3-5 ngày</li>
        //         </ol>',
        //         'template' => 'default',
        //         'is_active' => true,
        //     ],
        //     [
        //         'title' => 'Liên hệ',
        //         'slug' => 'lien-he',
        //         'content' => '<p>Hãy liên hệ với chúng tôi để được tư vấn và hỗ trợ tốt nhất.</p>',
        //         'template' => 'contact',
        //         'is_active' => true,
        //     ],
        // ];

        // foreach ($pages as $page) {
        //     Page::create($page);
        // }

        // Create Sample Partners
        $partners = [
            [
                'name' => 'Toyota Material Handling',
                'url' => 'https://toyota-forklifts.com.vn',
                'logo' => '',
                'order' => 1,
            ],
            [
                'name' => 'CATL Battery',
                'url' => 'https://www.catl.com',
                'logo' => '',
                'order' => 2,
            ],
            [
                'name' => 'BYD Forklift',
                'url' => 'https://www.byd.com',
                'logo' => '',
                'order' => 3,
            ],
            [
                'name' => 'Longi Solar',
                'url' => 'https://www.longi.com',
                'logo' => '',
                'order' => 4,
            ],
            [
                'name' => 'Huawei Solar',
                'url' => 'https://solar.huawei.com',
                'logo' => '',
                'order' => 5,
            ],
            [
                'name' => 'Hikvision',
                'url' => 'https://www.hikvision.com',
                'logo' => '',
                'order' => 6,
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }

        // Create Header Menu
        $headerMenus = [
            ['name' => 'Trang chủ', 'link_type' => 'home', 'url' => '/', 'order' => 1, 'location' => 'header'],
            ['name' => 'Dịch vụ', 'link_type' => 'custom', 'url' => '/dich-vu', 'order' => 3, 'location' => 'header'],
            ['name' => 'Dự án', 'link_type' => 'custom', 'url' => '/du-an', 'order' => 4, 'location' => 'header'],
            ['name' => 'Tin tức', 'link_type' => 'custom', 'url' => '/tin-tuc', 'order' => 5, 'location' => 'header'],
            ['name' => 'Liên hệ', 'link_type' => 'custom', 'url' => '/lien-he', 'order' => 6, 'location' => 'header'],
        ];

        foreach ($headerMenus as $menu) {
            Menu::create($menu);
        }

        // Create "Sản phẩm chủ lực" menu with submenu
        $productMenu = Menu::create([
            'name' => 'Sản phẩm chủ lực',
            'link_type' => 'custom',
            'url' => '/san-pham',
            'order' => 2,
            'location' => 'header',
        ]);

        $productSubmenus = [
            ['name' => 'Pin lithium xe nâng', 'link_type' => 'custom', 'url' => '/san-pham/danh-muc/binh-ac-quy-pin-lithium-cho-xe-nang-dien', 'order' => 1],
            ['name' => 'Camera AI', 'link_type' => 'custom', 'url' => '/san-pham/danh-muc/he-thong-camera-ai-an-toan-cho-xe-nang-va-may-cong-trinh', 'order' => 2],
            ['name' => 'Xe nâng', 'link_type' => 'custom', 'url' => '/san-pham/danh-muc/dich-vu-cho-thue-xe-nang-dien-va-xe-nang-dau', 'order' => 3],
            ['name' => 'Máy công trình', 'link_type' => 'custom', 'url' => '/san-pham/danh-muc/phu-tung-va-linh-kien-xe-nang-va-may-cong-trinh', 'order' => 4],
            ['name' => 'Phụ tùng xe nâng', 'link_type' => 'custom', 'url' => '/san-pham/danh-muc/phu-tung-va-linh-kien-xe-nang-va-may-cong-trinh', 'order' => 5],
        ];

        foreach ($productSubmenus as $submenu) {
            Menu::create(array_merge($submenu, [
                'parent_id' => $productMenu->id,
                'location' => 'header',
            ]));
        }

        // Create Footer Menu
        $footerMenus = [
            ['name' => 'Dịch vụ', 'link_type' => 'custom', 'url' => '/dich-vu', 'order' => 1, 'location' => 'footer'],
            ['name' => 'Dự án tiêu biểu', 'link_type' => 'custom', 'url' => '/du-an', 'order' => 2, 'location' => 'footer'],
            ['name' => 'Tin tức', 'link_type' => 'custom', 'url' => '/tin-tuc', 'order' => 3, 'location' => 'footer'],
            ['name' => 'Chính sách bảo hành', 'link_type' => 'page', 'url' => '/chinh-sach-bao-hanh', 'order' => 4, 'location' => 'footer'],
            ['name' => 'Liên hệ', 'link_type' => 'custom', 'url' => '/lien-he', 'order' => 5, 'location' => 'footer'],
        ];

        foreach ($footerMenus as $menu) {
            Menu::create($menu);
        }
    }
}
