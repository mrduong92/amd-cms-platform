@extends('admin.layouts.app')

@section('title', 'Sửa Website')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sites.index') }}">Website</a></li>
    <li class="breadcrumb-item active">{{ $site->name }}</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('admin.sites.update', $site) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin Website</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Website <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $site->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug', $site->slug) }}" required {{ $site->slug === 'nmtauto' ? 'readonly' : '' }}>
                                <div class="form-text">Định danh duy nhất (vd: nmtauto, amd)</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="domain" class="form-label">Domain <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain" name="domain" value="{{ old('domain', $site->domain) }}" required>
                                <div class="form-text">Domain truy cập (vd: nmtauto.vn, amdai.vn)</div>
                                @error('domain')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="theme" class="form-label">Theme <span class="text-danger">*</span></label>
                                <select class="form-select @error('theme') is-invalid @enderror" id="theme" name="theme" required>
                                    <option value="frontend" {{ old('theme', $site->theme) == 'frontend' ? 'selected' : '' }}>frontend (NMT AUTO)</option>
                                    <option value="amd" {{ old('theme', $site->theme) == 'amd' ? 'selected' : '' }}>amd (AMD AI Solutions)</option>
                                </select>
                                <div class="form-text">Thư mục theme trong resources/views</div>
                                @error('theme')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label d-block">Trạng thái</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $site->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Hoạt động</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Cập nhật
                    </button>
                    <a href="{{ route('admin.sites.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-lg"></i> Hủy
                    </a>
                </div>
            </div>
        </form>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Thông tin</h3>
            </div>
            <div class="card-body">
                <p class="mb-2"><strong>Ngày tạo:</strong> {{ $site->created_at->format('d/m/Y H:i') }}</p>
                <p class="mb-0"><strong>Cập nhật lần cuối:</strong> {{ $site->updated_at->format('d/m/Y H:i') }}</p>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Thống kê</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled mb-0">
                    <li class="mb-2">
                        <i class="bi bi-file-text text-primary me-2"></i>
                        <strong>{{ $site->posts()->count() }}</strong> bài viết
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-file-earmark text-info me-2"></i>
                        <strong>{{ $site->pages()->count() }}</strong> trang tĩnh
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-images text-warning me-2"></i>
                        <strong>{{ $site->sliders()->count() }}</strong> slider
                    </li>
                    <li class="mb-2">
                        <i class="bi bi-list text-success me-2"></i>
                        <strong>{{ $site->menus()->count() }}</strong> menu
                    </li>
                    <li class="mb-0">
                        <i class="bi bi-envelope text-danger me-2"></i>
                        <strong>{{ $site->contactInquiries()->count() }}</strong> liên hệ
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
