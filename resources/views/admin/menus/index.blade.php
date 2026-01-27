@extends('admin.layouts.app')
@section('title', 'Quản lý Menu')
@section('breadcrumb')<li class="breadcrumb-item active">Menu</li>@endsection

@section('content')
<div class="row">
    <!-- Left Panel: Add Menu Items -->
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thêm mục menu</h3>
            </div>
            <div class="card-body p-0">
                <div class="accordion" id="addMenuAccordion">
                    <!-- Custom Link -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCustom">
                                <i class="bi bi-link-45deg me-2"></i> Liên kết tùy chỉnh
                            </button>
                        </h2>
                        <div id="collapseCustom" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body">
                                <div class="mb-3">
                                    <label class="form-label">Tên menu</label>
                                    <input type="text" class="form-control form-control-sm" id="custom_name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">URL</label>
                                    <input type="text" class="form-control form-control-sm" id="custom_url" placeholder="https://">
                                </div>
                                <button type="button" class="btn btn-sm btn-primary" onclick="addCustomLink()">
                                    <i class="bi bi-plus"></i> Thêm vào menu
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Home Link -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseHome">
                                <i class="bi bi-house me-2"></i> Trang chủ
                            </button>
                        </h2>
                        <div id="collapseHome" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body">
                                <button type="button" class="btn btn-sm btn-primary" onclick="addHomeLink()">
                                    <i class="bi bi-plus"></i> Thêm trang chủ
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Products -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProducts">
                                <i class="bi bi-box me-2"></i> Sản phẩm
                            </button>
                        </h2>
                        <div id="collapseProducts" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                @if($linkOptions['products']->count() > 0)
                                    @foreach($linkOptions['products'] as $id => $name)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="product_{{ $id }}" data-type="product" data-id="{{ $id }}" data-name="{{ $name }}">
                                            <label class="form-check-label" for="product_{{ $id }}">{{ $name }}</label>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSelectedItems('product')">
                                        <i class="bi bi-plus"></i> Thêm đã chọn
                                    </button>
                                @else
                                    <p class="text-muted mb-0">Chưa có sản phẩm</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Product Categories -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCategories">
                                <i class="bi bi-folder me-2"></i> Danh mục sản phẩm
                            </button>
                        </h2>
                        <div id="collapseCategories" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                @if($linkOptions['categories']->count() > 0)
                                    @foreach($linkOptions['categories'] as $id => $name)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="category_{{ $id }}" data-type="product_category" data-id="{{ $id }}" data-name="{{ $name }}">
                                            <label class="form-check-label" for="category_{{ $id }}">{{ $name }}</label>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSelectedItems('product_category')">
                                        <i class="bi bi-plus"></i> Thêm đã chọn
                                    </button>
                                @else
                                    <p class="text-muted mb-0">Chưa có danh mục</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Services -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseServices">
                                <i class="bi bi-gear me-2"></i> Dịch vụ
                            </button>
                        </h2>
                        <div id="collapseServices" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                @if($linkOptions['services']->count() > 0)
                                    @foreach($linkOptions['services'] as $id => $name)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="service_{{ $id }}" data-type="service" data-id="{{ $id }}" data-name="{{ $name }}">
                                            <label class="form-check-label" for="service_{{ $id }}">{{ $name }}</label>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSelectedItems('service')">
                                        <i class="bi bi-plus"></i> Thêm đã chọn
                                    </button>
                                @else
                                    <p class="text-muted mb-0">Chưa có dịch vụ</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Posts -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePosts">
                                <i class="bi bi-file-text me-2"></i> Bài viết
                            </button>
                        </h2>
                        <div id="collapsePosts" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                @if($linkOptions['posts']->count() > 0)
                                    @foreach($linkOptions['posts'] as $id => $title)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="post_{{ $id }}" data-type="post" data-id="{{ $id }}" data-name="{{ $title }}">
                                            <label class="form-check-label" for="post_{{ $id }}">{{ Str::limit($title, 30) }}</label>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSelectedItems('post')">
                                        <i class="bi bi-plus"></i> Thêm đã chọn
                                    </button>
                                @else
                                    <p class="text-muted mb-0">Chưa có bài viết</p>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Pages -->
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePages">
                                <i class="bi bi-file-earmark me-2"></i> Trang
                            </button>
                        </h2>
                        <div id="collapsePages" class="accordion-collapse collapse" data-bs-parent="#addMenuAccordion">
                            <div class="accordion-body" style="max-height: 200px; overflow-y: auto;">
                                @if($linkOptions['pages']->count() > 0)
                                    @foreach($linkOptions['pages'] as $id => $title)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="page_{{ $id }}" data-type="page" data-id="{{ $id }}" data-name="{{ $title }}">
                                            <label class="form-check-label" for="page_{{ $id }}">{{ Str::limit($title, 30) }}</label>
                                        </div>
                                    @endforeach
                                    <button type="button" class="btn btn-sm btn-primary mt-2" onclick="addSelectedItems('page')">
                                        <i class="bi bi-plus"></i> Thêm đã chọn
                                    </button>
                                @else
                                    <p class="text-muted mb-0">Chưa có trang</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Right Panel: Menu Structure -->
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h3 class="card-title d-inline">Cấu trúc Menu</h3>
                        <div class="btn-group ms-3">
                            <a href="{{ route('admin.menus.index', ['location' => 'header']) }}" class="btn btn-sm {{ $location == 'header' ? 'btn-primary' : 'btn-outline-primary' }}">Header</a>
                            <a href="{{ route('admin.menus.index', ['location' => 'footer']) }}" class="btn btn-sm {{ $location == 'footer' ? 'btn-primary' : 'btn-outline-primary' }}">Footer</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" id="btnSaveOrder" onclick="saveMenuOrder()">
                        <i class="bi bi-check-circle me-1"></i> Lưu thứ tự
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="alert alert-info py-2 mb-3">
                    <i class="bi bi-info-circle me-1"></i> Kéo thả để sắp xếp. Kéo sang phải để tạo menu con (tối đa <strong>3 cấp</strong>).
                    <span class="ms-2">
                        <span class="badge bg-primary">Cấp 1</span>
                        <span class="badge bg-success">Cấp 2</span>
                        <span class="badge bg-warning text-dark">Cấp 3</span>
                    </span>
                </div>

                <div id="menu-container" class="menu-sortable">
                    @forelse($menus as $menu)
                        @include('admin.menus._menu_item', ['menu' => $menu, 'depth' => 0])
                    @empty
                        <div class="text-center text-muted py-4" id="empty-message">
                            <i class="bi bi-menu-button-wide fs-1"></i>
                            <p class="mt-2">Chưa có menu nào. Thêm mục từ bảng bên trái.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<style>
    .menu-item {
        background: #fff;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        margin-bottom: 8px;
    }
    .menu-item:hover {
        border-color: #0d6efd;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .menu-item.sortable-ghost {
        opacity: 0.4;
        background: #e3f2fd;
    }
    .menu-item.sortable-chosen {
        background: #f8f9fa;
    }
    .menu-item-content {
        padding: 10px 15px;
        cursor: move;
    }
    .menu-item .menu-item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .menu-item .menu-item-title {
        font-weight: 500;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .menu-item .menu-item-actions {
        display: flex;
        gap: 5px;
    }

    /* Level indicators */
    .menu-item[data-depth="0"] {
        border-left: 4px solid #0d6efd;
    }
    .menu-item[data-depth="1"] {
        border-left: 4px solid #198754;
    }
    .menu-item[data-depth="2"] {
        border-left: 4px solid #ffc107;
    }

    .menu-children {
        margin-left: 30px;
        padding: 10px;
        padding-bottom: 5px;
        min-height: 50px;
        background: linear-gradient(to right, rgba(0,0,0,0.03), transparent);
        border-left: 2px dashed #dee2e6;
        border-radius: 0 4px 4px 0;
        transition: all 0.2s;
    }
    .menu-children:empty::before {
        content: 'Kéo thả menu vào đây để tạo menu con';
        display: block;
        color: #adb5bd;
        font-size: 0.8rem;
        text-align: center;
        padding: 10px;
        border: 2px dashed #dee2e6;
        border-radius: 4px;
    }
    .menu-children.drag-hover {
        background: #e3f2fd;
        border-left-color: #0d6efd;
    }
    .menu-children.drag-hover:empty::before {
        border-color: #0d6efd;
        color: #0d6efd;
    }

    /* Level 2 children (grandchildren) */
    .menu-children .menu-children {
        margin-left: 25px;
        background: linear-gradient(to right, rgba(0,0,0,0.04), transparent);
    }

    /* Hide children container at max depth */
    .menu-item[data-depth="2"] > .menu-children {
        display: none !important;
    }

    .menu-item-details {
        display: none;
        padding: 10px 15px;
        padding-top: 0;
        border-top: 1px solid #dee2e6;
        margin-top: 10px;
    }
    .menu-item.expanded .menu-item-details {
        display: block;
    }
    .menu-item .drag-handle {
        cursor: grab;
        color: #adb5bd;
        margin-right: 8px;
    }
    .menu-item .drag-handle:active {
        cursor: grabbing;
    }
    .badge-link-type {
        font-size: 0.7rem;
        font-weight: normal;
    }
    .badge-depth {
        font-size: 0.65rem;
        padding: 2px 5px;
    }

    /* Nested sortable styling */
    .nested-sortable .menu-item {
        transition: transform 0.1s;
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    const currentLocation = '{{ $location }}';
    const linkTypes = @json(\App\Models\Menu::LINK_TYPES);
    const MAX_DEPTH = 2; // 0, 1, 2 = 3 levels

    // Store all sortable instances
    let sortableInstances = [];

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        initNestedSortable();
    });

    function initNestedSortable() {
        // Clear existing instances
        sortableInstances.forEach(instance => instance.destroy());
        sortableInstances = [];

        // Initialize main container
        const mainContainer = document.getElementById('menu-container');
        if (mainContainer) {
            sortableInstances.push(createSortable(mainContainer, 0));
        }

        // Initialize all children containers
        document.querySelectorAll('.menu-children').forEach(function(el) {
            const parentItem = el.closest('.menu-item');
            const parentDepth = parseInt(parentItem.dataset.depth) || 0;
            const childDepth = parentDepth + 1;

            if (childDepth <= MAX_DEPTH) {
                sortableInstances.push(createSortable(el, childDepth));
            }
        });
    }

    function createSortable(container, depth) {
        return new Sortable(container, {
            group: {
                name: 'nested-menu',
                pull: true,
                put: function(to, from, dragEl) {
                    // Check if we can put the item here (depth validation)
                    const targetDepth = parseInt(to.el.dataset.sortableDepth) || 0;
                    const draggedItemMaxDepth = getMaxChildDepth(dragEl);
                    return (targetDepth + draggedItemMaxDepth) <= MAX_DEPTH;
                }
            },
            animation: 150,
            fallbackOnBody: true,
            swapThreshold: 0.65,
            ghostClass: 'sortable-ghost',
            chosenClass: 'sortable-chosen',
            dragClass: 'sortable-drag',
            handle: '.menu-item-content',
            draggable: '.menu-item',
            onStart: function(evt) {
                document.querySelectorAll('.menu-children').forEach(el => {
                    el.classList.add('drag-hover-ready');
                });
            },
            onEnd: function(evt) {
                document.querySelectorAll('.menu-children').forEach(el => {
                    el.classList.remove('drag-hover-ready', 'drag-hover');
                });

                // Update depths after drag ends
                updateAllDepths();
                updateEmptyMessage();

                // Re-initialize sortable for any new children containers
                const item = evt.item;
                const childContainer = item.querySelector(':scope > .menu-children');
                if (childContainer && !childContainer.sortableInstance) {
                    const newDepth = parseInt(item.dataset.depth) + 1;
                    if (newDepth <= MAX_DEPTH) {
                        sortableInstances.push(createSortable(childContainer, newDepth));
                    }
                }
            },
            onMove: function(evt) {
                const draggedEl = evt.dragged;
                const targetEl = evt.to;

                // Calculate target depth
                let targetDepth = 0;
                if (targetEl.id !== 'menu-container') {
                    const parentItem = targetEl.closest('.menu-item');
                    if (parentItem) {
                        targetDepth = parseInt(parentItem.dataset.depth) + 1;
                    }
                }

                // Check if item with its children can fit
                const draggedMaxDepth = getMaxChildDepth(draggedEl);
                if (targetDepth + draggedMaxDepth > MAX_DEPTH) {
                    return false; // Cancel the move
                }

                return true;
            }
        });

        // Store depth info on container
        container.dataset.sortableDepth = depth;
    }

    function getMaxChildDepth(item, currentDepth = 0) {
        const childrenContainer = item.querySelector(':scope > .menu-children');
        if (!childrenContainer) return currentDepth;

        const children = childrenContainer.querySelectorAll(':scope > .menu-item');
        if (children.length === 0) return currentDepth;

        let maxDepth = currentDepth;
        children.forEach(child => {
            const childDepth = getMaxChildDepth(child, currentDepth + 1);
            if (childDepth > maxDepth) maxDepth = childDepth;
        });

        return maxDepth;
    }

    function updateAllDepths() {
        const topLevelItems = document.querySelectorAll('#menu-container > .menu-item');
        topLevelItems.forEach(item => {
            updateItemDepthRecursive(item, 0);
        });
    }

    function updateItemDepthRecursive(item, depth) {
        item.dataset.depth = depth;
        updateDepthBadge(item, depth);

        // Show/hide children container based on depth
        const childrenContainer = item.querySelector(':scope > .menu-children');
        if (childrenContainer) {
            if (depth >= MAX_DEPTH) {
                childrenContainer.style.display = 'none';
            } else {
                childrenContainer.style.display = '';
                // Update depth marker for sortable
                childrenContainer.dataset.sortableDepth = depth + 1;

                // Update children recursively
                const children = childrenContainer.querySelectorAll(':scope > .menu-item');
                children.forEach(child => {
                    updateItemDepthRecursive(child, depth + 1);
                });
            }
        }
    }

    function updateDepthBadge(item, depth) {
        const badge = item.querySelector(':scope > .menu-item-content .badge-depth');
        if (badge) {
            const labels = ['Cấp 1', 'Cấp 2', 'Cấp 3'];
            const colors = ['bg-primary', 'bg-success', 'bg-warning text-dark'];
            badge.textContent = labels[depth] || '';
            badge.className = 'badge badge-depth ' + (colors[depth] || 'bg-secondary');
        }
    }

    function updateEmptyMessage() {
        const container = document.getElementById('menu-container');
        const emptyMsg = document.getElementById('empty-message');
        const hasItems = container.querySelectorAll('.menu-item').length > 0;

        if (emptyMsg) {
            emptyMsg.style.display = hasItems ? 'none' : 'block';
        }
    }

    function addCustomLink() {
        const name = document.getElementById('custom_name').value.trim();
        const url = document.getElementById('custom_url').value.trim();

        if (!name) {
            alert('Vui lòng nhập tên menu');
            return;
        }

        addMenuItem({
            name: name,
            link_type: 'custom',
            url: url || '#',
            linkable_id: null
        });

        // Clear inputs
        document.getElementById('custom_name').value = '';
        document.getElementById('custom_url').value = '';
    }

    function addHomeLink() {
        addMenuItem({
            name: 'Trang chủ',
            link_type: 'home',
            url: '/',
            linkable_id: null
        });
    }

    function addSelectedItems(type) {
        const checkboxes = document.querySelectorAll(`input[data-type="${type}"]:checked`);

        if (checkboxes.length === 0) {
            alert('Vui lòng chọn ít nhất một mục');
            return;
        }

        checkboxes.forEach(function(checkbox) {
            addMenuItem({
                name: checkbox.dataset.name,
                link_type: type,
                url: '',
                linkable_id: checkbox.dataset.id
            });
            checkbox.checked = false;
        });
    }

    function addMenuItem(data) {
        const container = document.getElementById('menu-container');
        const emptyMsg = document.getElementById('empty-message');

        if (emptyMsg) {
            emptyMsg.style.display = 'none';
        }

        const tempId = 'new_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        const linkTypeLabel = linkTypes[data.link_type] || 'Custom';
        const depth = 0; // New items always added at root level

        const itemHtml = createMenuItemHtml(tempId, data, depth, linkTypeLabel);
        container.insertAdjacentHTML('beforeend', itemHtml);

        // Initialize sortable for new children container
        const newItem = container.lastElementChild;
        const childrenContainer = newItem.querySelector('.menu-children');
        if (childrenContainer) {
            sortableInstances.push(createSortable(childrenContainer, 1));
        }
    }

    function createMenuItemHtml(id, data, depth, linkTypeLabel) {
        const depthLabels = ['Cấp 1', 'Cấp 2', 'Cấp 3'];
        const depthColors = ['bg-primary', 'bg-success', 'bg-warning text-dark'];

        return `
            <div class="menu-item" data-id="${id}" data-depth="${depth}" data-link-type="${data.link_type}" data-linkable-id="${data.linkable_id || ''}" data-url="${data.url}">
                <div class="menu-item-content">
                    <div class="menu-item-header">
                        <div class="menu-item-title">
                            <i class="bi bi-grip-vertical drag-handle"></i>
                            <span class="item-name">${escapeHtml(data.name)}</span>
                            <span class="badge bg-secondary badge-link-type">${linkTypeLabel}</span>
                            <span class="badge badge-depth ${depthColors[depth]}">${depthLabels[depth]}</span>
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
                        <input type="text" class="form-control form-control-sm item-name-input" value="${escapeHtml(data.name)}" onchange="updateItemName(this)">
                    </div>
                    ${data.link_type === 'custom' ? `
                    <div class="mb-2">
                        <label class="form-label small">URL</label>
                        <input type="text" class="form-control form-control-sm item-url-input" value="${escapeHtml(data.url)}">
                    </div>
                    ` : ''}
                    <div class="form-check mb-2">
                        <input class="form-check-input item-target" type="checkbox" id="target_${id}">
                        <label class="form-check-label small" for="target_${id}">Mở trong tab mới</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input item-active" type="checkbox" id="active_${id}" checked>
                        <label class="form-check-label small" for="active_${id}">Kích hoạt</label>
                    </div>
                </div>
                <div class="menu-children" data-sortable-depth="${depth + 1}" style="${depth >= MAX_DEPTH ? 'display:none;' : ''}"></div>
            </div>
        `;
    }

    function toggleDetails(btn) {
        const menuItem = btn.closest('.menu-item');
        menuItem.classList.toggle('expanded');
        const icon = btn.querySelector('i');
        icon.classList.toggle('bi-chevron-down');
        icon.classList.toggle('bi-chevron-up');
    }

    function updateItemName(input) {
        const menuItem = input.closest('.menu-item');
        const nameSpan = menuItem.querySelector(':scope > .menu-item-content .item-name');
        nameSpan.textContent = input.value;
    }

    function removeMenuItem(btn) {
        if (confirm('Xóa mục menu này và tất cả menu con?')) {
            const menuItem = btn.closest('.menu-item');
            const menuId = menuItem.dataset.id;

            // If it's an existing item (not new), delete from server
            if (!menuId.startsWith('new_')) {
                fetch(`/admin/menus/${menuId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    }
                });
            }

            menuItem.remove();
            updateEmptyMessage();
        }
    }

    function saveMenuOrder() {
        const items = collectMenuItems(document.getElementById('menu-container'), null, 0);

        const btn = document.getElementById('btnSaveOrder');
        btn.disabled = true;
        btn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i> Đang lưu...';

        fetch('{{ route("admin.menus.reorder") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json'
            },
            body: JSON.stringify({ items: items, location: currentLocation })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Reload to get new IDs for newly created items
                location.reload();
            } else {
                alert('Có lỗi xảy ra: ' + (data.message || 'Unknown error'));
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra');
        })
        .finally(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="bi bi-check-circle me-1"></i> Lưu thứ tự';
        });
    }

    function collectMenuItems(container, parentId = null, depth = 0) {
        const items = [];
        const children = container.children;

        for (let i = 0; i < children.length; i++) {
            const el = children[i];
            if (!el.classList.contains('menu-item')) continue;

            const item = {
                id: el.dataset.id,
                order: i,
                parent_id: parentId,
                depth: depth,
                name: el.querySelector('.item-name-input')?.value || el.querySelector('.item-name').textContent,
                link_type: el.dataset.linkType,
                linkable_id: el.dataset.linkableId || null,
                url: el.querySelector('.item-url-input')?.value || el.dataset.url || '',
                target: el.querySelector('.item-target')?.checked ? '_blank' : '_self',
                is_active: el.querySelector('.item-active')?.checked ?? true
            };

            items.push(item);

            // Collect children recursively (up to 3 levels)
            if (depth < MAX_DEPTH) {
                const childContainer = el.querySelector(':scope > .menu-children');
                if (childContainer) {
                    const childItems = collectMenuItems(childContainer, el.dataset.id, depth + 1);
                    items.push(...childItems);
                }
            }
        }

        return items;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }
</script>
@endpush
