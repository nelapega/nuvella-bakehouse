@extends('layouts.app')

@section('title', 'Semua Produk - Nuvella Bakehouse')

@section('content')
<!-- Breadcrumbs -->
<div class="py-3" style="background-color: var(--nuvella-soft-beige); border-bottom: 1px solid var(--nuvella-beige-border);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);"><i class="bi bi-house me-1"></i> Beranda</a></li>
                <li class="breadcrumb-item active" aria-current="page">Produk</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <!-- Header & Search Toolbar (Matching Mockup Top-Center) -->
        <div class="row align-items-center g-3 mb-4">
            <div class="col-md-7">
                <h2 class="font-serif fw-bold mb-1" style="color: var(--nuvella-chocolate);">Semua Produk</h2>
                <p class="text-muted small mb-0">Temukan kue favoritmu di sini!</p>
            </div>
            <div class="col-md-5">
                <form action="{{ route('products.index') }}" method="GET">
                    @if(request('category'))
                        <input type="hidden" name="category" value="{{ request('category') }}">
                    @endif
                    <div class="input-group">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}" 
                               class="form-control rounded-pill rounded-end-0 py-2 px-3 border-end-0" 
                               placeholder="Cari produk..." 
                               style="background-color: #FFFFFF; border-color: var(--nuvella-beige-border); font-size: 0.9rem;">
                        <button class="btn btn-choco-pill rounded-pill rounded-start-0 px-3" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row g-4">
            <!-- Left Sidebar: Kategori (Matching Mockup) -->
            <div class="col-lg-3 col-md-4">
                <div class="card border-0 shadow-sm rounded-4 p-4 sticky-top" style="top: 90px; background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                    <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">Kategori</h5>

                    <div class="d-flex flex-column gap-2">
                        <!-- Semua -->
                        <a href="{{ route('products.index', request()->except('category', 'page')) }}" 
                           class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded-3 {{ !request('category') ? 'fw-bold' : 'text-muted' }}" 
                           style="{{ !request('category') ? 'background-color: #F8F1E7; color: var(--nuvella-chocolate);' : '' }}">
                            <i class="bi bi-grid-fill" style="color: var(--nuvella-accent);"></i>
                            <span>Semua</span>
                        </a>

                        @foreach($categories as $cat)
                            <a href="{{ route('products.index', array_merge(request()->except('category', 'page'), ['category' => $cat->slug])) }}" 
                               class="d-flex align-items-center gap-2 text-decoration-none p-2 rounded-3 {{ request('category') == $cat->slug ? 'fw-bold' : 'text-muted' }}" 
                               style="{{ request('category') == $cat->slug ? 'background-color: #F8F1E7; color: var(--nuvella-chocolate);' : '' }}">
                                @if($cat->slug == 'cake')
                                    <i class="bi bi-cake2-fill" style="color: var(--nuvella-accent);"></i>
                                @elseif($cat->slug == 'cookies')
                                    <i class="bi bi-cookie" style="color: var(--nuvella-accent);"></i>
                                @elseif($cat->slug == 'pastry')
                                    <i class="bi bi-pie-chart-fill" style="color: var(--nuvella-accent);"></i>
                                @else
                                    <i class="bi bi-egg-fried" style="color: var(--nuvella-accent);"></i>
                                @endif
                                <span>{{ $cat->name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right Column: Products Grid -->
            <div class="col-lg-9 col-md-8">
                <div class="row g-4">
                    @forelse($products as $product)
                        <div class="col-lg-4 col-sm-6">
                            <div class="mockup-card">
                                <!-- Image Container -->
                                <div class="mockup-card-img-wrap">
                                    <a href="{{ route('products.show', $product->slug) }}">
                                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="mockup-card-img">
                                    </a>
                                    <!-- Wishlist heart button -->
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
                                            <i class="bi bi-star-fill"></i> {{ $product->rating ?? '4.8' }}
                                        </span>
                                    </div>

                                    <!-- Button Tambah ke Keranjang -->
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
                        <div class="col-12 text-center py-5">
                            <div class="card border-0 p-5 rounded-4 mx-auto" style="max-width: 450px; background-color: #FFFFFF; border: 1px solid var(--nuvella-beige-border) !important;">
                                <i class="bi bi-inbox fs-1 text-muted mb-2"></i>
                                <h5 class="font-serif" style="color: var(--nuvella-chocolate);">Produk Tidak Ditemukan</h5>
                                <p class="small text-muted mb-3">Tidak ada produk dalam kategori atau kata kunci tersebut.</p>
                                <a href="{{ route('products.index') }}" class="btn-choco-pill py-2 px-3 mx-auto" style="font-size: 0.85rem;">
                                    Reset Filter
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>

                <!-- Pagination (Matching Mockup < 1 2 >) -->
                <div class="d-flex justify-content-center mt-5">
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
