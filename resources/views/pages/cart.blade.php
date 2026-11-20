@extends('layouts.app')

@section('title', 'Keranjang Belanja - Nuvella Bakehouse')

@section('content')
<!-- Breadcrumbs -->
<div class="py-3" style="background-color: var(--nuvella-soft-beige); border-bottom: 1px solid var(--nuvella-beige-dark);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);"><i class="bi bi-house me-1"></i> Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('products.index') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);">Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page">Keranjang Belanja</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h2 class="font-serif fw-bold mb-4" style="color: var(--nuvella-chocolate);">
            <i class="bi bi-cart3 me-2" style="color: var(--nuvella-caramel);"></i> Keranjang Belanja
        </h2>

        @if(!empty($cart) && count($cart) > 0)
            <div class="row g-4">
                <!-- Left: Table of Cart Items -->
                <div class="col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-3 p-md-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                        <div class="table-responsive">
                            <table class="table align-middle mb-0">
                                <thead class="small text-muted text-uppercase" style="border-bottom: 2px solid var(--nuvella-beige-dark);">
                                    <tr>
                                        <th>Produk</th>
                                        <th class="text-center" style="width: 140px;">Jumlah</th>
                                        <th class="text-end" style="width: 130px;">Subtotal</th>
                                        <th style="width: 50px;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $id => $item)
                                        <tr>
                                            <!-- Product Info -->
                                            <td class="py-3">
                                                <div class="d-flex align-items-center gap-3">
                                                    <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="rounded-3 shadow-sm" style="width: 65px; height: 65px; object-fit: cover; border: 1px solid var(--nuvella-beige-dark);">
                                                    <div>
                                                        <a href="{{ route('products.show', $item['slug']) }}" class="text-decoration-none fw-bold d-block" style="color: var(--nuvella-chocolate); font-size: 1rem;">
                                                            {{ $item['name'] }}
                                                        </a>
                                                        <small class="text-muted">Rp {{ number_format($item['price'], 0, ',', '.') }}</small>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Quantity Selector -->
                                            <td class="text-center py-3">
                                                <form action="{{ route('cart.update', $id) }}" method="POST" class="d-inline-flex align-items-center border rounded-pill px-2 py-1 bg-white" style="border-color: var(--nuvella-beige-dark) !important;">
                                                    @csrf
                                                    <button type="submit" name="quantity" value="{{ $item['quantity'] - 1 }}" class="btn btn-sm btn-link p-0 text-dark text-decoration-none" style="width: 22px;">-</button>
                                                    <span class="px-2 fw-bold" style="font-size: 0.9rem;">{{ $item['quantity'] }}</span>
                                                    <button type="submit" name="quantity" value="{{ $item['quantity'] + 1 }}" class="btn btn-sm btn-link p-0 text-dark text-decoration-none" style="width: 22px;">+</button>
                                                </form>
                                            </td>

                                            <!-- Subtotal -->
                                            <td class="text-end fw-bold py-3" style="color: var(--nuvella-chocolate);">
                                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            </td>

                                            <!-- Remove Action -->
                                            <td class="text-center py-3">
                                                <form action="{{ route('cart.remove', $id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-link text-danger p-0" title="Hapus Item">
                                                        <i class="bi bi-trash3 fs-5"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Action footer -->
                        <div class="d-flex justify-content-between align-items-center pt-4 mt-2 border-top">
                            <a href="{{ route('products.index') }}" class="btn btn-outline-chocolate rounded-pill px-4">
                                <i class="bi bi-arrow-left me-1"></i> Lanjut Belanja
                            </a>
                            <form action="{{ route('cart.clear') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-link text-muted text-decoration-none" onclick="return confirm('Kosongkan keranjang belanja?')">
                                    <i class="bi bi-trash me-1"></i> Kosongkan Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Right: Ringkasan Belanja -->
                <div class="col-lg-4">
                    <div class="card border-0 shadow-sm rounded-4 p-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                        <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">Ringkasan Belanja</h5>

                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Subtotal Produk</span>
                            <span class="fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-3 small">
                            <span class="text-muted">Ongkos Kirim Flat</span>
                            <span class="fw-bold">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                        </div>

                        <hr style="border-color: var(--nuvella-beige-dark);">

                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold" style="color: var(--nuvella-chocolate);">Total Pembayaran</span>
                            <span class="fs-5 fw-bold" style="color: var(--nuvella-caramel);">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                        </div>

                        <a href="{{ route('checkout.index') }}" class="btn btn-caramel w-100 py-3 rounded-pill fw-bold text-center d-flex align-items-center justify-content-center gap-2 shadow">
                            <span>Checkout Sekarang</span>
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <div class="p-3 bg-light rounded-3 mt-4 text-center small text-muted">
                            <i class="bi bi-shield-check text-success me-1"></i> Pembayaran Aman & Garansi Kue Segar
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Empty Cart State -->
            <div class="text-center py-5">
                <div class="card border-0 shadow-sm rounded-4 p-5 mx-auto" style="max-width: 500px; background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                    <i class="bi bi-cart-x display-2 text-muted mb-3"></i>
                    <h4 class="font-serif mb-2" style="color: var(--nuvella-chocolate);">Keranjang Masih Kosong</h4>
                    <p class="text-muted small mb-4">Anda belum memasukkan produk bakery ke dalam keranjang belanja.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-caramel px-4 rounded-pill">
                        <i class="bi bi-bag-plus me-1"></i> Mulai Belanja Sekarang
                    </a>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection
