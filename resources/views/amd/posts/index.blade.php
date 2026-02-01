@extends('amd.layouts.app')

@section('title', 'Tin tức')

@section('content')
<!-- Hero -->
<header class="relative py-16 md:py-24 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="flex items-center gap-2 justify-center mb-4">
            <span class="w-10 h-[1px] bg-accent"></span>
            <span class="text-accent text-sm font-bold tracking-widest uppercase">Blog</span>
            <span class="w-10 h-[1px] bg-accent"></span>
        </div>
        <h1 class="text-4xl md:text-5xl font-black mb-6">TIN TỨC & KIẾN THỨC</h1>
        <p class="text-lg text-slate-400 max-w-2xl mx-auto">
            Cập nhật những xu hướng mới nhất về AI, thiết kế web và marketing số từ đội ngũ AMD.
        </p>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-[400px] h-[400px] bg-accent/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Category Filters -->
@if(isset($categories) && $categories->count() > 0)
<section class="py-8 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('posts.index') }}" class="category-chip {{ !request('category') && !request('type') ? 'active' : '' }}">Tất cả</a>
            @foreach($categories as $category)
                <a href="{{ route('posts.index', ['category' => $category->slug]) }}" class="category-chip {{ request('category') === $category->slug ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Posts Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="group block bg-slate-900/50 border border-slate-800 rounded-2xl overflow-hidden hover:border-accent/50 transition-all duration-300">
                    <div class="aspect-[16/10] overflow-hidden relative">
                        <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/placeholder-project.svg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        @if($post->category)
                            <div class="absolute top-3 left-3">
                                <span class="bg-accent/90 text-white text-[10px] px-3 py-1 rounded-full font-bold uppercase shadow-lg backdrop-blur-md">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-accent transition-colors line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-slate-400 text-sm line-clamp-2">{{ $post->excerpt }}</p>
                        <div class="mt-4 flex items-center gap-2 text-accent text-sm font-semibold">
                            Đọc tiếp
                            <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-3 text-center py-12">
                    <span class="material-symbols-outlined text-6xl text-slate-600 mb-4">article</span>
                    <p class="text-slate-400">Chưa có tin tức nào được đăng tải.</p>
                </div>
            @endforelse
        </div>

        @if($posts->hasPages())
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        @endif
    </div>
</section>
@endsection
