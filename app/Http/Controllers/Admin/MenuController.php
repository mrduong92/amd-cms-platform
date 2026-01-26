<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->get('location', 'header');
        $menus = Menu::where('location', $location)
            ->whereNull('parent_id')
            ->with('children')
            ->orderBy('order')
            ->get();

        return view('admin.menus.index', compact('menus', 'location'));
    }

    public function create()
    {
        $parents = Menu::whereNull('parent_id')->orderBy('name')->get();
        return view('admin.menus.create', compact('parents'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'target' => 'nullable|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'location' => 'required|in:header,footer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['target'] = $validated['target'] ?? '_self';
        $validated['order'] = Menu::where('location', $validated['location'])->max('order') + 1;

        Menu::create($validated);

        return redirect()->route('admin.menus.index', ['location' => $validated['location']])
            ->with('success', 'Menu đã được tạo thành công.');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->orderBy('name')
            ->get();

        return view('admin.menus.edit', compact('menu', 'parents'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'nullable|string|max:255',
            'target' => 'nullable|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'location' => 'required|in:header,footer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $menu->update($validated);

        return redirect()->route('admin.menus.index', ['location' => $validated['location']])
            ->with('success', 'Menu đã được cập nhật.');
    }

    public function destroy(Menu $menu)
    {
        $location = $menu->location;
        $menu->delete();

        return redirect()->route('admin.menus.index', ['location' => $location])
            ->with('success', 'Menu đã được xóa.');
    }

    public function reorder(Request $request)
    {
        foreach ($request->items as $order => $id) {
            Menu::where('id', $id)->update(['order' => $order]);
        }

        return response()->json(['success' => true]);
    }
}
