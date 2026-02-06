@extends('frontend.layouts.app')

@section('title', 'Liên hệ')

@section('content')
<!-- Page Header -->
<section class="pt-32 pb-16 bg-slate-50 dark:bg-slate-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold mb-4">Liên hệ với chúng tôi</h1>
        <div class="w-20 h-1.5 bg-primary rounded-full mb-6"></div>
        <p class="text-slate-600 dark:text-slate-400 max-w-2xl">Chúng tôi luôn sẵn sàng hỗ trợ và giải đáp mọi thắc mắc của bạn.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="py-16 bg-white dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <h2 class="font-display text-2xl font-bold mb-6">Gửi tin nhắn</h2>

                @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" id="contact-form" class="space-y-6">
                    @csrf
                    <input type="hidden" name="recaptcha_token" id="recaptcha_token">

                    <div>
                        <label for="phone" class="block text-sm font-medium mb-2">Số điện thoại <span class="text-red-500">*</span></label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required
                               placeholder="VD: 0901234567"
                               pattern="[0-9]{10}"
                               maxlength="10"
                               class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 dark:bg-slate-800 focus:ring-2 focus:ring-primary focus:border-transparent">
                        <p class="text-slate-500 text-xs mt-1">Nhập đúng 10 chữ số (VD: 0901234567)</p>
                        <p id="phone-error" class="text-red-500 text-sm mt-1 hidden">Số điện thoại phải có đúng 10 chữ số</p>
                        @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium mb-2">Nội dung <span class="text-red-500">*</span></label>
                        <textarea id="message" name="message" rows="5" required placeholder="Nhập nội dung tin nhắn..." class="w-full px-4 py-3 rounded-lg border border-slate-300 dark:border-slate-700 dark:bg-slate-800 focus:ring-2 focus:ring-primary focus:border-transparent resize-none">{{ old('message') }}</textarea>
                        @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" id="submit-btn" class="px-8 py-4 bg-primary text-white font-bold rounded-lg hover:bg-orange-600 transition-all shadow-xl shadow-orange-500/30 disabled:opacity-50 disabled:cursor-not-allowed">
                        <span class="material-symbols-outlined align-middle mr-2">send</span>
                        <span id="btn-text">Gửi tin nhắn</span>
                    </button>
                    <p class="text-xs text-slate-500 dark:text-slate-400">
                        Trang này được bảo vệ bởi reCAPTCHA và tuân theo
                        <a href="https://policies.google.com/privacy" target="_blank" class="underline">Chính sách quyền riêng tư</a> và
                        <a href="https://policies.google.com/terms" target="_blank" class="underline">Điều khoản dịch vụ</a> của Google.
                    </p>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 class="font-display text-2xl font-bold mb-6">Thông tin liên hệ</h2>

                <div class="space-y-6 mb-8">
                    @if(setting('contact_address'))
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">location_on</span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1">Địa chỉ văn phòng</h4>
                            <p class="text-slate-600 dark:text-slate-400">{{ setting('contact_address') }}</p>
                        </div>
                    </div>
                    @endif

                    @if(setting('contact_warehouse_address'))
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">warehouse</span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1">Địa chỉ kho hàng</h4>
                            <p class="text-slate-600 dark:text-slate-400">{{ setting('contact_warehouse_address') }}</p>
                        </div>
                    </div>
                    @endif

                    @if(setting('contact_phone'))
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">call</span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1">Điện thoại</h4>
                            <a href="tel:{{ setting('contact_phone') }}" class="text-slate-600 dark:text-slate-400 hover:text-primary">{{ setting('contact_phone') }}</a>
                        </div>
                    </div>
                    @endif

                    @if(setting('contact_email'))
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">mail</span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1">Email</h4>
                            <a href="mailto:{{ setting('contact_email') }}" class="text-slate-600 dark:text-slate-400 hover:text-primary">{{ setting('contact_email') }}</a>
                        </div>
                    </div>
                    @endif

                    @if(setting('contact_working_hours'))
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 bg-primary/10 rounded-xl flex items-center justify-center shrink-0">
                            <span class="material-symbols-outlined text-primary">schedule</span>
                        </div>
                        <div>
                            <h4 class="font-bold mb-1">Giờ làm việc</h4>
                            <p class="text-slate-600 dark:text-slate-400">{!! nl2br(e(setting('contact_working_hours'))) !!}</p>
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Social Links -->
                <div class="mb-8">
                    <h4 class="font-bold mb-4">Kết nối với chúng tôi</h4>
                    <div class="flex gap-3">
                        @if(setting('social_facebook'))
                        <a href="{{ setting('social_facebook') }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        </a>
                        @endif
                        @if(setting('social_youtube'))
                        <a href="{{ setting('social_youtube') }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.377.505 9.377.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                        @endif
                        @if(setting('social_zalo'))
                        <a href="{{ setting('social_zalo') }}" target="_blank" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center hover:bg-primary hover:text-white transition-colors">
                            <span class="material-symbols-outlined">chat</span>
                        </a>
                        @endif
                    </div>
                </div>

                <!-- Map -->
                @if(setting('contact_map_embed'))
                <div class="aspect-video rounded-2xl overflow-hidden">
                    {!! setting('contact_map_embed') !!}
                </div>
                @else
                <div class="aspect-video bg-slate-100 dark:bg-slate-800 rounded-2xl flex items-center justify-center">
                    <span class="material-symbols-outlined text-6xl text-slate-300">map</span>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Phone number validation
    const phoneInput = document.getElementById('phone');
    const phoneError = document.getElementById('phone-error');

    // Only allow digits
    phoneInput.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9]/g, '');

        // Validate length
        if (this.value.length === 10) {
            phoneError.classList.add('hidden');
            this.classList.remove('border-red-500');
            this.classList.add('border-slate-300', 'dark:border-slate-700');
        } else if (this.value.length > 0) {
            phoneError.classList.remove('hidden');
            this.classList.add('border-red-500');
            this.classList.remove('border-slate-300', 'dark:border-slate-700');
        }
    });

    function validatePhone() {
        const phone = phoneInput.value.replace(/[^0-9]/g, '');
        if (phone.length !== 10) {
            phoneError.classList.remove('hidden');
            phoneInput.classList.add('border-red-500');
            phoneInput.focus();
            return false;
        }
        return true;
    }

    @if(setting('recaptcha_site_key'))
    // With reCAPTCHA
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        e.preventDefault();

        if (!validatePhone()) {
            return;
        }

        const form = this;
        const submitBtn = document.getElementById('submit-btn');
        const btnText = document.getElementById('btn-text');
        const originalText = btnText.textContent;

        submitBtn.disabled = true;
        btnText.textContent = 'Đang xử lý...';

        grecaptcha.ready(function() {
            grecaptcha.execute('{{ setting('recaptcha_site_key') }}', {action: 'contact'}).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
                form.submit();
            }).catch(function(error) {
                console.error('reCAPTCHA error:', error);
                submitBtn.disabled = false;
                btnText.textContent = originalText;
                alert('Có lỗi xảy ra với reCAPTCHA. Vui lòng thử lại.');
            });
        });
    });
    @else
    // Without reCAPTCHA
    document.getElementById('contact-form').addEventListener('submit', function(e) {
        if (!validatePhone()) {
            e.preventDefault();
            return;
        }
    });
    @endif
</script>
@if(setting('recaptcha_site_key'))
<script src="https://www.google.com/recaptcha/api.js?render={{ setting('recaptcha_site_key') }}"></script>
@endif
@endpush
