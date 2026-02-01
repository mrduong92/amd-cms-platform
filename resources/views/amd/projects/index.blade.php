@extends('amd.layouts.app')

@section('title', 'Dự án tiêu biểu')

@section('content')
<!-- Hero -->
<header class="relative py-16 md:py-24 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="flex items-center gap-2 justify-center mb-4">
            <span class="w-10 h-[1px] bg-primary"></span>
            <span class="text-primary text-sm font-bold tracking-widest uppercase">Portfolio</span>
            <span class="w-10 h-[1px] bg-primary"></span>
        </div>
        <h1 class="text-4xl md:text-5xl font-black mb-6">DỰ ÁN TIÊU BIỂU</h1>
        <p class="text-lg text-slate-400 max-w-2xl mx-auto">
            Khám phá các website "Độc bản" được AMD AI Solutions thiết kế riêng cho các đối tác SME đa lĩnh vực.
        </p>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 right-1/4 w-[400px] h-[400px] bg-primary/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Category Filters -->
<section class="py-8 border-b border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-wrap justify-center gap-3">
            <a href="{{ route('posts.projects') }}" class="category-chip {{ !request('category') ? 'active' : '' }}">Tất cả</a>
            @foreach($categories as $category)
                <a href="{{ route('posts.projects', ['category' => $category->slug]) }}" class="category-chip {{ request('category') === $category->slug ? 'active' : '' }}">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-16">
            @forelse($projects as $project)
                <a href="{{ route('posts.show', $project->slug) }}" class="group block">
                    <div class="mockup-container mb-8 relative">
                        <div class="desktop-view aspect-video rounded-2xl overflow-hidden border border-slate-800 bg-slate-900 group-hover:border-primary/50 transition-all duration-500">
                            <img alt="{{ $project->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/placeholder-project.svg') }}"/>
                        </div>
                        <div class="absolute top-4 left-4 z-20 flex gap-2">
                            <span class="bg-primary/90 text-white text-[10px] px-3 py-1.5 rounded-full font-bold uppercase flex items-center gap-1.5 shadow-xl backdrop-blur-md">
                                <span class="material-symbols-outlined text-[14px]">auto_awesome</span>
                                AI POWERED
                            </span>
                            @if($project->category)
                                <span class="bg-accent/90 text-white text-[10px] px-3 py-1.5 rounded-full font-bold uppercase shadow-xl backdrop-blur-md">
                                    {{ $project->category->name }}
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-2xl font-bold text-white mb-2">{{ $project->title }}</h3>
                            <p class="text-slate-400 text-sm max-w-md">{{ $project->excerpt }}</p>
                        </div>
                        <div class="text-right">
                            <div class="text-slate-500 text-xs mb-1">Dự án hoàn thiện</div>
                            <div class="text-white font-bold">{{ $project->published_at?->format('d/m/Y') }}</div>
                        </div>
                    </div>
                </a>
            @empty
                <div class="col-span-2 text-center py-12">
                    <span class="material-symbols-outlined text-6xl text-slate-600 mb-4">folder_off</span>
                    <p class="text-slate-400">Chưa có dự án nào được đăng tải.</p>
                </div>
            @endforelse
        </div>

        @if($projects->hasPages())
            <div class="mt-16">
                {{ $projects->links() }}
            </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 p-12 md:p-16 rounded-[3rem] border border-slate-800">
            <h2 class="text-3xl font-bold mb-4">Bạn muốn có một dự án tương tự?</h2>
            <p class="text-slate-400 mb-8">Liên hệ với chúng tôi ngay để được tư vấn miễn phí.</p>
            <a href="{{ route('contact') }}" class="inline-block bg-gradient-to-r from-primary to-accent text-white px-10 py-4 rounded-full font-bold hover:opacity-90 transition-all">
                Liên hệ tư vấn
            </a>
        </div>
    </div>
</section>
@endsection
