<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Get the current theme
     */
    protected function getTheme(): string
    {
        $site = currentSite();
        return $site?->theme ?? 'frontend';
    }

    public function index(Request $request)
    {
        $query = Post::query()->with('category')->active()->published()->latest('published_at');

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

        $theme = $this->getTheme();
        return view($theme . '.posts.index', compact('posts', 'categories'));
    }

    public function show($slug)
    {
        $post = Post::query()->where('slug', $slug)->active()->published()->with(['category', 'author'])->firstOrFail();
        $relatedPosts = Post::query()
            ->with('category')
            ->where('id', '!=', $post->id)
            ->when($post->category_id, function ($q) use ($post) {
                $q->where('category_id', $post->category_id);
            })
            ->active()
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        $theme = $this->getTheme();

        // For AMD theme, projects use a different view
        if ($theme === 'amd' && $post->type === 'project') {
            return view('amd.projects.show', compact('post', 'relatedPosts'));
        }

        return view($theme . '.posts.show', compact('post', 'relatedPosts'));
    }

    public function projects(Request $request)
    {
        $query = Post::query()
            ->with('category')
            ->where('type', 'project')
            ->active()
            ->published()
            ->latest('published_at');

        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $projects = $query->paginate(9);
        $categories = Category::where('type', 'post')->active()->ordered()->get();

        $theme = $this->getTheme();

        // AMD theme has dedicated projects views
        if ($theme === 'amd') {
            return view('amd.projects.index', compact('projects', 'categories'));
        }

        return view('frontend.posts.projects', ['posts' => $projects]);
    }
}
