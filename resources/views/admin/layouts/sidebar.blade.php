<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!-- Sidebar Brand -->
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-text fw-bold" style="color: #F97316;">NMT AUTO</span>
        </a>
    </div>

    <!-- Sidebar Menu -->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer2"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Content Section -->
                <li class="nav-header">NỘI DUNG</li>

                <!-- Sliders -->
                <li class="nav-item">
                    <a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-images"></i>
                        <p>Sliders</p>
                    </a>
                </li>

                <!-- Categories -->
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-folder"></i>
                        <p>Danh mục</p>
                    </a>
                </li>

                <!-- Products -->
                <li class="nav-item">
                    <a href="{{ route('admin.products.index') }}" class="nav-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-box"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>

                <!-- Services -->
                <li class="nav-item">
                    <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-gear"></i>
                        <p>Dịch vụ</p>
                    </a>
                </li>

                <!-- Posts -->
                <li class="nav-item {{ request()->routeIs('admin.posts.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('admin.posts.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-newspaper"></i>
                        <p>
                            Bài viết
                            <i class="nav-arrow bi bi-chevron-right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index') }}" class="nav-link {{ request()->routeIs('admin.posts.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tất cả bài viết</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index', ['type' => 'news']) }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Tin tức</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.index', ['type' => 'project']) }}" class="nav-link">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Dự án</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.posts.create') }}" class="nav-link {{ request()->routeIs('admin.posts.create') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-circle"></i>
                                <p>Thêm bài viết</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Pages -->
                <li class="nav-item">
                    <a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-file-earmark-text"></i>
                        <p>Trang tĩnh</p>
                    </a>
                </li>

                <!-- Partners -->
                <li class="nav-item">
                    <a href="{{ route('admin.partners.index') }}" class="nav-link {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-people"></i>
                        <p>Đối tác</p>
                    </a>
                </li>

                <!-- Social Posts -->
                <li class="nav-item">
                    <a href="{{ route('admin.social-posts.index') }}" class="nav-link {{ request()->routeIs('admin.social-posts.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-share"></i>
                        <p>Mạng xã hội</p>
                    </a>
                </li>

                <!-- Media -->
                <li class="nav-item">
                    <a href="{{ route('admin.media.index') }}" class="nav-link {{ request()->routeIs('admin.media.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-image"></i>
                        <p>Media</p>
                    </a>
                </li>

                <!-- System Section -->
                <li class="nav-header">HỆ THỐNG</li>

                <!-- Menus -->
                <li class="nav-item">
                    <a href="{{ route('admin.menus.index') }}" class="nav-link {{ request()->routeIs('admin.menus.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-list-ul"></i>
                        <p>Menu</p>
                    </a>
                </li>

                <!-- Contact Inquiries -->
                @php
                    $newInquiriesCount = \App\Models\ContactInquiry::forSite(adminSiteId())->new()->count();
                @endphp
                <li class="nav-item">
                    <a href="{{ route('admin.inquiries.index') }}" class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-envelope"></i>
                        <p>
                            Liên hệ
                            @if($newInquiriesCount > 0)
                                <span class="badge text-bg-danger float-end">{{ $newInquiriesCount }}</span>
                            @endif
                        </p>
                    </a>
                </li>

                <!-- Users -->
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-person-circle"></i>
                        <p>Người dùng</p>
                    </a>
                </li>

                <!-- Settings -->
                <li class="nav-item">
                    <a href="{{ route('admin.settings.index') }}" class="nav-link {{ request()->routeIs('admin.settings.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-sliders"></i>
                        <p>Cài đặt</p>
                    </a>
                </li>

                <!-- Sites -->
                <li class="nav-item">
                    <a href="{{ route('admin.sites.index') }}" class="nav-link {{ request()->routeIs('admin.sites.*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-globe"></i>
                        <p>Website</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
