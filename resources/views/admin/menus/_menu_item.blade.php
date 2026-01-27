@php
    $linkTypeLabel = \App\Models\Menu::LINK_TYPES[$menu->link_type] ?? 'Custom';
    $depthLabels = ['Cấp 1', 'Cấp 2', 'Cấp 3'];
    $depthColors = ['bg-primary', 'bg-success', 'bg-warning text-dark'];
    $maxDepth = 2; // 0, 1, 2 = 3 levels
@endphp

<div class="menu-item" data-id="{{ $menu->id }}" data-depth="{{ $depth }}" data-link-type="{{ $menu->link_type }}" data-linkable-id="{{ $menu->linkable_id ?? '' }}" data-url="{{ $menu->url ?? '' }}">
    <div class="menu-item-content">
        <div class="menu-item-header">
            <div class="menu-item-title">
                <i class="bi bi-grip-vertical drag-handle"></i>
                <span class="item-name">{{ $menu->name }}</span>
                <span class="badge bg-secondary badge-link-type">{{ $linkTypeLabel }}</span>
                <span class="badge badge-depth {{ $depthColors[$depth] ?? 'bg-secondary' }}">{{ $depthLabels[$depth] ?? '' }}</span>
                @if(!$menu->is_active)
                    <span class="badge bg-danger">Ẩn</span>
                @endif
            </div>
            <div class="menu-item-actions">
                <button type="button" class="btn btn-sm btn-outline-secondary" onclick="toggleDetails(this)">
                    <i class="bi bi-chevron-down"></i>
                </button>
                <button type="button" class="btn btn-sm btn-outline-danger" onclick="removeMenuItem(this)">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        </div>
    </div>
    <div class="menu-item-details">
        <div class="mb-2">
            <label class="form-label small">Tên hiển thị</label>
            <input type="text" class="form-control form-control-sm item-name-input" value="{{ $menu->name }}" onchange="updateItemName(this)">
        </div>
        @if($menu->link_type === 'custom')
        <div class="mb-2">
            <label class="form-label small">URL</label>
            <input type="text" class="form-control form-control-sm item-url-input" value="{{ $menu->url }}">
        </div>
        @endif
        <div class="form-check mb-2">
            <input class="form-check-input item-target" type="checkbox" id="target_{{ $menu->id }}" {{ $menu->target === '_blank' ? 'checked' : '' }}>
            <label class="form-check-label small" for="target_{{ $menu->id }}">Mở trong tab mới</label>
        </div>
        <div class="form-check">
            <input class="form-check-input item-active" type="checkbox" id="active_{{ $menu->id }}" {{ $menu->is_active ? 'checked' : '' }}>
            <label class="form-check-label small" for="active_{{ $menu->id }}">Kích hoạt</label>
        </div>
    </div>
    <div class="menu-children" data-sortable-depth="{{ $depth + 1 }}" style="{{ $depth >= $maxDepth ? 'display:none;' : '' }}">
        @if($menu->children && $menu->children->count() > 0 && $depth < $maxDepth)
            @foreach($menu->children as $child)
                @include('admin.menus._menu_item', ['menu' => $child, 'depth' => $depth + 1])
            @endforeach
        @endif
    </div>
</div>
