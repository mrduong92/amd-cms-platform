<nav class="app-header navbar navbar-expand bg-body">
    <div class="container-fluid">
        <!-- Start navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button">
                    <i class="bi bi-list"></i>
                </a>
            </li>
            <li class="nav-item d-none d-md-block">
                <a href="{{ url('/') }}" class="nav-link" target="_blank">
                    <i class="bi bi-box-arrow-up-right me-1"></i>
                    Xem trang web
                </a>
            </li>
        </ul>

        <!-- Site Switcher -->
        @php
            $sites = \App\Models\Site::active()->get();
            $adminSiteId = session('admin_site_id');
            $currentAdminSite = $adminSiteId ? $sites->firstWhere('id', $adminSiteId) : $sites->first();
        @endphp
        @if($sites->count() > 1)
            <ul class="navbar-nav mx-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" data-bs-toggle="dropdown" href="#">
                        <i class="bi bi-globe me-2"></i>
                        <span class="fw-semibold">{{ $currentAdminSite?->name ?? 'Chọn Website' }}</span>
                    </a>
                    <div class="dropdown-menu">
                        <span class="dropdown-header">Chuyển Website</span>
                        <div class="dropdown-divider"></div>
                        @foreach($sites as $site)
                            <form action="{{ route('admin.sites.switch') }}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="site_id" value="{{ $site->id }}">
                                <button type="submit" class="dropdown-item {{ $currentAdminSite?->id === $site->id ? 'active' : '' }}">
                                    <i class="bi bi-{{ $currentAdminSite?->id === $site->id ? 'check-circle-fill text-success' : 'circle' }} me-2"></i>
                                    {{ $site->name }}
                                    <small class="text-muted d-block ms-4">{{ $site->domain }}</small>
                                </button>
                            </form>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif

        <!-- End navbar links -->
        <ul class="navbar-nav ms-auto">
            <!-- Cache Clear Dropdown -->
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#" title="Xóa Cache">
                    <i class="bi bi-arrow-clockwise"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-end">
                    <span class="dropdown-header">Quản lý Cache</span>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('admin.cache.clear-homepage') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-house me-2"></i> Xóa cache trang chủ
                        </button>
                    </form>
                    <form action="{{ route('admin.cache.clear-all') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            <i class="bi bi-trash me-2"></i> Xóa tất cả cache
                        </button>
                    </form>
                </div>
            </li>

            <!-- Notifications Dropdown -->
            @php
                $newInquiries = \App\Models\ContactInquiry::forSite(adminSiteId())->new()->count();
            @endphp
            <li class="nav-item dropdown">
                <a class="nav-link" data-bs-toggle="dropdown" href="#">
                    <i class="bi bi-bell"></i>
                    @if($newInquiries > 0)
                        <span class="navbar-badge badge bg-danger">{{ $newInquiries }}</span>
                    @endif
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <span class="dropdown-header">{{ $newInquiries }} liên hệ mới</span>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('admin.inquiries.index') }}" class="dropdown-item">
                        <i class="bi bi-envelope me-2"></i> Xem tất cả liên hệ
                    </a>
                </div>
            </li>

            <!-- User Account Dropdown -->
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                    @if(auth()->user()->avatar)
                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="user-image rounded-circle shadow" alt="{{ auth()->user()->name }}">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=F97316&color=fff" class="user-image rounded-circle shadow" alt="{{ auth()->user()->name }}">
                    @endif
                    <span class="d-none d-md-inline">{{ auth()->user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
                    <li class="user-header text-bg-primary">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="rounded-circle shadow" alt="{{ auth()->user()->name }}">
                        @else
                            <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->name) }}&background=F97316&color=fff&size=100" class="rounded-circle shadow" alt="{{ auth()->user()->name }}">
                        @endif
                        <p>
                            {{ auth()->user()->name }}
                            <small>{{ auth()->user()->email }}</small>
                        </p>
                    </li>
                    <li class="user-footer">
                        <a href="{{ route('admin.users.edit', auth()->user()) }}" class="btn btn-default btn-flat">
                            <i class="bi bi-person me-1"></i> Hồ sơ
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-default btn-flat float-end">
                                <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất
                            </button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
