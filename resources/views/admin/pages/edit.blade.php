@extends('admin.layouts.app')
@section('title', 'Sửa trang')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.pages.index') }}">Trang</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<form action="{{ route('admin.pages.update', $page) }}" method="POST">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Nội dung</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label><input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $page->title) }}" required>@error('title')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    <div class="mb-3"><label for="content" class="form-label">Nội dung</label><textarea class="form-control" id="content" name="content" rows="15">{{ old('content', $page->content) }}</textarea></div>
                </div>
            </div>
            <div class="card">
                <div class="card-header"><h3 class="card-title">SEO</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="meta_title" class="form-label">Meta Title</label><input type="text" class="form-control" id="meta_title" name="meta_title" value="{{ old('meta_title', $page->meta_title) }}"></div>
                    <div class="mb-3"><label for="meta_description" class="form-label">Meta Description</label><textarea class="form-control" id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $page->meta_description) }}</textarea></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Cài đặt</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="template" class="form-label">Template</label><select class="form-select" id="template" name="template"><option value="default" {{ $page->template == 'default' ? 'selected' : '' }}>Mặc định</option><option value="contact" {{ $page->template == 'contact' ? 'selected' : '' }}>Liên hệ</option><option value="about" {{ $page->template == 'about' ? 'selected' : '' }}>Giới thiệu</option></select></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $page->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
                    <p class="text-muted">Slug: <code>/{{ $page->slug }}</code></p>
                </div>
            </div>
            <div class="card"><div class="card-body"><button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Cập nhật</button><a href="{{ route('admin.pages.index') }}" class="btn btn-secondary w-100">Hủy</a></div></div>
        </div>
    </div>
</form>
@endsection
