@extends('admin.layouts.app')

@section('title', 'Sửa sản phẩm')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.products.index') }}">Sản phẩm</a></li>
    <li class="breadcrumb-item active">Sửa</li>
@endsection

@section('content')
    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="short_description" class="form-label">Mô tả ngắn</label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" id="short_description" name="short_description" rows="2">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="10">{{ old('description', $product->description) }}</textarea>
                            @error('description')
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
                            @forelse($product->specs as $index => $spec)
                                <div class="spec-row row mb-2">
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="specs[{{ $index }}][name]" value="{{ $spec->spec_name }}" placeholder="Tên thông số">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" class="form-control" name="specs[{{ $index }}][value]" value="{{ $spec->spec_value }}" placeholder="Giá trị">
                                    </div>
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-danger btn-remove-spec" {{ $product->specs->count() == 1 ? 'disabled' : '' }}>
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @empty
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
                            @endforelse
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
                                    <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="badge" class="form-label">Badge</label>
                            <input type="text" class="form-control @error('badge') is-invalid @enderror" id="badge" name="badge" value="{{ old('badge', $product->badge) }}" placeholder="vd: Bán chạy, Giảm giá">
                            @error('badge')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_featured">Sản phẩm nổi bật</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Kích hoạt</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="text-muted mb-1">Slug: <code>{{ $product->slug }}</code></p>
                            <p class="text-muted mb-0">Tạo: {{ $product->created_at->format('d/m/Y H:i') }}</p>
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
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price', $product->price) }}" min="0">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="sale_price" class="form-label">Giá khuyến mãi (VNĐ)</label>
                            <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}" min="0">
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
                            @if($product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Chọn ảnh mới để thay đổi</small>
                        </div>

                        <div class="mb-3">
                            <label for="gallery" class="form-label">Thêm ảnh vào thư viện</label>
                            <input type="file" class="form-control @error('gallery') is-invalid @enderror" id="gallery" name="gallery[]" accept="image/*" multiple>
                            @error('gallery')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        @if($product->images->count() > 0)
                            <label class="form-label">Thư viện ảnh hiện tại</label>
                            <div class="row g-2">
                                @foreach($product->images as $image)
                                    <div class="col-4">
                                        <div class="position-relative">
                                            <img src="{{ asset('storage/' . $image->image) }}" alt="" class="img-thumbnail w-100" style="height: 80px; object-fit: cover;">
                                            <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" onclick="deleteImage({{ $image->id }})">
                                                <i class="bi bi-x"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Actions -->
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary w-100 mb-2">
                            <i class="bi bi-check-circle me-1"></i> Cập nhật
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
    let specIndex = {{ $product->specs->count() ?: 1 }};

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

    function deleteImage(imageId) {
        if (confirm('Bạn có chắc chắn muốn xóa ảnh này?')) {
            fetch(`{{ route('admin.products.images.delete', [$product->id, '']) }}/${imageId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken,
                    'Accept': 'application/json',
                }
            }).then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                }
            });
        }
    }
</script>
@endpush
