<!DOCTYPE html>
<html class="dark scroll-smooth" lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>@yield('title', setting('site_name', 'AMD AI Solutions')) - {{ setting('site_description', 'Giải pháp AI thông minh') }}</title>
    <meta name="description" content="@yield('meta_description', setting('site_description'))">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', setting('site_name'))">
    <meta property="og:description" content="@yield('meta_description', setting('site_description'))">
    <meta property="og:image" content="@yield('og_image', setting('site_logo') ? asset('storage/' . setting('site_logo')) : '')">
    <meta property="og:type" content="website">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,container-queries"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>[x-cloak] { display: none !important; }</style>

    <!-- Favicon -->
    @if(setting('site_favicon'))
    <link rel="icon" href="{{ asset('storage/' . setting('site_favicon')) }}" type="image/x-icon">
    @endif

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#3b82f6",
                        accent: "#a855f7",
                        "background-dark": "#030712",
                        "card-dark": "#111827",
                    },
                    fontFamily: {
                        display: ["Inter", "sans-serif"],
                    },
                    typography: {
                        invert: {
                            css: {
                                '--tw-prose-body': '#cbd5e1',
                                '--tw-prose-headings': '#f1f5f9',
                                '--tw-prose-links': '#3b82f6',
                                '--tw-prose-bold': '#f1f5f9',
                                '--tw-prose-counters': '#94a3b8',
                                '--tw-prose-bullets': '#64748b',
                                '--tw-prose-hr': '#334155',
                                '--tw-prose-quotes': '#e2e8f0',
                                '--tw-prose-quote-borders': '#3b82f6',
                                '--tw-prose-captions': '#94a3b8',
                                '--tw-prose-code': '#f1f5f9',
                                '--tw-prose-pre-code': '#e2e8f0',
                                '--tw-prose-pre-bg': '#1e293b',
                                '--tw-prose-th-borders': '#475569',
                                '--tw-prose-td-borders': '#334155',
                            },
                        },
                    },
                },
            },
        };
    </script>
    <style type="text/tailwindcss">
        @layer base {
            body { @apply bg-background-dark text-slate-100 font-display selection:bg-primary/30; }
        }
        .glow-blue { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
        .glow-purple { box-shadow: 0 0 20px rgba(168, 85, 247, 0.3); }
        .glass-nav {
            backdrop-filter: blur(12px);
            background-color: rgba(3, 7, 18, 0.8);
        }
        .gradient-text {
            @apply bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500;
        }
        .mockup-container {
            position: relative;
            perspective: 1000px;
        }
        .desktop-view {
            transition: transform 0.5s ease;
        }
        .mobile-view {
            position: absolute;
            bottom: -10px;
            right: 10px;
            width: 30%;
            height: 70%;
            border: 4px solid #1f2937;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            z-index: 10;
        }
        .category-chip {
            @apply px-4 py-1.5 rounded-full text-xs font-semibold border border-slate-700 hover:border-primary hover:text-primary transition-all cursor-pointer whitespace-nowrap;
        }
        .category-chip.active {
            @apply bg-primary/10 border-primary text-primary;
        }
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        /* Enhanced prose styling for dark theme */
        .prose h2 { @apply text-2xl md:text-3xl mt-12 mb-6 text-slate-100; }
        .prose h3 { @apply text-xl md:text-2xl mt-8 mb-4 text-slate-200; }
        .prose p { @apply mb-6 leading-relaxed text-slate-300; }
        .prose ul, .prose ol { @apply my-6 pl-6 space-y-2; }
        .prose li { @apply text-slate-300; }
        .prose li::marker { @apply text-primary; }
        .prose strong { @apply text-slate-100 font-semibold; }
        .prose blockquote {
            @apply border-l-4 border-primary pl-6 my-8 italic text-slate-400 bg-slate-900/50 py-4 pr-4 rounded-r-lg;
        }
        .prose a { @apply text-primary hover:text-blue-400 underline underline-offset-2; }
        .prose code { @apply bg-slate-800 px-2 py-0.5 rounded text-sm text-slate-200; }
        .prose pre { @apply bg-slate-900 p-4 rounded-xl overflow-x-auto my-6; }
        .prose pre code { @apply bg-transparent p-0; }
        .prose img { @apply rounded-2xl my-8; }
        .prose hr { @apply border-slate-700 my-12; }
        .prose table { @apply w-full my-6; }
        .prose th { @apply bg-slate-800 text-left p-3 font-semibold; }
        .prose td { @apply border-t border-slate-700 p-3; }
    </style>
    @stack('styles')
</head>
<body class="bg-background-dark">

    @include('amd.partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('amd.partials.footer')

    @include('amd.partials.social-widget')

    @stack('scripts')
</body>
</html>
