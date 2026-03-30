@extends('master')
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Card Header -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h2 class="mb-0">Thêm Sản Phẩm Mới</h2>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Hiển thị lỗi validation -->
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Lỗi!</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('store') }}" method="POST">
                        @csrf

                        <!-- Tên Sản Phẩm -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">Tên Sản Phẩm</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Nhập tên sản phẩm..." value="{{ old('name') }}" required>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Giá Sản Phẩm -->
                        <div class="mb-3">
                            <label for="price" class="form-label fw-bold">Giá (VNĐ)</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Nhập giá sản phẩm..." value="{{ old('price') }}" step="1000" min="0" required>
                            @error('price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Số Lượng Kho -->
                        <div class="mb-3">
                            <label for="stock" class="form-label fw-bold">Số Lượng Kho</label>
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" placeholder="Nhập số lượng kho..." value="{{ old('stock') }}" min="0" required>
                            @error('stock')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Danh Mục -->
                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-bold">Danh Mục</label>
                            <select
                                class="form-select @error('category_id') is-invalid @enderror"
                                id="category_id"
                                name="category_id"
                                required>
                                <option value="" selected disabled>-- Chọn danh mục --</option>
                                <option value="1" @selected(old('category_id')==1)>Điện thoại</option>
                                <option value="2" @selected(old('category_id')==2)>Laptop</option>
                                <option value="3" @selected(old('category_id')==3)>Tai nghe</option>
                                <option value="4" @selected(old('category_id')==4)>Phụ kiện</option>
                                <option value="5" @selected(old('category_id')==5)>Đồng hồ</option>
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('index') }}" class="btn btn-secondary">
                                Hủy
                            </a>
                            <button type="submit" class="btn btn-primary">
                                Thêm Sản Phẩm
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection