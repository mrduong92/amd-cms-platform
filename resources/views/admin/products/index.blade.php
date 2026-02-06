@extends('admin.layouts.app')

@section('title', 'Sản phẩm')

@section('breadcrumb')
    <li class="breadcrumb-item active">Sản phẩm</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Danh sách sản phẩm</h3>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.products.import') }}" class="btn btn-outline-primary">
                        <i class="bi bi-upload me-1"></i> Import
                    </a>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-1"></i> Thêm sản phẩm
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <form action="{{ route('admin.products.index') }}" method="GET" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="category_id" class="form-select">
                        <option value="">Tất cả danh mục</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <select name="is_active" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Ẩn</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <div class="form-check form-switch mt-2">
                        <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ request('is_featured') ? 'checked' : '' }}>
                        <label class="form-check-label" for="is_featured">Nổi bật</label>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">
                        <i class="bi bi-search"></i> Lọc
                    </button>
                </div>
            </form>

            @if($isFeaturedFilter)
            <div class="alert alert-info py-2">
                <i class="bi bi-info-circle me-1"></i> Kéo thả để sắp xếp thứ tự sản phẩm nổi bật trên trang chủ.
            </div>
            @endif

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            @if($isFeaturedFilter)
                            <th width="40"></th>
                            @endif
                            <th width="80">Ảnh</th>
                            <th>Tên sản phẩm</th>
                            <th>Danh mục</th>
                            <th>Giá</th>
                            <th>Trạng thái</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody id="{{ $isFeaturedFilter ? 'sortable-featured' : '' }}">
                        @forelse($products as $product)
                            <tr data-id="{{ $product->id }}">
                                @if($isFeaturedFilter)
                                <td class="drag-handle" style="cursor: grab;">
                                    <i class="bi bi-grip-vertical text-muted fs-5"></i>
                                </td>
                                @endif
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $product->name }}</strong>
                                    @if($product->sku)
                                        <br><small class="text-muted">SKU: {{ $product->sku }}</small>
                                    @endif
                                    @if($product->badge)
                                        <span class="badge bg-warning ms-1">{{ $product->badge }}</span>
                                    @endif
                                    @if($product->is_featured)
                                        <span class="badge bg-info ms-1">Nổi bật</span>
                                    @endif
                                    <br>
                                    <small class="text-muted">{{ Str::limit($product->short_description, 50) }}</small>
                                </td>
                                <td>{{ $product->category?->name ?? '-' }}</td>
                                <td>
                                    @if($product->price)
                                        @if($product->sale_price && $product->sale_price < $product->price)
                                            <del class="text-muted">{{ number_format($product->price) }}đ</del><br>
                                            <strong class="text-danger">{{ number_format($product->sale_price) }}đ</strong>
                                        @else
                                            <strong>{{ number_format($product->price) }}đ</strong>
                                        @endif
                                    @else
                                        <span class="text-muted">Liên hệ</span>
                                    @endif
                                </td>
                                <td>
                                    @if($product->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-info" title="Sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="{{ $isFeaturedFilter ? 7 : 6 }}" class="text-center text-muted">Chưa có sản phẩm nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection

@if($isFeaturedFilter)
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
<script>
    const el = document.getElementById('sortable-featured');
    if (el) {
        new Sortable(el, {
            handle: '.drag-handle',
            animation: 150,
            onEnd: function () {
                const items = [];
                el.querySelectorAll('tr[data-id]').forEach(function(row) {
                    items.push(row.dataset.id);
                });
                fetch('{{ route("admin.products.reorder-featured") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    },
                    body: JSON.stringify({ items: items })
                }).then(function(response) {
                    return response.json();
                }).then(function(data) {
                    if (data.success) {
                        // Optional: show success toast
                    }
                });
            }
        });
    }
</script>
@endpush
@endif
