@extends('admin.layouts.app')

@section('title', 'Sửa tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active">Sửa</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sửa tag</h3>
                </div>
                <form action="{{ route('admin.tags.update', $tag) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên tag <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $tag->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <p class="text-muted mb-0">Slug: <code>{{ $tag->slug }}</code></p>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Cập nhật
                        </button>
                        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
                            <i class="bi bi-x-circle me-1"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
