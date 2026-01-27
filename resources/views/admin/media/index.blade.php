@extends('admin.layouts.app')
@section('title', 'Quản lý Media')
@section('breadcrumb')<li class="breadcrumb-item active">Media</li>@endsection

@push('styles')
<style>
    .filemanager-container {
        height: calc(100vh - 200px);
        min-height: 500px;
        border: 1px solid #dee2e6;
        border-radius: 0.5rem;
        overflow: hidden;
        background: #fff;
        position: relative;
    }
    .filemanager-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }
    .filemanager-loading {
        position: absolute;
        inset: 0;
        background: rgba(255,255,255,0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
    }
    .filemanager-loading.d-none {
        display: none !important;
    }
</style>
@endpush

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0">
                <i class="bi bi-folder2-open me-2"></i>Quản lý Media
            </h3>
            <div class="d-flex gap-2">
                <button type="button" class="btn btn-outline-primary btn-sm" onclick="refreshFileManager()">
                    <i class="bi bi-arrow-clockwise me-1"></i> Làm mới
                </button>
                <button type="button" class="btn btn-outline-secondary btn-sm" onclick="openStandaloneFileManager()">
                    <i class="bi bi-box-arrow-up-right me-1"></i> Mở cửa sổ mới
                </button>
            </div>
        </div>
    </div>
    <div class="card-body p-0">
        <div class="filemanager-container">
            <div class="filemanager-loading d-none" id="filemanager-loading">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Đang tải...</span>
                </div>
            </div>
            <iframe src="/filemanager?type=file" id="filemanager-iframe" onload="hideLoading()"></iframe>
        </div>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title mb-0"><i class="bi bi-info-circle me-2"></i>Hướng dẫn sử dụng</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <h6><i class="bi bi-upload text-primary me-2"></i>Tải lên</h6>
                <p class="text-muted small">Kéo thả file hoặc click nút Upload để tải file lên. Hỗ trợ hình ảnh, PDF, và các file thông dụng.</p>
            </div>
            <div class="col-md-4">
                <h6><i class="bi bi-folder-plus text-success me-2"></i>Thư mục</h6>
                <p class="text-muted small">Tạo thư mục mới để tổ chức file. Click chuột phải để xem menu ngữ cảnh.</p>
            </div>
            <div class="col-md-4">
                <h6><i class="bi bi-clipboard text-info me-2"></i>Copy URL</h6>
                <p class="text-muted small">Click vào file và chọn "Use" hoặc copy URL để sử dụng trong bài viết.</p>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let standaloneWindow = null;

    function refreshFileManager() {
        const iframe = document.getElementById('filemanager-iframe');
        const loading = document.getElementById('filemanager-loading');
        loading.classList.remove('d-none');
        iframe.src = iframe.src;
    }

    function hideLoading() {
        document.getElementById('filemanager-loading').classList.add('d-none');
    }

    function openStandaloneFileManager() {
        standaloneWindow = window.open('/filemanager?type=file', 'FileManager', 'width=1000,height=700');

        // Check periodically if the window is closed, then refresh the iframe
        const checkWindowClosed = setInterval(function() {
            if (standaloneWindow && standaloneWindow.closed) {
                clearInterval(checkWindowClosed);
                standaloneWindow = null;
                refreshFileManager();
            }
        }, 500);
    }
</script>
@endpush
