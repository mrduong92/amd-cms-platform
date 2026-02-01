<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Site;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AmdNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $amdSite = Site::where('slug', 'amd')->first();

        if (!$amdSite) {
            $this->command->error('AMD site not found. Please run SiteSeeder first.');
            return;
        }

        // Create news categories
        $categories = [
            'AI & Công nghệ',
            'Thiết kế Web',
            'Marketing số',
            'Case Study',
            'Xu hướng',
        ];

        $categoryModels = [];
        foreach ($categories as $index => $name) {
            $categoryModels[$name] = Category::firstOrCreate(
                ['slug' => Str::slug($name), 'type' => 'post'],
                [
                    'name' => $name,
                    'description' => 'Bài viết về ' . $name,
                    'is_active' => true,
                    'order' => $index,
                ]
            );
        }

        // News articles
        $articles = [
            [
                'title' => 'AI trong thiết kế Web: Xu hướng 2026 và tương lai',
                'category' => 'AI & Công nghệ',
                'excerpt' => 'Khám phá cách trí tuệ nhân tạo đang cách mạng hóa ngành thiết kế web, từ tự động hóa layout đến cá nhân hóa trải nghiệm người dùng.',
                'content' => '
<h2>AI đang thay đổi cách chúng ta thiết kế website</h2>
<p>Năm 2026 đánh dấu bước ngoặt quan trọng trong ngành thiết kế web khi AI trở thành công cụ không thể thiếu. Từ việc tự động sinh layout đến tối ưu hóa UX, AI đang giúp các designer làm việc hiệu quả hơn bao giờ hết.</p>

<h3>1. Tự động hóa thiết kế layout</h3>
<p>AI có thể phân tích hàng triệu website thành công để đề xuất cấu trúc layout tối ưu cho từng ngành nghề cụ thể. Điều này giúp rút ngắn thời gian thiết kế từ vài tuần xuống còn vài ngày.</p>

<h3>2. Cá nhân hóa trải nghiệm người dùng</h3>
<p>Với machine learning, website có thể tự điều chỉnh nội dung và giao diện dựa trên hành vi của từng người dùng, tạo ra trải nghiệm độc đáo cho mỗi khách truy cập.</p>

<h3>3. Tối ưu hóa SEO thông minh</h3>
<p>AI giúp phân tích và đề xuất cải thiện SEO một cách tự động, từ cấu trúc heading đến meta description, đảm bảo website luôn đạt thứ hạng cao trên công cụ tìm kiếm.</p>

<blockquote>
"AI không thay thế designer, mà giúp họ làm việc thông minh hơn" - CEO AMD AI Solutions
</blockquote>

<h3>Kết luận</h3>
<p>Việc áp dụng AI trong thiết kế web không còn là lựa chọn mà là điều bắt buộc để cạnh tranh trong thị trường số hóa ngày nay.</p>
',
            ],
            [
                'title' => '5 yếu tố quan trọng nhất của một website chuyển đổi cao',
                'category' => 'Thiết kế Web',
                'excerpt' => 'Tìm hiểu những yếu tố thiết kế và UX giúp tăng tỷ lệ chuyển đổi khách truy cập thành khách hàng thực sự.',
                'content' => '
<h2>Website của bạn có đang "bán hàng" hiệu quả?</h2>
<p>Một website đẹp chưa chắc đã là website tốt. Website tốt phải có khả năng chuyển đổi khách truy cập thành khách hàng. Dưới đây là 5 yếu tố then chốt:</p>

<h3>1. Thời gian tải trang nhanh</h3>
<p>Theo nghiên cứu, 53% người dùng mobile sẽ rời website nếu tải quá 3 giây. Tối ưu tốc độ là ưu tiên số 1.</p>

<h3>2. Call-to-Action rõ ràng</h3>
<p>Nút CTA phải nổi bật, dễ thấy và truyền tải được giá trị. "Nhận báo giá miễn phí" hiệu quả hơn đơn giản là "Gửi".</p>

<h3>3. Social Proof mạnh mẽ</h3>
<p>Testimonials, reviews, case studies - những bằng chứng xã hội giúp xây dựng niềm tin với khách hàng mới.</p>

<h3>4. Mobile-first Design</h3>
<p>70% traffic hiện nay đến từ mobile. Website phải hoạt động hoàn hảo trên điện thoại.</p>

<h3>5. Nội dung có giá trị</h3>
<p>Content phải giải quyết vấn đề của khách hàng, không chỉ nói về bản thân doanh nghiệp.</p>
',
            ],
            [
                'title' => 'Chiến lược Marketing số cho SME: Chi phí thấp, hiệu quả cao',
                'category' => 'Marketing số',
                'excerpt' => 'Hướng dẫn xây dựng chiến lược marketing số phù hợp với ngân sách hạn chế của doanh nghiệp nhỏ và vừa.',
                'content' => '
<h2>Marketing số không cần ngân sách khủng</h2>
<p>Nhiều SME nghĩ rằng marketing số đòi hỏi ngân sách lớn. Thực tế, với chiến lược đúng đắn, bạn có thể đạt kết quả ấn tượng với chi phí tối thiểu.</p>

<h3>SEO - Đầu tư dài hạn hiệu quả</h3>
<p>Tối ưu SEO cho website giúp bạn có traffic miễn phí từ Google. Chi phí ban đầu cho SEO sẽ mang lại lợi ích lâu dài.</p>

<h3>Content Marketing</h3>
<p>Tạo nội dung giá trị thu hút khách hàng tự nhiên. Blog, video, infographic - hãy chọn định dạng phù hợp với audience của bạn.</p>

<h3>Social Media có chiến lược</h3>
<p>Đừng có mặt trên mọi nền tảng. Hãy tập trung vào 1-2 kênh nơi khách hàng của bạn thực sự hoạt động.</p>

<h3>Email Marketing</h3>
<p>Với ROI trung bình 4200%, email marketing vẫn là kênh hiệu quả nhất cho SME.</p>
',
            ],
            [
                'title' => 'Case Study: Tăng 300% leads cho công ty xây dựng với website mới',
                'category' => 'Case Study',
                'excerpt' => 'Phân tích chi tiết cách AMD AI Solutions giúp một công ty xây dựng tăng trưởng leads gấp 3 lần sau khi redesign website.',
                'content' => '
<h2>Bối cảnh</h2>
<p>Công ty Xây dựng Đại Phát đến với AMD với vấn đề: website cũ không tạo ra leads, hầu hết khách hàng đến từ giới thiệu truyền miệng.</p>

<h3>Thách thức</h3>
<ul>
<li>Website cũ không responsive, tải chậm</li>
<li>Không có form liên hệ rõ ràng</li>
<li>Nội dung nghèo nàn, không có portfolio dự án</li>
<li>SEO gần như không tồn tại</li>
</ul>

<h3>Giải pháp AMD AI</h3>
<ul>
<li>Thiết kế lại hoàn toàn với AI-powered layout</li>
<li>Tối ưu tốc độ (PageSpeed 95+)</li>
<li>Xây dựng portfolio với 50+ dự án hoàn thành</li>
<li>Tích hợp chatbot tư vấn 24/7</li>
<li>SEO on-page cho 100+ từ khóa ngành xây dựng</li>
</ul>

<h3>Kết quả sau 3 tháng</h3>
<ul>
<li>Traffic tăng 450%</li>
<li>Leads từ website tăng 300%</li>
<li>Tỷ lệ chuyển đổi đạt 4.2%</li>
<li>Doanh thu từ online chiếm 35% tổng doanh thu</li>
</ul>
',
            ],
            [
                'title' => 'Website 2026: Tối giản, tốc độ và trải nghiệm đa giác quan',
                'category' => 'Xu hướng',
                'excerpt' => 'Điểm qua những xu hướng thiết kế web nổi bật nhất năm 2026 mà mọi doanh nghiệp cần biết.',
                'content' => '
<h2>Xu hướng thiết kế web 2026</h2>
<p>Thế giới web design đang thay đổi nhanh chóng. Dưới đây là những xu hướng đang định hình năm 2026:</p>

<h3>1. Neobrutalism</h3>
<p>Thiết kế mạnh mẽ, bold với border dày và màu sắc tương phản cao đang trở lại như một làn sóng mới.</p>

<h3>2. Dark Mode mặc định</h3>
<p>Với sự phổ biến của OLED screens, dark mode không còn là option mà là mặc định cho nhiều website.</p>

<h3>3. Micro-interactions AI-powered</h3>
<p>Các hiệu ứng nhỏ được AI cá nhân hóa tạo trải nghiệm độc đáo cho mỗi người dùng.</p>

<h3>4. 3D và Immersive Experience</h3>
<p>WebGL và Three.js giúp tạo trải nghiệm 3D ngay trên browser mà không cần plugin.</p>

<h3>5. Voice UI Integration</h3>
<p>Với sự phổ biến của smart speakers, website bắt đầu tích hợp voice navigation.</p>

<h3>6. Sustainable Web Design</h3>
<p>Thiết kế tiết kiệm năng lượng, tối ưu carbon footprint của website.</p>
',
            ],
            [
                'title' => 'Chatbot AI: Công cụ bán hàng 24/7 cho doanh nghiệp nhỏ',
                'category' => 'AI & Công nghệ',
                'excerpt' => 'Hướng dẫn triển khai chatbot AI để tự động hóa chăm sóc khách hàng và tăng doanh số.',
                'content' => '
<h2>Tại sao SME cần chatbot AI?</h2>
<p>Với nguồn lực hạn chế, SME không thể có đội ngũ chăm sóc khách hàng 24/7. Chatbot AI là giải pháp hoàn hảo.</p>

<h3>Lợi ích của Chatbot AI</h3>
<ul>
<li><strong>Hoạt động 24/7:</strong> Không bỏ lỡ bất kỳ khách hàng nào</li>
<li><strong>Trả lời tức thì:</strong> Khách hàng không phải chờ đợi</li>
<li><strong>Tiết kiệm chi phí:</strong> Giảm 70% chi phí support</li>
<li><strong>Thu thập data:</strong> Hiểu khách hàng tốt hơn</li>
</ul>

<h3>Các bước triển khai</h3>
<ol>
<li>Xác định use cases chính (FAQ, đặt hàng, hỗ trợ)</li>
<li>Xây dựng knowledge base</li>
<li>Training chatbot với dữ liệu thực</li>
<li>Tích hợp vào website và các kênh khác</li>
<li>Liên tục cải thiện dựa trên feedback</li>
</ol>

<h3>AMD AI Chatbot Solution</h3>
<p>AMD cung cấp giải pháp chatbot AI tích hợp sẵn cho mọi website, được training riêng cho từng ngành nghề.</p>
',
            ],
        ];

        foreach ($articles as $index => $article) {
            $category = $categoryModels[$article['category']];

            Post::create([
                'site_id' => $amdSite->id,
                'category_id' => $category->id,
                'title' => $article['title'],
                'slug' => Str::slug($article['title']),
                'excerpt' => $article['excerpt'],
                'content' => trim($article['content']),
                'type' => 'news',
                'is_active' => true,
                'is_featured' => $index < 3, // First 3 are featured
                'published_at' => now()->subDays($index * 3),
            ]);
        }

        $this->command->info('AMD News seeded successfully! Created ' . count($articles) . ' news articles.');
    }
}
