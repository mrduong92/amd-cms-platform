@extends('frontend.layouts.app')

@section('title', 'Trang chủ')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .hero-swiper {
        aspect-ratio: 1066/393;
        max-height: 500px;
    }
    @media (max-width: 1024px) {
        .hero-swiper {
            aspect-ratio: 1066/450;
            max-height: 400px;
        }
    }
    @media (max-width: 768px) {
        .hero-swiper {
            aspect-ratio: auto;
            height: 50vh;
            min-height: 320px;
            max-height: 400px;
        }
    }
    .hero-swiper .swiper-slide {
        position: relative;
    }
    .hero-swiper .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        background: rgba(255, 255, 255, 0.5);
        opacity: 1;
    }
    .hero-swiper .swiper-pagination-bullet-active {
        background: #F97316;
    }
    .hero-swiper .swiper-button-next,
    .hero-swiper .swiper-button-prev {
        color: #fff;
        background: rgba(0, 0, 0, 0.3);
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }
    .hero-swiper .swiper-button-next:after,
    .hero-swiper .swiper-button-prev:after {
        font-size: 20px;
    }
    .hero-swiper .swiper-button-next:hover,
    .hero-swiper .swiper-button-prev:hover {
        background: #F97316;
    }
    .product-grid {
        display: none;
    }
    .product-grid.active {
        display: grid;
    }
</style>
@endpush

@section('content')
<!-- Hero Section with Swiper Carousel -->
<section class="relative pt-20">
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            @forelse($sliders as $slider)
            <div class="swiper-slide">
                <div class="absolute inset-0">
                    <img alt="{{ $slider->title }}" class="w-full h-full object-cover" src="{{ $slider->image ? asset('storage/' . $slider->image) : 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=1920' }}"/>
                    <div class="absolute inset-0 hero-gradient"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-2xl">
                            @if($slider->subtitle)
                            <span class="inline-block py-1 px-3 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-6">{{ $slider->subtitle }}</span>
                            @endif
                            <h1 class="font-display text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                                {!! nl2br(e($slider->title)) !!}
                            </h1>
                            @if($slider->description)
                            <p class="text-base text-slate-300 mb-8 leading-relaxed">{{ $slider->description }}</p>
                            @endif
                            <div class="flex flex-col sm:flex-row gap-4">
                                @if($slider->button_text && $slider->button_url)
                                <a href="{{ $slider->button_url }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">{{ $slider->button_text }}</a>
                                @else
                                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">Khám phá sản phẩm</a>
                                @endif
                                <a href="{{ route('posts.projects') }}" class="px-6 py-3 bg-white/10 backdrop-blur-md text-white border border-white/20 font-bold rounded-lg hover:bg-white/20 transition-all text-center">Xem dự án của chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Default slide when no sliders -->
            <div class="swiper-slide">
                <div class="absolute inset-0">
                    <img alt="NMT AUTO" class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=1920"/>
                    <div class="absolute inset-0 hero-gradient"></div>
                </div>
                <div class="relative h-full flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-2xl">
                            <span class="inline-block py-1 px-3 rounded-full bg-primary/20 text-primary text-xs font-bold tracking-widest uppercase mb-6">{{ setting('site_name', 'NMT AUTO') }}</span>
                            <h1 class="font-display text-3xl md:text-5xl font-extrabold text-white leading-tight mb-6">
                                Giải pháp <br/><span class="text-primary">công nghiệp</span> toàn diện
                            </h1>
                            <p class="text-base text-slate-300 mb-8 leading-relaxed">
                                {{ setting('site_description', 'Cung cấp các giải pháp pin Lithium, camera AI, hệ thống lưu trữ năng lượng và dịch vụ xe nâng chuyên nghiệp.') }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">Khám phá sản phẩm</a>
                                <a href="{{ route('contact') }}" class="px-6 py-3 bg-white/10 backdrop-blur-md text-white border border-white/20 font-bold rounded-lg hover:bg-white/20 transition-all text-center">Liên hệ tư vấn</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Navigation buttons -->
        @if($sliders->count() > 1)
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        @endif
    </div>
</section>

<!-- About/Core Values Section -->
<section class="py-24 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center gap-16">
            <div class="lg:w-1/2">
                @if($aboutPage && $aboutPage->image)
                <img alt="{{ $aboutPage->title ?? 'Về chúng tôi' }}" class="rounded-2xl shadow-2xl w-full" src="{{ asset('storage/' . $aboutPage->image) }}"/>
                @elseif(setting('about_image'))
                <img alt="Về chúng tôi" class="rounded-2xl shadow-2xl w-full" src="{{ asset('storage/' . setting('about_image')) }}"/>
                @else
                <img alt="Đội ngũ kỹ thuật" class="rounded-2xl shadow-2xl w-full" src="https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=800"/>
                @endif
            </div>
            <div class="lg:w-1/2">
                <span class="text-primary font-bold uppercase tracking-widest text-sm mb-4 block">{{ setting('about_subtitle', 'Giá trị cốt lõi') }}</span>
                <h2 class="font-display text-4xl font-extrabold mb-8 leading-tight">
                    @if($aboutPage)
                        {{ $aboutPage->title }}
                    @else
                        {{ setting('about_title', 'Thiết lập tiêu chuẩn vàng trong Dịch vụ Công nghiệp') }}
                    @endif
                </h2>

                @if($aboutPage && $aboutPage->content)
                <div class="prose dark:prose-invert max-w-none prose-h4:mt-0 prose-h4:mb-1">
                    {!! $aboutPage->content !!}
                </div>
                @else
                <div class="space-y-8">
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-md">
                            <span class="material-symbols-outlined text-primary">{{ setting('value1_icon', 'verified') }}</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">{{ setting('value1_title', 'Chuyên môn kỹ thuật vượt trội') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400">{{ setting('value1_description', 'Các kỹ sư của chúng tôi được đào tạo chính quy với nhiều năm kinh nghiệm trong hệ thống năng lượng.') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-md">
                            <span class="material-symbols-outlined text-primary">{{ setting('value2_icon', 'support_agent') }}</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">{{ setting('value2_title', 'Hỗ trợ 24/7') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400">{{ setting('value2_description', 'Hạ tầng quan trọng không bao giờ nghỉ. Chúng tôi cũng vậy. Hỗ trợ luôn sẵn sàng khi bạn cần.') }}</p>
                        </div>
                    </div>
                    <div class="flex gap-6">
                        <div class="shrink-0 w-12 h-12 bg-white dark:bg-slate-800 rounded-full flex items-center justify-center shadow-md">
                            <span class="material-symbols-outlined text-primary">{{ setting('value3_icon', 'high_quality') }}</span>
                        </div>
                        <div>
                            <h4 class="font-bold text-xl mb-1">{{ setting('value3_title', 'Đảm bảo chất lượng cao cấp') }}</h4>
                            <p class="text-slate-600 dark:text-slate-400">{{ setting('value3_description', 'Mọi linh kiện và dịch vụ đều đáp ứng các tiêu chuẩn an toàn và chất lượng quốc tế khắt khe.') }}</p>
                        </div>
                    </div>
                </div>
                @endif

                <div class="mt-8">
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all">
                        Liên hệ tư vấn <span class="material-symbols-outlined ml-2">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
@if($productCategories->count() > 0 || $featuredProducts->count() > 0)
<section class="py-24 bg-white dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-12">
            <div>
                <h2 class="font-display text-4xl font-bold mb-2">{{ setting('home_products_title', 'Danh mục sản phẩm') }}</h2>
                <div class="w-20 h-1.5 bg-primary rounded-full"></div>
            </div>
            <a class="flex items-center text-primary font-bold hover:gap-2 transition-all" href="{{ route('products.index') }}">
                Xem thêm <span class="material-symbols-outlined ml-1">arrow_forward</span>
            </a>
        </div>

        @if($productCategories->count() > 0)
        <div class="border-b border-slate-200 dark:border-slate-800 mb-12">
            <nav class="flex space-x-8 overflow-x-auto pb-px hide-scrollbar">
                <button class="tab-active whitespace-nowrap py-4 px-1 border-b-2 text-xs font-bold uppercase category-tab" data-category="all">Tất cả</button>
                @foreach($productCategories as $category)
                <button class="tab-inactive whitespace-nowrap py-4 px-1 border-b-2 text-xs font-bold uppercase category-tab" data-category="{{ $category->id }}">{{ $category->name }}</button>
                @endforeach
            </nav>
        </div>
        @endif

        <!-- All Products Grid -->
        <div class="product-grid active grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" data-category="all">
            @forelse($featuredProducts as $product)
            <a href="{{ route('products.show', $product->slug) }}" class="group border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col h-full bg-white dark:bg-slate-800/50">
                <div class="relative aspect-[4/3] bg-slate-50 dark:bg-slate-900 overflow-hidden">
                    <img alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-80 group-hover:opacity-100" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=400' }}"/>
                    @if($product->badge)
                    <span class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-lg">{{ $product->badge }}</span>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg leading-tight mb-4 text-secondary dark:text-white group-hover:text-primary transition-colors">{{ $product->name }}</h3>
                    @if($product->specs->count() > 0)
                    <div class="mt-auto py-4 border-t border-slate-100 dark:border-slate-800">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Thông số kỹ thuật</p>
                        <div class="space-y-2">
                            @foreach($product->specs->take(2) as $spec)
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500 dark:text-slate-400">{{ $spec->spec_name }}</span>
                                <span class="font-semibold text-secondary dark:text-white">{{ $spec->spec_value }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <div class="col-span-4 text-center py-12">
                <span class="material-symbols-outlined text-6xl text-slate-300">inventory_2</span>
                <p class="text-slate-500 mt-4">Chưa có sản phẩm nào.</p>
            </div>
            @endforelse
        </div>

        <!-- Category Products Grids -->
        @foreach($productCategories as $category)
        <div class="product-grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8" data-category="{{ $category->id }}">
            @forelse($category->products as $product)
            <a href="{{ route('products.show', $product->slug) }}" class="group border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col h-full bg-white dark:bg-slate-800/50">
                <div class="relative aspect-[4/3] bg-slate-50 dark:bg-slate-900 overflow-hidden">
                    <img alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-80 group-hover:opacity-100" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=400' }}"/>
                    @if($product->badge)
                    <span class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider shadow-lg">{{ $product->badge }}</span>
                    @endif
                </div>
                <div class="p-6 flex flex-col flex-grow">
                    <h3 class="font-bold text-lg leading-tight mb-4 text-secondary dark:text-white group-hover:text-primary transition-colors">{{ $product->name }}</h3>
                    @if($product->specs->count() > 0)
                    <div class="mt-auto py-4 border-t border-slate-100 dark:border-slate-800">
                        <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-3">Thông số kỹ thuật</p>
                        <div class="space-y-2">
                            @foreach($product->specs->take(2) as $spec)
                            <div class="flex justify-between text-xs">
                                <span class="text-slate-500 dark:text-slate-400">{{ $spec->spec_name }}</span>
                                <span class="font-semibold text-secondary dark:text-white">{{ $spec->spec_value }}</span>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </a>
            @empty
            <div class="col-span-4 text-center py-12">
                <span class="material-symbols-outlined text-6xl text-slate-300">inventory_2</span>
                <p class="text-slate-500 mt-4">Chưa có sản phẩm trong danh mục này.</p>
            </div>
            @endforelse
        </div>
        @endforeach
    </div>
</section>
@endif

<!-- News Section -->
<section class="py-24 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h2 class="font-display text-4xl font-bold mb-4">{{ setting('home_news_title', 'Tin tức & Dự án mới nhất') }}</h2>
                <p class="text-slate-600 dark:text-slate-400">{{ setting('home_news_description', 'Khám phá cách chúng tôi đang thay đổi vận hành công nghiệp.') }}</p>
            </div>
            <a class="hidden md:flex items-center text-primary font-bold hover:underline" href="{{ route('posts.index') }}">
                Xem tất cả bài viết <span class="material-symbols-outlined ml-2">east</span>
            </a>
        </div>

        @if($latestPosts->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
            @foreach($latestPosts as $index => $post)
                @if($index === 0)
                <a href="{{ route('posts.show', $post->slug) }}" class="md:col-span-8 group relative overflow-hidden rounded-2xl h-96">
                    <img alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=800' }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-8">
                        <span class="text-primary font-bold text-sm mb-2 uppercase">{{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện thành công' : 'Tin tức') }}</span>
                        <h3 class="text-white text-2xl font-bold mb-2">{{ $post->title }}</h3>
                        @if($post->excerpt)
                        <p class="text-slate-300 line-clamp-2 max-w-xl">{{ $post->excerpt }}</p>
                        @endif
                    </div>
                </a>
                @elseif($index === 1)
                <a href="{{ route('posts.show', $post->slug) }}" class="md:col-span-4 group relative overflow-hidden rounded-2xl h-96">
                    <img alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=600' }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-8">
                        <span class="text-primary font-bold text-sm mb-2 uppercase">{{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện thành công' : 'Tin tức') }}</span>
                        <h3 class="text-white text-xl font-bold mb-2">{{ $post->title }}</h3>
                    </div>
                </a>
                @elseif($index === 2)
                <a href="{{ route('posts.show', $post->slug) }}" class="md:col-span-6 group relative overflow-hidden rounded-2xl h-72">
                    <img alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1497435334941-8c899ee9e8e9?w=600' }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                        <span class="text-primary font-bold text-sm mb-2 uppercase">{{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện thành công' : 'Tin tức') }}</span>
                        <h3 class="text-white text-lg font-bold">{{ $post->title }}</h3>
                    </div>
                </a>
                @elseif($index === 3)
                <a href="{{ route('posts.show', $post->slug) }}" class="md:col-span-6 group relative overflow-hidden rounded-2xl h-72">
                    <img alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600' }}"/>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent flex flex-col justify-end p-6">
                        <span class="text-primary font-bold text-sm mb-2 uppercase">{{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Câu chuyện thành công' : 'Tin tức') }}</span>
                        <h3 class="text-white text-lg font-bold">{{ $post->title }}</h3>
                    </div>
                </a>
                @endif
            @endforeach
        </div>
        @else
        <div class="text-center py-12">
            <span class="material-symbols-outlined text-6xl text-slate-300">article</span>
            <p class="text-slate-500 mt-4">Chưa có bài viết nào.</p>
            <a href="{{ route('contact') }}" class="inline-block mt-4 text-primary font-bold hover:underline">Liên hệ với chúng tôi</a>
        </div>
        @endif
    </div>
</section>

<!-- Social Media Feed Section -->
@if($socialPosts->count() > 0)
@php
    $platforms = $socialPosts->pluck('platform')->unique()->values();
@endphp
<section class="py-24 bg-white dark:bg-background-dark overflow-hidden" x-data="{ activeTab: 'all' }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-12 gap-6">
            <div>
                <h2 class="font-display text-4xl font-bold mb-4">{{ setting('home_social_title', 'Mạng Xã Hội') }}</h2>
                <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
                <div class="flex items-center gap-6 text-sm font-bold uppercase">
                    <button @click="activeTab = 'all'" :class="activeTab === 'all' ? 'social-tab-active' : 'social-tab-inactive'" class="pb-2 flex items-center gap-2">Tất cả</button>
                    @if($platforms->contains('facebook'))
                    <button @click="activeTab = 'facebook'" :class="activeTab === 'facebook' ? 'social-tab-active' : 'social-tab-inactive'" class="pb-2 flex items-center gap-2">Facebook</button>
                    @endif
                    @if($platforms->contains('youtube'))
                    <button @click="activeTab = 'youtube'" :class="activeTab === 'youtube' ? 'social-tab-active' : 'social-tab-inactive'" class="pb-2 flex items-center gap-2">Youtube</button>
                    @endif
                    @if($platforms->contains('tiktok'))
                    <button @click="activeTab = 'tiktok'" :class="activeTab === 'tiktok' ? 'social-tab-active' : 'social-tab-inactive'" class="pb-2 flex items-center gap-2">Tiktok</button>
                    @endif
                    @if($platforms->contains('instagram'))
                    <button @click="activeTab = 'instagram'" :class="activeTab === 'instagram' ? 'social-tab-active' : 'social-tab-inactive'" class="pb-2 flex items-center gap-2">Instagram</button>
                    @endif
                </div>
            </div>
            <div class="flex gap-2">
                <button onclick="socialSlider.slidePrev()" class="w-12 h-12 rounded-full border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_left</span>
                </button>
                <button onclick="socialSlider.slideNext()" class="w-12 h-12 rounded-full border border-slate-200 dark:border-slate-800 flex items-center justify-center hover:bg-primary hover:text-white hover:border-primary transition-all">
                    <span class="material-symbols-outlined">chevron_right</span>
                </button>
            </div>
        </div>
        <div class="relative">
            <div class="swiper social-swiper">
                <div class="swiper-wrapper pb-8">
                    @foreach($socialPosts as $post)
                    <div class="swiper-slide" x-show="activeTab === 'all' || activeTab === '{{ $post->platform }}'">
                        <a href="{{ $post->post_url ?: '#' }}" target="{{ $post->post_url ? '_blank' : '_self' }}" class="block group">
                            <div class="relative aspect-square overflow-hidden rounded-2xl bg-slate-200 dark:bg-slate-800">
                                @if($post->image)
                                <img alt="{{ $post->title ?: 'Social Post' }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" src="{{ asset('storage/' . $post->image) }}"/>
                                @else
                                <div class="w-full h-full bg-gradient-to-br from-slate-300 to-slate-400 dark:from-slate-700 dark:to-slate-800"></div>
                                @endif
                                <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>

                                {{-- Platform Icon Badge --}}
                                <div class="absolute top-4 left-4 w-10 h-10 bg-white/90 rounded-full flex items-center justify-center shadow-lg">
                                    @switch($post->platform)
                                        @case('facebook')
                                            <svg class="w-5 h-5 text-[#1877F2]" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                                            @break
                                        @case('youtube')
                                            <svg class="w-6 h-6 text-[#FF0000]" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                                            @break
                                        @case('tiktok')
                                            <svg class="w-5 h-5 text-black" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.03 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.9-.32-1.98-.23-2.81.31-.75.42-1.24 1.25-1.33 2.1-.1.7.1 1.41.54 1.96.44.54 1.13.88 1.84.91.7.03 1.43-.24 1.92-.76.46-.48.69-1.14.68-1.81.01-4.71 0-9.42 0-14.13z"/></svg>
                                            @break
                                        @case('instagram')
                                            <svg class="w-5 h-5 text-[#E4405F]" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            @break
                                    @endswitch
                                </div>

                                {{-- Play button for video platforms --}}
                                @if(in_array($post->platform, ['youtube', 'tiktok']))
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-white text-6xl opacity-80 group-hover:opacity-100 group-hover:scale-110 transition-all">play_circle</span>
                                </div>
                                @endif

                                {{-- Description overlay --}}
                                @if($post->description)
                                <div class="absolute bottom-4 left-4 right-4">
                                    <p class="text-white text-sm font-medium line-clamp-2">{{ $post->description }}</p>
                                </div>
                                @endif
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Partners Section -->
<section class="py-16 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-center text-slate-400 font-bold uppercase tracking-widest text-xs mb-10">{{ setting('home_partners_title', 'Đối tác tin cậy của chúng tôi') }}</h3>
        @if($partners->count() > 0)
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20">
            @foreach($partners as $partner)
            <a href="{{ $partner->url ?? '#' }}" target="{{ $partner->url ? '_blank' : '_self' }}" class="flex flex-col items-center gap-2 hover:opacity-100 transition-opacity">
                @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-16 w-auto object-contain transition-all">
                @else
                <div class="w-16 h-16 bg-slate-100 dark:bg-slate-800 rounded-full flex items-center justify-center">
                    <span class="material-symbols-outlined text-3xl text-slate-400">business</span>
                </div>
                @endif
                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ $partner->name }}</span>
            </a>
            @endforeach
        </div>
        @else
        <div class="text-center py-8">
            <p class="text-slate-400">Đang cập nhật danh sách đối tác...</p>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    // Hero Swiper
    const heroSwiper = new Swiper('.hero-swiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    // Product Category Tabs
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            const category = this.dataset.category;

            // Update tab styles
            document.querySelectorAll('.category-tab').forEach(t => {
                t.classList.remove('tab-active');
                t.classList.add('tab-inactive');
            });
            this.classList.remove('tab-inactive');
            this.classList.add('tab-active');

            // Show/hide product grids
            document.querySelectorAll('.product-grid').forEach(grid => {
                if (grid.dataset.category === category) {
                    grid.classList.add('active');
                } else {
                    grid.classList.remove('active');
                }
            });
        });
    });

    // Social Media Slider
    let socialSlider = null;
    if (document.querySelector('.social-swiper')) {
        socialSlider = new Swiper('.social-swiper', {
            slidesPerView: 1.2,
            spaceBetween: 16,
            grabCursor: true,
            breakpoints: {
                640: {
                    slidesPerView: 2.2,
                    spaceBetween: 20,
                },
                768: {
                    slidesPerView: 3.2,
                    spaceBetween: 24,
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 24,
                },
            },
        });
    }
</script>
@endpush
