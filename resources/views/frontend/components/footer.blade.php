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
                <p class="text-slate-400 mb-6 leading-relaxed">
                    {{ setting('footer_description', 'Dẫn đầu quá trình chuyển đổi sang năng lượng công nghiệp bền vững thông qua đổi mới và các giải pháp kỹ thuật tin cậy.') }}
                </p>
                @php
                    $hasFooterSocial = setting('social_facebook') || setting('social_youtube') || setting('social_tiktok') || setting('social_instagram') || setting('social_zalo');
                @endphp
                @if($hasFooterSocial)
                <div class="flex items-center gap-3 mb-8">
                    @if(setting('social_facebook'))
                    <a href="{{ setting('social_facebook') }}" target="_blank" title="Facebook" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-slate-400 hover:bg-[#1877F2] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_youtube'))
                    <a href="{{ setting('social_youtube') }}" target="_blank" title="YouTube" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-slate-400 hover:bg-[#FF0000] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_tiktok'))
                    <a href="{{ setting('social_tiktok') }}" target="_blank" title="TikTok" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-slate-400 hover:bg-black hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.03 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.9-.32-1.98-.23-2.81.31-.75.42-1.24 1.25-1.33 2.1-.1.7.1 1.41.54 1.96.44.54 1.13.88 1.84.91.7.03 1.43-.24 1.92-.76.46-.48.69-1.14.68-1.81.01-4.71 0-9.42 0-14.13z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_instagram'))
                    <a href="{{ setting('social_instagram') }}" target="_blank" title="Instagram" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-slate-400 hover:bg-gradient-to-br hover:from-[#833AB4] hover:via-[#E4405F] hover:to-[#FCAF45] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_zalo'))
                    <a href="{{ setting('social_zalo') }}" target="_blank" title="Zalo" class="w-10 h-10 flex items-center justify-center rounded-lg bg-white/10 text-slate-400 hover:bg-[#0068FF] hover:text-white transition-all duration-300">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.779 43.5892C10.1019 43.846 13.0061 43.1836 15.0682 42.1825C24.0225 47.1318 38.0197 46.8954 46.4923 41.4732C46.8209 40.9803 47.1279 40.4677 47.4128 39.9363C49.1062 36.7779 50.0004 33.22 50.0004 27.1316V22.7175C50.0004 16.629 49.1062 13.0711 47.4128 9.91273C45.7385 6.75436 43.2461 4.28093 40.0877 2.58758C36.9293 0.894239 33.3714 0 27.283 0H22.8499C17.6644 0 14.2982 0.652754 11.4699 1.89893C11.3153 2.03737 11.1636 2.17818 11.0151 2.32135C2.71734 10.3203 2.08658 27.6593 9.12279 37.0782C9.13064 37.0921 9.13933 37.1061 9.14889 37.1203C10.2334 38.7185 9.18694 41.5154 7.55068 43.1516C7.28431 43.399 7.37944 43.5512 7.779 43.5892Z" fill="white"/>
                            <path d="M20.5632 17H10.8382V19.0853H17.5869L10.9329 27.3317C10.7244 27.635 10.5728 27.9194 10.5728 28.5639V29.0947H19.748C20.203 29.0947 20.5822 28.7156 20.5822 28.2606V27.1421H13.4922L19.748 19.2938C19.8428 19.1801 20.0134 18.9716 20.0893 18.8768L20.1272 18.8199C20.4874 18.2891 20.5632 17.8341 20.5632 17.2844V17Z" fill="#0068FF"/>
                            <path d="M32.9416 29.0947H34.3255V17H32.2402V28.3933C32.2402 28.7725 32.5435 29.0947 32.9416 29.0947Z" fill="#0068FF"/>
                            <path d="M25.814 19.6924C23.1979 19.6924 21.0747 21.8156 21.0747 24.4317C21.0747 27.0478 23.1979 29.171 25.814 29.171C28.4301 29.171 30.5533 27.0478 30.5533 24.4317C30.5723 21.8156 28.4491 19.6924 25.814 19.6924ZM25.814 27.2184C24.2785 27.2184 23.0273 25.9672 23.0273 24.4317C23.0273 22.8962 24.2785 21.645 25.814 21.645C27.3495 21.645 28.6007 22.8962 28.6007 24.4317C28.6007 25.9672 27.3685 27.2184 25.814 27.2184Z" fill="#0068FF"/>
                            <path d="M40.4867 19.6162C37.8516 19.6162 35.7095 21.7584 35.7095 24.3934C35.7095 27.0285 37.8516 29.1707 40.4867 29.1707C43.1217 29.1707 45.2639 27.0285 45.2639 24.3934C45.2639 21.7584 43.1217 19.6162 40.4867 19.6162ZM40.4867 27.2181C38.9322 27.2181 37.681 25.9669 37.681 24.4124C37.681 22.8579 38.9322 21.6067 40.4867 21.6067C42.0412 21.6067 43.2924 22.8579 43.2924 24.4124C43.2924 25.9669 42.0412 27.2181 40.4867 27.2181Z" fill="#0068FF"/>
                            <path d="M29.4562 29.0944H30.5747V19.957H28.6221V28.2793C28.6221 28.7153 29.0012 29.0944 29.4562 29.0944Z" fill="#0068FF"/>
                        </svg>
                    </a>
                    @endif
                </div>
                @endif
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

                @if(setting('contact_warehouse_address'))
                <div class="flex items-start gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary shrink-0">warehouse</span>
                    <span>{{ setting('contact_warehouse_address') }}</span>
                </div>
                @endif

                @if(setting('contact_phone'))
                <div class="flex items-center gap-3 text-slate-400 mb-4">
                    <span class="material-symbols-outlined text-primary">phone</span>
                    <a href="tel:{{ setting('contact_phone') }}" class="hover:text-white transition-colors">{{ setting('contact_phone') }}</a>
                </div>
                @endif

                @if(setting('contact_email'))
                <div class="flex items-center gap-3 text-slate-400 mb-6">
                    <span class="material-symbols-outlined text-primary">email</span>
                    <a href="mailto:{{ setting('contact_email') }}" class="hover:text-white transition-colors">{{ setting('contact_email') }}</a>
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
