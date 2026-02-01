@extends('admin.layouts.app')

@section('title', 'Quản lý Website')

@section('breadcrumb')
    <li class="breadcrumb-item active">Website</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Danh sách Website</h3>
        <div class="card-tools">
            <a href="{{ route('admin.sites.create') }}" class="btn btn-primary btn-sm">
                <i class="bi bi-plus-lg"></i> Thêm Website
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th width="50">ID</th>
                    <th>Tên</th>
                    <th>Slug</th>
                    <th>Domain</th>
                    <th>Theme</th>
                    <th width="100">Trạng thái</th>
                    <th width="150">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sites as $site)
                    <tr>
                        <td>{{ $site->id }}</td>
                        <td>
                            <strong>{{ $site->name }}</strong>
                        </td>
                        <td><code>{{ $site->slug }}</code></td>
                        <td>
                            <a href="https://{{ $site->domain }}" target="_blank" class="text-decoration-none">
                                {{ $site->domain }}
                                <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </td>
                        <td><code>{{ $site->theme }}</code></td>
                        <td>
                            @if($site->is_active)
                                <span class="badge bg-success">Hoạt động</span>
                            @else
                                <span class="badge bg-secondary">Ẩn</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.sites.edit', $site) }}" class="btn btn-sm btn-info" title="Sửa">
                                <i class="bi bi-pencil"></i>
                            </a>
                            @if($site->slug !== 'nmtauto')
                                <form action="{{ route('admin.sites.destroy', $site) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            <i class="bi bi-globe fs-1 d-block mb-2"></i>
                            Chưa có website nào.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($sites->hasPages())
        <div class="card-footer">
            {{ $sites->links() }}
        </div>
    @endif
</div>
@endsection
