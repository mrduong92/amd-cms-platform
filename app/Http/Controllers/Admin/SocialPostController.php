<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialPost;
use Illuminate\Http\Request;

class SocialPostController extends Controller
{
    public function index(Request $request)
    {
        $query = SocialPost::query();

        if ($request->filled('platform')) {
            $query->where('platform', $request->platform);
        }

        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        $socialPosts = $query->ordered()->paginate(15);

        return view('admin.social-posts.index', compact('socialPosts'));
    }

    public function create()
    {
        return view('admin.social-posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'platform' => 'required|in:facebook,youtube,tiktok,instagram',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|string|max:500',
            'video_url' => 'nullable|url|max:500',
            'post_url' => 'nullable|url|max:500',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = SocialPost::max('order') + 1;

        // Handle image from file manager (convert URL to storage path)
        if (!empty($validated['image'])) {
            $validated['image'] = $this->convertUrlToStoragePath($validated['image']);
        }

        SocialPost::create($validated);

        return redirect()->route('admin.social-posts.index')
            ->with('success', 'Bài đăng mạng xã hội đã được tạo thành công.');
    }

    public function edit(SocialPost $socialPost)
    {
        return view('admin.social-posts.edit', compact('socialPost'));
    }

    public function update(Request $request, SocialPost $socialPost)
    {
        $validated = $request->validate([
            'platform' => 'required|in:facebook,youtube,tiktok,instagram',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'video_url' => 'nullable|url|max:500',
            'post_url' => 'nullable|url|max:500',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Handle image from file manager
        if (!empty($validated['image'])) {
            $newPath = $this->convertUrlToStoragePath($validated['image']);
            if ($newPath !== $socialPost->image) {
                $validated['image'] = $newPath;
            } else {
                unset($validated['image']);
            }
        }

        $socialPost->update($validated);

        return redirect()->route('admin.social-posts.index')
            ->with('success', 'Bài đăng mạng xã hội đã được cập nhật.');
    }

    public function destroy(SocialPost $socialPost)
    {
        $socialPost->delete();

        return redirect()->route('admin.social-posts.index')
            ->with('success', 'Bài đăng mạng xã hội đã được xóa.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->items as $order => $id) {
            SocialPost::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }

    /**
     * Convert full URL to storage path
     */
    private function convertUrlToStoragePath(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        if (!str_starts_with($url, 'http')) {
            return ltrim($url, '/');
        }

        $parsed = parse_url($url);
        $path = $parsed['path'] ?? '';

        if (str_contains($path, '/storage/')) {
            $path = substr($path, strpos($path, '/storage/') + 9);
        }

        return ltrim($path, '/');
    }
}
