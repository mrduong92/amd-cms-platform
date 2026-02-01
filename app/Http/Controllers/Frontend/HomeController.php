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
        $site = currentSite();
        $theme = $site?->theme ?? 'frontend';
        $cacheKey = self::CACHE_KEY . '_' . ($site?->id ?? 'default');

        $data = Cache::remember($cacheKey, self::CACHE_TTL, function () use ($theme) {
            return $this->getHomepageData($theme);
        });

        return view($theme . '.home', $data);
    }

    /**
     * Get all homepage data
     */
    protected function getHomepageData(string $theme = 'frontend'): array
    {
        $sliders = Slider::forCurrentSite()->active()->ordered()->get();
        $partners = Partner::forCurrentSite()->active()->ordered()->get();

        // AMD theme has different homepage structure
        if ($theme === 'amd') {
            // Get projects for AMD with category eager loading
            $projects = Post::forCurrentSite()
                ->with('category')
                ->projects()
                ->active()
                ->published()
                ->latest('published_at')
                ->limit(4)
                ->get();

            // Get news/blog posts for AMD
            $news = Post::forCurrentSite()
                ->with('category')
                ->news()
                ->active()
                ->published()
                ->latest('published_at')
                ->limit(6)
                ->get();

            return compact('sliders', 'partners', 'projects', 'news');
        }

        // NMT AUTO theme (frontend)
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
        $featuredProducts = Product::with('specs')->active()->featured()->ordered()->limit(8)->get();

        // If no featured products, get latest products
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::with('specs')->active()->ordered()->limit(8)->get();
        }

        // Get latest posts (news, projects, success stories)
        $latestPosts = Post::forCurrentSite()->active()->published()->latest('published_at')->limit(4)->get();

        // Get the "about" page for Core Values section
        $aboutPage = Page::forCurrentSite()->where('slug', 'about')->active()->first();

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
     * Clear homepage cache for all sites
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY . '_default');

        // Clear cache for all sites
        $sites = \App\Models\Site::all();
        foreach ($sites as $site) {
            Cache::forget(self::CACHE_KEY . '_' . $site->id);
        }
    }
}
