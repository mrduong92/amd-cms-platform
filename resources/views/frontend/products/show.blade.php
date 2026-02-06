@extends('frontend.layouts.app')

@section('title', $product->meta_title ?: $product->name)
@section('meta_description', $product->meta_description ?: ($product->short_description ?? Str::limit(strip_tags($product->description), 160)))

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
            <div class="relative" x-data="productGallery()">
                <!-- Main Image -->
                <div class="aspect-square bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden cursor-zoom-in group"
                     @click="openLightbox(currentImage)">
                    <img :src="currentImage" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/10 transition-colors flex items-center justify-center">
                        <span class="material-symbols-outlined text-white text-4xl opacity-0 group-hover:opacity-100 transition-opacity drop-shadow-lg">zoom_in</span>
                    </div>
                </div>
                @if($product->badge)
                <span class="absolute top-6 left-6 bg-primary text-white text-sm font-bold px-4 py-2 rounded-full uppercase tracking-wider shadow-lg z-10">{{ $product->badge }}</span>
                @endif

                <!-- Product Gallery Thumbnails -->
                @php
                    $allImages = collect();
                    if($product->image) {
                        $allImages->push(asset('storage/' . $product->image));
                    }
                    foreach($product->images as $img) {
                        $allImages->push(asset('storage/' . $img->image));
                    }
                @endphp

                @if($allImages->count() > 1)
                <div class="mt-4 grid grid-cols-5 gap-3">
                    @foreach($allImages as $index => $imgUrl)
                    <div class="aspect-square bg-slate-100 dark:bg-slate-800 rounded-lg overflow-hidden cursor-pointer transition-all duration-200"
                         :class="currentImage === '{{ $imgUrl }}' ? 'ring-2 ring-primary ring-offset-2' : 'hover:ring-2 hover:ring-slate-300'"
                         @click="setImage('{{ $imgUrl }}')">
                        <img src="{{ $imgUrl }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
                @endif

                <!-- Lightbox Modal -->
                <div x-show="lightboxOpen" x-cloak
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @keydown.escape.window="closeLightbox()"
                     class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/90">

                    <!-- Close Button -->
                    <button @click="closeLightbox()" class="absolute top-4 right-4 text-white hover:text-primary transition-colors z-10">
                        <span class="material-symbols-outlined text-4xl">close</span>
                    </button>

                    <!-- Navigation Arrows -->
                    @if($allImages->count() > 1)
                    <button @click="prevImage()" class="absolute left-4 text-white hover:text-primary transition-colors z-10">
                        <span class="material-symbols-outlined text-5xl">chevron_left</span>
                    </button>
                    <button @click="nextImage()" class="absolute right-4 text-white hover:text-primary transition-colors z-10">
                        <span class="material-symbols-outlined text-5xl">chevron_right</span>
                    </button>
                    @endif

                    <!-- Lightbox Image -->
                    <div class="max-w-5xl max-h-[90vh] relative" @click.stop>
                        <img :src="lightboxImage"
                             alt="{{ $product->name }}"
                             class="max-w-full max-h-[90vh] object-contain rounded-lg shadow-2xl"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100">
                    </div>

                    <!-- Thumbnail Strip -->
                    @if($allImages->count() > 1)
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 bg-black/50 p-2 rounded-lg">
                        @foreach($allImages as $index => $imgUrl)
                        <div class="w-16 h-16 rounded overflow-hidden cursor-pointer transition-all"
                             :class="lightboxImage === '{{ $imgUrl }}' ? 'ring-2 ring-primary' : 'opacity-60 hover:opacity-100'"
                             @click="setLightboxImage('{{ $imgUrl }}')">
                            <img src="{{ $imgUrl }}" alt="" class="w-full h-full object-cover">
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <script>
                    function productGallery() {
                        const images = @json($allImages);
                        return {
                            images: images,
                            currentImage: images[0] || '{{ $product->image ? asset("storage/" . $product->image) : "https://via.placeholder.com/600" }}',
                            lightboxOpen: false,
                            lightboxImage: '',

                            setImage(src) {
                                this.currentImage = src;
                            },

                            openLightbox(src) {
                                this.lightboxImage = src;
                                this.lightboxOpen = true;
                                document.body.style.overflow = 'hidden';
                            },

                            closeLightbox() {
                                this.lightboxOpen = false;
                                document.body.style.overflow = '';
                            },

                            setLightboxImage(src) {
                                this.lightboxImage = src;
                                this.currentImage = src;
                            },

                            getCurrentIndex() {
                                return this.images.indexOf(this.lightboxImage);
                            },

                            prevImage() {
                                const index = this.getCurrentIndex();
                                const newIndex = index > 0 ? index - 1 : this.images.length - 1;
                                this.setLightboxImage(this.images[newIndex]);
                            },

                            nextImage() {
                                const index = this.getCurrentIndex();
                                const newIndex = index < this.images.length - 1 ? index + 1 : 0;
                                this.setLightboxImage(this.images[newIndex]);
                            }
                        }
                    }
                </script>
            </div>

            <!-- Product Info -->
            <div>
                <h1 class="font-display text-3xl md:text-4xl font-bold mb-2">{{ $product->name }}</h1>

                @if($product->sku)
                <p class="text-slate-500 dark:text-slate-400 text-sm mb-4">SKU: {{ $product->sku }}</p>
                @endif

                @if($product->category)
                <a href="{{ route('products.category', $product->category->slug) }}" class="inline-block bg-slate-100 dark:bg-slate-800 text-sm px-4 py-1 rounded-full mb-4 hover:bg-primary hover:text-white transition-colors">
                    {{ $product->category->name }}
                </a>
                @endif

                @if($product->tags->count() > 0)
                <div class="flex flex-wrap gap-2 mb-6">
                    @foreach($product->tags as $tag)
                    <span class="inline-block bg-primary/10 text-primary text-xs font-semibold px-3 py-1 rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </div>
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

                <!-- CTA -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="{{ route('contact') }}" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">
                        <span class="material-symbols-outlined align-middle mr-2">mail</span>
                        Yêu cầu báo giá
                    </a>
                    <a href="tel:{{ setting('contact_phone') }}" class="px-8 py-4 bg-slate-100 dark:bg-slate-800 font-bold rounded-lg hover:bg-slate-200 dark:hover:bg-slate-700 transition-all text-center">
                        <span class="material-symbols-outlined align-middle mr-2">call</span>
                        {{ setting('contact_phone', 'Liên hệ ngay') }}
                    </a>
                </div>
            </div>
        </div>

        <!-- Description (full width) -->
        @if($product->description)
        <div class="mt-12 border-t border-slate-200 dark:border-slate-700 pt-10">
            <h2 class="font-display text-2xl font-bold mb-6 flex items-center">
                <span class="material-symbols-outlined text-primary mr-2">description</span>
                Mô tả chi tiết
            </h2>
            <div class="prose dark:prose-invert max-w-none">
                {!! $product->description !!}
            </div>
        </div>
        @endif
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
