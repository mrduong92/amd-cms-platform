<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create NMT AUTO site
        $nmtSite = Site::firstOrCreate(
            ['slug' => 'nmtauto'],
            [
                'name' => 'NMT AUTO',
                'domain' => 'nmtauto.vn',
                'theme' => 'frontend',
                'is_active' => true,
            ]
        );

        // Create AMD AI Solutions site
        $amdSite = Site::firstOrCreate(
            ['slug' => 'amd'],
            [
                'name' => 'AMD AI Solutions',
                'domain' => 'amdai.vn',
                'theme' => 'amd',
                'is_active' => true,
            ]
        );

        // Update existing settings to belong to NMT AUTO site
        Setting::whereNull('site_id')->update(['site_id' => $nmtSite->id]);

        // Create AMD-specific settings
        $amdSettings = [
            // General
            ['key' => 'site_name', 'value' => 'AMD AI Solutions', 'type' => 'text', 'group' => 'general', 'label' => 'Tên website', 'order' => 1],
            ['key' => 'site_description', 'value' => 'Giải pháp AI thông minh cho doanh nghiệp', 'type' => 'textarea', 'group' => 'general', 'label' => 'Mô tả website', 'order' => 2],
            ['key' => 'site_tagline', 'value' => 'Webco.io.vn', 'type' => 'text', 'group' => 'general', 'label' => 'Tagline', 'order' => 3],
            ['key' => 'primary_color', 'value' => '#3b82f6', 'type' => 'text', 'group' => 'general', 'label' => 'Màu chính', 'order' => 4],

            // Contact
            ['key' => 'contact_phone', 'value' => '028 7777 9999', 'type' => 'text', 'group' => 'contact', 'label' => 'Số điện thoại', 'order' => 1],
            ['key' => 'contact_email', 'value' => 'info@amdai.vn', 'type' => 'email', 'group' => 'contact', 'label' => 'Email', 'order' => 2],
            ['key' => 'contact_address', 'value' => 'Hà Nội, Việt Nam', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Địa chỉ', 'order' => 3],
            ['key' => 'contact_description', 'value' => 'Đội ngũ AMD AI Solutions luôn sẵn sàng hỗ trợ bạn 24/7. Hãy liên hệ ngay để được tư vấn miễn phí!', 'type' => 'textarea', 'group' => 'contact', 'label' => 'Mô tả trang liên hệ', 'order' => 4],

            // Social
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/amdai', 'type' => 'url', 'group' => 'social', 'label' => 'Facebook', 'order' => 1],
            ['key' => 'social_youtube', 'value' => '', 'type' => 'url', 'group' => 'social', 'label' => 'YouTube', 'order' => 2],
            ['key' => 'social_zalo', 'value' => '', 'type' => 'text', 'group' => 'social', 'label' => 'Zalo', 'order' => 3],
            ['key' => 'social_linkedin', 'value' => '', 'type' => 'url', 'group' => 'social', 'label' => 'LinkedIn', 'order' => 4],

            // Hero
            ['key' => 'hero_badge', 'value' => 'Kỷ nguyên Website 4.0', 'type' => 'text', 'group' => 'hero', 'label' => 'Badge Hero', 'order' => 1],
            ['key' => 'hero_title', 'value' => 'Website Thiết Kế Riêng Với <br/><span class="gradient-text">Chi Phí Mẫu Cố Định</span>', 'type' => 'textarea', 'group' => 'hero', 'label' => 'Tiêu đề Hero', 'order' => 2],
            ['key' => 'hero_subtitle', 'value' => '- Sức Mạnh Từ AI -', 'type' => 'text', 'group' => 'hero', 'label' => 'Phụ đề Hero', 'order' => 3],
            ['key' => 'hero_description', 'value' => 'AMD tái định nghĩa việc xây dựng thương hiệu số cho SME. Chúng tôi kết hợp trí tuệ nhân tạo để tạo ra các website độc bản, chuẩn SEO với tốc độ hoàn thiện gấp 5 lần.', 'type' => 'textarea', 'group' => 'hero', 'label' => 'Mô tả Hero', 'order' => 4],

            // CTA
            ['key' => 'cta_button_text', 'value' => 'Tư vấn Web AI', 'type' => 'text', 'group' => 'cta', 'label' => 'Text nút CTA', 'order' => 1],
            ['key' => 'cta_title', 'value' => 'Sẵn sàng để bùng nổ doanh số?', 'type' => 'text', 'group' => 'cta', 'label' => 'Tiêu đề CTA', 'order' => 2],
            ['key' => 'cta_description', 'value' => 'Đăng ký để AI của chúng tôi phân tích website cũ hoặc đề xuất giải pháp cho website mới của bạn hoàn toàn miễn phí.', 'type' => 'textarea', 'group' => 'cta', 'label' => 'Mô tả CTA', 'order' => 3],

            // Footer
            ['key' => 'footer_about', 'value' => 'Tiên phong ứng dụng Generative AI vào thiết kế Website SME tại Việt Nam. Xây dựng tương lai số cho mọi doanh nghiệp.', 'type' => 'textarea', 'group' => 'footer', 'label' => 'Giới thiệu Footer', 'order' => 1],
            ['key' => 'footer_copyright', 'value' => '© 2024 AMD AI SOLUTIONS. All rights reserved.', 'type' => 'text', 'group' => 'footer', 'label' => 'Copyright', 'order' => 2],

            // Process
            ['key' => 'process_title', 'value' => 'Quy trình vận hành bằng AI', 'type' => 'text', 'group' => 'process', 'label' => 'Tiêu đề quy trình', 'order' => 1],
            ['key' => 'process_subtitle', 'value' => 'Tối ưu hóa thời gian và chất lượng bằng công nghệ độc quyền', 'type' => 'text', 'group' => 'process', 'label' => 'Phụ đề quy trình', 'order' => 2],
        ];

        foreach ($amdSettings as $setting) {
            Setting::firstOrCreate(
                ['key' => $setting['key'], 'site_id' => $amdSite->id],
                array_merge($setting, ['site_id' => $amdSite->id])
            );
        }

        $this->command->info('Sites and AMD settings seeded successfully!');
    }
}
