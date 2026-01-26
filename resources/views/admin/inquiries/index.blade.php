@extends('admin.layouts.app')

@section('title', 'Liên hệ')

@section('breadcrumb')
    <li class="breadcrumb-item active">Liên hệ</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="card-title">
                    Danh sách liên hệ
                    @if($newCount > 0)
                        <span class="badge bg-danger">{{ $newCount }} mới</span>
                    @endif
                </h3>
            </div>
        </div>
        <div class="card-body">
            <!-- Filters -->
            <form action="{{ route('admin.inquiries.index') }}" method="GET" class="row g-3 mb-4">
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Tất cả trạng thái</option>
                        <option value="new" {{ request('status') == 'new' ? 'selected' : '' }}>Mới</option>
                        <option value="read" {{ request('status') == 'read' ? 'selected' : '' }}>Đã xem</option>
                        <option value="replied" {{ request('status') == 'replied' ? 'selected' : '' }}>Đã trả lời</option>
                        <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Đã đóng</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Tìm kiếm..." value="{{ request('search') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-secondary w-100">
                        <i class="bi bi-search"></i> Lọc
                    </button>
                </div>
            </form>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="50">#</th>
                            <th>Người gửi</th>
                            <th>Chủ đề</th>
                            <th>Trạng thái</th>
                            <th>Ngày gửi</th>
                            <th width="150">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($inquiries as $inquiry)
                            <tr class="{{ $inquiry->status == 'new' ? 'table-warning' : '' }}">
                                <td>{{ $inquiry->id }}</td>
                                <td>
                                    <strong>{{ $inquiry->name }}</strong><br>
                                    <small class="text-muted">{{ $inquiry->email }}</small>
                                    @if($inquiry->phone)
                                        <br><small class="text-muted">{{ $inquiry->phone }}</small>
                                    @endif
                                </td>
                                <td>
                                    {{ $inquiry->subject ?: 'Không có chủ đề' }}
                                    <br>
                                    <small class="text-muted">{{ Str::limit($inquiry->message, 50) }}</small>
                                </td>
                                <td>
                                    <span class="badge bg-{{ $inquiry->status_color }}">
                                        {{ $inquiry->status_label }}
                                    </span>
                                </td>
                                <td>{{ $inquiry->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.inquiries.show', $inquiry) }}" class="btn btn-sm btn-info" title="Xem">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.inquiries.destroy', $inquiry) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Xóa">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">Chưa có liên hệ nào</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $inquiries->links() }}
            </div>
        </div>
    </div>
@endsection
