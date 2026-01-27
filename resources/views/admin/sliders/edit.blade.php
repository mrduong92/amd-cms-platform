@extends('admin.layouts.app')
@section('title', 'Sửa slider')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Thông tin slider</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="title" class="form-label">Tiêu đề</label><input type="text" class="form-control" id="title" name="title" value="{{ old('title', $slider->title) }}"></div>
                    <div class="mb-3"><label for="subtitle" class="form-label">Phụ đề</label><input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}"></div>
                    <div class="mb-3"><label for="description" class="form-label">Mô tả</label><textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $slider->description) }}</textarea></div>
                    <div class="row">
                        <div class="col-md-6 mb-3"><label for="button_text" class="form-label">Text nút</label><input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text', $slider->button_text) }}"></div>
                        <div class="col-md-6 mb-3"><label for="button_url" class="form-label">URL nút</label><input type="text" class="form-control" id="button_url" name="button_url" value="{{ old('button_url', $slider->button_url) }}"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Hình ảnh</h3></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="image" class="form-label">Ảnh slider</label>
                        <div class="input-group">
                            <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image', $slider->image) }}" readonly>
                            <button type="button" class="btn btn-outline-secondary" onclick="openFileBrowser('image', 'image')">
                                <i class="bi bi-folder2-open"></i> Chọn ảnh
                            </button>
                        </div>
                        @error('image')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                        <div class="mt-2">
                            <img id="image_preview" src="{{ $slider->image ? asset('storage/' . $slider->image) : '' }}" alt="" class="img-thumbnail w-100" style="{{ $slider->image ? '' : 'display:none;' }}">
                        </div>
                    </div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
                </div>
            </div>
            <div class="card"><div class="card-body"><button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Cập nhật</button><a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary w-100">Hủy</a></div></div>
        </div>
    </div>
</form>
@endsection
