@php
    $footerMenus = \App\Models\Menu::where('location', 'footer')
        ->whereNull('parent_id')
        ->where('is_active', true)
        ->with(['linkable', 'children' => function($q) {
            $q->where('is_active', true)->orderBy('order')->with('linkable');
        }])
        ->orderBy('order')
        ->get();

    $productCategories = \App\Models\Category::where('type', 'product')->active()->ordered()->limit(5)->get();
    $serviceCategories = \App\Models\Category::where('type', 'service')->active()->ordered()->limit(5)->get();
@endphp

<footer class="bg-secondary text-white pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-20">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-1">
                <a href="{{ route('home') }}" class="flex items-center space-x-2 mb-8">
                    @if(setting('site_logo'))
                        <img src="{{ asset('storage/' . setting('site_logo')) }}" alt="{{ setting('site_name') }}" class="h-8">
                    @else
                        <div class="w-8 h-8 bg-primary rounded flex items-center justify-center">
                            <span class="material-symbols-outlined text-white text-sm">bolt</span>
                        </div>
                        <span class="font-display text-xl font-extrabold tracking-tighter uppercase italic">NMT <span class="text-primary not-italic">AUTO</span></span>
                    @endif
                </a>
                <p class="text-slate-400 mb-8 leading-relaxed">
                    {{ setting('footer_description', 'Dẫn đầu quá trình chuyển đổi sang năng lượng công nghiệp bền vững thông qua đổi mới và các giải pháp kỹ thuật tin cậy.') }}
                </p>
            </div>

            <!-- Products Column -->
            <div>
                <h4 class="font-bold text-lg mb-8 border-l-4 border-primary pl-4">Sản phẩm</h4>
                <ul class="space-y-4 text-slate-400">
                    @forelse($productCategories as $cat)
                    <li><a class="hover:text-white transition-colors" href="{{ route('products.category', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @empty
                    <li><a class="hover:text-white transition-colors" href="{{ route('products.index') }}">Tất cả sản phẩm</a></li>
                    @endforelse
                </ul>
            </div>

            <!-- Company Links / Footer Menu -->
            <div>
                <h4 class="font-bold text-lg mb-8 border-l-4 border-primary pl-4">Chính sách</h4>
                <ul class="space-y-4 text-slate-400">
                    @forelse($footerMenus as $menu)
                    <li>
                        <a class="hover:text-white transition-colors" href="{{ $menu->getUrl() }}" target="{{ $menu->target }}">{{ $menu->name }}</a>
                        @if($menu->children->count() > 0)
                        <ul class="mt-2 ml-4 space-y-2">
                            @foreach($menu->children as $child)
                            <li><a class="hover:text-white transition-colors text-sm" href="{{ $child->getUrl() }}" target="{{ $child->target }}">{{ $child->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @empty
                    <li><a class="hover:text-white transition-colors" href="{{ route('services.index') }}">Dịch vụ</a></li>
                    <li><a class="hover:text-white transition-colors" href="{{ route('posts.projects') }}">Dự án tiêu biểu</a></li>
                    <li><a class="hover:text-white transition-colors" href="{{ route('posts.index') }}">Tin tức</a></li>
                    <li><a class="hover:text-white transition-colors" href="{{ route('contact') }}">Liên hệ</a></li>
                    @endforelse
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h4 class="font-bold text-lg mb-8 border-l-4 border-primary pl-4">Liên hệ</h4>

                @if(setting('company_name'))
                <div class="flex items-start gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary shrink-0">business</span>
                    <span class="font-semibold text-white">{{ setting('company_name') }}</span>
                </div>
                @endif

                @if(setting('contact_address'))
                <div class="flex items-start gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary shrink-0">location_on</span>
                    <span>{{ setting('contact_address') }}</span>
                </div>
                @endif

                @if(setting('contact_phone'))
                <div class="flex items-center gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary">phone</span>
                    <a href="tel:{{ setting('contact_phone') }}" class="hover:text-white transition-colors">{{ setting('contact_phone') }}</a>
                </div>
                @endif

                @if(setting('contact_email'))
                <div class="flex items-center gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary">email</span>
                    <a href="mailto:{{ setting('contact_email') }}" class="hover:text-white transition-colors">{{ setting('contact_email') }}</a>
                </div>
                @endif

                @if(setting('tax_id'))
                <div class="flex items-center gap-3 text-slate-400 mb-6">
                    <span class="material-symbols-outlined text-primary">receipt_long</span>
                    <span>MST: {{ setting('tax_id') }}</span>
                </div>
                @endif

@if(setting('fanpage_embed'))
                <h5 class="font-bold mb-4">Fanpage</h5>
                <div class="rounded-lg overflow-hidden">
                    {!! setting('fanpage_embed') !!}
                </div>
                @endif
            </div>
        </div>

        <div class="border-t border-slate-800 pt-12 flex flex-col md:flex-row items-center justify-between gap-6 text-slate-500 text-sm">
            <p>{{ setting('footer_copyright', '© ' . date('Y') . ' NMT AUTO Solutions. Bảo lưu mọi quyền.') }}</p>
            <div class="flex flex-col sm:flex-row sm:space-x-8 gap-2 sm:gap-0">
                @if(setting('contact_phone'))
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">phone</span> {{ setting('contact_phone') }}</span>
                @endif
                @if(setting('contact_email'))
                <span class="flex items-center gap-2"><span class="material-symbols-outlined text-primary text-sm">email</span> {{ setting('contact_email') }}</span>
                @endif
            </div>
        </div>
    </div>
</footer>
