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

        <!-- End navbar links -->
        <ul class="navbar-nav ms-auto">
            <!-- Notifications Dropdown -->
            @php
                $newInquiries = \App\Models\ContactInquiry::new()->count();
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
