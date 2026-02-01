<footer class="bg-slate-950 border-t border-slate-900 pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-16 mb-20">
            <!-- Brand -->
            <div class="col-span-1 md:col-span-1">
                <div class="flex items-center gap-2 mb-8">
                    <div class="bg-primary p-2 rounded-lg text-white">
                        <span class="material-symbols-outlined text-2xl block">neurology</span>
                    </div>
                    <span class="text-2xl font-bold tracking-tight text-white">{{ setting('site_name', 'AMD AI') }}</span>
                </div>
                <p class="text-sm text-slate-400 leading-relaxed mb-6">
                    {{ setting('footer_about', 'Tiên phong ứng dụng Generative AI vào thiết kế Website SME tại Việt Nam. Xây dựng tương lai số cho mọi doanh nghiệp.') }}
                </p>
                <div class="flex flex-wrap gap-3">
                    @if(setting('social_facebook'))
                    <a class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-[#1877F2] hover:bg-[#1877F2] hover:text-white transition-all border border-slate-800" href="{{ setting('social_facebook') }}" target="_blank" title="Facebook">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_zalo'))
                    <a class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-[#0068FF] hover:bg-[#0068FF] hover:text-white transition-all border border-slate-800" href="{{ setting('social_zalo') }}" target="_blank" title="Zalo">
                        <span class="font-bold text-xs">Zalo</span>
                    </a>
                    @endif
                    @if(setting('social_youtube'))
                    <a class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-[#FF0000] hover:bg-[#FF0000] hover:text-white transition-all border border-slate-800" href="{{ setting('social_youtube') }}" target="_blank" title="YouTube">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                    </a>
                    @endif
                    @if(setting('social_tiktok'))
                    <a class="w-10 h-10 rounded-xl bg-slate-900 flex items-center justify-center text-white hover:bg-black transition-all border border-slate-800" href="{{ setting('social_tiktok') }}" target="_blank" title="TikTok">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.03 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.9-.32-1.98-.23-2.81.31-.75.42-1.24 1.25-1.33 2.1-.1.7.1 1.41.54 1.96.44.54 1.13.88 1.84.91.7.03 1.43-.24 1.92-.76.46-.48.69-1.14.68-1.81.01-4.71 0-9.42 0-14.13z"/></svg>
                    </a>
                    @endif
                </div>
            </div>

            <!-- Services -->
            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Giải pháp AI</h5>
                <ul class="space-y-4 text-sm text-slate-400">
                    <li><a class="hover:text-primary transition-colors" href="#">Thiết kế Custom AI</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Tối ưu hóa SEO AI</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Landing Page Chuyển Đổi</a></li>
                    <li><a class="hover:text-primary transition-colors" href="#">Hệ thống quản trị SME</a></li>
                </ul>
            </div>

            <!-- Info -->
            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Thông tin</h5>
                <ul class="space-y-4 text-sm text-slate-400">
                    @php
                        $footerMenus = \App\Models\Menu::forCurrentSite()->footer()->topLevel()->active()->ordered()->get();
                    @endphp
                    @foreach($footerMenus as $menu)
                        <li><a class="hover:text-primary transition-colors" href="{{ $menu->computed_url }}">{{ $menu->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            <!-- Contact -->
            <div>
                <h5 class="text-white font-bold mb-8 uppercase tracking-widest text-xs">Liên hệ ngay</h5>

                {{-- Hotline CTA --}}
                @if(setting('contact_phone'))
                <a href="tel:{{ setting('contact_phone') }}" class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 text-white px-5 py-3 rounded-xl font-bold transition-all mb-6">
                    <span class="material-symbols-outlined">call</span>
                    <span>{{ setting('contact_phone') }}</span>
                </a>
                @endif

                <ul class="space-y-4 text-sm text-slate-400">
                    @if(setting('contact_address'))
                    <li class="flex items-start gap-3">
                        <span class="material-symbols-outlined text-primary text-sm mt-1">location_on</span>
                        {{ setting('contact_address') }}
                    </li>
                    @endif
                    @if(setting('contact_email'))
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-sm">mail</span>
                        <a href="mailto:{{ setting('contact_email') }}" class="hover:text-primary transition-colors">{{ setting('contact_email') }}</a>
                    </li>
                    @endif
                    @if(setting('contact_hotline') && setting('contact_hotline') !== setting('contact_phone'))
                    <li class="flex items-center gap-3">
                        <span class="material-symbols-outlined text-primary text-sm">support_agent</span>
                        <a href="tel:{{ setting('contact_hotline') }}" class="hover:text-primary transition-colors">Hotline: {{ setting('contact_hotline') }}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>

        <div class="pt-8 border-t border-slate-900 flex flex-col md:flex-row justify-between items-center gap-4 text-xs text-slate-500">
            <p>{{ setting('footer_copyright', '© ' . date('Y') . ' AMD AI SOLUTIONS. All rights reserved.') }}</p>
            <div class="flex flex-wrap justify-center gap-4 md:gap-8">
                @if(setting('social_facebook'))
                    <a class="hover:text-white transition-colors" href="{{ setting('social_facebook') }}" target="_blank">Facebook</a>
                @endif
                @if(setting('social_zalo'))
                    <a class="hover:text-white transition-colors" href="{{ setting('social_zalo') }}" target="_blank">Zalo</a>
                @endif
                @if(setting('social_youtube'))
                    <a class="hover:text-white transition-colors" href="{{ setting('social_youtube') }}" target="_blank">Youtube</a>
                @endif
                @if(setting('social_tiktok'))
                    <a class="hover:text-white transition-colors" href="{{ setting('social_tiktok') }}" target="_blank">TikTok</a>
                @endif
                @if(setting('contact_phone'))
                    <a class="hover:text-green-400 transition-colors flex items-center gap-1" href="tel:{{ setting('contact_phone') }}">
                        <span class="material-symbols-outlined text-xs">call</span>
                        {{ setting('contact_phone') }}
                    </a>
                @endif
            </div>
        </div>
    </div>
</footer>
