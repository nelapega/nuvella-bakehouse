@extends('layouts.app')

@section('title', 'Beranda - Nuvella Bakehouse')

@section('content')
<!-- Hero Section (Matching Mockup Top-Left) -->
<section class="py-4 py-lg-5" style="background: linear-gradient(180deg, #FDFBF7 0%, #F5ECE1 100%); position: relative; overflow: hidden;">
    <div class="container py-2">
        <div class="row align-items-center g-4">
            <!-- Left Copywriting -->
            <div class="col-lg-6 text-center text-lg-start">
                <!-- Welcome Pill -->
                <div class="d-inline-flex align-items-center gap-1 px-3 py-1 mb-3 rounded-pill" style="background-color: #FAF1E4; border: 1px solid #E5D5C3; color: #8A532B; font-size: 0.84rem; font-weight: 600;">
                    <span>Welcome to Nuvella Bakehouse</span>
                    <i class="bi bi-star-fill text-warning" style="font-size: 0.75rem;"></i>
                </div>

                <!-- Big Headline with Heart -->
                <h1 class="display-4 fw-bold mb-3" style="color: var(--nuvella-chocolate); line-height: 1.15; font-size: 3.2rem;">
                    Freshly Baked,<br>
                    Made with Heart <span style="color: var(--nuvella-chocolate); font-size: 2.5rem;">♡</span>
                </h1>

                <!-- Subtext -->
                <p class="mb-4" style="color: var(--nuvella-muted); font-size: 1.05rem; max-width: 480px; line-height: 1.6;">
                    Nikmati berbagai pilihan roti, cake, cookies, dan pastry dengan cita rasa terbaik.
                </p>

                <!-- CTA Button -->
                <div class="d-flex justify-content-center justify-content-lg-start mb-4">
                    <a href="{{ route('products.index') }}" class="btn-choco-pill px-4 py-3" style="font-size: 0.95rem;">
                        <span>Belanja Sekarang</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Right Hero Cake Image -->
            <div class="col-lg-6 text-center">
                <div class="position-relative mx-auto" style="max-width: 460px;">
                    <img src="{{ asset('images/hero-cake.svg') }}" alt="Chocolate Drip Cake Nuvella" class="img-fluid" style="filter: drop-shadow(0 15px 30px rgba(74, 40, 20, 0.18));">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Features Bar (Matching Mockup) -->
<section class="py-3" style="background-color: #FFFFFF; border-top: 1px solid var(--nuvella-beige-border); border-bottom: 1px solid var(--nuvella-beige-border);">
    <div class="container">
        <div class="row g-3 py-2 text-center text-md-start">
            <!-- Feature 1 -->
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <i class="bi bi-truck fs-3" style="color: var(--nuvella-chocolate);"></i>
                    <div class="lh-1">
                        <strong class="d-block" style="color: var(--nuvella-chocolate); font-size: 0.95rem;">Pengiriman Cepat</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Sameday & Instant</small>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <i class="bi bi-award fs-3" style="color: var(--nuvella-chocolate);"></i>
                    <div class="lh-1">
                        <strong class="d-block" style="color: var(--nuvella-chocolate); font-size: 0.95rem;">Produk Berkualitas</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">100% Bahan Alami</small>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <i class="bi bi-headset fs-3" style="color: var(--nuvella-chocolate);"></i>
                    <div class="lh-1">
                        <strong class="d-block" style="color: var(--nuvella-chocolate); font-size: 0.95rem;">Pelayanan Terbaik</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Respon Cepat & Ramah</small>
                    </div>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="col-md-3 col-6">
                <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3">
                    <i class="bi bi-gift fs-3" style="color: var(--nuvella-chocolate);"></i>
                    <div class="lh-1">
                        <strong class="d-block" style="color: var(--nuvella-chocolate); font-size: 0.95rem;">Kemasan Premium</strong>
                        <small class="text-muted" style="font-size: 0.75rem;">Aman & Rapi</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Kategori Kami (Matching Mockup 4 Cards) -->
<section class="py-5" style="background-color: #FBF8F4;">
    <div class="container py-2">
        <div class="text-center mb-4">
            <h3 class="font-serif fw-bold" style="color: var(--nuvella-chocolate); font-size: 1.85rem;">Kategori Kami</h3>
        </div>

        <div class="row g-4">
            <!-- 1. Cake -->
            <div class="col-lg-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <div class="rounded-3 overflow-hidden mb-3" style="aspect-ratio: 4/3; background-color: #F8EFE4;">
                        <img src="{{ asset('images/cat-cake.svg') }}" alt="Cake" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--nuvella-chocolate);">Cake</h5>
                    <a href="{{ route('products.index', ['category' => 'cake']) }}" class="small text-muted text-decoration-none d-inline-flex align-items-center gap-1">
                        <span>Lihat Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 2. Cookies -->
            <div class="col-lg-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <div class="rounded-3 overflow-hidden mb-3" style="aspect-ratio: 4/3; background-color: #F8EFE4;">
                        <img src="{{ asset('images/cat-cookies.svg') }}" alt="Cookies" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--nuvella-chocolate);">Cookies</h5>
                    <a href="{{ route('products.index', ['category' => 'cookies']) }}" class="small text-muted text-decoration-none d-inline-flex align-items-center gap-1">
                        <span>Lihat Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 3. Pastry -->
            <div class="col-lg-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <div class="rounded-3 overflow-hidden mb-3" style="aspect-ratio: 4/3; background-color: #F8EFE4;">
                        <img src="{{ asset('images/cat-pastry.svg') }}" alt="Pastry" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--nuvella-chocolate);">Pastry</h5>
                    <a href="{{ route('products.index', ['category' => 'pastry']) }}" class="small text-muted text-decoration-none d-inline-flex align-items-center gap-1">
                        <span>Lihat Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 4. Roti -->
            <div class="col-lg-3 col-6">
                <div class="card border-0 shadow-sm rounded-4 text-center p-3 h-100" style="background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <div class="rounded-3 overflow-hidden mb-3" style="aspect-ratio: 4/3; background-color: #F8EFE4;">
                        <img src="{{ asset('images/cat-roti.svg') }}" alt="Roti" class="w-100 h-100" style="object-fit: cover;">
                    </div>
                    <h5 class="font-serif fw-bold mb-1" style="color: var(--nuvella-chocolate);">Roti</h5>
                    <a href="{{ route('products.index', ['category' => 'roti']) }}" class="small text-muted text-decoration-none d-inline-flex align-items-center gap-1">
                        <span>Lihat Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Middle Story Banner (Matching Mockup with Croissant) -->
<section class="py-4">
    <div class="container">
        <div class="card border-0 rounded-4 overflow-hidden shadow-sm" style="background: linear-gradient(135deg, #F4E8D9 0%, #E8D3BD 100%); border: 1px solid var(--nuvella-beige-border) !important;">
            <div class="row align-items-center g-0">
                <div class="col-md-6 p-4 p-lg-5">
                    <h2 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate); font-size: 2.2rem; line-height: 1.2;">
                        Manisnya Hidup,<br>
                        Dimulai dari Sini ♡
                    </h2>
                    <p class="text-muted mb-4 small" style="line-height: 1.6; max-width: 420px;">
                        Temukan kebahagiaan dalam setiap gigitan bersama Nuvella Bakehouse.
                    </p>
                    <a href="{{ route('about') }}" class="btn-choco-pill px-4 py-2" style="font-size: 0.9rem;">
                        <span>Tentang Kami</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
                <div class="col-md-6 text-center p-3">
                    <img src="{{ asset('images/croissants-banner.svg') }}" alt="Croissant Banner" class="img-fluid rounded-4" style="max-height: 280px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: Produk Unggulan (Matching Mockup 4 Cards Grid) -->
<section class="py-5" style="background-color: #FBF8F4;">
    <div class="container py-2">
        <div class="d-flex justify-content-between align-items-end mb-4">
            <h3 class="font-serif fw-bold mb-0" style="color: var(--nuvella-chocolate); font-size: 1.85rem;">Produk Unggulan</h3>
            <a href="{{ route('products.index') }}" class="small text-muted text-decoration-none fw-bold">
                Lihat Semua &rarr;
            </a>
        </div>

        <div class="row g-4">
            @forelse($featuredProducts as $product)
                <div class="col-lg-3 col-md-6">
                    <div class="mockup-card">
                        <!-- Image Container -->
                        <div class="mockup-card-img-wrap">
                            <a href="{{ route('products.show', $product->slug) }}">
                                <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="mockup-card-img">
                            </a>
                            <!-- Wishlist button -->
                            <button type="button" class="wishlist-btn" onclick="this.classList.toggle('text-danger')" title="Tambah ke Favorit">
                                <i class="bi bi-heart"></i>
                            </button>
                        </div>

                        <!-- Card Body -->
                        <div class="p-3 d-flex flex-column flex-grow-1">
                            <h6 class="font-serif fw-bold mb-1" style="font-size: 1rem;">
                                <a href="{{ route('products.show', $product->slug) }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);">
                                    {{ $product->name }}
                                </a>
                            </h6>

                            <div class="d-flex align-items-center justify-content-between mb-3 small">
                                <span class="fw-bold" style="color: var(--nuvella-chocolate);">{{ $product->formatted_price }}</span>
                                <span class="text-warning small fw-bold">
                                    <i class="bi bi-star-fill"></i> {{ $product->rating ?? '4.9' }}
                                </span>
                            </div>

                            <!-- Button Tambah ke Keranjang (Matching Mockup) -->
                            <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-auto">
                                @csrf
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn-choco-pill w-100 py-2 justify-content-center" style="font-size: 0.8rem; border-radius: 9999px;">
                                    <span>Tambah ke Keranjang</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-4">
                    <p class="text-muted">Belum ada produk unggulan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
