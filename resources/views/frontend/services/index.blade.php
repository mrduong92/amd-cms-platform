@extends('frontend.layouts.app')

@section('title', 'Dịch vụ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">Dịch vụ của chúng tôi</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl">Các giải pháp công nghiệp toàn diện cho doanh nghiệp của bạn.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($services as $service)
            <a href="{{ route('services.show', $service->slug) }}" class="group bg-white dark:bg-slate-800 p-8 rounded-2xl hover:bg-primary transition-all duration-300 border border-slate-200 dark:border-slate-700 hover:shadow-2xl">
                <div class="w-16 h-16 bg-slate-50 dark:bg-slate-900 rounded-xl flex items-center justify-center mb-6 shadow-sm group-hover:bg-white">
                    <span class="material-symbols-outlined text-primary text-4xl">{{ $service->icon ?? 'settings' }}</span>
                </div>
                <h3 class="font-display text-xl font-bold mb-4 group-hover:text-white">{{ $service->name }}</h3>
                <p class="text-slate-600 dark:text-slate-400 mb-6 group-hover:text-white/90">{{ $service->short_description ?? Str::limit(strip_tags($service->description), 150) }}</p>
                <span class="inline-flex items-center text-primary group-hover:text-white font-bold transition-colors">
                    Xem chi tiết <span class="material-symbols-outlined ml-2 text-sm">arrow_forward</span>
                </span>
            </a>
            @empty
            <div class="col-span-3 text-center py-12">
                <span class="material-symbols-outlined text-6xl text-slate-300 mb-4">build_circle</span>
                <p class="text-slate-500">Chưa có dịch vụ nào.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-24 bg-secondary">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="font-display text-3xl md:text-4xl font-bold text-white mb-6">Bạn cần tư vấn về giải pháp?</h2>
        <p class="text-slate-400 mb-8 max-w-2xl mx-auto">Đội ngũ chuyên gia của chúng tôi sẵn sàng hỗ trợ bạn tìm giải pháp phù hợp nhất cho doanh nghiệp.</p>
        <a href="{{ route('contact') }}" class="inline-block px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30">
            Liên hệ ngay
        </a>
    </div>
</section>
@endsection
