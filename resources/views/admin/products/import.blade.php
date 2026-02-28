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
                    <h3 class="card-title"><i class="bi bi-file-earmark-excel me-2"></i>Import sản phẩm từ Excel</h3>
                </div>
                <div class="card-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        <i class="bi bi-exclamation-triangle me-1"></i> {{ session('error') }}
                    </div>
                    @endif

                    <div class="alert alert-info">
                        <h6 class="fw-bold mb-2"><i class="bi bi-info-circle me-1"></i> Định dạng file Excel</h6>
                        <ul class="mb-2 small">
                            <li>Mỗi <strong>sheet (tab)</strong> tương ứng một <strong>danh mục sản phẩm</strong>. Tên sheet = tên danh mục (tự động tạo nếu chưa có).</li>
                            <li><strong>Hàng đầu tiên</strong> của mỗi sheet là tiêu đề cột.</li>
                            <li>Cấu trúc cột bắt buộc: <code>STT | Mã sản phẩm | Tên sản phẩm | [cột thông số...]</code></li>
                            <li>Cột <strong>Tên sản phẩm</strong> (cột 3) là bắt buộc.</li>
                            <li>Tất cả các cột từ cột 4 trở đi sẽ được nhập làm <strong>thông số kỹ thuật</strong> của sản phẩm.</li>
                            <li>Sản phẩm trùng <strong>Mã sản phẩm (SKU)</strong> sẽ được bỏ qua.</li>
                        </ul>
                        <div class="table-responsive">
                            <table class="table table-sm table-bordered mb-0 small">
                                <thead class="table-light">
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã sản phẩm</th>
                                        <th>Tên sản phẩm <span class="text-danger">*</span></th>
                                        <th>Điện áp (V)</th>
                                        <th>Dung lượng (Ah)</th>
                                        <th>... (thông số kỹ thuật)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>NMT-LFP-24V-230Ah</td>
                                        <td>Bình lithium 24V 230Ah</td>
                                        <td>24</td>
                                        <td>230</td>
                                        <td>...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="mb-4">
                        <a href="{{ route('admin.products.import.template') }}" class="btn btn-outline-success btn-sm">
                            <i class="bi bi-download me-1"></i> Tải file mẫu Excel
                        </a>
                    </div>

                    <form action="{{ route('admin.products.import.execute') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label fw-semibold">Chọn file Excel <span class="text-danger">*</span></label>
                            <input type="file"
                                   class="form-control @error('file') is-invalid @enderror"
                                   id="file" name="file"
                                   accept=".xlsx,.xls"
                                   required>
                            @error('file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Chỉ chấp nhận file .xlsx, .xls (tối đa 10MB)</small>
                        </div>
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-upload me-1"></i> Bắt đầu import
                            </button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-1"></i> Hủy
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0"><i class="bi bi-lightbulb me-1"></i> Lưu ý</h5>
                </div>
                <div class="card-body small text-muted">
                    <ul class="ps-3 mb-0">
                        <li class="mb-1">Slug sẽ tự động tạo từ tên sản phẩm.</li>
                        <li class="mb-1">Danh mục chưa tồn tại sẽ được tạo mới tự động.</li>
                        <li class="mb-1">Sản phẩm import mặc định ở trạng thái <strong>kích hoạt</strong>.</li>
                        <li class="mb-1">Có thể import nhiều danh mục cùng lúc bằng cách tạo nhiều sheet.</li>
                        <li>Ảnh sản phẩm cần upload thủ công sau khi import.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
