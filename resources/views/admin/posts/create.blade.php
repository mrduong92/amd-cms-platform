@extends('admin.layouts.app')
@section('title', 'Thêm bài viết')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.posts.index') }}">Bài viết</a></li><li class="breadcrumb-item active">Thêm mới</li>@endsection

@section('content')
<form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Nội dung bài viết</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                        @error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="excerpt" class="form-label">Tóm tắt</label>
                        <textarea class="form-control" id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Nội dung</label>
                        <textarea class="form-control" id="content" name="content" rows="15">{{ old('content') }}</textarea>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">SEO</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="meta_title" class="form-label">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title') }}">
                    </div>
                    <div class="mb-3">
                        <label for="meta_description" class="form-label">Meta Description</label>
                        <textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description') }}</textarea>
                    </div>
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
                            <option value="news" {{ old('type') == 'news' ? 'selected' : '' }}>Tin tức</option>
                            <option value="project" {{ old('type') == 'project' ? 'selected' : '' }}>Dự án</option>
                            <option value="success_story" {{ old('type') == 'success_story' ? 'selected' : '' }}>Câu chuyện thành công</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Danh mục</label>
                        <select class="form-select" id="category_id" name="category_id">
                            <option value="">-- Chọn --</option>
                            @foreach($categories as $cat)<option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>@endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="published_at" class="form-label">Ngày đăng</label>
                        <input type="datetime-local" class="form-control" id="published_at" name="published_at" value="{{ old('published_at') }}">
                    </div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}><label class="form-check-label" for="is_featured">Bài viết nổi bật</label></div></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Xuất bản</label></div></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">Hình ảnh</h3></div>
                <div class="card-body">
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Lưu</button>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary w-100">Hủy</a>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
