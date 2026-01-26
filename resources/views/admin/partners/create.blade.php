@extends('admin.layouts.app')
@section('title', 'Thêm đối tác')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.partners.index') }}">Đối tác</a></li><li class="breadcrumb-item active">Thêm mới</li>@endsection

@section('content')
<div class="row"><div class="col-md-6">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Thêm đối tác mới</h3></div>
        <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3"><label for="name" class="form-label">Tên đối tác <span class="text-danger">*</span></label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="url" class="form-label">Website</label><input type="url" class="form-control" id="url" name="url" value="{{ old('url') }}" placeholder="https://"></div>
                <div class="mb-3"><label for="logo" class="form-label">Logo <span class="text-danger">*</span></label><input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" accept="image/*" required>@error('logo')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
            </div>
            <div class="card-footer"><button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i> Lưu</button><a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Hủy</a></div>
        </form>
    </div>
</div></div>
@endsection
