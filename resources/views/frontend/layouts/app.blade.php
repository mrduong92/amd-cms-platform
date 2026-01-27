<!DOCTYPE html>
<html class="scroll-smooth" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', setting('site_name', 'NMT AUTO')) - {{ setting('site_description', 'Giải Pháp Thiết Bị Công Nghiệp & Năng Lượng') }}</title>
    <meta name="description" content="@yield('meta_description', setting('site_description'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', setting('site_name'))">
    <meta property="og:description" content="@yield('meta_description', setting('site_description'))">
    <meta property="og:image" content="@yield('og_image', asset('storage/' . setting('logo')))">
    <meta property="og:type" content="website">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Outfit:wght@500;700;800&display=swap" rel="stylesheet"/>

    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>

    <!-- Favicon -->
    @if(setting('favicon'))
    <link rel="icon" href="{{ asset('storage/' . setting('favicon')) }}" type="image/x-icon">
    @endif

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#F97316",
                        secondary: "#0F172A",
                        "background-light": "#F8FAFC",
                        "background-dark": "#020617",
                    },
                    fontFamily: {
                        display: ["Outfit", "sans-serif"],
                        sans: ["Inter", "sans-serif"],
                    },
                    borderRadius: {
                        DEFAULT: "0.5rem",
                        "xl": "1rem",
                    },
                },
            },
        };
    </script>
    <style type="text/tailwindcss">
        .glass-nav {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }
        .hero-gradient {
            background: linear-gradient(to right, rgba(15, 23, 42, 0.9), rgba(15, 23, 42, 0.4));
        }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .tab-active {
            @apply border-primary text-primary font-bold;
        }
        .tab-inactive {
            @apply border-transparent text-slate-500 hover:text-slate-700 hover:border-slate-300;
        }
        .social-tab-active {
            @apply text-primary border-b-2 border-primary;
        }
        .social-tab-inactive {
            @apply text-slate-500 hover:text-primary transition-colors;
        }
        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
    @stack('styles')
</head>
<body class="font-sans text-slate-900 bg-background-light dark:bg-background-dark dark:text-slate-100 transition-colors duration-300">

    @include('frontend.components.navbar')

    <main>
        @yield('content')
    </main>

    @include('frontend.components.footer')

    <!-- Social Media Widget -->
    @include('frontend.components.social-widget')

    <!-- Dark Mode Toggle -->
    <button class="fixed bottom-8 right-8 w-12 h-12 bg-white dark:bg-slate-800 rounded-full shadow-2xl flex items-center justify-center border border-slate-200 dark:border-slate-700 z-30 hover:scale-110 transition-transform lg:z-[100]" onclick="document.documentElement.classList.toggle('dark')">
        <span class="material-symbols-outlined dark:hidden text-xl">dark_mode</span>
        <span class="material-symbols-outlined hidden dark:block text-xl">light_mode</span>
    </button>

    @stack('scripts')
</body>
</html>
