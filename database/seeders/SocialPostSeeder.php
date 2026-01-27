<?php

namespace Database\Seeders;

use App\Models\SocialPost;
use Illuminate\Database\Seeder;

class SocialPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $socialPosts = [
            // Facebook posts
            [
                'platform' => 'facebook',
                'title' => 'Lắp đặt Pin Lithium',
                'description' => 'Lắp đặt hệ thống Pin Lithium cho kho bãi tại Bình Dương.',
                'image' => null,
                'post_url' => 'https://facebook.com/nmtauto',
                'is_active' => true,
                'order' => 1,
            ],
            [
                'platform' => 'facebook',
                'title' => 'Bảo trì xe nâng',
                'description' => 'Dịch vụ bảo trì xe nâng định kỳ - Đảm bảo an toàn vận hành.',
                'image' => null,
                'post_url' => 'https://facebook.com/nmtauto',
                'is_active' => true,
                'order' => 2,
            ],
            [
                'platform' => 'facebook',
                'title' => 'Hệ thống năng lượng mặt trời',
                'description' => 'Hoàn thành lắp đặt hệ thống năng lượng mặt trời cho nhà máy sản xuất.',
                'image' => null,
                'post_url' => 'https://facebook.com/nmtauto',
                'is_active' => true,
                'order' => 3,
            ],

            // YouTube videos
            [
                'platform' => 'youtube',
                'title' => 'Giới thiệu Pin Lithium xe nâng',
                'description' => 'Video giới thiệu công nghệ Pin Lithium cho xe nâng điện.',
                'image' => null,
                'video_url' => 'https://youtube.com/@nmtauto',
                'post_url' => 'https://youtube.com/@nmtauto',
                'is_active' => true,
                'order' => 4,
            ],
            [
                'platform' => 'youtube',
                'title' => 'Hướng dẫn bảo trì xe nâng',
                'description' => 'Hướng dẫn chi tiết cách bảo trì xe nâng đúng cách.',
                'image' => null,
                'video_url' => 'https://youtube.com/@nmtauto',
                'post_url' => 'https://youtube.com/@nmtauto',
                'is_active' => true,
                'order' => 5,
            ],

            // TikTok videos
            [
                'platform' => 'tiktok',
                'title' => 'Xe nâng điện hoạt động',
                'description' => 'Xe nâng điện NMT AUTO vận hành mượt mà trong kho.',
                'image' => null,
                'video_url' => 'https://tiktok.com/@nmtauto',
                'post_url' => 'https://tiktok.com/@nmtauto',
                'is_active' => true,
                'order' => 6,
            ],
            [
                'platform' => 'tiktok',
                'title' => 'Camera AI an toàn',
                'description' => 'Hệ thống Camera AI cảnh báo va chạm cho xe nâng.',
                'image' => null,
                'video_url' => 'https://tiktok.com/@nmtauto',
                'post_url' => 'https://tiktok.com/@nmtauto',
                'is_active' => true,
                'order' => 7,
            ],

            // Instagram posts
            [
                'platform' => 'instagram',
                'title' => 'Showroom NMT AUTO',
                'description' => 'Không gian trưng bày sản phẩm tại showroom NMT AUTO.',
                'image' => null,
                'post_url' => 'https://instagram.com/nmtauto',
                'is_active' => true,
                'order' => 8,
            ],
        ];

        foreach ($socialPosts as $post) {
            SocialPost::create($post);
        }
    }
}
