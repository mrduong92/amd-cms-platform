{{-- Floating CTA Buttons (Call + Zalo) --}}
<div class="fixed z-50 flex gap-3" style="right: 8rem; bottom: 3rem;">
    {{-- Call Button --}}
    @if(setting('contact_phone') || setting('contact_hotline'))
    <a href="tel:{{ setting('contact_hotline') ?: setting('contact_phone') }}" class="group relative" title="Gọi ngay: {{ setting('contact_hotline') ?: setting('contact_phone') }}">
        <div class="relative">
            <span class="absolute inset-0 rounded-full bg-green-500 animate-ping opacity-75"></span>
            <div class="relative w-14 h-14 bg-green-500 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-green-600 hover:scale-110 transition-all duration-300">
                <span class="material-symbols-outlined text-2xl">call</span>
            </div>
        </div>
        <div class="hidden lg:block absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 text-white text-sm font-medium px-4 py-2 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
            {{ setting('contact_hotline') ?: setting('contact_phone') }}
            <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 w-2 h-2 bg-slate-800 rotate-45"></div>
        </div>
    </a>
    @endif

    {{-- Zalo Button (simple link, shown when widget is off) --}}
    @if(setting('social_zalo_oa_id') && !config('common.zalo_widget'))
    <a href="{{ setting('social_zalo_oa_id') }}" target="_blank" rel="noopener" class="group relative" title="Chat Zalo">
        <div class="relative">
            <span class="absolute inset-0 rounded-full bg-blue-500 animate-ping opacity-75"></span>
            <div class="relative w-14 h-14 bg-blue-500 text-white rounded-full shadow-lg flex items-center justify-center hover:bg-blue-600 hover:scale-110 transition-all duration-300">
                <img src="{{ asset('images/zalo-icon.png') }}" alt="Zalo" class="w-8 h-8" onerror="this.style.display='none';this.nextElementSibling.style.display='flex'">
                <span class="text-white font-bold text-sm" style="display:none">Zalo</span>
            </div>
        </div>
    </a>
    @endif
</div>

{{-- Zalo OA Chat Widget (shown when widget is on) --}}
@if(setting('social_zalo_oa_id') && config('common.zalo_widget'))
<div class="zalo-chat-widget" data-oaid="{{ setting('social_zalo_oa_id') }}" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height=""></div>
<script src="https://sp.zalo.me/plugins/sdk.js"></script>
@endif
