@extends('admin.layouts.app')

@section('title', 'Danh mục')

@section('breadcrumb')
    <li class="breadcrumb-item active">Danh mục</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Danh sách danh mục</h3>
                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Thêm danh mục
                </a>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <form action="{{ route('admin.categories.index') }}" method="GET" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="type" class="form-select">
                        <option value="">Tất cả loại</option>
                        <option value="product" {{ request('type') == 'product' ? 'selected' : '' }}>Sản phẩm</option>
                        <option value="service" {{ request('type') == 'service' ? 'selected' : '' }}>Dịch vụ</option>
                        <option value="post" {{ request('type') == 'post' ? 'selected' : '' }}>Bài viết</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">
                        <i class="bi bi-search"></i> Lọc
                    </button>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Tên</th>
                            <th>Loại</th>
                            <th>Slug</th>
                            <th>Số lượng</th>
                            <th>Trạng thái</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    {{ $category->name }}
                                    @if($category->parent)
                                        <br><small class="text-muted">Thuộc: {{ $category->parent->name }}</small>
                                    @endif
                                </td>
                                <td>
                                    @switch($category->type)
                                        @case('product')
                                            <span class="badge bg-primary">Sản phẩm</span>
                                            @break
                                        @case('service')
                                            <span class="badge bg-success">Dịch vụ</span>
                                            @break
                                        @case('post')
                                            <span class="badge bg-info">Bài viết</span>
                                            @break
                                    @endswitch
                                </td>
                                <td><code>{{ $category->slug }}</code></td>
                                <td>
                                    @if($category->type == 'product')
                                        {{ $category->products_count }} sản phẩm
                                    @elseif($category->type == 'service')
                                        {{ $category->services_count }} dịch vụ
                                    @else
                                        {{ $category->posts_count }} bài viết
                                    @endif
                                </td>
                                <td>
                                    @if($category->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-info" title="Sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
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
                                <td colspan="7" class="text-center text-muted">Chưa có danh mục nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
@endsection
