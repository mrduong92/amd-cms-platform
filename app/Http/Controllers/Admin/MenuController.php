<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request)
    {
        $location = $request->get('location', 'header');

        // Eagerly load 3 levels of children
        $menus = Menu::forSite(adminSiteId())
            ->where('location', $location)
            ->whereNull('parent_id')
            ->with(['children' => function ($q) {
                $q->orderBy('order')->with(['children' => function ($q2) {
                    $q2->orderBy('order')->with(['children' => function ($q3) {
                        $q3->orderBy('order');
                    }]);
                }]);
            }])
            ->orderBy('order')
            ->get();

        // Get link options for adding new items
        $linkOptions = $this->getLinkOptions();

        return view('admin.menus.index', compact('menus', 'location', 'linkOptions'));
    }

    public function create()
    {
        $parents = Menu::forSite(adminSiteId())->whereNull('parent_id')->orderBy('name')->get();
        $linkOptions = $this->getLinkOptions();

        return view('admin.menus.create', compact('parents', 'linkOptions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'link_type' => 'nullable|string|max:50',
            'linkable_id' => 'nullable|integer',
            'target' => 'nullable|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'location' => 'required|in:header,footer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['target'] = $validated['target'] ?? '_self';
        $validated['link_type'] = $validated['link_type'] ?? 'custom';
        $validated['site_id'] = adminSiteId();
        $validated['order'] = Menu::forSite(adminSiteId())->where('location', $validated['location'])->max('order') + 1;

        // Set linkable type based on link_type
        if ($validated['link_type'] !== 'custom' && $validated['link_type'] !== 'home' && !empty($validated['linkable_id'])) {
            $validated['linkable_type'] = $this->getLinkableType($validated['link_type']);
        } else {
            $validated['linkable_type'] = null;
            $validated['linkable_id'] = null;
        }

        Menu::create($validated);

        return redirect()->route('admin.menus.index', ['location' => $validated['location']])
            ->with('success', 'Menu đã được tạo thành công.');
    }

    public function edit(Menu $menu)
    {
        $parents = Menu::forSite(adminSiteId())
            ->whereNull('parent_id')
            ->where('id', '!=', $menu->id)
            ->orderBy('name')
            ->get();

        $linkOptions = $this->getLinkOptions();

        return view('admin.menus.edit', compact('menu', 'parents', 'linkOptions'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'url' => 'nullable|string|max:255',
            'link_type' => 'nullable|string|max:50',
            'linkable_id' => 'nullable|integer',
            'target' => 'nullable|in:_self,_blank',
            'parent_id' => 'nullable|exists:menus,id',
            'location' => 'required|in:header,footer',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $validated['link_type'] = $validated['link_type'] ?? 'custom';

        // Set linkable type based on link_type
        if ($validated['link_type'] !== 'custom' && $validated['link_type'] !== 'home' && !empty($validated['linkable_id'])) {
            $validated['linkable_type'] = $this->getLinkableType($validated['link_type']);
        } else {
            $validated['linkable_type'] = null;
            $validated['linkable_id'] = null;
        }

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
        $items = $request->input('items', []);
        $location = $request->input('location', 'header');
        $idMap = []; // Map temp IDs to real IDs

        foreach ($items as $item) {
            $isNew = str_starts_with($item['id'], 'new_');

            // Resolve parent_id (might be a temp ID)
            $parentId = $item['parent_id'] ?? null;
            if ($parentId && isset($idMap[$parentId])) {
                $parentId = $idMap[$parentId];
            } elseif ($parentId && str_starts_with($parentId, 'new_')) {
                $parentId = null; // Parent not yet created, will be null
            }

            // Set linkable type based on link_type
            $linkableType = null;
            $linkableId = $item['linkable_id'] ?? null;
            if (!empty($linkableId) && $item['link_type'] !== 'custom' && $item['link_type'] !== 'home') {
                $linkableType = $this->getLinkableType($item['link_type']);
            } else {
                $linkableId = null;
            }

            $data = [
                'name' => $item['name'],
                'link_type' => $item['link_type'] ?? 'custom',
                'linkable_type' => $linkableType,
                'linkable_id' => $linkableId,
                'url' => $item['url'] ?? null,
                'target' => $item['target'] ?? '_self',
                'order' => $item['order'],
                'parent_id' => $parentId,
                'location' => $location,
                'is_active' => $item['is_active'] ?? true,
                'site_id' => adminSiteId(),
            ];

            if ($isNew) {
                $menu = Menu::create($data);
                $idMap[$item['id']] = $menu->id;
            } else {
                Menu::where('id', $item['id'])->update($data);
            }
        }

        // Second pass to fix parent_id for items that referenced temp IDs
        foreach ($items as $item) {
            if (isset($item['parent_id']) && str_starts_with($item['parent_id'], 'new_')) {
                $realParentId = $idMap[$item['parent_id']] ?? null;
                $realId = str_starts_with($item['id'], 'new_') ? $idMap[$item['id']] : $item['id'];
                if ($realParentId && $realId) {
                    Menu::where('id', $realId)->update(['parent_id' => $realParentId]);
                }
            }
        }

        return response()->json(['success' => true]);
    }

    /**
     * Get link options for menus
     */
    private function getLinkOptions(): array
    {
        return [
            'products' => Product::active()->orderBy('name')->pluck('name', 'id'),
            'categories' => Category::where('type', 'product')->active()->orderBy('name')->pluck('name', 'id'),
            'services' => Service::active()->orderBy('name')->pluck('name', 'id'),
            'posts' => Post::active()->published()->orderBy('title')->pluck('title', 'id'),
            'pages' => Page::active()->orderBy('title')->pluck('title', 'id'),
        ];
    }

    /**
     * Get linkable type class
     */
    private function getLinkableType(string $linkType): ?string
    {
        $map = [
            'product' => Product::class,
            'product_category' => Category::class,
            'service' => Service::class,
            'post' => Post::class,
            'page' => Page::class,
        ];

        return $map[$linkType] ?? null;
    }
}
