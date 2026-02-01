@extends('amd.layouts.app')

@section('title', 'Liên hệ')

@section('content')
<!-- Hero -->
<header class="relative py-16 md:py-24 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <h1 class="text-4xl md:text-5xl font-black mb-6">Liên hệ với chúng tôi</h1>
        <p class="text-lg text-slate-400 max-w-2xl mx-auto">
            {{ setting('contact_description', 'Đội ngũ AMD AI Solutions luôn sẵn sàng hỗ trợ bạn 24/7. Hãy liên hệ ngay để được tư vấn miễn phí!') }}
        </p>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-[400px] h-[400px] bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[400px] h-[400px] bg-accent/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- Contact Section -->
<section class="py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Contact Form -->
            <div class="bg-slate-900/50 border border-slate-800 rounded-[2rem] p-8 md:p-12">
                <h2 class="text-2xl font-bold mb-8">Gửi yêu cầu tư vấn</h2>

                @if(session('success'))
                    <div class="bg-green-500/10 border border-green-500/20 text-green-400 px-6 py-4 rounded-2xl mb-8">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="bg-red-500/10 border border-red-500/20 text-red-400 px-6 py-4 rounded-2xl mb-8">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-6">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Số điện thoại <span class="text-red-400">*</span></label>
                        <div class="relative">
                            <span class="absolute left-6 top-1/2 -translate-y-1/2 text-slate-400">
                                <span class="material-symbols-outlined">phone</span>
                            </span>
                            <input type="tel" name="phone" value="{{ old('phone') }}" required placeholder="Nhập số điện thoại của bạn"
                                   class="w-full pl-14 pr-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:ring-2 focus:ring-primary focus:border-transparent">
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Chúng tôi sẽ liên hệ lại trong vòng 5 phút</p>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-slate-300 mb-2">Nội dung yêu cầu</label>
                        <textarea name="message" rows="4" placeholder="Mô tả ngắn gọn nhu cầu của bạn (không bắt buộc)"
                                  class="w-full px-6 py-4 rounded-2xl bg-slate-800 border border-slate-700 text-white focus:ring-2 focus:ring-primary focus:border-transparent resize-none">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="w-full bg-gradient-to-r from-primary to-accent text-white py-4 rounded-2xl font-bold hover:opacity-90 transition-all flex items-center justify-center gap-2">
                        <span class="material-symbols-outlined">send</span>
                        Gửi yêu cầu tư vấn
                    </button>

                    <p class="text-center text-xs text-slate-500">
                        Hoặc gọi ngay hotline: <a href="tel:{{ setting('contact_phone') }}" class="text-primary font-bold hover:underline">{{ setting('contact_phone', '0123 456 789') }}</a>
                    </p>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="space-y-8">
                <div class="bg-slate-900/50 border border-slate-800 rounded-[2rem] p-8">
                    <h3 class="text-xl font-bold mb-6">Thông tin liên hệ</h3>
                    <ul class="space-y-6">
                        @if(setting('contact_address'))
                        <li class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">location_on</span>
                            </div>
                            <div>
                                <div class="text-sm text-slate-400 mb-1">Địa chỉ</div>
                                <div class="text-white">{{ setting('contact_address') }}</div>
                            </div>
                        </li>
                        @endif

                        @if(setting('contact_phone'))
                        <li class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">phone</span>
                            </div>
                            <div>
                                <div class="text-sm text-slate-400 mb-1">Điện thoại</div>
                                <a href="tel:{{ setting('contact_phone') }}" class="text-white hover:text-primary transition-colors">{{ setting('contact_phone') }}</a>
                            </div>
                        </li>
                        @endif

                        @if(setting('contact_email'))
                        <li class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-primary">mail</span>
                            </div>
                            <div>
                                <div class="text-sm text-slate-400 mb-1">Email</div>
                                <a href="mailto:{{ setting('contact_email') }}" class="text-white hover:text-primary transition-colors">{{ setting('contact_email') }}</a>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>

                <!-- Working Hours -->
                <div class="bg-slate-900/50 border border-slate-800 rounded-[2rem] p-8">
                    <h3 class="text-xl font-bold mb-6">Thời gian làm việc</h3>
                    <ul class="space-y-4">
                        <li class="flex justify-between">
                            <span class="text-slate-400">Thứ 2 - Thứ 6</span>
                            <span class="text-white">08:00 - 17:30</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-slate-400">Thứ 7</span>
                            <span class="text-white">08:00 - 12:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-slate-400">Chủ nhật</span>
                            <span class="text-red-400">Nghỉ</span>
                        </li>
                    </ul>
                </div>

                <!-- Social Links -->
                <div class="bg-slate-900/50 border border-slate-800 rounded-[2rem] p-8">
                    <h3 class="text-xl font-bold mb-6">Kết nối với chúng tôi</h3>
                    <div class="flex gap-4">
                        @if(setting('social_facebook'))
                        <a href="{{ setting('social_facebook') }}" target="_blank" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-primary hover:bg-primary/10 transition-all border border-slate-700">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif

                        @if(setting('social_zalo'))
                        <a href="{{ setting('social_zalo') }}" target="_blank" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-primary hover:bg-primary/10 transition-all border border-slate-700">
                            <span class="font-bold">Zalo</span>
                        </a>
                        @endif

                        @if(setting('social_youtube'))
                        <a href="{{ setting('social_youtube') }}" target="_blank" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center text-slate-400 hover:text-primary hover:bg-primary/10 transition-all border border-slate-700">
                            <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google Map -->
@if(setting('contact_map'))
<section class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="rounded-[2rem] overflow-hidden border border-slate-800 h-96">
            {!! setting('contact_map') !!}
        </div>
    </div>
</section>
@endif
@endsection
