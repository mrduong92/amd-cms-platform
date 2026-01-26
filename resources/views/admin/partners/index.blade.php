@extends('admin.layouts.app')
@section('title', 'Đối tác')
@section('breadcrumb')<li class="breadcrumb-item active">Đối tác</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách đối tác</h3>
            <a href="{{ route('admin.partners.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm đối tác</a>
        </div>
    </div>
    <div class="card-body">
        <div class="row g-4">
            @forelse($partners as $partner)
            <div class="col-md-3 col-6">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $partner->logo) }}" class="card-img-top p-3" style="height: 120px; object-fit: contain;" alt="{{ $partner->name }}">
                    <div class="card-body text-center">
                        <h6 class="card-title mb-1">{{ $partner->name }}</h6>
                        @if($partner->is_active)<span class="badge bg-success">Hoạt động</span>@else<span class="badge bg-secondary">Ẩn</span>@endif
                    </div>
                    <div class="card-footer text-center">
                        <a href="{{ route('admin.partners.edit', $partner) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                        <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form>
                    </div>
                </div>
            </div>
            @empty<div class="col-12"><p class="text-center text-muted">Chưa có đối tác nào</p></div>@endforelse
        </div>
        <div class="mt-4">{{ $partners->links() }}</div>
    </div>
</div>
@endsection
