@extends('frontend.layouts.app')

@section('title', 'Trang chủ')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<style>
    .hero-swiper {
        height: 85vh;
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
                            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight mb-8">
                                {!! nl2br(e($slider->title)) !!}
                            </h1>
                            @if($slider->description)
                            <p class="text-lg text-slate-300 mb-10 leading-relaxed">{{ $slider->description }}</p>
                            @endif
                            <div class="flex flex-col sm:flex-row gap-4">
                                @if($slider->button_text && $slider->button_url)
                                <a href="{{ $slider->button_url }}" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">{{ $slider->button_text }}</a>
                                @else
                                <a href="{{ route('products.index') }}" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">Khám phá sản phẩm</a>
                                @endif
                                <a href="{{ route('posts.projects') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white border border-white/20 font-bold rounded-lg hover:bg-white/20 transition-all text-center">Xem dự án của chúng tôi</a>
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
                            <h1 class="font-display text-5xl md:text-7xl font-extrabold text-white leading-tight mb-8">
                                Giải pháp <br/><span class="text-primary">công nghiệp</span> toàn diện
                            </h1>
                            <p class="text-lg text-slate-300 mb-10 leading-relaxed">
                                {{ setting('site_description', 'Cung cấp các giải pháp pin Lithium, camera AI, hệ thống lưu trữ năng lượng và dịch vụ xe nâng chuyên nghiệp.') }}
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="{{ route('products.index') }}" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 text-center">Khám phá sản phẩm</a>
                                <a href="{{ route('contact') }}" class="px-8 py-4 bg-white/10 backdrop-blur-md text-white border border-white/20 font-bold rounded-lg hover:bg-white/20 transition-all text-center">Liên hệ tư vấn</a>
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

<!-- Services Section -->
@if($services->count() > 0)
<section class="py-24 bg-slate-50 dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center mb-16">
        <h2 class="font-display text-4xl font-bold mb-4">Giải pháp công nghiệp</h2>
        <div class="w-20 h-1.5 bg-primary mx-auto rounded-full"></div>
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="group bg-white dark:bg-slate-800 p-8 rounded-2xl hover:bg-primary transition-all duration-300 border border-slate-200 dark:border-slate-700">
                <div class="w-14 h-14 bg-slate-50 dark:bg-slate-900 rounded-xl flex items-center justify-center mb-6 shadow-sm group-hover:bg-white">
                    <span class="material-symbols-outlined text-primary text-3xl">{{ $service->icon ?? 'settings' }}</span>
                </div>
                <h3 class="font-display text-xl font-bold mb-4 group-hover:text-white uppercase text-sm">{{ $service->name }}</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 group-hover:text-white/90">{{ $service->short_description ?? Str::limit(strip_tags($service->description), 100) }}</p>
                <span class="inline-flex items-center text-primary group-hover:text-white font-bold transition-colors">
                    Xem thêm <span class="material-symbols-outlined ml-2 text-sm">arrow_forward</span>
                </span>
            </a>
            @endforeach
        </div>
    </div>
</section>
@endif

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
                <div class="prose dark:prose-invert max-w-none">
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
                <h2 class="font-display text-4xl font-bold mb-2">Danh mục sản phẩm</h2>
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
                <h2 class="font-display text-4xl font-bold mb-4">Tin tức & Dự án mới nhất</h2>
                <p class="text-slate-600 dark:text-slate-400">Khám phá cách chúng tôi đang thay đổi vận hành công nghiệp.</p>
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

<!-- Partners Section -->
<section class="py-16 bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-center text-slate-400 font-bold uppercase tracking-widest text-xs mb-10">Đối tác tin cậy của chúng tôi</h3>
        @if($partners->count() > 0)
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20 opacity-70 hover:opacity-100 transition-opacity duration-500">
            @foreach($partners as $partner)
            <a href="{{ $partner->url ?? '#' }}" target="{{ $partner->url ? '_blank' : '_self' }}" class="flex flex-col items-center gap-2 hover:opacity-100 transition-opacity">
                @if($partner->logo)
                <img src="{{ asset('storage/' . $partner->logo) }}" alt="{{ $partner->name }}" class="h-16 w-auto object-contain grayscale hover:grayscale-0 transition-all">
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
</script>
@endpush
