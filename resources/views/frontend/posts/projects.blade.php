@extends('frontend.layouts.app')

@section('title', 'Dự án')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">Dự án tiêu biểu</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl">Những dự án nổi bật chúng tôi đã thực hiện cho các khách hàng.</p>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            @forelse($posts as $post)
            <a href="{{ route('posts.show', $post->slug) }}" class="group relative overflow-hidden rounded-2xl h-80">
                <img alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://via.placeholder.com/800x600' }}"/>
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent flex flex-col justify-end p-8">
                    <span class="text-primary font-bold text-sm mb-2 uppercase">Dự án</span>
                    <h3 class="text-white text-2xl font-bold mb-2">{{ $post->title }}</h3>
                    <p class="text-slate-300 line-clamp-2">{{ $post->excerpt }}</p>
                </div>
            </a>
            @empty
            <div class="col-span-2 text-center py-12">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">engineering</span>
                <p class="text-slate-500">Chưa có dự án nào.</p>
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
