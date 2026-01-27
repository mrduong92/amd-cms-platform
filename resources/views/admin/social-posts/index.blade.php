@extends('admin.layouts.app')
@section('title', 'Bài đăng mạng xã hội')
@section('breadcrumb')<li class="breadcrumb-item active">Mạng xã hội</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách bài đăng mạng xã hội</h3>
            <a href="{{ route('admin.social-posts.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Thêm bài đăng
            </a>
        </div>
    </div>
    <div class="card-body">
        {{-- Filters --}}
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <select name="platform" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Tất cả nền tảng --</option>
                    <option value="facebook" {{ request('platform') === 'facebook' ? 'selected' : '' }}>Facebook</option>
                    <option value="youtube" {{ request('platform') === 'youtube' ? 'selected' : '' }}>YouTube</option>
                    <option value="tiktok" {{ request('platform') === 'tiktok' ? 'selected' : '' }}>TikTok</option>
                    <option value="instagram" {{ request('platform') === 'instagram' ? 'selected' : '' }}>Instagram</option>
                </select>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
                </div>
            </div>
            @if(request('platform') || request('search'))
            <div class="col-md-2">
                <a href="{{ route('admin.social-posts.index') }}" class="btn btn-secondary w-100">Xóa lọc</a>
            </div>
            @endif
        </form>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th width="120">Ảnh</th>
                        <th width="100">Nền tảng</th>
                        <th>Tiêu đề / Mô tả</th>
                        <th>Link bài đăng</th>
                        <th>Trạng thái</th>
                        <th width="120">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($socialPosts as $post)
                    <tr>
                        <td>
                            @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-thumbnail" style="width:100px;height:100px;object-fit:cover;">
                            @else
                            <div class="bg-secondary d-flex align-items-center justify-content-center rounded" style="width:100px;height:100px;">
                                <i class="bi bi-image text-white fs-4"></i>
                            </div>
                            @endif
                        </td>
                        <td>
                            @switch($post->platform)
                                @case('facebook')
                                    <span class="badge" style="background-color: #1877F2;"><i class="bi bi-facebook me-1"></i> Facebook</span>
                                    @break
                                @case('youtube')
                                    <span class="badge" style="background-color: #FF0000;"><i class="bi bi-youtube me-1"></i> YouTube</span>
                                    @break
                                @case('tiktok')
                                    <span class="badge bg-dark"><i class="bi bi-tiktok me-1"></i> TikTok</span>
                                    @break
                                @case('instagram')
                                    <span class="badge" style="background: linear-gradient(45deg, #833AB4, #E4405F, #FCAF45);"><i class="bi bi-instagram me-1"></i> Instagram</span>
                                    @break
                            @endswitch
                        </td>
                        <td>
                            <strong>{{ $post->title ?: '-' }}</strong>
                            @if($post->description)
                            <br><small class="text-muted">{{ Str::limit($post->description, 50) }}</small>
                            @endif
                        </td>
                        <td>
                            @if($post->post_url)
                            <a href="{{ $post->post_url }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-box-arrow-up-right"></i> Xem
                            </a>
                            @else
                            -
                            @endif
                        </td>
                        <td>
                            @if($post->is_active)
                            <span class="badge bg-success">Hoạt động</span>
                            @else
                            <span class="badge bg-secondary">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.social-posts.edit', $post) }}" class="btn btn-sm btn-info">
                                <i class="bi bi-pencil"></i>
                            </a>
                            <form action="{{ route('admin.social-posts.destroy', $post) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc muốn xóa bài đăng này?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                            Chưa có bài đăng mạng xã hội nào
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{ $socialPosts->links() }}
    </div>
</div>
@endsection
