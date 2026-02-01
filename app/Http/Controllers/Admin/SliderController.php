<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::forSite(adminSiteId())->orderBy('order')->paginate(15);
        return view('admin.sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.sliders.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'image' => 'required|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = Slider::forSite(adminSiteId())->max('order') + 1;
        $validated['site_id'] = adminSiteId();

        // Handle image from file manager (convert URL to storage path)
        if (!empty($validated['image'])) {
            $validated['image'] = $this->convertUrlToStoragePath($validated['image']);
        }

        Slider::create($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider đã được tạo thành công.');
    }

    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', compact('slider'));
    }

    public function update(Request $request, Slider $slider)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_url' => 'nullable|string|max:255',
            'is_active' => 'boolean',
            'image' => 'nullable|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Handle image from file manager
        if (!empty($validated['image'])) {
            $newPath = $this->convertUrlToStoragePath($validated['image']);
            // Only update if it's a different image
            if ($newPath !== $slider->image) {
                $validated['image'] = $newPath;
            } else {
                unset($validated['image']);
            }
        }

        $slider->update($validated);

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider đã được cập nhật.');
    }

    public function destroy(Slider $slider)
    {
        $slider->delete();

        return redirect()->route('admin.sliders.index')
            ->with('success', 'Slider đã được xóa.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->items as $order => $id) {
            Slider::where('id', $id)->update(['order' => $order]);
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
