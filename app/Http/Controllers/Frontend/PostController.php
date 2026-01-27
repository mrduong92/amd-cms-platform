<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::active()->published()->latest('published_at');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $posts = $query->paginate(9);
        $categories = Category::where('type', 'post')->active()->ordered()->get();

        return view('frontend.posts.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->active()->published()->with(['category', 'author'])->firstOrFail();
        $relatedPosts = Post::where('id', '!=', $post->id)
            ->when($post->category_id, function ($q) use ($post) {
                $q->where('category_id', $post->category_id);
            })
            ->active()
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('frontend.posts.show', compact('post', 'relatedPosts'));
    }

    public function projects()
    {
        $posts = Post::where('type', 'project')
            ->active()
            ->published()
            ->latest('published_at')
            ->paginate(9);

        return view('frontend.posts.projects', compact('posts'));
    }
}
