{{-- Floating CTA Buttons (Call + Zalo) --}}
<div class="fixed z-50 flex gap-3 bottom-8 right-8 max-lg:bottom-5 max-lg:right-4">
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

    {{-- Zalo Button --}}
    @if(setting('social_zalo'))
    <a href="{{ setting('social_zalo') }}" target="_blank" class="group relative" title="Chat Zalo">
        <div class="relative w-14 h-14 bg-[#0068FF] text-white rounded-full shadow-lg flex items-center justify-center hover:bg-[#0055DD] hover:scale-110 transition-all duration-300">
            <svg class="w-7 h-7" fill="currentColor" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.779 43.5892C10.1019 43.846 13.0061 43.1836 15.0682 42.1825C24.0225 47.1318 38.0197 46.8954 46.4923 41.4732C46.8209 40.9803 47.1279 40.4677 47.4128 39.9363C49.1062 36.7779 50.0004 33.22 50.0004 27.1316V22.7175C50.0004 16.629 49.1062 13.0711 47.4128 9.91273C45.7385 6.75436 43.2461 4.28093 40.0877 2.58758C36.9293 0.894239 33.3714 0 27.283 0H22.8499C17.6644 0 14.2982 0.652754 11.4699 1.89893C11.3153 2.03737 11.1636 2.17818 11.0151 2.32135C2.71734 10.3203 2.08658 27.6593 9.12279 37.0782C9.13064 37.0921 9.13933 37.1061 9.14889 37.1203C10.2334 38.7185 9.18694 41.5154 7.55068 43.1516C7.28431 43.399 7.37944 43.5512 7.779 43.5892Z" fill="white"/>
                <path d="M20.5632 17H10.8382V19.0853H17.5869L10.9329 27.3317C10.7244 27.635 10.5728 27.9194 10.5728 28.5639V29.0947H19.748C20.203 29.0947 20.5822 28.7156 20.5822 28.2606V27.1421H13.4922L19.748 19.2938C19.8428 19.1801 20.0134 18.9716 20.0893 18.8768L20.1272 18.8199C20.4874 18.2891 20.5632 17.8341 20.5632 17.2844V17Z" fill="#0068FF"/>
                <path d="M32.9416 29.0947H34.3255V17H32.2402V28.3933C32.2402 28.7725 32.5435 29.0947 32.9416 29.0947Z" fill="#0068FF"/>
                <path d="M25.814 19.6924C23.1979 19.6924 21.0747 21.8156 21.0747 24.4317C21.0747 27.0478 23.1979 29.171 25.814 29.171C28.4301 29.171 30.5533 27.0478 30.5533 24.4317C30.5723 21.8156 28.4491 19.6924 25.814 19.6924ZM25.814 27.2184C24.2785 27.2184 23.0273 25.9672 23.0273 24.4317C23.0273 22.8962 24.2785 21.645 25.814 21.645C27.3495 21.645 28.6007 22.8962 28.6007 24.4317C28.6007 25.9672 27.3685 27.2184 25.814 27.2184Z" fill="#0068FF"/>
                <path d="M40.4867 19.6162C37.8516 19.6162 35.7095 21.7584 35.7095 24.3934C35.7095 27.0285 37.8516 29.1707 40.4867 29.1707C43.1217 29.1707 45.2639 27.0285 45.2639 24.3934C45.2639 21.7584 43.1217 19.6162 40.4867 19.6162ZM40.4867 27.2181C38.9322 27.2181 37.681 25.9669 37.681 24.4124C37.681 22.8579 38.9322 21.6067 40.4867 21.6067C42.0412 21.6067 43.2924 22.8579 43.2924 24.4124C43.2924 25.9669 42.0412 27.2181 40.4867 27.2181Z" fill="#0068FF"/>
                <path d="M29.4562 29.0944H30.5747V19.957H28.6221V28.2793C28.6221 28.7153 29.0012 29.0944 29.4562 29.0944Z" fill="#0068FF"/>
            </svg>
        </div>
        <div class="hidden lg:block absolute right-16 top-1/2 -translate-y-1/2 bg-slate-800 text-white text-sm font-medium px-4 py-2 rounded-lg whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity shadow-lg">
            Chat Zalo
            <div class="absolute right-0 top-1/2 -translate-y-1/2 translate-x-1 w-2 h-2 bg-slate-800 rotate-45"></div>
        </div>
    </a>
    @endif
</div>

{{-- Messenger Popup Widget (Facebook Page Plugin – messages tab) --}}
@if(setting('social_messenger') && setting('social_facebook'))
@php
    $fbPageUrl  = rtrim(setting('social_facebook'), '/');
    // Normalise to https://www.facebook.com/... (required by the plugin)
    $fbPageUrl  = preg_replace('#^https?://(www\.)?facebook\.com/#', 'https://www.facebook.com/', $fbPageUrl);
    $pluginSrc  = 'https://www.facebook.com/plugins/page.php?'
                . http_build_query([
                    'href'                  => $fbPageUrl,
                    'tabs'                  => 'messages',
                    'width'                 => '340',
                    'height'                => '460',
                    'small_header'          => 'true',
                    'adapt_container_width' => 'false',
                    'hide_cover'            => 'true',
                    'show_facepile'         => 'false',
                ]);
    $siteName = setting('site_name', 'NMT AUTO');
@endphp

<style>
    /* ── trigger button ───────────────────────────────────────── */
    #msng-btn {
        position: fixed; bottom: 2rem; left: 2rem; z-index: 50;
        width: 56px; height: 56px; border-radius: 9999px;
        border: none; padding: 0; cursor: pointer;
        background: linear-gradient(135deg,#00B2FF 0%,#006AFF 60%,#7B2FFF 100%);
        box-shadow: 0 4px 15px rgba(0,106,255,.45);
        display: flex; align-items: center; justify-content: center;
        transition: transform .2s, box-shadow .2s;
    }
    #msng-btn:hover { transform: scale(1.1); box-shadow: 0 6px 20px rgba(0,106,255,.55); }
    #msng-btn .msng-ping {
        position: absolute; inset: 0; border-radius: 9999px;
        background: rgba(0,106,255,.4);
        animation: msng-ping 1.8s cubic-bezier(0,0,.2,1) infinite;
    }
    @keyframes msng-ping { 75%,100%{ transform:scale(1.8); opacity:0; } }

    /* ── panel ────────────────────────────────────────────────── */
    #msng-panel {
        position: fixed; bottom: 6.5rem; left: 2rem; z-index: 50;
        width: 360px;
        border-radius: 16px;
        box-shadow: 0 8px 40px rgba(0,0,0,.22);
        overflow: hidden;
        transform: scale(.9) translateY(12px);
        transform-origin: bottom left;
        opacity: 0; pointer-events: none;
        transition: transform .22s cubic-bezier(.34,1.56,.64,1), opacity .18s ease;
        background: #fff;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Helvetica, Arial, sans-serif;
    }
    #msng-panel.open { transform: scale(1) translateY(0); opacity: 1; pointer-events: auto; }

    /* ── header ───────────────────────────────────────────────── */
    .msng-head {
        background: linear-gradient(135deg,#006AFF 0%,#7B2FFF 100%);
        color: #fff; padding: 13px 16px;
        display: flex; align-items: center; gap: 10px; position: relative;
    }
    .msng-head-avatar {
        width: 38px; height: 38px; border-radius: 9999px;
        background: rgba(255,255,255,.25);
        display: flex; align-items: center; justify-content: center; flex-shrink: 0;
    }
    .msng-head-name  { font-weight: 700; font-size: .88rem; line-height: 1.2; }
    .msng-head-sub   { font-size: .7rem; opacity: .82; display: flex; align-items: center; gap: 4px; }
    .msng-head-sub::before { content:''; width:6px; height:6px; background:#69ff85; border-radius:50%; display:inline-block; }
    .msng-close {
        position: absolute; top: 9px; right: 11px;
        background: none; border: none; color: #fff; opacity: .75;
        font-size: 1rem; cursor: pointer; line-height: 1; padding: 3px 5px; border-radius: 4px;
    }
    .msng-close:hover { opacity: 1; background: rgba(255,255,255,.15); }

    /* ── plugin iframe wrapper ────────────────────────────────── */
    .msng-plugin {
        display: block; width: 100%; height: 460px;
        border: none; overflow: hidden; background: #fff;
    }

    /* ── responsive ───────────────────────────────────────────── */
    @media (max-width: 1024px) {
        #msng-btn   { bottom: 1.25rem; left: 1rem; }
        #msng-panel { bottom: 5.5rem;  left: 1rem;
                      width: calc(100vw - 2rem); max-width: 360px; }
    }
</style>

{{-- Trigger button --}}
<button id="msng-btn" aria-label="Chat Messenger" onclick="msngToggle()">
    <span class="msng-ping"></span>
    <svg width="28" height="28" viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 2C6.477 2 2 6.145 2 11.243c0 2.906 1.452 5.5 3.733 7.222V21.5l3.405-1.869c.91.252 1.872.386 2.862.386 5.523 0 10-4.145 10-9.243S17.523 2 12 2zm1.043 12.449L10.696 11.8l-4.574 2.65 5.03-5.336 2.348 2.648 4.573-2.648-5.03 5.335z"/>
    </svg>
</button>

{{-- Panel --}}
<div id="msng-panel" role="dialog" aria-label="Chat Facebook Messenger">
    <div class="msng-head">
        <div class="msng-head-avatar">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                <path d="M12 2C6.477 2 2 6.145 2 11.243c0 2.906 1.452 5.5 3.733 7.222V21.5l3.405-1.869c.91.252 1.872.386 2.862.386 5.523 0 10-4.145 10-9.243S17.523 2 12 2zm1.043 12.449L10.696 11.8l-4.574 2.65 5.03-5.336 2.348 2.648 4.573-2.648-5.03 5.335z"/>
            </svg>
        </div>
        <div>
            <div class="msng-head-name">{{ $siteName }}</div>
            <div class="msng-head-sub">Thường trả lời trong vài phút</div>
        </div>
        <button class="msng-close" onclick="msngToggle()" aria-label="Đóng">✕</button>
    </div>

    {{-- Facebook Page Plugin – messages tab, lazy-loaded on first open --}}
    <div id="msng-plugin-wrap" style="height:460px; background:#f0f2f5; display:flex; align-items:center; justify-content:center;">
        <div style="text-align:center; color:#90949c; font-size:.8rem;">
            <svg width="32" height="32" viewBox="0 0 24 24" fill="#c4c8cc" style="display:block;margin:0 auto 8px"><path d="M12 2C6.477 2 2 6.145 2 11.243c0 2.906 1.452 5.5 3.733 7.222V21.5l3.405-1.869c.91.252 1.872.386 2.862.386 5.523 0 10-4.145 10-9.243S17.523 2 12 2zm1.043 12.449L10.696 11.8l-4.574 2.65 5.03-5.336 2.348 2.648 4.573-2.648-5.03 5.335z"/></svg>
            Đang tải...
        </div>
    </div>
</div>

<script>
(function () {
    var panel     = document.getElementById('msng-panel');
    var pluginSrc = {{ Js::from($pluginSrc) }};
    var loaded    = false;
    var isOpen    = false;

    window.msngToggle = function () {
        isOpen = !isOpen;
        panel.classList.toggle('open', isOpen);

        // Lazy-load the iframe on first open
        if (isOpen && !loaded) {
            loaded = true;
            var wrap = document.getElementById('msng-plugin-wrap');
            var iframe = document.createElement('iframe');
            iframe.src = pluginSrc;
            iframe.className = 'msng-plugin';
            iframe.scrolling = 'no';
            iframe.frameBorder = '0';
            iframe.allow = 'autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share';
            iframe.allowFullscreen = true;
            wrap.innerHTML = '';
            wrap.style.cssText = '';
            wrap.appendChild(iframe);
        }
    };

    // Close on outside click
    document.addEventListener('click', function (e) {
        if (!isOpen) return;
        if (!panel.contains(e.target) && !e.target.closest('#msng-btn')) {
            isOpen = false;
            panel.classList.remove('open');
        }
    });
})();
</script>
@endif
