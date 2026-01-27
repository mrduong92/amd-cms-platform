@extends('frontend.layouts.app')

@section('title', $post->title)
@section('meta_description', $post->excerpt ?? Str::limit(strip_tags($post->content), 160))
@section('og_image', $post->image ? asset('storage/' . $post->image) : '')

@section('content')
<!-- Breadcrumb -->
<section class="pt-24 pb-4 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="{{ route('posts.index') }}" class="hover:text-primary">Tin tức</a>
            <span class="mx-2">/</span>
            <span class="text-slate-900 dark:text-white line-clamp-1">{{ $post->title }}</span>
        </nav>
    </div>
</section>

<!-- Post Detail -->
<section class="py-12 bg-white dark:bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <span class="inline-block bg-primary text-white text-xs font-bold px-4 py-1 rounded-full uppercase mb-4">
                {{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện thành công' : 'Tin tức') }}
            </span>
            <h1 class="font-display text-3xl md:text-4xl font-bold mb-4">{{ $post->title }}</h1>
            <div class="flex flex-wrap items-center gap-4 text-sm text-slate-500">
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">calendar_today</span>
                    {{ $post->published_at ? $post->published_at->format('d/m/Y') : $post->created_at->format('d/m/Y') }}
                </span>
                @if($post->author)
                <span class="flex items-center gap-1">
                    <span class="material-symbols-outlined text-sm">person</span>
                    {{ $post->author->name }}
                </span>
                @endif
                @if($post->category)
                <a href="{{ route('posts.index', ['category' => $post->category->slug]) }}" class="flex items-center gap-1 hover:text-primary">
                    <span class="material-symbols-outlined text-sm">folder</span>
                    {{ $post->category->name }}
                </a>
                @endif
            </div>
        </div>

        <!-- Featured Image -->
        @if($post->image)
        <div class="aspect-video bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden mb-8">
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
        </div>
        @endif

        <!-- Excerpt -->
        @if($post->excerpt)
        <div class="text-xl text-slate-600 dark:text-slate-400 mb-8 leading-relaxed border-l-4 border-primary pl-6">
            {{ $post->excerpt }}
        </div>
        @endif

        <!-- Content -->
        <div class="prose dark:prose-invert prose-lg max-w-none mb-12">
            {!! $post->content !!}
        </div>

        <!-- Share -->
        <div class="border-t border-slate-200 dark:border-slate-800 pt-8">
            <h4 class="font-bold mb-4">Chia sẻ bài viết:</h4>
            <div class="flex gap-3">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($post->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="py-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-2xl font-bold mb-8">Bài viết liên quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
            <a href="{{ route('posts.show', $related->slug) }}" class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                <div class="aspect-video bg-slate-100 dark:bg-slate-900 overflow-hidden">
                    <img src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg group-hover:text-primary transition-colors line-clamp-2">{{ $related->title }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
