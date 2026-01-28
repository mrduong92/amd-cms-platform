@extends('admin.layouts.app')

@section('title', 'Cài đặt')

@section('breadcrumb')
    <li class="breadcrumb-item active">Cài đặt</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Settings Tabs -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Nhóm cài đặt</h3>
                </div>
                <div class="card-body p-0">
                    <ul class="nav flex-column nav-pills">
                        @foreach($groups as $g)
                            <li class="nav-item">
                                <a href="{{ route('admin.settings.index', ['group' => $g]) }}"
                                   class="nav-link {{ $group == $g ? 'active' : '' }}">
                                    @switch($g)
                                        @case('general')
                                            <i class="bi bi-gear me-2"></i> Chung
                                            @break
                                        @case('contact')
                                            <i class="bi bi-telephone me-2"></i> Liên hệ
                                            @break
                                        @case('social')
                                            <i class="bi bi-share me-2"></i> Mạng xã hội
                                            @break
                                        @case('seo')
                                            <i class="bi bi-search me-2"></i> SEO
                                            @break
                                        @case('footer')
                                            <i class="bi bi-layout-text-sidebar me-2"></i> Footer
                                            @break
                                        @case('security')
                                            <i class="bi bi-shield-lock me-2"></i> Bảo mật
                                            @break
                                        @case('homepage')
                                            <i class="bi bi-house me-2"></i> Trang chủ
                                            @break
                                        @default
                                            <i class="bi bi-sliders me-2"></i> {{ ucfirst($g) }}
                                    @endswitch
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        @switch($group)
                            @case('general')
                                Cài đặt chung
                                @break
                            @case('contact')
                                Thông tin liên hệ
                                @break
                            @case('social')
                                Mạng xã hội
                                @break
                            @case('seo')
                                Cài đặt SEO
                                @break
                            @case('footer')
                                Cài đặt Footer
                                @break
                            @case('security')
                                Cài đặt Bảo mật
                                @break
                            @case('homepage')
                                Cài đặt Trang chủ
                                @break
                            @default
                                {{ ucfirst($group) }}
                        @endswitch
                    </h3>
                </div>
                <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="group" value="{{ $group }}">
                    <div class="card-body">
                        @foreach($settings as $setting)
                            <div class="mb-3">
                                <label for="{{ $setting->key }}" class="form-label">
                                    {{ $setting->label ?? $setting->key }}
                                </label>

                                @switch($setting->type)
                                    @case('text')
                                    @case('email')
                                    @case('url')
                                    @case('number')
                                        <input type="{{ $setting->type }}"
                                               class="form-control"
                                               id="{{ $setting->key }}"
                                               name="{{ $setting->key }}"
                                               value="{{ old($setting->key, $setting->value) }}">
                                        @break

                                    @case('textarea')
                                        <textarea class="form-control"
                                                  id="{{ $setting->key }}"
                                                  name="{{ $setting->key }}"
                                                  rows="3">{{ old($setting->key, $setting->value) }}</textarea>
                                        @break

                                    @case('boolean')
                                        <div class="form-check form-switch">
                                            <input class="form-check-input"
                                                   type="checkbox"
                                                   id="{{ $setting->key }}"
                                                   name="{{ $setting->key }}"
                                                   value="1"
                                                   {{ old($setting->key, $setting->value) ? 'checked' : '' }}>
                                        </div>
                                        @break

                                    @case('image')
                                        @if($setting->value)
                                            <div class="mb-2">
                                                <img src="{{ asset('storage/' . $setting->value) }}" alt="" class="img-thumbnail" style="max-width: 200px;">
                                            </div>
                                        @endif
                                        <input type="file"
                                               class="form-control"
                                               id="{{ $setting->key }}"
                                               name="{{ $setting->key }}"
                                               accept="image/*">
                                        @break
                                @endswitch

                                @if($setting->description)
                                    <small class="text-muted">{{ $setting->description }}</small>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Lưu cài đặt
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
