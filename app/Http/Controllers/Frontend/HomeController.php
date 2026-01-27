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

class HomeController extends Controller
{
    public function index()
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
        $featuredProducts = Product::with('specs')->active()->featured()->ordered()->limit(8)->get();

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

        return view('frontend.home', compact(
            'sliders',
            'services',
            'featuredProducts',
            'productCategories',
            'latestPosts',
            'partners',
            'aboutPage'
        ));
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}
