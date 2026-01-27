@extends('frontend.layouts.app')

@section('title', 'Tin tức')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">Tin tức & Bài viết</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl">Cập nhật những thông tin mới nhất về công nghệ và giải pháp năng lượng.</p>
    </div>
</section>

<!-- Posts Grid -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Filter -->
        <div class="flex flex-wrap gap-4 mb-12">
            <a href="{{ route('posts.index') }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ !request('type') ? 'bg-primary text-white' : 'bg-slate-100 dark:bg-slate-800 hover:bg-slate-200' }}">
                Tất cả
            </a>
            <a href="{{ route('posts.index', ['type' => 'news']) }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ request('type') === 'news' ? 'bg-primary text-white' : 'bg-slate-100 dark:bg-slate-800 hover:bg-slate-200' }}">
                Tin tức
            </a>
            <a href="{{ route('posts.index', ['type' => 'project']) }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ request('type') === 'project' ? 'bg-primary text-white' : 'bg-slate-100 dark:bg-slate-800 hover:bg-slate-200' }}">
                Dự án
            </a>
            <a href="{{ route('posts.index', ['type' => 'success_story']) }}" class="px-4 py-2 rounded-full text-sm font-semibold {{ request('type') === 'success_story' ? 'bg-primary text-white' : 'bg-slate-100 dark:bg-slate-800 hover:bg-slate-200' }}">
                Câu chuyện thành công
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white dark:bg-slate-800 rounded-2xl overflow-hidden hover:shadow-2xl transition-all duration-300 border border-slate-100 dark:border-slate-700">
                <div class="relative aspect-video bg-slate-100 dark:bg-slate-900 overflow-hidden">
                    <img src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/600x400' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                    <span class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase">
                        {{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện' : 'Tin tức') }}
                    </span>
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-4 text-sm text-slate-500 mb-3">
                        <span class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-sm">calendar_today</span>
                            {{ $post->published_at ? $post->published_at->format('d/m/Y') : $post->created_at->format('d/m/Y') }}
                        </span>
                        @if($post->category)
                        <span>{{ $post->category->name }}</span>
                        @endif
                    </div>
                    <h3 class="font-bold text-lg mb-3 group-hover:text-primary transition-colors line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 line-clamp-2">{{ $post->excerpt }}</p>
                </div>
            </a>
            @empty
            <div class="col-span-3 text-center py-12">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">article</span>
                <p class="text-slate-500">Chưa có bài viết nào.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
