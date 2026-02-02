<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        $sites = Site::latest()->paginate(15);
        return view('admin.sites.index', compact('sites'));
    }

    public function create()
    {
        return view('admin.sites.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:100|unique:sites,slug',
            'domain' => 'required|string|max:255',
            'theme' => 'required|string|max:100',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        Site::create($validated);

        return redirect()->route('admin.sites.index')
            ->with('success', 'Website đã được tạo thành công.');
    }

    public function edit(Site $site)
    {
        return view('admin.sites.edit', compact('site'));
    }

    public function update(Request $request, Site $site)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:100|unique:sites,slug,' . $site->id,
            'domain' => 'required|string|max:255',
            'theme' => 'required|string|max:100',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $site->update($validated);

        return redirect()->route('admin.sites.index')
            ->with('success', 'Website đã được cập nhật.');
    }

    public function destroy(Site $site)
    {
        // Prevent deleting the default site
        if ($site->slug === 'nmtauto') {
            return redirect()->route('admin.sites.index')
                ->with('error', 'Không thể xóa website mặc định.');
        }

        $site->delete();

        return redirect()->route('admin.sites.index')
            ->with('success', 'Website đã được xóa.');
    }
}
