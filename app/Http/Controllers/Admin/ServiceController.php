<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $query = Service::with('category');

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $services = $query->orderBy('order')->paginate(15);

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = Category::with('services')->orderBy('name')->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'image' => 'nullable|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = Service::max('order') + 1;

        // Handle image from file manager (convert URL to storage path)
        if (!empty($validated['image'])) {
            $validated['image'] = $this->convertUrlToStoragePath($validated['image']);
        }

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được tạo thành công.');
    }

    public function edit(Service $service)
    {
        $categories = Category::with('services')->orderBy('name')->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'icon' => 'nullable|string|max:100',
            'short_description' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'boolean',
            'image' => 'nullable|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Handle image from file manager
        if (!empty($validated['image'])) {
            $newPath = $this->convertUrlToStoragePath($validated['image']);
            // Only update if it's a different image
            if ($newPath !== $service->image) {
                $validated['image'] = $newPath;
            } else {
                unset($validated['image']);
            }
        }

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được cập nhật.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Dịch vụ đã được xóa.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->items as $order => $id) {
            Service::where('id', $id)->update(['order' => $order]);
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
