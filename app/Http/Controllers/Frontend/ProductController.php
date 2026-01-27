<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('specs')->active()->ordered();

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->paginate(12);
        $categories = Category::where('type', 'product')->active()->ordered()->get();

        return view('frontend.products.index', compact('products', 'categories'));
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->active()->with(['category', 'specs', 'images'])->firstOrFail();
        $relatedProducts = Product::with('specs')->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->limit(4)
            ->get();

        return view('frontend.products.show', compact('product', 'relatedProducts'));
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->where('type', 'product')->active()->firstOrFail();
        $products = Product::with('specs')->where('category_id', $category->id)->active()->ordered()->paginate(12);
        $categories = Category::where('type', 'product')->active()->ordered()->get();

        return view('frontend.products.index', compact('products', 'categories', 'category'));
    }
}
