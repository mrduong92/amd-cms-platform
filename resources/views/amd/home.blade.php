@extends('amd.layouts.app')

@section('title', 'Trang chủ')

@section('content')
<!-- Hero Section -->
<header class="relative py-20 md:py-28 overflow-hidden border-b border-slate-800/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative z-10">
        <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-800/50 border border-slate-700 mb-8">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-primary opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-primary"></span>
            </span>
            <span class="text-xs font-semibold text-slate-300 uppercase tracking-widest">{{ setting('hero_badge', 'Kỷ nguyên Website 4.0') }}</span>
        </div>
        <h1 class="text-4xl md:text-6xl font-black mb-8 leading-tight tracking-tight">
            {!! setting('hero_title', 'Website Thiết Kế Riêng Với <br/><span class="gradient-text">Chi Phí Mẫu Cố Định</span>') !!}
            <span class="block text-2xl md:text-3xl mt-4 font-light">{{ setting('hero_subtitle', '- Sức Mạnh Từ AI -') }}</span>
        </h1>
        <p class="text-lg text-slate-400 max-w-2xl mx-auto mb-12 leading-relaxed">
            {{ setting('hero_description', 'AMD tái định nghĩa việc xây dựng thương hiệu số cho SME. Chúng tôi kết hợp trí tuệ nhân tạo để tạo ra các website độc bản, chuẩn SEO với tốc độ hoàn thiện gấp 5 lần.') }}
        </p>
    </div>
    <div class="absolute top-0 left-0 w-full h-full pointer-events-none">
        <div class="absolute top-1/4 left-1/4 w-[500px] h-[500px] bg-primary/10 rounded-full blur-[120px]"></div>
        <div class="absolute bottom-1/4 right-1/4 w-[500px] h-[500px] bg-accent/10 rounded-full blur-[120px]"></div>
    </div>
</header>

<!-- AI Process Section -->
<section class="py-24 bg-slate-950/50 relative overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">{{ setting('process_title', 'Quy trình vận hành bằng AI') }}</h2>
            <p class="text-slate-400">{{ setting('process_subtitle', 'Tối ưu hóa thời gian và chất lượng bằng công nghệ độc quyền') }}</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <div class="hidden md:block absolute top-1/2 left-0 w-full h-0.5 bg-gradient-to-r from-transparent via-slate-800 to-transparent -translate-y-1/2 -z-10"></div>

            <div class="relative flex flex-col items-center group">
                <div class="w-20 h-20 bg-card-dark border border-slate-700 rounded-3xl flex items-center justify-center mb-8 shadow-2xl group-hover:border-primary transition-all glow-blue">
                    <span class="material-symbols-outlined text-4xl text-primary">analytics</span>
                </div>
                <h3 class="text-xl font-bold mb-4">1. AI Analysis</h3>
                <p class="text-slate-400 text-center px-4">AI phân tích ngành nghề, đối thủ và hành vi người dùng để đề xuất cấu trúc web tối ưu nhất.</p>
            </div>

            <div class="relative flex flex-col items-center group">
                <div class="w-20 h-20 bg-card-dark border border-slate-700 rounded-3xl flex items-center justify-center mb-8 shadow-2xl group-hover:border-accent transition-all glow-purple">
                    <span class="material-symbols-outlined text-4xl text-accent">draw</span>
                </div>
                <h3 class="text-xl font-bold mb-4">2. AI Design</h3>
                <p class="text-slate-400 text-center px-4">Tự động hóa việc phối màu, layout và sinh nội dung theo bản sắc thương hiệu riêng biệt của bạn.</p>
            </div>

            <div class="relative flex flex-col items-center group">
                <div class="w-20 h-20 bg-card-dark border border-slate-700 rounded-3xl flex items-center justify-center mb-8 shadow-2xl group-hover:border-green-500 transition-all">
                    <span class="material-symbols-outlined text-4xl text-green-500">speed</span>
                </div>
                <h3 class="text-xl font-bold mb-4">3. Rapid Completion</h3>
                <p class="text-slate-400 text-center px-4">Đóng gói mã nguồn chuẩn SEO và bàn giao vận hành chỉ sau 48h làm việc.</p>
            </div>
        </div>
    </div>
</section>

<!-- Industries Section -->
<section class="py-24" id="industries">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="flex items-center gap-2 justify-center mb-4">
                <span class="w-10 h-[1px] bg-primary"></span>
                <span class="text-primary text-sm font-bold tracking-widest uppercase">Đa ngành nghề</span>
                <span class="w-10 h-[1px] bg-primary"></span>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Website chuyên biệt cho <span class="gradient-text">20+ ngành nghề</span></h2>
            <p class="text-slate-400 max-w-2xl mx-auto">Dù bạn kinh doanh trong lĩnh vực nào, AMD AI Solutions đều có giải pháp website được tối ưu riêng cho ngành của bạn.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-4">
            @php
                $industries = [
                    ['icon' => 'apartment', 'name' => 'Bất động sản', 'color' => 'from-blue-500 to-blue-600'],
                    ['icon' => 'devices', 'name' => 'Công nghệ', 'color' => 'from-purple-500 to-purple-600'],
                    ['icon' => 'precision_manufacturing', 'name' => 'Cơ khí', 'color' => 'from-slate-500 to-slate-600'],
                    ['icon' => 'flight_takeoff', 'name' => 'Du lịch', 'color' => 'from-cyan-500 to-cyan-600'],
                    ['icon' => 'school', 'name' => 'Giáo dục', 'color' => 'from-green-500 to-green-600'],
                    ['icon' => 'restaurant', 'name' => 'Nhà hàng', 'color' => 'from-orange-500 to-orange-600'],
                    ['icon' => 'local_shipping', 'name' => 'Logistics', 'color' => 'from-amber-500 to-amber-600'],
                    ['icon' => 'spa', 'name' => 'Spa & Thẩm mỹ', 'color' => 'from-pink-500 to-pink-600'],
                    ['icon' => 'hotel', 'name' => 'Khách sạn', 'color' => 'from-indigo-500 to-indigo-600'],
                    ['icon' => 'agriculture', 'name' => 'Nông nghiệp', 'color' => 'from-lime-500 to-lime-600'],
                    ['icon' => 'directions_car', 'name' => 'Ô tô - Xe máy', 'color' => 'from-red-500 to-red-600'],
                    ['icon' => 'celebration', 'name' => 'Sự kiện', 'color' => 'from-fuchsia-500 to-fuchsia-600'],
                    ['icon' => 'account_balance', 'name' => 'Tài chính', 'color' => 'from-emerald-500 to-emerald-600'],
                    ['icon' => 'checkroom', 'name' => 'Thời trang', 'color' => 'from-rose-500 to-rose-600'],
                    ['icon' => 'construction', 'name' => 'Xây dựng', 'color' => 'from-yellow-500 to-yellow-600'],
                    ['icon' => 'local_hospital', 'name' => 'Y tế', 'color' => 'from-teal-500 to-teal-600'],
                    ['icon' => 'shopping_cart', 'name' => 'E-commerce', 'color' => 'from-violet-500 to-violet-600'],
                    ['icon' => 'fastfood', 'name' => 'F&B', 'color' => 'from-amber-500 to-red-500'],
                    ['icon' => 'print', 'name' => 'In ấn', 'color' => 'from-gray-500 to-gray-600'],
                    ['icon' => 'more_horiz', 'name' => 'Ngành khác...', 'color' => 'from-primary to-accent'],
                ];
            @endphp

            @foreach($industries as $industry)
                <div class="group relative bg-slate-900/50 border border-slate-800 rounded-2xl p-4 hover:border-primary/50 transition-all duration-300 cursor-pointer hover:-translate-y-1">
                    <div class="flex flex-col items-center text-center">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-br {{ $industry['color'] }} flex items-center justify-center mb-3 group-hover:scale-110 transition-transform">
                            <span class="material-symbols-outlined text-white text-2xl">{{ $industry['icon'] }}</span>
                        </div>
                        <span class="text-sm font-medium text-slate-300 group-hover:text-white transition-colors">{{ $industry['name'] }}</span>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-12 text-center">
            <p class="text-slate-500 mb-6">Không thấy ngành của bạn? Đừng lo, chúng tôi có thể thiết kế website cho BẤT KỲ lĩnh vực nào!</p>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-gradient-to-r from-primary to-accent text-white px-8 py-4 rounded-full font-bold hover:opacity-90 transition-all">
                <span class="material-symbols-outlined">rocket_launch</span>
                Tư vấn miễn phí ngay
            </a>
        </div>
    </div>
</section>

<!-- Projects Section -->
<section class="py-24" id="projects">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-8">
            <div class="text-center md:text-left">
                <div class="flex items-center gap-2 justify-center md:justify-start mb-2">
                    <span class="w-10 h-[1px] bg-primary"></span>
                    <span class="text-primary text-sm font-bold tracking-widest uppercase">Portfolio</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black mb-4">DỰ ÁN TIÊU BIỂU</h2>
                <p class="text-slate-400 max-w-lg">Khám phá các website "Độc bản" được AMD AI Solutions thiết kế riêng cho các đối tác SME đa lĩnh vực.</p>
            </div>
        </div>

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
                    <p class="text-slate-400">Chưa có dự án nào được đăng tải.</p>
                </div>
            @endforelse
        </div>

        @if($projects->count() >= 4)
            <div class="mt-20 text-center">
                <a href="{{ route('posts.projects') }}" class="px-12 py-4 border-2 border-slate-800 hover:border-primary rounded-full font-bold text-slate-300 hover:text-white transition-all inline-block">
                    Xem Thêm Dự Án Khác
                </a>
            </div>
        @endif
    </div>
</section>

<!-- Comparison Section -->
<section class="py-24 bg-slate-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Sự Khác Biệt Từ AMD AI</h2>
            <p class="text-slate-400">Tại sao chúng tôi vượt trội hơn so với cách làm truyền thống</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Traditional -->
            <div class="p-10 rounded-[2.5rem] bg-slate-900/50 border border-slate-800 relative group opacity-70">
                <div class="flex items-center gap-3 mb-8">
                    <span class="material-symbols-outlined text-slate-500">warning</span>
                    <h3 class="text-2xl font-bold text-slate-400">Thiết Kế Truyền Thống</h3>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-red-500">history</span>
                        <span class="text-slate-300">Thời gian chờ đợi 3-4 tuần</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-red-500">payments</span>
                        <span class="text-slate-300">Chi phí cao (15tr - 30tr+)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-red-500">error</span>
                        <span class="text-slate-300">Khó tối ưu hóa sau khi bàn giao</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-red-500">hourglass_empty</span>
                        <span class="text-slate-300">Quy trình thủ công dễ sai sót</span>
                    </li>
                </ul>
            </div>

            <!-- AMD AI -->
            <div class="p-10 rounded-[2.5rem] bg-gradient-to-br from-slate-900 to-slate-800 border-2 border-primary relative group glow-blue">
                <div class="absolute -top-4 right-8 bg-primary text-white text-[10px] font-black px-4 py-1.5 rounded-full uppercase tracking-tighter">Recommended</div>
                <div class="flex items-center gap-3 mb-8">
                    <span class="material-symbols-outlined text-primary">verified</span>
                    <h3 class="text-2xl font-bold">AMD AI SOLUTIONS</h3>
                </div>
                <ul class="space-y-6">
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        <span class="text-white font-medium">Bàn giao thần tốc (2-5 ngày)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        <span class="text-white font-medium">Chi phí cố định cực thấp (từ 2.9tr)</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        <span class="text-white font-medium">Thiết kế Custom theo yêu cầu</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <span class="material-symbols-outlined text-green-500">check_circle</span>
                        <span class="text-white font-medium">AI Tối ưu hóa SEO & Chuyển đổi</span>
                    </li>
                </ul>
                <div class="mt-10 pt-8 border-t border-slate-700">
                    <a href="{{ route('contact') }}" class="block w-full bg-primary py-4 rounded-2xl font-bold text-lg hover:bg-blue-600 transition-all text-center">Sử dụng giải pháp AMD AI</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- News/Blog Section -->
@if(isset($news) && $news->count() > 0)
<section class="py-24" id="news">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-center mb-16 gap-8">
            <div class="text-center md:text-left">
                <div class="flex items-center gap-2 justify-center md:justify-start mb-2">
                    <span class="w-10 h-[1px] bg-accent"></span>
                    <span class="text-accent text-sm font-bold tracking-widest uppercase">Blog</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-black mb-4">TIN TỨC & KIẾN THỨC</h2>
                <p class="text-slate-400 max-w-lg">Cập nhật những xu hướng mới nhất về AI, thiết kế web và marketing số từ đội ngũ AMD.</p>
            </div>
            <a href="{{ route('posts.index', ['type' => 'news']) }}" class="px-8 py-3 border border-slate-700 hover:border-accent rounded-full font-semibold text-slate-300 hover:text-white transition-all inline-flex items-center gap-2">
                Xem tất cả
                <span class="material-symbols-outlined text-lg">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($news as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="group block bg-slate-900/50 rounded-2xl border border-slate-800 hover:border-accent/50 transition-all duration-300 overflow-hidden">
                    <div class="aspect-[16/10] overflow-hidden relative">
                        <img alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" src="{{ $post->image ? asset('storage/' . $post->image) : asset('images/placeholder-project.svg') }}"/>
                        @if($post->category)
                            <div class="absolute top-3 left-3">
                                <span class="bg-accent/90 text-white text-[10px] px-3 py-1 rounded-full font-bold uppercase shadow-lg backdrop-blur-md">
                                    {{ $post->category->name }}
                                </span>
                            </div>
                        @endif
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-3 text-xs text-slate-500 mb-3">
                            <span class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-sm">calendar_today</span>
                                {{ $post->published_at?->format('d/m/Y') ?? $post->created_at->format('d/m/Y') }}
                            </span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2 group-hover:text-accent transition-colors line-clamp-2">{{ $post->title }}</h3>
                        <p class="text-slate-400 text-sm line-clamp-2">{{ $post->excerpt }}</p>
                        <div class="mt-4 flex items-center gap-2 text-accent text-sm font-semibold">
                            Đọc tiếp
                            <span class="material-symbols-outlined text-lg group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="py-24 relative overflow-hidden">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="bg-gradient-to-br from-slate-900 via-slate-900 to-indigo-950 p-12 md:p-20 rounded-[3rem] border border-slate-800 shadow-3xl">
            <h2 class="text-4xl font-bold mb-6">{{ setting('cta_title', 'Sẵn sàng để bùng nổ doanh số?') }}</h2>
            <p class="text-slate-400 text-lg mb-10">{{ setting('cta_description', 'Để lại số điện thoại, chúng tôi sẽ liên hệ tư vấn miễn phí trong vòng 5 phút!') }}</p>
            <form action="{{ route('contact.submit') }}" method="POST" class="flex flex-col sm:flex-row gap-4 max-w-xl mx-auto">
                @csrf
                <input type="hidden" name="subject" value="Đăng ký tư vấn từ trang chủ">
                <input class="flex-1 px-8 py-5 rounded-3xl bg-slate-800 border-none text-white focus:ring-2 focus:ring-primary" placeholder="Số điện thoại của bạn..." type="tel" name="phone" required/>
                <button type="submit" class="bg-gradient-to-r from-primary to-accent text-white px-10 py-5 rounded-3xl font-bold hover:opacity-90 transition-all shadow-xl flex items-center justify-center gap-2">
                    <span class="material-symbols-outlined">call</span>
                    Nhận tư vấn
                </button>
            </form>
            <div class="mt-8 flex flex-wrap items-center justify-center gap-6 text-xs text-slate-500 font-medium">
                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">shield</span> Bảo mật 100%</span>
                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">bolt</span> Phản hồi trong 5 phút</span>
                <span class="flex items-center gap-1"><span class="material-symbols-outlined text-[14px]">support_agent</span> Tư vấn miễn phí</span>
            </div>

            <!-- Direct Call Button -->
            <div class="mt-10 pt-8 border-t border-slate-800">
                <p class="text-slate-500 text-sm mb-4">Hoặc gọi trực tiếp ngay</p>
                <a href="tel:{{ setting('contact_phone', '0123456789') }}" class="inline-flex items-center gap-3 bg-green-500 hover:bg-green-600 text-white px-8 py-4 rounded-2xl font-bold transition-all">
                    <span class="material-symbols-outlined text-2xl">call</span>
                    <span class="text-xl">{{ setting('contact_phone', '0123 456 789') }}</span>
                </a>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/5 rounded-full blur-[100px] -z-10"></div>
</section>
@endsection
