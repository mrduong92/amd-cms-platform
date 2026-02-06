@extends('admin.layouts.app')

@section('title', 'Thêm sản phẩm')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Thêm mới</li>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.css">
@endpush

@section('content')
    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <!-- Basic Info -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="2">{{ old('short_description') }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control tinymce-editor @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- SEO -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">SEO</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="meta_title" class="form-label">Meta Title</label>
                            <input type="text" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" name="meta_title" value="{{ old('meta_title') }}" placeholder="Để trống sẽ dùng tên sản phẩm">
                            @error('meta_title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="2" placeholder="Để trống sẽ dùng mô tả ngắn">{{ old('meta_description') }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Specifications -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thông số kỹ thuật</h3>
                    </div>
                    <div class="card-body">
                        <div id="specs-container">
                            <div class="spec-row row mb-2">
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="specs[0][name]" placeholder="Tên thông số">
                                </div>
                                <div class="col-md-5">
                                    <input type="text" class="form-control" name="specs[0][value]" placeholder="Giá trị">
                                </div>
                                <div class="col-md-2">
                                    <button type="button" class="btn btn-danger btn-remove-spec" disabled>
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-secondary" id="btn-add-spec">
                            <i class="bi bi-plus-circle me-1"></i> Thêm thông số
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <!-- Settings -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Cài đặt</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Danh mục</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sku" class="form-label">Mã sản phẩm (SKU)</label>
                            <input type="text" class="form-control @error('sku') is-invalid @enderror" id="sku" name="sku" value="{{ old('sku') }}" placeholder="vd: SP001">
                            @error('sku')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="badge" class="form-label">Badge</label>
                            <input type="text" class="form-control @error('badge') is-invalid @enderror" id="badge" name="badge" value="{{ old('badge') }}" placeholder="vd: Bán chạy, Giảm giá">
                            @error('badge')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Sản phẩm nổi bật</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Kích hoạt</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="tags-input" class="form-label">Tags</label>
                            <input type="text" class="form-control" id="tags-input" name="tag_names" value="{{ old('tag_names') }}" placeholder="Nhập tag và nhấn Enter...">
                            <small class="text-muted">Nhập tag rồi nhấn Enter. Gợi ý tag có sẵn khi nhập.</small>
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Giá</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="price" class="form-label">Giá gốc (VNĐ)</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" min="0">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sale_price" class="form-label">Giá khuyến mãi (VNĐ)</label>
                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}" min="0">
                            @error('sale_price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Image -->
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Hình ảnh</h3>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh đại diện</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('image') is-invalid @enderror" id="image" name="image" value="{{ old('image') }}" readonly>
                                <button type="button" class="btn btn-outline-secondary" onclick="openFileBrowser('image', 'image')">
                                    <i class="bi bi-folder2-open"></i> Chọn ảnh
                                </button>
                            </div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="mt-2">
                                <img id="image_preview" src="" alt="" class="img-thumbnail" style="max-width: 200px; display:none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Thư viện ảnh</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="gallery_input" placeholder="Chọn nhiều ảnh từ thư viện" readonly>
                                <button type="button" class="btn btn-outline-secondary" onclick="openGalleryBrowser()">
                                    <i class="bi bi-images"></i> Chọn ảnh
                                </button>
                            </div>
                            <input type="hidden" name="gallery" id="gallery">
                            <small class="text-muted">Có thể chọn nhiều ảnh</small>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-check-circle me-1"></i> Lưu sản phẩm
                        </button>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100">
                            <i class="bi bi-x-circle me-1"></i> Hủy
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
<script>
    let specIndex = 1;

    document.getElementById('btn-add-spec').addEventListener('click', function() {
        const container = document.getElementById('specs-container');
        const newRow = document.createElement('div');
        newRow.className = 'spec-row row mb-2';
        newRow.innerHTML = `
            <div class="col-md-5">
                <input type="text" class="form-control" name="specs[${specIndex}][name]" placeholder="Tên thông số">
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" name="specs[${specIndex}][value]" placeholder="Giá trị">
            </div>
            <div class="col-md-2">
                <button type="button" class="btn btn-danger btn-remove-spec">
                    <i class="bi bi-trash"></i>
                </button>
            </div>
        `;
        container.appendChild(newRow);
        specIndex++;
        updateRemoveButtons();
    });

    document.getElementById('specs-container').addEventListener('click', function(e) {
        if (e.target.closest('.btn-remove-spec')) {
            e.target.closest('.spec-row').remove();
            updateRemoveButtons();
        }
    });

    function updateRemoveButtons() {
        const rows = document.querySelectorAll('.spec-row');
        rows.forEach((row, index) => {
            const btn = row.querySelector('.btn-remove-spec');
            btn.disabled = rows.length === 1;
        });
    }

    function openGalleryBrowser() {
        window.open('/filemanager?type=image', 'FileManager', 'width=900,height=600');
        window.SetUrl = function(items) {
            var urls = items.map(function(item) {
                return item.url;
            });
            document.getElementById('gallery_input').value = urls.length + ' ảnh đã chọn';
            document.getElementById('gallery').value = urls.join(',');
        };
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.min.js"></script>
<script>
    var tagInput = document.getElementById('tags-input');
    var allTags = @json($tags->pluck('name'));
    var tagify = new Tagify(tagInput, {
        whitelist: allTags,
        dropdown: {
            maxItems: 20,
            enabled: 0,
            closeOnSelect: false
        },
        originalInputValueFormat: function(values) {
            return values.map(function(item) { return item.value; }).join(',');
        }
    });
</script>
@endpush
