@extends('admin.layouts.app')
@section('title', 'Sửa menu')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.menus.index') }}">Menu</a></li><li class="breadcrumb-item active">Sửa</li>@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Sửa menu: {{ $menu->name }}</h3></div>
            <form action="{{ route('admin.menus.update', $menu) }}" method="POST">
                @csrf @method('PUT')
                <div class="card-body">
                    <div class="mb-3"><label for="name" class="form-label">Tên menu <span class="text-danger">*</span></label><input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $menu->name) }}" required>@error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror</div>
                    <div class="mb-3"><label for="url" class="form-label">URL</label><input type="text" class="form-control" id="url" name="url" value="{{ old('url', $menu->url) }}"></div>
                    <div class="mb-3"><label for="location" class="form-label">Vị trí</label><select class="form-select" id="location" name="location"><option value="header" {{ old('location', $menu->location) == 'header' ? 'selected' : '' }}>Header</option><option value="footer" {{ old('location', $menu->location) == 'footer' ? 'selected' : '' }}>Footer</option></select></div>
                    <div class="mb-3"><label for="parent_id" class="form-label">Menu cha</label><select class="form-select" id="parent_id" name="parent_id"><option value="">-- Không có --</option>@foreach($parents as $p)<option value="{{ $p->id }}" {{ old('parent_id', $menu->parent_id) == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>@endforeach</select></div>
                    <div class="mb-3"><label for="target" class="form-label">Target</label><select class="form-select" id="target" name="target"><option value="_self" {{ old('target', $menu->target) == '_self' ? 'selected' : '' }}>Cùng cửa sổ</option><option value="_blank" {{ old('target', $menu->target) == '_blank' ? 'selected' : '' }}>Cửa sổ mới</option></select></div>
                    <div class="mb-3"><div class="form-check form-switch"><input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $menu->is_active) ? 'checked' : '' }}><label class="form-check-label" for="is_active">Kích hoạt</label></div></div>
                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-1"></i> Cập nhật</button><a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">Hủy</a></div>
            </form>
        </div>
    </div>
</div>
@endsection
