<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Site;
use Illuminate\Database\Seeder;

class AmdProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get AMD site
        $amdSite = Site::where('slug', 'amd')->first();

        if (!$amdSite) {
            $this->command->error('AMD site not found. Please run SiteSeeder first.');
            return;
        }

        // Create project categories
        $categories = [
            'healthcare' => ['name' => 'Healthcare', 'type' => 'post'],
            'ecommerce' => ['name' => 'E-commerce', 'type' => 'post'],
            'enterprise' => ['name' => 'Enterprise', 'type' => 'post'],
            'saas' => ['name' => 'SaaS Platform', 'type' => 'post'],
            'education' => ['name' => 'Giáo dục', 'type' => 'post'],
            'b2b' => ['name' => 'B2B Solutions', 'type' => 'post'],
            'construction' => ['name' => 'Xây dựng & Nội thất', 'type' => 'post'],
            'fnb' => ['name' => 'F&B', 'type' => 'post'],
            'transport' => ['name' => 'Vận tải & Logistics', 'type' => 'post'],
            'api' => ['name' => 'API & Tools', 'type' => 'post'],
        ];

        $categoryIds = [];
        foreach ($categories as $slug => $data) {
            $category = Category::firstOrCreate(
                ['slug' => $slug, 'type' => 'post'],
                array_merge($data, ['slug' => $slug, 'is_active' => true, 'order' => 0])
            );
            $categoryIds[$slug] = $category->id;
        }

        // Define projects
        $projects = [
            [
                'title' => 'AI Chatbot cho Bệnh viện/Phòng khám',
                'slug' => 'ai-chatbot-healthcare',
                'category' => 'healthcare',
                'excerpt' => 'Hệ thống AI chatbot tư vấn sức khỏe tự động, giúp giảm tải công việc tư vấn ban đầu cho bệnh viện và phòng khám.',
                'content' => $this->getHealthcareContent(),
                'image' => null,
            ],
            [
                'title' => 'Hệ thống Quản lý Kho & Bán hàng Đa kênh',
                'slug' => 'ecommerce-multichannel',
                'category' => 'ecommerce',
                'excerpt' => 'Hệ thống tích hợp quản lý kho, đơn hàng từ nhiều kênh: Shopee, Lazada, TikTok Shop, Website.',
                'content' => $this->getEcommerceContent(),
                'image' => null,
            ],
            [
                'title' => 'Worklog Management System',
                'slug' => 'worklog-management-system',
                'category' => 'enterprise',
                'excerpt' => 'Hệ thống quản lý công số, timesheet cho công ty outsourcing với tích hợp SAML SSO.',
                'content' => $this->getEnterpriseContent(),
                'image' => null,
            ],
            [
                'title' => 'Salebot.io.vn - AI Chatbot Platform',
                'slug' => 'salebot-ai-platform',
                'category' => 'saas',
                'excerpt' => 'Platform cung cấp giải pháp chatbot thông minh giúp doanh nghiệp tự động hóa customer service và sales.',
                'content' => $this->getSalebotContent(),
                'image' => null,
            ],
            [
                'title' => 'Trung tâm Tiếng Nhật Bảo Tín',
                'slug' => 'nhatngubaotin-education',
                'category' => 'education',
                'excerpt' => 'Tư vấn & triển khai đồng bộ website trung tâm và hệ thống thi thử tiếng Nhật online.',
                'content' => $this->getEducationContent(),
                'image' => null,
            ],
            [
                'title' => 'Silkroad B2B Solutions',
                'slug' => 'silkroad-b2b-solutions',
                'category' => 'b2b',
                'excerpt' => 'Triển khai hạ tầng Azure, tích hợp Chatbot AI trên Zalo OA và phát triển API integration.',
                'content' => $this->getSilkroadContent(),
                'image' => null,
            ],
            [
                'title' => 'Đại Phát Hoàng Hà - VLXD',
                'slug' => 'daiphathoangha-vlxd',
                'category' => 'construction',
                'excerpt' => 'Website thương mại điện tử ngành vật liệu xây dựng với catalog sản phẩm và giỏ hàng.',
                'content' => $this->getVlxdContent(),
                'image' => null,
            ],
            [
                'title' => 'Bia Hơi Hà Nội 183',
                'slug' => 'biahoihanoi183-fnb',
                'category' => 'fnb',
                'excerpt' => 'Website giới thiệu nhà hàng với kế hoạch triển khai POS system, Kitchen Display, QR ordering.',
                'content' => $this->getFnbContent(),
                'image' => null,
            ],
            [
                'title' => 'Vận tải Thanh Sang & Chuyển nhà Tâm An',
                'slug' => 'transport-logistics',
                'category' => 'transport',
                'excerpt' => 'Bộ đôi website dịch vụ vận tải và chuyển nhà với tính năng báo giá online, đặt lịch tự động.',
                'content' => $this->getTransportContent(),
                'image' => null,
            ],
            [
                'title' => 'Phuan Home - Mái hiên di động',
                'slug' => 'phuanhome-awning',
                'category' => 'construction',
                'excerpt' => 'Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp với gallery sản phẩm.',
                'content' => $this->getPhuanHomeContent(),
                'image' => null,
            ],
            [
                'title' => 'Triệu Gia - Thiết kế Nội thất',
                'slug' => 'trieugia-interior',
                'category' => 'construction',
                'excerpt' => 'Website showcase dự án nội thất đã thực hiện với portfolio công trình và gallery ảnh.',
                'content' => $this->getTrieuGiaContent(),
                'image' => null,
            ],
            [
                'title' => 'KT Home - Kiến trúc Xây dựng',
                'slug' => 'kthome-architecture',
                'category' => 'construction',
                'excerpt' => 'Website công ty kiến trúc xây dựng với showcase dự án và dịch vụ thiết kế kiến trúc.',
                'content' => $this->getKtHomeContent(),
                'image' => null,
            ],
            [
                'title' => 'Chỉnh Hình Việt Đức',
                'slug' => 'chinhhinhvietduc-medical',
                'category' => 'healthcare',
                'excerpt' => 'Website y tế chuyên về chân tay giả và các sản phẩm chỉnh hình với đặt lịch tư vấn online.',
                'content' => $this->getMedicalContent(),
                'image' => null,
            ],
            [
                'title' => 'API Services & Công cụ Nội bộ',
                'slug' => 'api-services-tools',
                'category' => 'api',
                'excerpt' => 'Nhiều API services cho data processing và system integration, công cụ automation nội bộ.',
                'content' => $this->getApiContent(),
                'image' => null,
            ],
        ];

        // Create projects
        foreach ($projects as $projectData) {
            Post::updateOrCreate(
                [
                    'slug' => $projectData['slug'],
                    'site_id' => $amdSite->id,
                ],
                [
                    'site_id' => $amdSite->id,
                    'category_id' => $categoryIds[$projectData['category']],
                    'user_id' => 1,
                    'title' => $projectData['title'],
                    'slug' => $projectData['slug'],
                    'excerpt' => $projectData['excerpt'],
                    'content' => $projectData['content'],
                    'image' => $projectData['image'],
                    'type' => 'project',
                    'is_featured' => true,
                    'is_active' => true,
                    'published_at' => now(),
                ]
            );
        }

        $this->command->info('AMD Projects seeded successfully! Created ' . count($projects) . ' projects.');
    }

    private function getHealthcareContent(): string
    {
        return <<<HTML
<h2>AI Chatbot cho Bệnh viện/Phòng khám</h2>

<p>Hệ thống AI chatbot tư vấn sức khỏe tự động, giúp giảm tải công việc tư vấn ban đầu cho đội ngũ y tế.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel - Backend framework</li>
    <li>Python (Flask) - AI/ML services</li>
    <li>LangChain/LangGraph - AI Agent orchestration</li>
    <li>MySQL - Database</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Tư vấn triệu chứng tự động 24/7</li>
    <li>Đặt lịch khám online</li>
    <li>Tra cứu thông tin bác sĩ</li>
    <li>FAQ automation</li>
    <li>Chuyển tiếp đến nhân viên khi cần</li>
</ul>

<h3>Kết quả đạt được</h3>
<ul>
    <li>Xử lý <strong>80%</strong> câu hỏi cơ bản tự động</li>
    <li>Giảm <strong>60%</strong> workload cho lễ tân</li>
    <li>Phản hồi khách hàng <strong>24/7</strong></li>
</ul>
HTML;
    }

    private function getEcommerceContent(): string
    {
        return <<<HTML
<h2>Hệ thống Quản lý Kho & Bán hàng Đa kênh</h2>

<p>Hệ thống tích hợp quản lý kho, đơn hàng từ nhiều kênh bán hàng phổ biến tại Việt Nam.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel - Backend framework</li>
    <li>MySQL - Database</li>
    <li>Redis - Caching & Queue</li>
    <li>Integration APIs - Shopee, Lazada, TikTok Shop</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Đồng bộ inventory real-time từ tất cả kênh</li>
    <li>Quản lý đơn hàng tập trung</li>
    <li>Báo cáo doanh thu theo kênh</li>
    <li>Quản lý kho thông minh</li>
    <li>Cảnh báo hết hàng tự động</li>
</ul>

<h3>Kết quả đạt được</h3>
<ul>
    <li>Giảm <strong>70%</strong> thời gian đối chiếu đơn hàng</li>
    <li>Tăng hiệu quả quản lý kho</li>
    <li>Không còn tình trạng overselling</li>
</ul>
HTML;
    }

    private function getEnterpriseContent(): string
    {
        return <<<HTML
<h2>Worklog Management System</h2>

<p>Hệ thống quản lý công số, timesheet dành cho công ty outsourcing với khả năng mở rộng cao.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>Node.js (NestJS) - Backend framework</li>
    <li>Next.js - Frontend framework</li>
    <li>GraphQL - API layer</li>
    <li>PostgreSQL - Database</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Time tracking theo project/task</li>
    <li>Project allocation management</li>
    <li>Reporting & Analytics</li>
    <li>SAML SSO integration với Google Workspace</li>
    <li>Export báo cáo Excel/PDF</li>
</ul>

<h3>Kết quả đạt được</h3>
<ul>
    <li>Tự động hóa quy trình quản lý công</li>
    <li>Tích hợp SSO với Google Workspace</li>
    <li>Báo cáo real-time cho management</li>
</ul>
HTML;
    }

    private function getSalebotContent(): string
    {
        return <<<HTML
<h2>Salebot.io.vn - AI Chatbot Platform</h2>

<p>Platform SaaS cung cấp giải pháp chatbot thông minh giúp doanh nghiệp Việt Nam tự động hóa customer service và sales.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel - Core platform</li>
    <li>Python (Flask) - AI services</li>
    <li>Node.js - Real-time messaging</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Chatbot builder kéo thả trực quan</li>
    <li>Tích hợp Facebook Messenger</li>
    <li>Tích hợp Zalo OA</li>
    <li>Widget chat cho website</li>
    <li>AI-powered responses</li>
    <li>Analytics & Reporting</li>
</ul>

<h3>Website</h3>
<p><a href="https://salebot.io.vn/" target="_blank">https://salebot.io.vn/</a></p>
HTML;
    }

    private function getEducationContent(): string
    {
        return <<<HTML
<h2>Giải pháp Tổng thể cho Trung tâm Tiếng Nhật Bảo Tín</h2>

<p>Tư vấn & triển khai đồng bộ nhiều hệ thống cho trung tâm đào tạo tiếng Nhật.</p>

<h3>Website Trung tâm</h3>
<p><a href="https://nhatngubaotin.vn/" target="_blank">https://nhatngubaotin.vn/</a></p>
<ul>
    <li>Giới thiệu khóa học</li>
    <li>Đăng ký khóa học online</li>
    <li>Thanh toán trực tuyến</li>
    <li>Quản lý học viên</li>
</ul>

<h3>Hệ thống Thi thử Tiếng Nhật</h3>
<p><a href="http://thitiengnhat.com/" target="_blank">http://thitiengnhat.com/</a></p>
<ul>
    <li>Platform thi thử online</li>
    <li>Tạo đề thi tự động</li>
    <li>Chấm điểm tự động</li>
    <li>Theo dõi tiến độ học tập</li>
</ul>
HTML;
    }

    private function getSilkroadContent(): string
    {
        return <<<HTML
<h2>Silkroad B2B Solutions</h2>

<p>Triển khai đồng bộ nhiều dịch vụ công nghệ cho doanh nghiệp B2B.</p>

<h3>Dịch vụ đã triển khai</h3>
<ul>
    <li>Triển khai hạ tầng Azure cho môi trường production</li>
    <li>Tích hợp Chatbot AI trả lời tự động trên Zalo OA</li>
    <li>Phát triển API integration cho các hệ thống liên kết</li>
</ul>

<h3>Website</h3>
<p><a href="https://silkroad.hekate.ai/" target="_blank">https://silkroad.hekate.ai/</a></p>
HTML;
    }

    private function getVlxdContent(): string
    {
        return <<<HTML
<h2>Đại Phát Hoàng Hà - Vật liệu Xây dựng</h2>

<p>Website thương mại điện tử chuyên ngành vật liệu xây dựng.</p>

<h3>Tính năng chính</h3>
<ul>
    <li>Catalog sản phẩm đa dạng</li>
    <li>Giỏ hàng & thanh toán online</li>
    <li>Quản lý đơn hàng</li>
    <li>Báo giá tự động</li>
</ul>

<h3>Website</h3>
<p><a href="https://daiphathoangha.vn/" target="_blank">https://daiphathoangha.vn/</a></p>
HTML;
    }

    private function getFnbContent(): string
    {
        return <<<HTML
<h2>Bia Hơi Hà Nội 183</h2>

<p>Website giới thiệu nhà hàng với kế hoạch phát triển hệ thống quản lý toàn diện.</p>

<h3>Đã triển khai</h3>
<ul>
    <li>Website giới thiệu nhà hàng</li>
    <li>Menu online</li>
    <li>Thông tin liên hệ & đặt bàn</li>
</ul>

<h3>Kế hoạch Q1/2026</h3>
<ul>
    <li>POS system</li>
    <li>Kitchen Display System</li>
    <li>QR ordering</li>
    <li>Table management</li>
</ul>

<h3>Website</h3>
<p><a href="https://biahoihanoi183.net/" target="_blank">https://biahoihanoi183.net/</a></p>
HTML;
    }

    private function getTransportContent(): string
    {
        return <<<HTML
<h2>Website Dịch vụ Vận tải & Chuyển nhà</h2>

<p>Bộ đôi website cho ngành dịch vụ vận tải và chuyển nhà.</p>

<h3>Vận tải Thanh Sang</h3>
<p><a href="https://vantaithanhsang.com/" target="_blank">https://vantaithanhsang.com/</a></p>
<ul>
    <li>Giới thiệu dịch vụ vận tải</li>
    <li>Báo giá online</li>
    <li>Quản lý đơn hàng</li>
</ul>

<h3>Chuyển nhà Tâm An</h3>
<p><a href="https://chuyennhataman.net/" target="_blank">https://chuyennhataman.net/</a></p>
<ul>
    <li>Dịch vụ chuyển nhà trọn gói</li>
    <li>Tính phí tự động</li>
    <li>Đặt lịch online</li>
</ul>
HTML;
    }

    private function getPhuanHomeContent(): string
    {
        return <<<HTML
<h2>Phuan Home - Mái hiên Di động</h2>

<p>Website giới thiệu và báo giá dịch vụ lắp đặt mái hiên di động, mái xếp.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel</li>
    <li>MySQL</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Gallery sản phẩm</li>
    <li>Báo giá theo kích thước</li>
    <li>Form liên hệ</li>
    <li>Quản lý đơn hàng</li>
</ul>

<h3>Website</h3>
<p><a href="https://phuanhome.net/" target="_blank">https://phuanhome.net/</a></p>
HTML;
    }

    private function getTrieuGiaContent(): string
    {
        return <<<HTML
<h2>Triệu Gia - Thiết kế Nội thất</h2>

<p>Website showcase dự án nội thất đã thực hiện.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel</li>
    <li>MySQL</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Portfolio công trình</li>
    <li>Gallery ảnh dự án</li>
    <li>Tư vấn thiết kế online</li>
    <li>Báo giá theo yêu cầu</li>
</ul>

<h3>Website</h3>
<p><a href="https://trieugia.vn/" target="_blank">https://trieugia.vn/</a></p>
HTML;
    }

    private function getKtHomeContent(): string
    {
        return <<<HTML
<h2>KT Home - Kiến trúc Xây dựng</h2>

<p>Website công ty kiến trúc xây dựng.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP Laravel</li>
    <li>MySQL</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Showcase dự án</li>
    <li>Dịch vụ thiết kế kiến trúc</li>
    <li>Tư vấn xây dựng</li>
    <li>Portfolio công trình</li>
</ul>

<h3>Website</h3>
<p><a href="http://kthome.vn/" target="_blank">http://kthome.vn/</a></p>
HTML;
    }

    private function getMedicalContent(): string
    {
        return <<<HTML
<h2>Chỉnh Hình Việt Đức</h2>

<p>Website y tế chuyên về chân tay giả và các sản phẩm chỉnh hình.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>WordPress</li>
    <li>PHP</li>
    <li>MySQL</li>
</ul>

<h3>Tính năng chính</h3>
<ul>
    <li>Content management</li>
    <li>Product catalog</li>
    <li>Đặt lịch tư vấn online</li>
    <li>Thông tin sản phẩm chi tiết</li>
</ul>

<h3>Website</h3>
<p><a href="https://chinhhinhvietduc.com/" target="_blank">https://chinhhinhvietduc.com/</a></p>
HTML;
    }

    private function getApiContent(): string
    {
        return <<<HTML
<h2>API Services & Công cụ Nội bộ</h2>

<p>Nhiều API services và công cụ automation được phát triển cho các dự án và đối tác.</p>

<h3>Công nghệ sử dụng</h3>
<ul>
    <li>PHP - REST API</li>
    <li>Python - Data processing</li>
    <li>Node.js - Real-time services</li>
</ul>

<h3>Dịch vụ</h3>
<ul>
    <li>Data processing APIs</li>
    <li>System integration services</li>
    <li>Workflow automation tools</li>
    <li>Deployment & operations tools</li>
</ul>

<h3>Ứng dụng</h3>
<ul>
    <li>Công cụ automation nội bộ</li>
    <li>Tools hỗ trợ triển khai dự án</li>
    <li>Integration với các hệ thống bên thứ ba</li>
</ul>
HTML;
    }
}
