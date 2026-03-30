@extends('master')
@section('content')

<div class="container bg-white p-5 rounded">
    <h1 class="mb-4">Sản phẩm</h1>

    {{-- Flash message --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Filter -->
    <div class="row g-2 mb-4">
        <div class="col-auto">
            <input type="text" id="search" class="form-control" placeholder="Tìm tên...">
        </div>
        <div class="col-auto">
            <select id="category" class="form-select">
                <option value="">-- Tất cả loại --</option>
                <option value="1">Điện thoại</option>
                <option value="2">Laptop</option>
            </select>
        </div>
        <div class="col-auto">
            <select id="sort" class="form-select">
                <option value="">-- Sắp xếp --</option>
                <option value="price-asc">Giá tăng dần</option>
                <option value="price-desc">Giá giảm dần</option>
            </select>
        </div>
        <div class="col-auto">
            <input type="text" id="price" class="form-control" placeholder="Giá tối đa">
        </div>
        <div class="col-auto">
            <button class="btn btn-secondary" onclick="filter()">Áp dụng</button>
        </div>
    </div>

    <a href="{{ route('formAdd') }}" class="link-primary text-decoration-underline fw-bold mb-3 d-block">
        <i class="bi bi-plus-circle"></i> Thêm sản phẩm
    </a>

    <!-- Table -->
    <table class="table table-bordered table-hover">
        <thead class="table-light text-center fw-bold">
            <tr>
                <th>Tên</th>
                <th>Giá</th>
                <th>Loại</th>
                <th>Tồn</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr data-name="{{ strtolower($product->name) }}"
                data-price="{{ $product->price }}"
                data-category="{{ $product->category_id }}"> {{-- Sửa categories_id -> category_id --}}
                <td>{{ $product->name }}</td>
                <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{{ $product->category->name ?? 'N/A' }}</td>
                <td>{{ $product->stock }}</td>
                <td class="text-center">
                    <a href="/products/{{ $product->id }}/edit" class="link-primary text-decoration-underline me-2">Sửa</a>
                    {{-- Sửa: truyền data-id và data-name, hàm đọc từ dataset --}}
                    <a class="link-danger text-decoration-underline"
                       style="cursor: pointer;"
                       onclick="deleteProduct(this)"
                       data-id="{{ $product->id }}"
                       data-name="{{ $product->name }}">Xóa</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-5">Không có sản phẩm nào</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Xác nhận xóa</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center py-5">
                <p class="fs-5 mb-2">Xóa sản phẩm <strong id="delName"></strong>?</p>
                <p class="text-danger fw-bold">Không thể hoàn tác</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-danger" onclick="confirmDelete()">Xóa</button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden Form for Delete -->
<form id="deleteForm" method="POST" action="{{ route('delete') }}" style="display: none;">
    @csrf
    <input type="hidden" id="deleteProductId" name="id">
</form>

<script>
    let deleteModal = null;

    // Sửa: nhận element (this), đọc data-id và data-name từ dataset
    function deleteProduct(el) {
        const id   = el.dataset.id;
        const name = el.dataset.name;

        document.getElementById('deleteProductId').value = id;
        document.getElementById('delName').textContent   = name;

        deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
        deleteModal.show();
    }

    function confirmDelete() {
        document.getElementById('deleteForm').submit();
    }

    function filter() {
        const search = document.getElementById('search').value.toLowerCase();
        const price  = parseFloat(document.getElementById('price').value) || Infinity;
        const rows   = document.querySelectorAll('tbody tr');

        rows.forEach(row => {
            const nameOk  = row.dataset.name?.includes(search);
            const priceOk = parseFloat(row.dataset.price) <= price;
            row.style.display = (nameOk && priceOk) ? '' : 'none';
        });
    }

    document.getElementById('search').addEventListener('keyup', filter);
</script>

@endsection