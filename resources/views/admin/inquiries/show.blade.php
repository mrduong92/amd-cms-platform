@extends('admin.layouts.app')
@section('title', 'Chi tiết liên hệ')
@section('breadcrumb')<li class="breadcrumb-item"><a href="{{ route('admin.inquiries.index') }}">Liên hệ</a></li><li class="breadcrumb-item active">Chi tiết</li>@endsection

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Nội dung liên hệ</h3></div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-3">Người gửi:</dt><dd class="col-sm-9"><strong>{{ $inquiry->name }}</strong></dd>
                    <dt class="col-sm-3">Email:</dt><dd class="col-sm-9"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></dd>
                    @if($inquiry->phone)<dt class="col-sm-3">Điện thoại:</dt><dd class="col-sm-9"><a href="tel:{{ $inquiry->phone }}">{{ $inquiry->phone }}</a></dd>@endif
                    <dt class="col-sm-3">Chủ đề:</dt><dd class="col-sm-9">{{ $inquiry->subject ?: 'Không có chủ đề' }}</dd>
                    <dt class="col-sm-3">Ngày gửi:</dt><dd class="col-sm-9">{{ $inquiry->created_at->format('d/m/Y H:i') }}</dd>
                </dl>
                <hr>
                <h5>Nội dung:</h5>
                <div class="p-3 bg-light rounded">{{ $inquiry->message }}</div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header"><h3 class="card-title">Cập nhật trạng thái</h3></div>
            <form action="{{ route('admin.inquiries.status', $inquiry) }}" method="POST">
                @csrf @method('PATCH')
                <div class="card-body">
                    <div class="mb-3"><label for="status" class="form-label">Trạng thái</label><select class="form-select" id="status" name="status"><option value="new" {{ $inquiry->status == 'new' ? 'selected' : '' }}>Mới</option><option value="read" {{ $inquiry->status == 'read' ? 'selected' : '' }}>Đã xem</option><option value="replied" {{ $inquiry->status == 'replied' ? 'selected' : '' }}>Đã trả lời</option><option value="closed" {{ $inquiry->status == 'closed' ? 'selected' : '' }}>Đã đóng</option></select></div>
                    <div class="mb-3"><label for="admin_notes" class="form-label">Ghi chú</label><textarea class="form-control" id="admin_notes" name="admin_notes" rows="3">{{ $inquiry->admin_notes }}</textarea></div>
                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary w-100"><i class="bi bi-check-circle me-1"></i> Cập nhật</button></div>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary w-100"><i class="bi bi-arrow-left me-1"></i> Quay lại</a>
            </div>
        </div>
    </div>
</div>
@endsection
