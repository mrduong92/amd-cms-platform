@extends('admin.layouts.app')
@section('title', 'Bài viết')
@section('breadcrumb')<li class="breadcrumb-item active">Bài viết</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách bài viết</h3>
            <a href="{{ route('admin.posts.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm bài viết</a>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.posts.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-2">
                <select name="type" class="form-select">
                    <option value="">Tất cả loại</option>
                    <option value="news" {{ request('type') == 'news' ? 'selected' : '' }}>Tin tức</option>
                    <option value="project" {{ request('type') == 'project' ? 'selected' : '' }}>Dự án</option>
                    <option value="success_story" {{ request('type') == 'success_story' ? 'selected' : '' }}>Câu chuyện</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="category_id" class="form-select">
                    <option value="">Tất cả danh mục</option>
                    @foreach($categories as $cat)<option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach
                </select>
            </div>
            <div class="col-md-4"><input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}"></div>
            <div class="col-md-2"><button type="submit" class="btn btn-secondary w-100"><i class="bi bi-search"></i> Lọc</button></div>
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead><tr><th width="80">Ảnh</th><th>Tiêu đề</th><th>Loại</th><th>Tác giả</th><th>Trạng thái</th><th width="150">Thao tác</th></tr></thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr>
                        <td>@if($post->image)<img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" style="width:60px;height:60px;object-fit:cover;">@else<div class="bg-secondary d-flex align-items-center justify-content-center" style="width:60px;height:60px;"><i class="bi bi-image text-white"></i></div>@endif</td>
                        <td><strong>{{ Str::limit($post->title, 40) }}</strong>@if($post->is_featured)<span class="badge bg-info ms-1">Nổi bật</span>@endif<br><small class="text-muted">{{ $post->created_at->format('d/m/Y') }}</small></td>
                        <td><span class="badge bg-{{ $post->type == 'news' ? 'primary' : ($post->type == 'project' ? 'success' : 'warning') }}">{{ $post->type == 'news' ? 'Tin tức' : ($post->type == 'project' ? 'Dự án' : 'Câu chuyện') }}</span></td>
                        <td>{{ $post->author?->name ?? '-' }}</td>
                        <td>@if($post->is_active)<span class="badge bg-success">Đã đăng</span>@else<span class="badge bg-secondary">Nháp</span>@endif</td>
                        <td><a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form></td>
                    </tr>
                    @empty<tr><td colspan="6" class="text-center text-muted">Chưa có bài viết nào</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </div>
</div>
@endsection
