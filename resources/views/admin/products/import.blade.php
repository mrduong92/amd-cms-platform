@extends('admin.layouts.app')

@section('title', 'Import sản phẩm')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Import</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Import sản phẩm từ Excel</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="alert alert-info">
                        <h5><i class="bi bi-info-circle me-1"></i> Hướng dẫn</h5>
                        <ul class="mb-0">
                            <li>Tải file mẫu Excel và điền thông tin sản phẩm theo đúng format.</li>
                            <li>Cột <strong>"Tên sản phẩm"</strong> (ten_san_pham) là bắt buộc.</li>
                            <li>Cột <strong>"Mã sản phẩm"</strong> (ma_san_pham) là tùy chọn.</li>
                            <li>Slug sẽ được tự động tạo từ tên sản phẩm.</li>
                            <li>Sản phẩm import sẽ được kích hoạt mặc định.</li>
                        </ul>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('admin.products.import.template') }}" class="btn btn-outline-primary">
                            <i class="bi bi-download me-1"></i> Tải file mẫu Excel
                        </a>
                    </div>

                    <form action="{{ route('admin.products.import.execute') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Chọn file Excel <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file" accept=".xlsx,.xls,.csv" required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Chấp nhận file .xlsx, .xls, .csv (tối đa 10MB)</small>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-upload me-1"></i> Import
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-1"></i> Hủy
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
