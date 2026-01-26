<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactInquiry;
use App\Models\NewsletterSubscriber;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'products' => Product::count(),
            'services' => Service::count(),
            'posts' => Post::count(),
            'categories' => Category::count(),
            'new_inquiries' => ContactInquiry::new()->count(),
            'subscribers' => NewsletterSubscriber::active()->count(),
        ];

        $recentInquiries = ContactInquiry::latest()->take(5)->get();
        $recentPosts = Post::with('author')->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentInquiries', 'recentPosts'));
    }
}
