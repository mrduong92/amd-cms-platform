<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }} Admin</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- AdminLTE 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta1/dist/css/adminlte.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Custom Admin Styles -->
    <style>
        :root {
            --admin-primary: #F97316;
            --admin-secondary: #0F172A;
        }
        body {
            font-family: 'Inter', sans-serif;
        }
        .sidebar-dark-primary .nav-sidebar > .nav-item > .nav-link.active,
        .sidebar-light-primary .nav-sidebar > .nav-item > .nav-link.active {
            background-color: var(--admin-primary);
            color: #fff;
        }
        .btn-primary {
            background-color: var(--admin-primary);
            border-color: var(--admin-primary);
        }
        .btn-primary:hover {
            background-color: #ea580c;
            border-color: #ea580c;
        }
        .text-primary {
            color: var(--admin-primary) !important;
        }
        .bg-primary {
            background-color: var(--admin-primary) !important;
        }
        .card {
            box-shadow: 0 0 1px rgba(0,0,0,.125), 0 1px 3px rgba(0,0,0,.2);
            border: 0;
        }
        .card-header {
            background-color: transparent;
            border-bottom: 1px solid rgba(0,0,0,.125);
        }
        .table th {
            font-weight: 600;
            font-size: 0.875rem;
        }
        .badge {
            font-weight: 500;
        }
        .form-label {
            font-weight: 500;
        }
    </style>

    @stack('styles')
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <!-- Navbar -->
        @include('admin.layouts.navbar')

        <!-- Sidebar -->
        @include('admin.layouts.sidebar')

        <!-- Content Wrapper -->
        <main class="app-main">
            <!-- Content Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">@yield('title', 'Dashboard')</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                @yield('breadcrumb')
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="app-content">
                <div class="container-fluid">
                    <!-- Flash Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-circle me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
        </main>

        <!-- Footer -->
        <footer class="app-footer">
            <div class="float-end d-none d-sm-inline">
                NMT AUTO CMS
            </div>
            <strong>&copy; {{ date('Y') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a>.</strong> All rights reserved.
        </footer>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AdminLTE 4 JS -->
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@4.0.0-beta1/dist/js/adminlte.min.js"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/4zt4ijr688a6rs60w6abrifsb6lsqm1yzlquu14lvdcsy1s2/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- SortableJS for drag-and-drop -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

    <!-- Common Scripts -->
    <script>
        // CSRF Token for AJAX
        window.csrfToken = '{{ csrf_token() }}';

        // Laravel Filemanager helper
        function openFileBrowser(inputId, type = 'image') {
            var route_prefix = '/filemanager';
            window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
            window.SetUrl = function(items) {
                var file_path = items.map(function(item) {
                    return item.url;
                }).join(',');
                document.getElementById(inputId).value = file_path;
                // Trigger preview update if exists
                var previewId = inputId + '_preview';
                var preview = document.getElementById(previewId);
                if (preview && type === 'image') {
                    preview.src = file_path;
                    preview.style.display = 'block';
                }
            };
        }

        // Initialize TinyMCE for elements with class 'tinymce-editor'
        function initTinyMCE(selector = '.tinymce-editor') {
            tinymce.init({
                selector: selector,
                height: 400,
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                file_picker_callback: function(callback, value, meta) {
                    var type = meta.filetype === 'image' ? 'image' : 'file';
                    var route_prefix = '/filemanager';
                    window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
                    window.SetUrl = function(items) {
                        callback(items[0].url);
                    };
                },
                relative_urls: false,
                remove_script_host: false,
                content_style: 'body { font-family: Inter, sans-serif; font-size: 14px; }',
            });
        }

        // Common AJAX setup
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-hide alerts after 5 seconds
            setTimeout(function() {
                document.querySelectorAll('.alert-dismissible').forEach(function(alert) {
                    var bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                });
            }, 5000);

            // Auto-initialize TinyMCE if elements exist
            if (document.querySelector('.tinymce-editor')) {
                initTinyMCE();
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
