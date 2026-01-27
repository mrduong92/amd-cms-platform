@extends('admin.layouts.app')
@section('title', 'Media')
@section('breadcrumb')<li class="breadcrumb-item active">Media</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Media Library</h3>
            <button type="button" class="btn btn-primary" onclick="openFileManager()"><i class="bi bi-upload me-1"></i> Upload</button>
        </div>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.media.index') }}" method="GET" class="row g-3 mb-4">
            <div class="col-md-3"><select name="type" class="form-select"><option value="">Tất cả loại</option><option value="images" {{ request('type') == 'images' ? 'selected' : '' }}>Hình ảnh</option></select></div>
            <div class="col-md-4"><input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}"></div>
            <div class="col-md-2"><button type="submit" class="btn btn-secondary w-100"><i class="bi bi-search"></i> Lọc</button></div>
        </form>

        <div class="row g-3">
            @forelse($media as $item)
            <div class="col-md-2 col-sm-4 col-6">
                <div class="card h-100">
                    @if($item->isImage())
                        <img src="{{ $item->url }}" class="card-img-top" style="height: 120px; object-fit: cover;" alt="{{ $item->name }}">
                    @else
                        <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 120px;"><i class="bi bi-file-earmark fs-1 text-muted"></i></div>
                    @endif
                    <div class="card-body p-2">
                        <p class="card-text small text-truncate mb-0" title="{{ $item->file_name }}">{{ $item->file_name }}</p>
                        <small class="text-muted">{{ $item->human_size }}</small>
                    </div>
                    <div class="card-footer p-2 text-center">
                        <button type="button" class="btn btn-sm btn-outline-primary" onclick="copyToClipboard('{{ $item->url }}')"><i class="bi bi-clipboard"></i></button>
                        <form action="{{ route('admin.media.destroy', $item) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button></form>
                    </div>
                </div>
            </div>
            @empty<div class="col-12"><p class="text-center text-muted">Chưa có file nào</p></div>@endforelse
        </div>
        <div class="mt-4">{{ $media->links() }}</div>
    </div>
</div>

@endsection

@push('scripts')
<script>
function copyToClipboard(text) {
    navigator.clipboard.writeText(text).then(function() {
        alert('Đã copy URL!');
    });
}

function openFileManager() {
    window.open('/filemanager?type=file', 'FileManager', 'width=900,height=600');
    window.SetUrl = function(items) {
        // Refresh the page to show newly uploaded files
        window.location.reload();
    };
}
</script>
@endpush
