@extends('admin.layouts.app')
@section('title', 'Trang tĩnh')
@section('breadcrumb')<li class="breadcrumb-item active">Trang tĩnh</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách trang tĩnh</h3>
            <a href="{{ route('admin.pages.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm trang</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>Tiêu đề</th><th>Slug</th><th>Template</th><th>Trạng thái</th><th width="150">Thao tác</th></tr></thead>
                <tbody>
                    @forelse($pages as $page)
                    <tr>
                        <td><strong>{{ $page->title }}</strong></td>
                        <td><code>/{{ $page->slug }}</code></td>
                        <td>{{ $page->template }}</td>
                        <td>@if($page->is_active)<span class="badge bg-success">Hoạt động</span>@else<span class="badge bg-secondary">Ẩn</span>@endif</td>
                        <td><a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form></td>
                    </tr>
                    @empty<tr><td colspan="5" class="text-center text-muted">Chưa có trang nào</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        {{ $pages->links() }}
    </div>
</div>
@endsection
