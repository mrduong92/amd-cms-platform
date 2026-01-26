@extends('admin.layouts.app')
@section('title', 'Sliders')
@section('breadcrumb')<li class="breadcrumb-item active">Sliders</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách sliders</h3>
            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm slider</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead><tr><th width="150">Ảnh</th><th>Tiêu đề</th><th>Phụ đề</th><th>Button</th><th>Trạng thái</th><th width="150">Thao tác</th></tr></thead>
                <tbody>
                    @forelse($sliders as $slider)
                    <tr>
                        <td>@if($slider->image)<img src="{{ asset('storage/' . $slider->image) }}" class="img-thumbnail" style="width:120px;height:70px;object-fit:cover;">@else<div class="bg-secondary d-flex align-items-center justify-content-center" style="width:120px;height:70px;"><i class="bi bi-image text-white"></i></div>@endif</td>
                        <td><strong>{{ $slider->title ?: '-' }}</strong></td>
                        <td>{{ $slider->subtitle ?: '-' }}</td>
                        <td>@if($slider->button_text)<a href="{{ $slider->button_url }}" target="_blank">{{ $slider->button_text }}</a>@else - @endif</td>
                        <td>@if($slider->is_active)<span class="badge bg-success">Hoạt động</span>@else<span class="badge bg-secondary">Ẩn</span>@endif</td>
                        <td><a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form></td>
                    </tr>
                    @empty<tr><td colspan="6" class="text-center text-muted">Chưa có slider nào</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        {{ $sliders->links() }}
    </div>
</div>
@endsection
