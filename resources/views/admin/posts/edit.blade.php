@extends('admin.layouts.app')
@section('title', 'Sửa bài viết')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Bài viết</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<form action="{{ route('admin.posts.update', $post) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Nội dung bài viết</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Tóm tắt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $post->excerpt) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control tinymce-editor @error('content') is-invalid @enderror" id="content" name="content">{{ old('content', $post->content) }}</textarea>
                        @error('content')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">SEO</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="meta_title" class="form-label">Meta Title</label><input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $post->meta_title) }}"></div>
                    <div class="mb-3"><label for="meta_description" class="form-label">Meta Description</label><textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $post->meta_description) }}</textarea></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Cài đặt</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="type" class="form-label">Loại bài viết</label>
                        <select class="form-select" id="type" name="type">
                            <option value="news" {{ old('type', $post->type) == 'news' ? 'selected' : '' }}>Tin tức</option>
                            <option value="project" {{ old('type', $post->type) == 'project' ? 'selected' : '' }}>Dự án</option>
                            <option value="success_story" {{ old('type', $post->type) == 'success_story' ? 'selected' : '' }}>Câu chuyện thành công</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="">-- Chọn --</option>
                            @foreach($categories as $cat)<option value="{{ $cat->id }}" {{ old('category_id', $post->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach
                        </select>
                    </div>
                    <div class="mb-3"><label for="published_at" class="form-label">Ngày đăng</label><input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}"></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $post->is_featured) ? 'checked' : '' }}><label class="form-check-label" for="is_featured">Bài viết nổi bật</label></div></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $post->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Xuất bản</label></div></div>
                    <p class="text-muted">Slug: <code>{{ $post->slug }}</code></p>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">Hình ảnh</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $post->image) }}" readonly>
                            <button type="button" class="btn btn-outline-secondary" onclick="openFileBrowser('image', 'image')">
                                <i class="bi bi-folder2-open"></i> Chọn ảnh
                            </button>
                        </div>
                        @error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        <div class="mt-2">
                            <img id="image_preview" src="{{ $post->image ? asset('storage/' . $post->image) : '' }}" alt="" class="img-thumbnail" style="max-width: 100%; {{ $post->image ? '' : 'display:none;' }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Cập nhật</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary w-100">Hủy</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        initTinyMCE('#content');
    });
</script>
@endpush
