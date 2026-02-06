@extends('admin.layouts.app')

@section('title', 'Thêm tag')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('admin.tags.index') }}">Tags</a></li>
    <li class="breadcrumb-item active">Thêm mới</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Thêm tag mới</h3>
                </div>
                <form action="{{ route('admin.tags.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên tag <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-check-circle me-1"></i> Lưu
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
