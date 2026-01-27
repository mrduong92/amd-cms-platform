@extends('frontend.layouts.app')

@section('title', isset($category) ? $category->name : 'Sản phẩm')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">{{ isset($category) ? $category->name : 'Sản phẩm' }}</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl">{{ isset($category) ? $category->description : 'Khám phá các sản phẩm chất lượng cao từ NMT AUTO.' }}</p>
    </div>
</section>

<!-- Products Grid -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Categories Filter -->
        @if($categories->count() > 0)
        <div class="border-b border-slate-200 dark:border-slate-800 mb-12">
            <nav class="flex space-x-8 overflow-x-auto pb-px hide-scrollbar">
                <a href="{{ route('products.index') }}" class="{{ !isset($category) ? 'tab-active' : 'tab-inactive' }} whitespace-nowrap py-4 px-1 border-b-2 text-xs font-bold uppercase">Tất cả</a>
                @foreach($categories as $cat)
                <a href="{{ route('products.category', $cat->slug) }}" class="{{ isset($category) && $category->id === $cat->id ? 'tab-active' : 'tab-inactive' }} whitespace-nowrap py-4 px-1 border-b-2 text-xs font-bold uppercase">{{ $cat->name }}</a>
                @endforeach
            </nav>
        </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($products as $product)
            <a href="{{ route('products.show', $product->slug) }}" class="group border border-slate-100 dark:border-slate-800 rounded-xl overflow-hidden hover:shadow-2xl transition-all duration-300 flex flex-col h-full bg-white dark:bg-slate-800/50">
                <div class="relative aspect-[4/3] bg-slate-50 dark:bg-slate-900 overflow-hidden">
                    <img alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 opacity-80 group-hover:opacity-100" src="{{ $product->image ? asset('storage/' . $product->image) : 'https://via.placeholder.com/400x300' }}"/>
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
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">inventory_2</span>
                <p class="text-slate-500">Chưa có sản phẩm nào trong danh mục này.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $products->links() }}
        </div>
    </div>
</section>
@endsection
