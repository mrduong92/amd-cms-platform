<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $query = Page::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $pages = $query->latest()->paginate(15);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'template' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['template'] = $validated['template'] ?? 'default';

        // Handle image from file manager (convert URL to storage path)
        if (!empty($validated['image'])) {
            $validated['image'] = $this->convertUrlToStoragePath($validated['image']);
        }

        Page::create($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang đã được tạo thành công.');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|string|max:500',
            'template' => 'nullable|string|max:50',
            'is_active' => 'boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Handle image from file manager
        if (!empty($validated['image'])) {
            $newPath = $this->convertUrlToStoragePath($validated['image']);
            // Only update if it's a different image
            if ($newPath !== $page->image) {
                $validated['image'] = $newPath;
            } else {
                unset($validated['image']);
            }
        }

        $page->update($validated);

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang đã được cập nhật.');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('admin.pages.index')
            ->with('success', 'Trang đã được xóa.');
    }

    /**
     * Convert full URL to storage path
     */
    private function convertUrlToStoragePath(?string $url): ?string
    {
        if (empty($url)) {
            return null;
        }

        // If it's already a storage path (not a full URL), return as is
        if (!str_starts_with($url, 'http')) {
            // Remove leading slash if present
            return ltrim($url, '/');
        }

        // Extract path from URL
        $parsed = parse_url($url);
        $path = $parsed['path'] ?? '';

        // Remove /storage/ prefix if present
        if (str_contains($path, '/storage/')) {
            $path = substr($path, strpos($path, '/storage/') + 9);
        }

        return ltrim($path, '/');
    }
}
