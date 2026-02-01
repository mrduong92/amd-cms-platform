@extends('amd.layouts.app')

@section('title', $page->meta_title_for_seo)
@section('meta_description', $page->meta_description_for_seo)

@section('content')
<!-- Hero -->
<header class="relative py-16 md:py-24 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-black mb-6">{{ $page->title }}</h1>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-[400px] h-[400px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Featured Image -->
@if($page->image)
<section class="py-8">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="aspect-video rounded-3xl overflow-hidden border border-slate-800">
            <img src="{{ asset('storage/' . $page->image) }}" alt="{{ $page->title }}" class="w-full h-full object-cover">
        </div>
    </div>
</section>
@endif

<!-- Content -->
<article class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose prose-invert prose-lg max-w-none prose-headings:font-bold prose-a:text-primary prose-img:rounded-2xl">
            {!! $page->content !!}
        </div>
    </div>
</article>

<!-- CTA Section -->
<section class="py-16">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 p-12 rounded-[3rem] border border-slate-800">
            <h2 class="text-3xl font-bold mb-4">Bạn cần tư vấn thêm?</h2>
            <p class="text-slate-400 mb-8">Liên hệ với chúng tôi ngay để được hỗ trợ.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-accent text-white px-10 py-4 rounded-full font-bold hover:opacity-90 transition-all">
                Liên hệ ngay
            </a>
        </div>
    </div>
</section>
@endsection
