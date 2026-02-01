@extends('amd.layouts.app')

@section('title', $post->title)
@section('meta_description', $post->meta_description_for_seo)

@section('content')
<!-- Hero -->
<header class="relative py-16 md:py-24 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex items-center gap-2 mb-4">
            <a href="{{ route('posts.projects') }}" class="text-slate-400 hover:text-white transition-colors">Dự án</a>
            <span class="text-slate-600">/</span>
            @if($post->category)
                <a href="{{ route('posts.projects', ['category' => $post->category->slug]) }}" class="text-primary">{{ $post->category->name }}</a>
            @endif
        </div>
        <h1 class="text-3xl md:text-5xl font-black mb-6">{{ $post->title }}</h1>
        <p class="text-lg text-slate-400 max-w-3xl">{{ $post->excerpt }}</p>

        <div class="flex items-center gap-6 mt-8 text-sm text-slate-500">
            <span class="flex items-center gap-2">
                <span class="material-symbols-outlined text-lg">calendar_today</span>
                {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
            </span>
            @if($post->category)
                <span class="flex items-center gap-2">
                    <span class="material-symbols-outlined text-lg">category</span>
                    {{ $post->category->name }}
                </span>
            @endif
        </div>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-[400px] h-[400px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Featured Image -->
<section class="py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="aspect-video rounded-3xl overflow-hidden border border-slate-800 relative">
            <img src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/placeholder-project.svg') }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
            <div class="absolute top-4 left-4 z-20 flex gap-2">
                <span class="bg-primary/90 text-white text-[10px] px-3 py-1.5 rounded-full font-bold uppercase flex items-center gap-1.5 shadow-xl backdrop-blur-md">
                    <span class="material-symbols-outlined text-[14px]">auto_awesome</span>
                    AI POWERED
                </span>
                @if($post->category)
                    <span class="bg-accent/90 text-white text-[10px] px-3 py-1.5 rounded-full font-bold uppercase shadow-xl backdrop-blur-md">
                        {{ $post->category->name }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Content -->
<article class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-invert prose-lg max-w-none prose-headings:font-bold prose-a:text-primary prose-img:rounded-2xl">
            {!! $post->content !!}
        </div>
    </div>
</article>

<!-- Related Projects -->
@if($relatedPosts->count() > 0)
<section class="py-16 bg-slate-950/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold mb-12 text-center">Dự án liên quan</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedPosts as $related)
                <a href="{{ route('posts.show', $related->slug) }}" class="group block">
                    <div class="aspect-video rounded-2xl overflow-hidden border border-slate-800 bg-slate-900 group-hover:border-primary/50 transition-all duration-500 mb-4 relative">
                        <img alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ $related->image ? asset('storage/' . $related->image) : asset('images/placeholder-project.svg') }}"/>
                        @if($related->category)
                            <div class="absolute top-3 left-3 z-20">
                                <span class="bg-accent/90 text-white text-[9px] px-2 py-1 rounded-full font-bold uppercase shadow-lg backdrop-blur-md">
                                    {{ $related->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <h3 class="font-bold text-white group-hover:text-primary transition-colors">{{ $related->title }}</h3>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 p-12 rounded-[3rem] border border-slate-800">
            <h2 class="text-3xl font-bold mb-4">Bạn muốn có một dự án tương tự?</h2>
            <p class="text-slate-400 mb-8">Liên hệ với chúng tôi ngay để được tư vấn miễn phí.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-accent text-white px-10 py-4 rounded-full font-bold hover:opacity-90 transition-all">
                Liên hệ tư vấn
            </a>
        </div>
    </div>
</section>
@endsection
