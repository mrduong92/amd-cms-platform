@extends('admin.layouts.app')

@section('title', 'Tags')

@section('breadcrumb')
    <li class="breadcrumb-item active">Tags</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Danh sách Tags</h3>
                <a href="{{ route('admin.tags.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Thêm tag
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Tên</th>
                            <th>Slug</th>
                            <th>Số sản phẩm</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td><strong>{{ $tag->name }}</strong></td>
                                <td><code>{{ $tag->slug }}</code></td>
                                <td>
                                    <span class="badge bg-info">{{ $tag->products_count }}</span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.tags.edit', $tag) }}" class="btn btn-sm btn-info" title="Sửa">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tag này?')">
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
                                <td colspan="5" class="text-center text-muted">Chưa có tag nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center">
                {{ $tags->links() }}
            </div>
        </div>
    </div>
@endsection
