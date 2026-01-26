@extends('admin.layouts.app')

@section('title', 'Dashboard')

@section('content')
    <!-- Stats Cards -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>{{ $stats['products'] }}</h3>
                    <p><i class="bi bi-box"></i> Sản phẩm</p>
                </div>
                <a href="{{ route('admin.products.index') }}" class="small-box-footer">
                    Xem chi tiết <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>{{ $stats['services'] }}</h3>
                    <p><i class="bi bi-gear"></i>Dịch vụ</p>
                </div>
                <a href="{{ route('admin.services.index') }}" class="small-box-footer">
                    Xem chi tiết <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-warning">
                <div class="inner">
                    <h3>{{ $stats['posts'] }}</h3>
                    <p><i class="bi bi-newspaper"></i>Bài viết</p>
                </div>
                <a href="{{ route('admin.posts.index') }}" class="small-box-footer">
                    Xem chi tiết <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>{{ $stats['new_inquiries'] }}</h3>
                    <p><i class="bi bi-envelope"></i>Liên hệ mới</p>
                </div>
                <a href="{{ route('admin.inquiries.index') }}" class="small-box-footer">
                    Xem chi tiết <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Recent Inquiries -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-envelope me-2"></i>
                        Liên hệ gần đây
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-tool">
                            Xem tất cả
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($recentInquiries as $inquiry)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $inquiry->name }}</strong>
                                    <br>
                                    <small class="text-muted">{{ $inquiry->email }}</small>
                                </div>
                                <div class="text-end">
                                    <span class="badge bg-{{ $inquiry->status_color }}">{{ $inquiry->status_label }}</span>
                                    <br>
                                    <small class="text-muted">{{ $inquiry->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted text-center">Chưa có liên hệ nào</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Recent Posts -->
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-newspaper me-2"></i>
                        Bài viết gần đây
                    </h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.posts.index') }}" class="btn btn-tool">
                            Xem tất cả
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                        @forelse($recentPosts as $post)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <a href="{{ route('admin.posts.edit', $post) }}">
                                        <strong>{{ Str::limit($post->title, 40) }}</strong>
                                    </a>
                                    <br>
                                    <small class="text-muted">
                                        Bởi {{ $post->author?->name ?? 'Unknown' }}
                                    </small>
                                </div>
                                <div class="text-end">
                                    @if($post->is_active)
                                        <span class="badge bg-success">Đã đăng</span>
                                    @else
                                        <span class="badge bg-secondary">Nháp</span>
                                    @endif
                                    <br>
                                    <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item text-muted text-center">Chưa có bài viết nào</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="bi bi-lightning me-2"></i>
                        Thao tác nhanh
                    </h3>
                </div>
                <div class="card-body">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary me-2">
                        <i class="bi bi-plus-circle me-1"></i> Thêm sản phẩm
                    </a>
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-success me-2">
                        <i class="bi bi-plus-circle me-1"></i> Thêm bài viết
                    </a>
                    <a href="{{ route('admin.services.create') }}" class="btn btn-info me-2">
                        <i class="bi bi-plus-circle me-1"></i> Thêm dịch vụ
                    </a>
                    <a href="{{ route('admin.sliders.create') }}" class="btn btn-warning">
                        <i class="bi bi-plus-circle me-1"></i> Thêm slider
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
