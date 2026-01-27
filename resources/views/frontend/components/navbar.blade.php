@php
    $headerMenus = \App\Models\Menu::where('location', 'header')
        ->whereNull('parent_id')
        ->where('is_active', true)
        ->with(['linkable', 'children' => function($q) {
            $q->where('is_active', true)->orderBy('order')->with(['linkable', 'children' => function($q2) {
                $q2->where('is_active', true)->orderBy('order')->with('linkable');
            }]);
        }])
        ->orderBy('order')
        ->get();
@endphp

<nav class="fixed top-0 w-full z-50 glass-nav border-b border-slate-200/50 dark:border-slate-800/50 bg-white/80 dark:bg-background-dark/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                @if(setting('logo'))
                    <img src="{{ asset('storage/' . setting('logo')) }}" alt="{{ setting('site_name') }}" class="h-10">
                @else
                    <div class="w-10 h-10 bg-primary rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white">bolt</span>
                    </div>
                    <span class="font-display text-2xl font-extrabold tracking-tighter text-secondary dark:text-white uppercase italic">NMT <span class="text-primary not-italic">AUTO</span></span>
                @endif
            </a>

            <div class="hidden md:flex space-x-6 items-center">
                @forelse($headerMenus as $menu)
                    @if($menu->children->count() > 0)
                    <!-- Dropdown Menu -->
                    <div class="relative group">
                        <a class="text-sm font-semibold hover:text-primary transition-colors flex items-center gap-1 py-2" href="{{ $menu->getUrl() }}" target="{{ $menu->target }}">
                            {{ $menu->name }}
                            <span class="material-symbols-outlined text-sm">expand_more</span>
                        </a>
                        <div class="absolute left-0 top-full pt-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-2 min-w-[200px]">
                                @foreach($menu->children as $child)
                                    @if($child->children->count() > 0)
                                    <!-- Nested dropdown -->
                                    <div class="relative group/sub">
                                        <a class="flex items-center justify-between px-4 py-2 text-sm hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary" href="{{ $child->getUrl() }}" target="{{ $child->target }}">
                                            {{ $child->name }}
                                            <span class="material-symbols-outlined text-sm">chevron_right</span>
                                        </a>
                                        <div class="absolute left-full top-0 pl-2 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all duration-200">
                                            <div class="bg-white dark:bg-slate-800 rounded-xl shadow-xl border border-slate-200 dark:border-slate-700 py-2 min-w-[180px]">
                                                @foreach($child->children as $subChild)
                                                <a class="block px-4 py-2 text-sm hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary" href="{{ $subChild->getUrl() }}" target="{{ $subChild->target }}">
                                                    {{ $subChild->name }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <a class="block px-4 py-2 text-sm hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-primary" href="{{ $child->getUrl() }}" target="{{ $child->target }}">
                                        {{ $child->name }}
                                    </a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @else
                    <a class="text-sm font-semibold hover:text-primary transition-colors" href="{{ $menu->getUrl() }}" target="{{ $menu->target }}">{{ $menu->name }}</a>
                    @endif
                @empty
                    <!-- Fallback static menu -->
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('home') ? 'text-primary' : '' }}" href="{{ route('home') }}">Trang chủ</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('products.*') ? 'text-primary' : '' }}" href="{{ route('products.index') }}">Sản phẩm</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('services.*') ? 'text-primary' : '' }}" href="{{ route('services.index') }}">Dịch vụ</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('posts.projects') ? 'text-primary' : '' }}" href="{{ route('posts.projects') }}">Dự án</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('posts.*') && !request()->routeIs('posts.projects') ? 'text-primary' : '' }}" href="{{ route('posts.index') }}">Tin tức</a>
                    <a class="text-sm font-semibold hover:text-primary transition-colors {{ request()->routeIs('contact') ? 'text-primary' : '' }}" href="{{ route('contact') }}">Liên hệ</a>
                @endforelse
                <a class="px-5 py-2.5 bg-primary text-white rounded-full text-sm font-bold hover:bg-orange-600 transition-all shadow-lg shadow-orange-500/20" href="{{ route('contact') }}">Nhận báo giá</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="p-2 cursor-pointer">
                    <span class="material-symbols-outlined">menu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden md:hidden bg-white dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 max-h-[80vh] overflow-y-auto">
        <div class="px-4 py-4 space-y-1">
            @forelse($headerMenus as $menu)
                @if($menu->children->count() > 0)
                <div class="mobile-dropdown">
                    <button class="w-full flex items-center justify-between text-sm font-semibold py-3 hover:text-primary transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.expand-icon').classList.toggle('rotate-180')">
                        {{ $menu->name }}
                        <span class="material-symbols-outlined expand-icon transition-transform">expand_more</span>
                    </button>
                    <div class="hidden pl-4 space-y-1 border-l-2 border-slate-200 dark:border-slate-700 ml-2">
                        @foreach($menu->children as $child)
                            @if($child->children->count() > 0)
                            <div>
                                <button class="w-full flex items-center justify-between text-sm py-2 hover:text-primary transition-colors" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('.expand-icon').classList.toggle('rotate-180')">
                                    {{ $child->name }}
                                    <span class="material-symbols-outlined expand-icon text-sm transition-transform">expand_more</span>
                                </button>
                                <div class="hidden pl-4 space-y-1 border-l-2 border-slate-200 dark:border-slate-700 ml-2">
                                    @foreach($child->children as $subChild)
                                    <a class="block text-sm py-2 hover:text-primary transition-colors text-slate-600 dark:text-slate-400" href="{{ $subChild->getUrl() }}" target="{{ $subChild->target }}">
                                        {{ $subChild->name }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                            @else
                            <a class="block text-sm py-2 hover:text-primary transition-colors text-slate-600 dark:text-slate-400" href="{{ $child->getUrl() }}" target="{{ $child->target }}">
                                {{ $child->name }}
                            </a>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                <a class="block text-sm font-semibold py-3 hover:text-primary transition-colors" href="{{ $menu->getUrl() }}" target="{{ $menu->target }}">{{ $menu->name }}</a>
                @endif
            @empty
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('home') }}">Trang chủ</a>
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('products.index') }}">Sản phẩm</a>
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('services.index') }}">Dịch vụ</a>
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('posts.projects') }}">Dự án</a>
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('posts.index') }}">Tin tức</a>
                <a class="block text-sm font-semibold py-2 hover:text-primary transition-colors" href="{{ route('contact') }}">Liên hệ</a>
            @endforelse
            <a class="block px-5 py-2.5 bg-primary text-white rounded-full text-sm font-bold text-center hover:bg-orange-600 transition-all mt-4" href="{{ route('contact') }}">Nhận báo giá</a>
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.getElementById('mobile-menu-button').addEventListener('click', function() {
        document.getElementById('mobile-menu').classList.toggle('hidden');
    });
</script>
@endpush
