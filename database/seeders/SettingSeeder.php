<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'NMT AUTO',
                'type' => 'text',
                'group' => 'general',
                'label' => 'Tên website',
                'description' => 'Tên hiển thị của website',
                'order' => 1,
            ],
            [
                'key' => 'site_description',
                'value' => 'Giải pháp công nghiệp & năng lượng tái tạo hàng đầu Việt Nam',
                'type' => 'textarea',
                'group' => 'general',
                'label' => 'Mô tả website',
                'description' => 'Mô tả ngắn gọn về website',
                'order' => 2,
            ],
            [
                'key' => 'site_logo',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Logo',
                'description' => 'Logo chính của website',
                'order' => 3,
            ],
            [
                'key' => 'site_favicon',
                'value' => null,
                'type' => 'image',
                'group' => 'general',
                'label' => 'Favicon',
                'description' => 'Icon hiển thị trên tab trình duyệt',
                'order' => 4,
            ],

            // Contact Settings
            [
                'key' => 'company_name',
                'value' => 'CÔNG TY TNHH NMT AUTO',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Tên công ty',
                'description' => 'Tên đầy đủ của công ty',
                'order' => 0,
            ],
            [
                'key' => 'contact_phone',
                'value' => '0123 456 789',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Số điện thoại',
                'description' => 'Số điện thoại liên hệ',
                'order' => 1,
            ],
            [
                'key' => 'contact_hotline',
                'value' => '1900 1234',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Hotline',
                'description' => 'Số hotline',
                'order' => 2,
            ],
            [
                'key' => 'contact_email',
                'value' => 'info@nmtauto.vn',
                'type' => 'email',
                'group' => 'contact',
                'label' => 'Email',
                'description' => 'Email liên hệ',
                'order' => 3,
            ],
            [
                'key' => 'contact_address',
                'value' => '123 Đường ABC, Quận XYZ, TP. Hồ Chí Minh',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Địa chỉ',
                'description' => 'Địa chỉ công ty',
                'order' => 4,
            ],
            [
                'key' => 'contact_map_embed',
                'value' => '',
                'type' => 'textarea',
                'group' => 'contact',
                'label' => 'Google Map Embed',
                'description' => 'Mã nhúng Google Map',
                'order' => 5,
            ],
            [
                'key' => 'contact_working_hours',
                'value' => 'Thứ 2 - Thứ 6: 8:00 - 17:30',
                'type' => 'text',
                'group' => 'contact',
                'label' => 'Giờ làm việc',
                'description' => 'Thời gian làm việc',
                'order' => 6,
            ],

            // Social Media Settings
            [
                'key' => 'social_facebook',
                'value' => 'https://facebook.com/nmtauto',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Facebook',
                'description' => 'Link trang Facebook',
                'order' => 1,
            ],
            [
                'key' => 'social_youtube',
                'value' => 'https://youtube.com/@nmtauto',
                'type' => 'url',
                'group' => 'social',
                'label' => 'YouTube',
                'description' => 'Link kênh YouTube',
                'order' => 2,
            ],
            [
                'key' => 'social_tiktok',
                'value' => 'https://tiktok.com/@nmtauto',
                'type' => 'url',
                'group' => 'social',
                'label' => 'TikTok',
                'description' => 'Link trang TikTok',
                'order' => 3,
            ],
            [
                'key' => 'social_zalo',
                'value' => 'https://zalo.me/nmtauto',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Zalo',
                'description' => 'Link Zalo OA',
                'order' => 4,
            ],
            [
                'key' => 'social_instagram',
                'value' => '',
                'type' => 'url',
                'group' => 'social',
                'label' => 'Instagram',
                'description' => 'Link trang Instagram',
                'order' => 5,
            ],
            [
                'key' => 'fanpage_embed',
                'value' => '<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fnmtauto&tabs=timeline&width=340&height=300&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="300" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>',
                'type' => 'textarea',
                'group' => 'social',
                'label' => 'Facebook Fanpage Embed',
                'description' => 'Mã nhúng Facebook Fanpage (lấy từ Facebook Page Plugin)',
                'order' => 6,
            ],

            // SEO Settings
            [
                'key' => 'seo_meta_title',
                'value' => 'NMT AUTO - Giải pháp công nghiệp & năng lượng tái tạo',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Meta Title',
                'description' => 'Tiêu đề SEO mặc định',
                'order' => 1,
            ],
            [
                'key' => 'seo_meta_description',
                'value' => 'NMT AUTO cung cấp giải pháp pin lithium, camera AI, hệ thống lưu trữ năng lượng và dịch vụ xe nâng chuyên nghiệp.',
                'type' => 'textarea',
                'group' => 'seo',
                'label' => 'Meta Description',
                'description' => 'Mô tả SEO mặc định',
                'order' => 2,
            ],
            [
                'key' => 'seo_meta_keywords',
                'value' => 'pin lithium, camera AI, năng lượng tái tạo, xe nâng, NMT AUTO',
                'type' => 'text',
                'group' => 'seo',
                'label' => 'Meta Keywords',
                'description' => 'Từ khóa SEO',
                'order' => 3,
            ],
            [
                'key' => 'seo_og_image',
                'value' => null,
                'type' => 'image',
                'group' => 'seo',
                'label' => 'OG Image',
                'description' => 'Hình ảnh khi chia sẻ lên mạng xã hội',
                'order' => 4,
            ],

            // Homepage Settings
            [
                'key' => 'home_services_title',
                'value' => 'Giải pháp công nghiệp',
                'type' => 'text',
                'group' => 'homepage',
                'label' => 'Tiêu đề mục Dịch vụ',
                'description' => 'Tiêu đề hiển thị ở mục dịch vụ trang chủ',
                'order' => 1,
            ],
            [
                'key' => 'home_products_title',
                'value' => 'Danh mục sản phẩm',
                'type' => 'text',
                'group' => 'homepage',
                'label' => 'Tiêu đề mục Sản phẩm',
                'description' => 'Tiêu đề hiển thị ở mục sản phẩm trang chủ',
                'order' => 2,
            ],
            [
                'key' => 'home_news_title',
                'value' => 'Tin tức & Dự án mới nhất',
                'type' => 'text',
                'group' => 'homepage',
                'label' => 'Tiêu đề mục Tin tức',
                'description' => 'Tiêu đề hiển thị ở mục tin tức trang chủ',
                'order' => 3,
            ],
            [
                'key' => 'home_news_description',
                'value' => 'Khám phá cách chúng tôi đang thay đổi vận hành công nghiệp.',
                'type' => 'textarea',
                'group' => 'homepage',
                'label' => 'Mô tả mục Tin tức',
                'description' => 'Mô tả hiển thị ở mục tin tức trang chủ',
                'order' => 4,
            ],
            [
                'key' => 'home_partners_title',
                'value' => 'Đối tác tin cậy của chúng tôi',
                'type' => 'text',
                'group' => 'homepage',
                'label' => 'Tiêu đề mục Đối tác',
                'description' => 'Tiêu đề hiển thị ở mục đối tác trang chủ',
                'order' => 5,
            ],
            [
                'key' => 'home_social_title',
                'value' => 'Mạng Xã Hội',
                'type' => 'text',
                'group' => 'homepage',
                'label' => 'Tiêu đề mục Mạng xã hội',
                'description' => 'Tiêu đề hiển thị ở mục mạng xã hội trang chủ',
                'order' => 6,
            ],

            // Footer Settings
            [
                'key' => 'footer_about',
                'value' => 'NMT AUTO là công ty hàng đầu trong lĩnh vực cung cấp giải pháp công nghiệp và năng lượng tái tạo tại Việt Nam.',
                'type' => 'textarea',
                'group' => 'footer',
                'label' => 'Giới thiệu Footer',
                'description' => 'Nội dung giới thiệu ở footer',
                'order' => 1,
            ],
            [
                'key' => 'footer_copyright',
                'value' => '© 2024 NMT AUTO. All rights reserved.',
                'type' => 'text',
                'group' => 'footer',
                'label' => 'Copyright',
                'description' => 'Nội dung copyright',
                'order' => 2,
            ],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }
    }
}
