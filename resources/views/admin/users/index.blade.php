@extends('admin.layouts.app')
@section('title', 'Người dùng')
@section('breadcrumb')<li class="breadcrumb-item active">Người dùng</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">Danh sách người dùng</h3>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm người dùng</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead><tr><th width="60">Ảnh</th><th>Tên</th><th>Email</th><th>Vai trò</th><th>Ngày tạo</th><th width="150">Thao tác</th></tr></thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            @if($user->avatar)<img src="{{ asset('storage/' . $user->avatar) }}" class="rounded-circle" style="width:40px;height:40px;object-fit:cover;">
                            @else<img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=F97316&color=fff&size=40" class="rounded-circle">@endif
                        </td>
                        <td><strong>{{ $user->name }}</strong>@if($user->phone)<br><small class="text-muted">{{ $user->phone }}</small>@endif</td>
                        <td>{{ $user->email }}</td>
                        <td>@if($user->is_admin)<span class="badge bg-danger">Admin</span>@else<span class="badge bg-secondary">User</span>@endif</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a>
                            @if($user->id !== auth()->id())
                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form>
                            @endif
                        </td>
                    </tr>
                    @empty<tr><td colspan="6" class="text-center text-muted">Chưa có người dùng nào</td></tr>@endforelse
                </tbody>
            </table>
        </div>
        {{ $users->links() }}
    </div>
</div>
@endsection
