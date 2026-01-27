@extends('admin.layouts.app')
@section('title', 'Sửa đối tác')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Đối tác</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<div class="row"><div class="col-md-6">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Sửa đối tác: {{ $partner->name }}</h3></div>
        <form action="{{ route('admin.partners.update', $partner) }}" method="POST">
            @csrf @method('PUT')
            <div class="card-body">
                <div class="mb-3"><label for="name" class="form-label">Tên đối tác <span class="text-danger">*</span></label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $partner->name) }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="url" class="form-label">Website</label><input type="url" class="form-control" id="url" name="url" value="{{ old('url', $partner->url) }}" placeholder="https://"></div>
                <div class="mb-3">
                    <label for="logo" class="form-label">Logo</label>
                    <div class="input-group">
                        <input type="text" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" value="{{ old('logo', $partner->logo) }}" readonly>
                        <button type="button" class="btn btn-outline-secondary" onclick="openFileBrowser('logo', 'image')">
                            <i class="bi bi-folder2-open"></i> Chọn ảnh
                        </button>
                    </div>
                    @error('logo')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                    <div class="mt-2">
                        <img id="logo_preview" src="{{ $partner->logo ? asset('storage/' . $partner->logo) : '' }}" alt="" class="img-thumbnail" style="max-height: 100px; {{ $partner->logo ? '' : 'display:none;' }}">
                    </div>
                </div>
                <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
            </div>
            <div class="card-footer"><button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i> Cập nhật</button><a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Hủy</a></div>
        </form>
    </div>
</div></div>
@endsection
