@extends('frontend.layouts.app')

@section('title', $product->name)
@section('meta_description', $product->short_description ?? Str::limit(strip_tags($product->description), 160))

@section('content')
<!-- Breadcrumb -->
<section class="pt-24 pb-4 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="{{ route('products.index') }}" class="hover:text-primary">Sản phẩm</a>
            @if($product->category)
            <span class="mx-2">/</span>
            <a href="{{ route('products.category', $product->category->slug) }}" class="hover:text-primary">{{ $product->category->name }}</a>
            @endif
            <span class="mx-2">/</span>
            <span class="text-slate-900 dark:text-white">{{ $product->name }}</span>
        </nav>
    </div>
</section>

<!-- Product Detail -->
<section class="py-12 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Image -->
            <div class="relative">
                <div class="aspect-square bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/600' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
                @if($product->badge)
                <span class="absolute top-6 left-6 bg-primary text-white text-sm font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg">{{ $product->badge }}</span>
                @endif

                <!-- Product Gallery -->
                @if($product->images->count() > 0)
                <div class="mt-4 grid grid-cols-4 gap-4">
                    @foreach($product->images as $image)
                    <div class="aspect-square bg-slate-100 dark:bg-slate-800 rounded-lg overflow-hidden cursor-pointer hover:ring-2 hover:ring-primary">
                        <img src="{{ asset('storage/' . $image->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="font-display text-3xl md:text-4xl font-bold mb-4">{{ $product->name }}</h1>

                @if($product->category)
                <a href="{{ route('products.category', $product->category->slug) }}" class="inline-block bg-slate-100 dark:bg-slate-800 text-sm px-4 py-1 rounded-full mb-6 hover:bg-primary hover:text-white transition-colors">
                    {{ $product->category->name }}
                </a>
                @endif

                <!-- Specs -->
                @if($product->specs->count() > 0)
                <div class="bg-slate-50 dark:bg-slate-800 rounded-xl p-6 mb-8">
                    <h3 class="font-bold text-lg mb-4 flex items-center">
                        <span class="material-symbols-outlined text-primary mr-2">tune</span>
                        Thông số kỹ thuật
                    </h3>
                    <div class="space-y-3">
                        @foreach($product->specs as $spec)
                        <div class="flex justify-between py-2 border-b border-slate-200 dark:border-slate-700 last:border-0">
                            <span class="text-slate-600 dark:text-slate-400">{{ $spec->spec_name }}</span>
                            <span class="font-semibold">{{ $spec->spec_value }}</span>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Description -->
                @if($product->description)
                <div class="prose dark:prose-invert max-w-none mb-8">
                    {!! $product->description !!}
                </div>
                @endif

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">
                        <span class="material-symbols-outlined align-middle mr-2">mail</span>
                        Yêu cầu báo giá
                    </a>
                    <a href="tel:{{ setting('phone') }}" class="px-8 py-4 bg-slate-100 dark:bg-slate-800 font-bold rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-all text-center">
                        <span class="material-symbols-outlined align-middle mr-2">call</span>
                        {{ setting('phone', 'Liên hệ ngay') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
@if($relatedProducts->count() > 0)
<section class="py-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-2xl font-bold mb-8">Sản phẩm liên quan</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @foreach($relatedProducts as $related)
            <a href="{{ route('products.show', $related->slug) }}" class="group border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col h-full bg-white dark:bg-slate-800/50">
                <div class="relative aspect-[4/3] bg-slate-50 dark:bg-slate-900 overflow-hidden">
                    <img alt="{{ $related->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ $related->image ? asset('storage/' . $related->image) : 'https://via.placeholder.com/400x300' }}"/>
                </div>
                <div class="p-6">
                    <h3 class="font-bold text-lg leading-tight text-secondary dark:text-white group-hover:text-primary transition-colors">{{ $related->name }}</h3>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
