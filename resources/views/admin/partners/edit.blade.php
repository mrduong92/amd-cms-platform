@extends('admin.layouts.app')
@section('title', 'Sửa đối tác')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Đối tác</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<div class="row"><div class="col-md-6">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Sửa đối tác: {{ $partner->name }}</h3></div>
        <form action="{{ route('admin.partners.update', $partner) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="mb-3"><label for="name" class="form-label">Tên đối tác <span class="text-danger">*</span></label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $partner->name) }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="url" class="form-label">Website</label><input type="url" class="form-control" id="url" name="url" value="{{ old('url', $partner->url) }}" placeholder="https://"></div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    @if($partner->logo)<div class="mb-2"><img src="{{ asset('storage/' . $partner->logo) }}" class="img-thumbnail" style="max-height: 100px;"></div>@endif
                    <input type="file" class="form-control" id="logo" name="logo" accept="image/*"><small class="text-muted">Chọn ảnh mới để thay đổi</small>
                </div>
                <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
            </div>
            <div class="card-footer"><button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i> Cập nhật</button><a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Hủy</a></div>
        </form>
    </div>
</div></div>
@endsection
