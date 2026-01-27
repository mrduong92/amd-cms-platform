@extends('frontend.layouts.app')

@section('title', 'Tìm kiếm: ' . $query)

@section('content')
<section class="pt-32 pb-16 bg-gradient-to-b from-slate-50 to-white dark:from-slate-900 dark:to-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="font-display text-4xl font-bold mb-4">Kết quả tìm kiếm</h1>
            <p class="text-slate-600 dark:text-slate-400">
                Tìm thấy <span class="font-bold text-primary">{{ $totalResults }}</span> kết quả cho "<span class="font-bold">{{ $query }}</span>"
            </p>
        </div>

        <!-- Search Form -->
        <div class="max-w-xl mx-auto mb-12">
            <form action="{{ route('search') }}" method="GET">
                <div class="flex items-center gap-2">
                    <input type="text" name="q" value="{{ $query }}" placeholder="Tìm kiếm sản phẩm, tin tức..."
                           class="flex-1 px-6 py-4 border border-slate-200 dark:border-slate-700 rounded-xl bg-white dark:bg-slate-800 text-lg focus:ring-2 focus:ring-primary focus:border-transparent outline-none"
                           required minlength="2">
                    <button type="submit" class="px-6 py-4 bg-primary text-white rounded-xl hover:bg-orange-600 transition-colors font-bold">
                        Tìm kiếm
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

@if($totalResults > 0)
    <!-- Products Results -->
    @if($products->count() > 0)
    <section class="py-12 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold mb-8 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">inventory_2</span>
                Sản phẩm ({{ $products->count() }})
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($products as $product)
                <a href="{{ route('products.show', $product->slug) }}" class="group border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300 bg-white dark:bg-slate-800/50">
                    <div class="relative aspect-[4/3] bg-slate-50 dark:bg-slate-900 overflow-hidden">
                        <img alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?w=400' }}"/>
                        @if($product->badge)
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full">{{ $product->badge }}</span>
                        @endif
                    </div>
                    <div class="p-4">
                        @if($product->category)
                        <span class="text-xs text-primary font-bold uppercase">{{ $product->category->name }}</span>
                        @endif
                        <h3 class="font-bold text-lg mt-1 group-hover:text-primary transition-colors">{{ $product->name }}</h3>
                        @if($product->short_description)
                        <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 line-clamp-2">{{ $product->short_description }}</p>
                        @endif
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Posts Results -->
    @if($posts->count() > 0)
    <section class="py-12 bg-slate-50 dark:bg-slate-900/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold mb-8 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">article</span>
                Bài viết ({{ $posts->count() }})
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($posts as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white dark:bg-slate-800 rounded-xl overflow-hidden hover:shadow-xl transition-all duration-300">
                    <div class="relative aspect-video bg-slate-100 dark:bg-slate-900 overflow-hidden">
                        <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ $post->image ? asset('storage/' . $post->image) : 'https://images.unsplash.com/photo-1504307651254-35680f356dfd?w=600' }}"/>
                        <span class="absolute top-3 left-3 bg-primary text-white text-xs font-bold px-2 py-1 rounded-full uppercase">
                            {{ $post->type === 'project' ? 'Dự án' : ($post->type === 'success_story' ? 'Thành công' : 'Tin tức') }}
                        </span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-bold text-lg group-hover:text-primary transition-colors line-clamp-2">{{ $post->title }}</h3>
                        @if($post->excerpt)
                        <p class="text-slate-600 dark:text-slate-400 text-sm mt-2 line-clamp-2">{{ $post->excerpt }}</p>
                        @endif
                        <p class="text-xs text-slate-400 mt-3">{{ $post->published_at?->format('d/m/Y') }}</p>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Services Results -->
    @if($services->count() > 0)
    <section class="py-12 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="font-display text-2xl font-bold mb-8 flex items-center gap-3">
                <span class="material-symbols-outlined text-primary">build</span>
                Dịch vụ ({{ $services->count() }})
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($services as $service)
                <a href="{{ route('services.show', $service->slug) }}" class="group bg-slate-50 dark:bg-slate-800 p-6 rounded-xl hover:bg-primary transition-all duration-300 border border-slate-200 dark:border-slate-700">
                    <div class="w-12 h-12 bg-white dark:bg-slate-900 rounded-xl flex items-center justify-center mb-4 shadow-sm group-hover:bg-white">
                        <span class="material-symbols-outlined text-primary text-2xl">{{ $service->icon ?? 'settings' }}</span>
                    </div>
                    <h3 class="font-bold text-lg mb-2 group-hover:text-white">{{ $service->name }}</h3>
                    <p class="text-slate-600 dark:text-slate-400 text-sm group-hover:text-white/90 line-clamp-2">{{ $service->short_description }}</p>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@else
    <!-- No Results -->
    <section class="py-24 bg-white dark:bg-slate-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <span class="material-symbols-outlined text-8xl text-slate-300 dark:text-slate-700">search_off</span>
            <h2 class="font-display text-2xl font-bold mt-6 mb-4">Không tìm thấy kết quả</h2>
            <p class="text-slate-600 dark:text-slate-400 mb-8">
                Không có kết quả phù hợp với từ khóa "<span class="font-bold">{{ $query }}</span>". Vui lòng thử lại với từ khóa khác.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('products.index') }}" class="px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-colors">
                    Xem sản phẩm
                </a>
                <a href="{{ route('contact') }}" class="px-6 py-3 border border-slate-300 dark:border-slate-700 font-bold rounded-lg hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                    Liên hệ tư vấn
                </a>
            </div>
        </div>
    </section>
@endif
@endsection
