@extends('frontend.layouts.app')

@section('title', $service->name)
@section('meta_description', $service->short_description ?? Str::limit(strip_tags($service->description), 160))

@section('content')
<!-- Breadcrumb -->
<section class="pt-24 pb-4 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-sm text-slate-500">
            <a href="{{ route('home') }}" class="hover:text-primary">Trang chủ</a>
            <span class="mx-2">/</span>
            <a href="{{ route('services.index') }}" class="hover:text-primary">Dịch vụ</a>
            <span class="mx-2">/</span>
            <span class="text-slate-900 dark:text-white">{{ $service->name }}</span>
        </nav>
    </div>
</section>

<!-- Service Detail -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2">
                <!-- Header -->
                <div class="flex items-start gap-6 mb-8">
                    <div class="w-20 h-20 bg-slate-100 dark:bg-slate-800 rounded-xl flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-5xl">{{ $service->icon ?? 'settings' }}</span>
                    </div>
                    <div>
                        <h1 class="font-display text-3xl md:text-4xl font-bold mb-2">{{ $service->name }}</h1>
                        <div class="w-20 h-1.5 bg-primary rounded-full"></div>
                    </div>
                </div>

                <!-- Image -->
                @if($service->image)
                <div class="aspect-video bg-slate-100 dark:bg-slate-800 rounded-2xl overflow-hidden mb-8">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-full object-cover">
                </div>
                @endif

                <!-- Description -->
                <div class="prose dark:prose-invert max-w-none">
                    {!! $service->description !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <!-- Contact Card -->
                <div class="bg-slate-50 dark:bg-slate-800 rounded-2xl p-8 sticky top-28">
                    <h3 class="font-bold text-lg mb-4">Liên hệ tư vấn</h3>
                    <p class="text-slate-600 dark:text-slate-400 mb-6">Bạn cần hỗ trợ về dịch vụ này? Hãy liên hệ với chúng tôi.</p>

                    <div class="space-y-4 mb-6">
                        @if(setting('phone'))
                        <a href="tel:{{ setting('phone') }}" class="flex items-center gap-3 text-slate-600 dark:text-slate-400 hover:text-primary">
                            <span class="material-symbols-outlined text-primary">call</span>
                            {{ setting('phone') }}
                        </a>
                        @endif
                        @if(setting('email'))
                        <a href="mailto:{{ setting('email') }}" class="flex items-center gap-3 text-slate-600 dark:text-slate-400 hover:text-primary">
                            <span class="material-symbols-outlined text-primary">mail</span>
                            {{ setting('email') }}
                        </a>
                        @endif
                    </div>

                    <a href="{{ route('contact') }}" class="block w-full px-6 py-3 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all text-center">
                        Gửi yêu cầu tư vấn
                    </a>
                </div>

                <!-- Other Services -->
                @if($otherServices->count() > 0)
                <div class="mt-8">
                    <h3 class="font-bold text-lg mb-4">Dịch vụ khác</h3>
                    <div class="space-y-4">
                        @foreach($otherServices as $other)
                        <a href="{{ route('services.show', $other->slug) }}" class="flex items-center gap-4 p-4 bg-white dark:bg-slate-800 rounded-xl hover:shadow-lg transition-all group">
                            <div class="w-12 h-12 bg-slate-100 dark:bg-slate-700 rounded-lg flex items-center justify-center shrink-0 group-hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined text-primary group-hover:text-white">{{ $other->icon ?? 'settings' }}</span>
                            </div>
                            <span class="font-semibold group-hover:text-primary transition-colors">{{ $other->name }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
