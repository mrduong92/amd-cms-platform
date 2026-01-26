@extends('admin.layouts.app')
@section('title', 'Menu')
@section('breadcrumb')<li class="breadcrumb-item active">Menu</li>@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3 class="card-title d-inline">Menu</h3>
                <div class="btn-group ms-3">
                    <a href="{{ route('admin.menus.index', ['location' => 'header']) }}" class="btn btn-sm {{ $location == 'header' ? 'btn-primary' : 'btn-outline-primary' }}">Header</a>
                    <a href="{{ route('admin.menus.index', ['location' => 'footer']) }}" class="btn btn-sm {{ $location == 'footer' ? 'btn-primary' : 'btn-outline-primary' }}">Footer</a>
                </div>
            </div>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i> Thêm menu</a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead><tr><th>Tên</th><th>URL</th><th>Thứ tự</th><th>Trạng thái</th><th width="150">Thao tác</th></tr></thead>
                <tbody>
                    @forelse($menus as $menu)
                    <tr>
                        <td><strong>{{ $menu->name }}</strong></td>
                        <td><code>{{ $menu->url }}</code></td>
                        <td>{{ $menu->order }}</td>
                        <td>@if($menu->is_active)<span class="badge bg-success">Hoạt động</span>@else<span class="badge bg-secondary">Ẩn</span>@endif</td>
                        <td><a href="{{ route('admin.menus.edit', $menu) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.menus.destroy', $menu) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form></td>
                    </tr>
                    @if($menu->children->count() > 0)
                        @foreach($menu->children as $child)
                        <tr class="table-light">
                            <td class="ps-4">└─ {{ $child->name }}</td>
                            <td><code>{{ $child->url }}</code></td>
                            <td>{{ $child->order }}</td>
                            <td>@if($child->is_active)<span class="badge bg-success">Hoạt động</span>@else<span class="badge bg-secondary">Ẩn</span>@endif</td>
                            <td><a href="{{ route('admin.menus.edit', $child) }}" class="btn btn-sm btn-info"><i class="bi bi-pencil"></i></a><form action="{{ route('admin.menus.destroy', $child) }}" method="POST" class="d-inline" onsubmit="return confirm('Xóa?')">@csrf @method('DELETE')<button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button></form></td>
                        </tr>
                        @endforeach
                    @endif
                    @empty<tr><td colspan="5" class="text-center text-muted">Chưa có menu nào</td></tr>@endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
