@extends('admin.layouts.app')

@section('title', 'Dịch vụ')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dịch vụ</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">Danh sách dịch vụ</h3>
                <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-1"></i> Thêm dịch vụ
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th width="80">Ảnh</th>
                            <th>Tên dịch vụ</th>
                            <th>Icon</th>
                            <th>Trạng thái</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($services as $service)
                            <tr>
                                <td>
                                    @if($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" alt="" class="img-thumbnail" style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <strong>{{ $service->name }}</strong>
                                    <br><small class="text-muted">{{ Str::limit($service->short_description, 50) }}</small>
                                </td>
                                <td>
                                    @if($service->icon)
                                        <span class="material-symbols-outlined">{{ $service->icon }}</span>
                                        <code>{{ $service->icon }}</code>
                                    @else
                                        -
                                    @endif
                                </td>
                                <td>
                                    @if($service->is_active)
                                        <span class="badge bg-success">Hoạt động</span>
                                    @else
                                        <span class="badge bg-secondary">Ẩn</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa dịch vụ này?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="5" class="text-center text-muted">Chưa có dịch vụ nào</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            {{ $services->links() }}
        </div>
    </div>
@endsection
