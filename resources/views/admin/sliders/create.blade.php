@extends('admin.layouts.app')
@section('title', 'Thêm slider')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.sliders.index') }}">Sliders</a></li><li class="breadcrumb-item active">Thêm mới</li>@endsection

@section('content')
<form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Thông tin slider</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="title" class="form-label">Tiêu đề</label><input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}"></div>
                    <div class="mb-3"><label for="subtitle" class="form-label">Phụ đề</label><input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ old('subtitle') }}"></div>
                    <div class="mb-3"><label for="description" class="form-label">Mô tả</label><textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea></div>
                    <div class="row">
                        <div class="col-md-6 mb-3"><label for="button_text" class="form-label">Text nút</label><input type="text" class="form-control" id="button_text" name="button_text" value="{{ old('button_text') }}" placeholder="vd: Xem thêm"></div>
                        <div class="col-md-6 mb-3"><label for="button_url" class="form-label">URL nút</label><input type="text" class="form-control" id="button_url" name="button_url" value="{{ old('button_url') }}" placeholder="vd: /san-pham"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><h3 class="card-title">Hình ảnh</h3></div>
                <div class="card-body">
                    <div class="mb-3"><label for="image" class="form-label">Ảnh slider <span class="text-danger">*</span></label><input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*" required>@error('image')<div class="invalid-feedback">{{ $message }}</div>@enderror<small class="text-muted">Kích thước khuyến nghị: 1920x700px</small></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
                </div>
            </div>
            <div class="card"><div class="card-body"><button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Lưu</button><a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary w-100">Hủy</a></div></div>
        </div>
    </div>
</form>
@endsection
