@extends('layouts.admin')

@section('title', 'Data Produk')
@section('header_title', 'Data Produk')

@section('content')
<div class="card border-0 shadow-sm rounded-4 p-4" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
    
    <!-- Table Header Toolbar (Matching Mockup Bottom-Right) -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h4 class="font-serif fw-bold mb-0" style="color: var(--admin-primary);">Data Produk</h4>
            <small class="text-muted">Total {{ $products->total() }} produk terdaftar dalam katalog</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.create') }}" class="btn-choco-pill px-4 py-2" style="font-size: 0.88rem;">
                <i class="bi bi-plus-lg"></i>
                <span>Tambah Produk</span>
            </a>
        </div>
    </div>

    <!-- Filter & Search Bar -->
    <div class="p-3 rounded-4 mb-4" style="background-color: #FAF5EE; border: 1px solid var(--admin-border);">
        <form action="{{ route('admin.products.index') }}" method="GET" class="row g-2 align-items-center">
            <div class="col-md-5">
                <div class="input-group">
                    <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
                    <input type="text" name="search" value="{{ request('search') }}" class="form-control border-start-0" placeholder="Cari nama produk...">
                </div>
            </div>
            <div class="col-md-4">
                <select name="category_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua Kategori --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-outline-choco w-100">Filter Data</button>
                @if(request()->hasAny(['search', 'category_id']))
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-danger" title="Reset">
                        <i class="bi bi-x-circle"></i>
                    </a>
                @endif
            </div>
        </form>
    </div>

    <!-- Table Matching Mockup (No | Gambar | Nama Produk | Kategori | Harga | Stok | Aksi) -->
    <div class="table-responsive">
        <table class="table-mockup">
            <thead>
                <tr>
                    <th style="width: 50px;">No</th>
                    <th style="width: 80px;">Gambar</th>
                    <th>Nama Produk</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th class="text-center" style="width: 90px;">Stok</th>
                    <th class="text-center" style="width: 170px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $index => $product)
                    <tr>
                        <td class="text-muted small">
                            {{ $products->firstItem() + $index }}
                        </td>
                        <td>
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="rounded-3 shadow-sm" style="width: 56px; height: 56px; object-fit: cover; border: 1px solid var(--admin-border);">
                        </td>
                        <td>
                            <strong class="d-block" style="color: var(--admin-primary); font-size: 0.95rem;">{{ $product->name }}</strong>
                            <small class="text-muted">Slug: <code>{{ $product->slug }}</code></small>
                        </td>
                        <td>
                            <span class="badge rounded-pill px-3 py-2" style="background-color: #FAF0E4; color: #7E4B25; border: 1px solid #EBD5C2;">
                                {{ $product->category->name }}
                            </span>
                        </td>
                        <td class="fw-bold" style="color: var(--admin-primary);">
                            {{ $product->formatted_price }}
                        </td>
                        <td class="text-center fw-bold">
                            {{ $product->stock ?? 50 }}
                        </td>
                        <td class="text-center">
                            <div class="d-inline-flex gap-2">
                                <!-- Edit Button (Matching Mockup) -->
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn-edit-pill">
                                    <i class="bi bi-pencil me-1"></i> Edit
                                </a>
                                <!-- Hapus Button (Matching Mockup) -->
                                <button type="button" class="btn-delete-pill" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                    <i class="bi bi-trash me-1"></i> Hapus
                                </button>
                            </div>

                            <!-- Delete Modal -->
                            <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content rounded-4 border-0 shadow">
                                        <div class="modal-header border-0 pb-0">
                                            <h5 class="modal-title font-serif text-danger">Konfirmasi Hapus Produk</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body py-3">
                                            <p class="mb-2">Hapus produk <strong>{{ $product->name }}</strong>?</p>
                                            <small class="text-muted">File gambar di <code>storage/public</code> juga akan dihapus secara permanen.</small>
                                        </div>
                                        <div class="modal-footer border-0 pt-0">
                                            <button type="button" class="btn btn-secondary rounded-pill px-3" data-bs-dismiss="modal">Batal</button>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger rounded-pill px-4">Ya, Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">Belum ada produk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination (Matching Mockup < 1 2 >) -->
    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mt-4 pt-3 border-top">
        <small class="text-muted">
            Menampilkan {{ $products->firstItem() ?? 0 }} - {{ $products->lastItem() ?? 0 }} dari {{ $products->total() }} produk
        </small>
        <div>
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@endsection
