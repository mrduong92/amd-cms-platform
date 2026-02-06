<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialPost;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    /**
     * Cache key for homepage data
     */
    public const CACHE_KEY = 'homepage_data';

    /**
     * Cache duration in seconds (1 hour)
     */
    public const CACHE_TTL = 3600;

    public function index()
    {
        $data = Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return $this->getHomepageData();
        });

        return view('frontend.home', $data);
    }

    /**
     * Get all homepage data
     */
    protected function getHomepageData(): array
    {
        $sliders = Slider::active()->ordered()->get();
        $services = Service::active()->ordered()->limit(6)->get();

        // Get product categories with their products
        $productCategories = Category::where('type', 'product')
            ->active()
            ->ordered()
            ->with(['products' => function($q) {
                $q->with('specs')->active()->ordered()->limit(8);
            }])
            ->get();

        // Get featured products (for "All" tab or if no categories)
        $featuredProducts = Product::with('specs')->active()->featured()->orderBy('featured_order')->limit(8)->get();

        // If no featured products, get latest products
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::with('specs')->active()->ordered()->limit(8)->get();
        }

        // Get latest posts (news, projects, success stories)
        $latestPosts = Post::active()->published()->latest('published_at')->limit(4)->get();

        // Get partners
        $partners = Partner::active()->ordered()->get();

        // Get the "about" page for Core Values section
        $aboutPage = Page::where('slug', 'about')->active()->first();

        // Get social posts
        $socialPosts = SocialPost::active()->ordered()->get();

        return compact(
            'sliders',
            'services',
            'featuredProducts',
            'productCategories',
            'latestPosts',
            'partners',
            'aboutPage',
            'socialPosts'
        );
    }

    /**
     * Clear homepage cache
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
