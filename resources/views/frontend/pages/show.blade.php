@extends('frontend.layouts.app')

@section('title', $page->meta_title ?? $page->title)
@section('meta_description', $page->meta_description ?? Str::limit(strip_tags($page->content), 160))

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">{{ $page->title }}</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full"></div>
    </div>
</section>

<!-- Page Content -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="prose dark:prose-invert prose-lg max-w-none">
            {!! $page->content !!}
        </div>
    </div>
</section>
@endsection
