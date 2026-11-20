@extends('layouts.admin')

@section('title', 'Detail Produk - ' . $product->name)
@section('header_title', 'Detail Data Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-10">

        <div class="card-admin mb-4">
            <div class="card-admin-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--admin-primary);">{{ $product->name }}</h5>
                    <small class="text-muted">ID Produk: #{{ $product->id }} &bull; Slug: <code>{{ $product->slug }}</code></small>
                </div>
                <div class="d-flex gap-2">
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-outline-warning">
                        <i class="bi bi-pencil-square me-1"></i> Edit Data
                    </a>
                    <a href="{{ route('products.show', $product->slug) }}" target="_blank" class="btn btn-sm btn-outline-info">
                        <i class="bi bi-box-arrow-up-right me-1"></i> Pratinjau Publik
                    </a>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </div>

            <div class="p-4">
                <div class="row g-4 align-items-start">
                    <!-- Product Image -->
                    <div class="col-md-5">
                        <div class="border rounded-4 p-2 bg-light text-center">
                            <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-100 rounded-3 shadow-sm" style="max-height: 350px; object-fit: cover;">
                        </div>
                        <div class="p-3 bg-light rounded-3 mt-3 small text-muted">
                            <strong class="d-block text-dark"><i class="bi bi-folder2-open me-1"></i> Lokasi Penyimpanan Gambar:</strong>
                            <code>{{ $product->image ? 'storage/app/public/' . $product->image : 'Default Logo' }}</code>
                        </div>
                    </div>

                    <!-- Product Information Details -->
                    <div class="col-md-7">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle">
                                <tbody>
                                    <tr>
                                        <th style="width: 180px;" class="table-light">Nama Produk</th>
                                        <td class="fw-bold fs-5" style="color: var(--admin-primary);">{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Kategori (Relasi)</th>
                                        <td>
                                            <span class="badge bg-secondary px-3 py-2">
                                                <i class="bi bi-tags-fill me-1"></i> {{ $product->category->name }}
                                            </span>
                                            <small class="text-muted ms-2">(ID Kategori: {{ $product->category->id }})</small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Harga Jual</th>
                                        <td class="fw-bold fs-5 text-success">{{ $product->formatted_price }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Porsi / Ukuran</th>
                                        <td>{{ $product->weight_portion ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Status Ketersediaan</th>
                                        <td>
                                            @if($product->is_available)
                                                <span class="badge bg-success">Tersedia (Ready)</span>
                                            @else
                                                <span class="badge bg-danger">Habis / Pre-Order</span>
                                            @endif

                                            @if($product->is_featured)
                                                <span class="badge bg-warning text-dark ms-1"><i class="bi bi-star-fill"></i> Unggulan</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Bahan / Komposisi</th>
                                        <td class="small">{{ $product->ingredients ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Deskripsi Lengkap</th>
                                        <td class="small text-muted leading-relaxed">{{ $product->description }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Waktu Dibuat</th>
                                        <td class="small text-muted">{{ $product->created_at->format('d F Y, H:i:s') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="table-light">Terakhir Diperbarui</th>
                                        <td class="small text-muted">{{ $product->updated_at->format('d F Y, H:i:s') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
