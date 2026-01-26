@extends('admin.layouts.app')
@section('title', 'Thêm người dùng')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Người dùng</a></li><li class="breadcrumb-item active">Thêm mới</li>@endsection

@section('content')
<div class="row"><div class="col-md-6">
    <div class="card">
        <div class="card-header"><h3 class="card-title">Thêm người dùng mới</h3></div>
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3"><label for="name" class="form-label">Họ tên <span class="text-danger">*</span></label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="email" class="form-label">Email <span class="text-danger">*</span></label><input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>@error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="phone" class="form-label">Số điện thoại</label><input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}"></div>
                <div class="mb-3"><label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label><input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>@error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                <div class="mb-3"><label for="password_confirmation" class="form-label">Xác nhận mật khẩu <span class="text-danger">*</span></label><input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required></div>
                <div class="mb-3"><label for="avatar" class="form-label">Ảnh đại diện</label><input type="file" class="form-control" id="avatar" name="avatar" accept="image/*"></div>
                <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}><label class="form-check-label" for="is_admin">Quyền Admin</label></div></div>
            </div>
            <div class="card-footer"><button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i> Lưu</button><a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Hủy</a></div>
        </form>
    </div>
</div></div>
@endsection
