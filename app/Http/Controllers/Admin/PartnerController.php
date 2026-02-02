<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->paginate(15);
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('admin.partners.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo' => 'required|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['order'] = Partner::max('order') + 1;

        // Handle logo from file manager (convert URL to storage path)
        if (!empty($validated['logo'])) {
            $validated['logo'] = $this->convertUrlToStoragePath($validated['logo']);
        }

        Partner::create($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Đối tác đã được thêm thành công.');
    }

    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|url|max:255',
            'is_active' => 'boolean',
            'logo' => 'nullable|string|max:500',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Handle logo from file manager
        if (!empty($validated['logo'])) {
            $newPath = $this->convertUrlToStoragePath($validated['logo']);
            // Only update if it's a different image
            if ($newPath !== $partner->logo) {
                $validated['logo'] = $newPath;
            } else {
                unset($validated['logo']);
            }
        }

        $partner->update($validated);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Đối tác đã được cập nhật.');
    }

    public function destroy(Partner $partner)
    {
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Đối tác đã được xóa.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->items as $order => $id) {
            Partner::where('id', $id)->update(['order' => $order]);
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
