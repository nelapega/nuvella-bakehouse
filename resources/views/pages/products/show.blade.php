@extends('layouts.app')

@section('title', $product->name . ' - Nuvella Bakehouse')

@section('content')
<!-- Breadcrumbs (Matching Mockup Top-Right) -->
<div class="py-3" style="background-color: var(--nuvella-soft-beige); border-bottom: 1px solid var(--nuvella-beige-border);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);"><i class="bi bi-house me-1"></i> Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);">Produk</a></li>
                <li class="breadcrumb-item active text-truncate" aria-current="page">{{ $product->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center mb-5">
            <!-- Left: Large Image View -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden position-relative p-3" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <div style="aspect-ratio: 4/3; max-height: 440px; overflow: hidden; background-color: #F8F1E7;" class="rounded-3">
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                </div>
            </div>

            <!-- Right: Product Information (Matching Mockup) -->
            <div class="col-lg-6">
                <div class="ps-lg-3">
                    <!-- Title -->
                    <h2 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate); font-size: 2.2rem;">
                        {{ $product->name }}
                    </h2>

                    <!-- Price -->
                    <div class="fs-3 fw-bold mb-2" style="color: var(--nuvella-chocolate);">
                        {{ $product->formatted_price }}
                    </div>

                    <!-- Rating & Reviews -->
                    <div class="d-flex align-items-center gap-2 mb-3 small text-muted">
                        <span class="text-warning fw-bold"><i class="bi bi-star-fill"></i> {{ $product->rating ?? '4.9' }}</span>
                        <span>({{ $product->reviews_count ?? '120' }} ulasan)</span>
                    </div>

                    <!-- Short Description -->
                    <p class="text-muted mb-4 small" style="line-height: 1.7; font-size: 0.95rem;">
                        {{ $product->description }}
                    </p>

                    <!-- Add to Cart Form with Quantity Selector -->
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mb-4">
                        @csrf
                        <div class="d-flex align-items-center gap-3">
                            <!-- Quantity Selector [- 1 +] -->
                            <div class="d-inline-flex align-items-center border rounded-pill px-3 py-2 bg-white" style="border-color: var(--nuvella-beige-border) !important;">
                                <button type="button" class="btn btn-sm btn-link p-0 text-dark text-decoration-none fw-bold" onclick="let q = document.getElementById('qtyInput'); if(q.value > 1) q.value--;">-</button>
                                <input type="number" name="quantity" id="qtyInput" value="1" min="1" max="{{ $product->stock ?? 99 }}" class="form-control border-0 text-center p-0 fw-bold" style="width: 45px; background: transparent;">
                                <button type="button" class="btn btn-sm btn-link p-0 text-dark text-decoration-none fw-bold" onclick="let q = document.getElementById('qtyInput'); q.value++;">+</button>
                            </div>

                            <!-- Button Tambah ke Keranjang -->
                            <button type="submit" class="btn-choco-pill px-4 py-2" style="font-size: 0.95rem;">
                                <i class="bi bi-plus-lg"></i>
                                <span>Tambah ke Keranjang</span>
                            </button>
                        </div>
                    </form>

                    <!-- 3 Feature Badges (Matching Mockup) -->
                    <div class="row g-2 pt-3 border-top text-center">
                        <div class="col-4">
                            <div class="p-2 rounded-3 border bg-white small text-muted">
                                <i class="bi bi-shield-check fs-4 d-block mb-1" style="color: var(--nuvella-accent);"></i>
                                <span class="d-block fw-bold text-dark" style="font-size: 0.8rem;">Bahan Premium</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 rounded-3 border bg-white small text-muted">
                                <i class="bi bi-emoji-smile fs-4 d-block mb-1" style="color: var(--nuvella-accent);"></i>
                                <span class="d-block fw-bold text-dark" style="font-size: 0.8rem;">Rasa Lezat</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="p-2 rounded-3 border bg-white small text-muted">
                                <i class="bi bi-box2 fs-4 d-block mb-1" style="color: var(--nuvella-accent);"></i>
                                <span class="d-block fw-bold text-dark" style="font-size: 0.8rem;">Kemasan Aman</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Tabs Navigation (Matching Mockup: Deskripsi | Detail Produk | Ulasan) -->
        <div class="card border-0 shadow-sm rounded-4 p-4 mt-5" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
            <ul class="nav nav-pills gap-2 mb-3 border-bottom pb-3" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active rounded-pill px-4" id="desc-tab" data-bs-toggle="pill" data-bs-target="#desc-pane" type="button" role="tab" style="background-color: var(--nuvella-btn-brown); color: #fff;">Deskripsi</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 text-dark" id="detail-tab" data-bs-toggle="pill" data-bs-target="#detail-pane" type="button" role="tab">Detail Produk</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link rounded-pill px-4 text-dark" id="review-tab" data-bs-toggle="pill" data-bs-target="#review-pane" type="button" role="tab">Ulasan ({{ $product->reviews_count ?? '120' }})</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabsContent">
                <!-- Tab 1: Deskripsi -->
                <div class="tab-pane fade show active py-2" id="desc-pane" role="tabpanel">
                    <p class="text-muted leading-relaxed mb-0" style="line-height: 1.8;">
                        {{ $product->description }}
                    </p>
                </div>

                <!-- Tab 2: Detail Produk -->
                <div class="tab-pane fade py-2" id="detail-pane" role="tabpanel">
                    <div class="row g-3 small">
                        <div class="col-sm-6">
                            <strong>Kategori:</strong> {{ $product->category->name }}
                        </div>
                        <div class="col-sm-6">
                            <strong>Porsi / Ukuran:</strong> {{ $product->weight_portion ?? 'Standar Baker' }}
                        </div>
                        <div class="col-sm-6">
                            <strong>Sisa Stok:</strong> {{ $product->stock ?? 50 }} pcs siap kirim
                        </div>
                        <div class="col-sm-6">
                            <strong>Komposisi:</strong> {{ $product->ingredients ?? 'Tepung gandum pilihan, butter murni, gula, ragi segar, garam laut' }}
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Ulasan -->
                <div class="tab-pane fade py-2" id="review-pane" role="tabpanel">
                    <div class="d-flex align-items-center gap-2 mb-2 text-warning">
                        <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        <span class="text-dark fw-bold ms-1">4.9 dari 5</span>
                    </div>
                    <p class="small text-muted mb-0">
                        "Produk ini sangat disukai oleh pelanggan setia Nuvella Bakehouse dengan cita rasa otentik yang konsisten."
                    </p>
                </div>
            </div>
        </div>

        <!-- Related Products Section -->
        @if($relatedProducts->count() > 0)
            <div class="mt-5 pt-4">
                <h4 class="font-serif fw-bold mb-4" style="color: var(--nuvella-chocolate);">Koleksi Serupa di Kategori {{ $product->category->name }}</h4>
                <div class="row g-4">
                    @foreach($relatedProducts as $rel)
                        <div class="col-lg-3 col-6">
                            <div class="mockup-card">
                                <div class="mockup-card-img-wrap">
                                    <a href="{{ route('products.show', $rel->slug) }}">
                                        <img src="{{ $rel->image_url }}" alt="{{ $rel->name }}" class="mockup-card-img">
                                    </a>
                                </div>
                                <div class="p-3 d-flex flex-column flex-grow-1">
                                    <h6 class="font-serif fw-bold mb-1">
                                        <a href="{{ route('products.show', $rel->slug) }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);">
                                            {{ $rel->name }}
                                        </a>
                                    </h6>
                                    <div class="small fw-bold mb-2" style="color: var(--nuvella-chocolate);">
                                        {{ $rel->formatted_price }}
                                    </div>
                                    <a href="{{ route('products.show', $rel->slug) }}" class="btn-choco-pill w-100 py-1 justify-content-center mt-auto" style="font-size: 0.78rem;">
                                        Lihat Detail
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</section>
@endsection
