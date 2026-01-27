@extends('admin.layouts.app')
@section('title', 'Thêm bài đăng mạng xã hội')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('admin.social-posts.index') }}">Mạng xã hội</a></li>
<li class="breadcrumb-item active">Thêm mới</li>
@endsection

@section('content')
<form action="{{ route('admin.social-posts.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin bài đăng</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="platform" class="form-label">Nền tảng <span class="text-danger">*</span></label>
                        <select class="form-select @error('platform') is-invalid @enderror" id="platform" name="platform" required>
                            <option value="facebook" {{ old('platform') === 'facebook' ? 'selected' : '' }}>Facebook</option>
                            <option value="youtube" {{ old('platform') === 'youtube' ? 'selected' : '' }}>YouTube</option>
                            <option value="tiktok" {{ old('platform') === 'tiktok' ? 'selected' : '' }}>TikTok</option>
                            <option value="instagram" {{ old('platform') === 'instagram' ? 'selected' : '' }}>Instagram</option>
                        </select>
                        @error('platform')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" placeholder="Tiêu đề bài đăng (tùy chọn)">
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Mô tả</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Mô tả ngắn hiển thị trên ảnh">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label for="post_url" class="form-label">Link bài đăng gốc</label>
                        <input type="url" class="form-control @error('post_url') is-invalid @enderror" id="post_url" name="post_url" value="{{ old('post_url') }}" placeholder="https://facebook.com/...">
                        @error('post_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="text-muted">Link dẫn đến bài đăng trên mạng xã hội</small>
                    </div>

                    <div class="mb-3">
                        <label for="video_url" class="form-label">Link video (YouTube/TikTok)</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url') }}" placeholder="https://youtube.com/watch?v=...">
                        @error('video_url')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <small class="text-muted">Dành cho bài đăng video</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Hình ảnh</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh bài đăng <span class="text-danger">*</span></label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" readonly required>
                            <button type="button" class="btn btn-outline-secondary" onclick="openFileBrowser('image', 'image')">
                                <i class="bi bi-folder2-open"></i> Chọn
                            </button>
                        </div>
                        @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        <small class="text-muted">Kích thước khuyến nghị: 600x600px (vuông)</small>
                        <div class="mt-2">
                            <img id="image_preview" src="" alt="" class="img-thumbnail w-100" style="display:none; aspect-ratio: 1;">
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Kích hoạt</label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2">
                        <i class="bi bi-check-circle me-1"></i> Lưu bài đăng
                    </button>
                    <a href="{{ route('admin.social-posts.index') }}" class="btn btn-secondary w-100">Hủy</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
