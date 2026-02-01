<nav class="sticky top-0 z-50 glass-nav border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="bg-gradient-to-br from-primary to-accent p-2 rounded-xl text-white shadow-lg">
                    <span class="material-symbols-outlined text-2xl block">neurology</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-xl font-bold tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-white to-slate-400">{{ setting('site_name', 'AMD AI SOLUTIONS') }}</span>
                    <span class="text-[10px] uppercase tracking-widest text-primary font-bold">{{ setting('site_tagline', 'Webco.io.vn') }}</span>
                </div>
            </a>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-10 text-sm font-medium">
                @php
                    $headerMenus = \App\Models\Menu::forCurrentSite()->header()->topLevel()->active()->ordered()->with('activeChildren')->get();
                @endphp
                @foreach($headerMenus as $menu)
                    <a class="text-slate-300 hover:text-white transition-colors {{ request()->is(trim($menu->computed_url, '/')) ? 'text-white border-b border-primary' : '' }}" href="{{ $menu->computed_url }}">
                        {{ $menu->name }}
                    </a>
                @endforeach
            </div>

            <div class="flex items-center gap-4">
                <a class="bg-gradient-to-r from-primary to-accent hover:opacity-90 text-white px-6 py-2.5 rounded-full text-sm font-bold transition-all glow-blue" href="{{ route('contact') }}">
                    {{ setting('cta_button_text', 'Tư vấn Web AI') }}
                </a>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-white" x-data x-on:click="$dispatch('toggle-mobile-menu')">
                    <span class="material-symbols-outlined text-2xl">menu</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-data="{ open: false }" x-on:toggle-mobile-menu.window="open = !open" x-show="open" x-cloak class="md:hidden border-t border-slate-800">
        <div class="px-4 py-6 space-y-4">
            @foreach($headerMenus ?? [] as $menu)
                <a class="block text-slate-300 hover:text-white transition-colors py-2" href="{{ $menu->computed_url }}">
                    {{ $menu->name }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
