<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return redirect()->back()->with('error', 'Vui lòng nhập ít nhất 2 ký tự để tìm kiếm.');
        }

        $products = Product::active()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('short_description', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->with('category')
            ->limit(12)
            ->get();

        $posts = Post::active()
            ->published()
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                    ->orWhere('excerpt', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%");
            })
            ->limit(12)
            ->get();

        $services = Service::active()
            ->where(function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%")
                    ->orWhere('short_description', 'like', "%{$query}%")
                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->limit(12)
            ->get();

        $totalResults = $products->count() + $posts->count() + $services->count();

        return view('frontend.search', compact('query', 'products', 'posts', 'services', 'totalResults'));
    }
}
