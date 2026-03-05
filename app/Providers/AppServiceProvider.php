<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Partner;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\SocialPost;
use App\Observers\HomepageCacheObserver;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Use Bootstrap 5 pagination for admin routes, Tailwind for frontend
        if (request()->is('admin*')) {
            Paginator::useBootstrapFive();
        } else {
            Paginator::useTailwind();
        }

        // Register observer to clear homepage cache when models change
        $homepageModels = [
            Slider::class,
            Service::class,
            Product::class,
            Category::class,
            Post::class,
            Partner::class,
            Page::class,
            Setting::class,
            SocialPost::class,
        ];

        foreach ($homepageModels as $model) {
            $model::observe(HomepageCacheObserver::class);
        }
    }
}
