@extends('admin.layouts.app')

@section('title', 'Thêm Website')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.sites.index') }}">Website</a></li>
    <li class="breadcrumb-item active">Thêm mới</li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('admin.sites.store') }}" method="POST">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thông tin Website</h3>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên Website <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                                <div class="form-text">Định danh duy nhất (vd: nmtauto, amd)</div>
                                @error('slug')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="domain" class="form-label">Domain <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('domain') is-invalid @enderror" id="domain" name="domain" value="{{ old('domain') }}" required>
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
                                    <option value="frontend" {{ old('theme') == 'frontend' ? 'selected' : '' }}>frontend (NMT AUTO)</option>
                                    <option value="amd" {{ old('theme') == 'amd' ? 'selected' : '' }}>amd (AMD AI Solutions)</option>
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
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Hoạt động</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-lg"></i> Lưu
                    </button>
                    <a href="{{ route('admin.sites.index') }}" class="btn btn-secondary">
                        <i class="bi bi-x-lg"></i> Hủy
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Auto generate slug from name
    document.getElementById('name').addEventListener('input', function() {
        const name = this.value.toLowerCase()
            .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
            .replace(/đ/g, 'd').replace(/Đ/g, 'D')
            .replace(/[^a-z0-9\s-]/g, '')
            .replace(/\s+/g, '-')
            .replace(/-+/g, '-')
            .trim();
        document.getElementById('slug').value = name;
    });
</script>
@endpush
