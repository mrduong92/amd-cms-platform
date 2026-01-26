@extends('admin.layouts.app')

@section('title', 'Sửa dịch vụ')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.services.index') }}">Dịch vụ</a></li>
    <li class="breadcrumb-item active">Sửa</li>
@endsection

@section('content')
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Thông tin dịch vụ</h3></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên dịch vụ <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $service->name) }}" required>
                            @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <textarea class="form-control" id="short_description" name="short_description" rows="2">{{ old('short_description', $service->short_description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" id="description" name="description" rows="8">{{ old('description', $service->description) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header"><h3 class="card-title">Cài đặt</h3></div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="">-- Chọn --</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $service->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon (Material Symbols)</label>
                            <input type="text" class="form-control" id="icon" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="vd: build">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Hình ảnh</label>
                            @if($service->image)
                                <div class="mb-2"><img src="{{ asset('storage/' . $service->image) }}" class="img-thumbnail" style="max-width: 150px;"></div>
                            @endif
                            <input type="file" class="form-control" id="image" name="image" accept="image/*">
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Kích hoạt</label>
                            </div>
                        </div>
                        <p class="text-muted">Slug: <code>{{ $service->slug }}</code></p>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100 mb-2"><i class="bi bi-check-circle me-1"></i> Cập nhật</button>
                        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary w-100">Hủy</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
