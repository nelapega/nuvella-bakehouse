@extends('layouts.app')

@section('title', 'Checkout Pemesanan - Nuvella Bakehouse')

@section('content')
<!-- Breadcrumbs -->
<div class="py-3" style="background-color: var(--nuvella-soft-beige); border-bottom: 1px solid var(--nuvella-beige-dark);">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);"><i class="bi bi-house me-1"></i> Beranda</a></li>
                <li class="breadcrumb-item"><a href="{{ route('cart.index') }}" class="text-decoration-none" style="color: var(--nuvella-chocolate);">Keranjang</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </nav>
    </div>
</div>

<section class="py-5">
    <div class="container">
        <h2 class="font-serif fw-bold mb-4" style="color: var(--nuvella-chocolate);">
            <i class="bi bi-credit-card me-2" style="color: var(--nuvella-caramel);"></i> Checkout Pemesanan
        </h2>

        <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <div class="row g-4">
                <!-- Left: Informasi Pengiriman -->
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                        <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">
                            Informasi Pengiriman
                        </h5>

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="customer_name" class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="customer_name" 
                                       id="customer_name" 
                                       value="{{ old('customer_name', 'Neyla Vega') }}" 
                                       class="form-control @error('customer_name') is-invalid @enderror" 
                                       placeholder="Contoh: Neyla Vega" 
                                       required>
                                @error('customer_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="customer_address" class="form-label small fw-bold">Alamat Lengkap <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="customer_address" 
                                       id="customer_address" 
                                       value="{{ old('customer_address', 'Jl. Melati No. 123') }}" 
                                       class="form-control @error('customer_address') is-invalid @enderror" 
                                       placeholder="Jl. Melati No. 123, Kelurahan, Kecamatan" 
                                       required>
                                @error('customer_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-7">
                                <label for="customer_city" class="form-label small fw-bold">Kota <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="customer_city" 
                                       id="customer_city" 
                                       value="{{ old('customer_city', 'Jakarta') }}" 
                                       class="form-control @error('customer_city') is-invalid @enderror" 
                                       placeholder="Jakarta" 
                                       required>
                                @error('customer_city')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-5">
                                <label for="customer_postal_code" class="form-label small fw-bold">Kode Pos <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="customer_postal_code" 
                                       id="customer_postal_code" 
                                       value="{{ old('customer_postal_code', '12345') }}" 
                                       class="form-control @error('customer_postal_code') is-invalid @enderror" 
                                       placeholder="12345" 
                                       required>
                                @error('customer_postal_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="customer_phone" class="form-label small fw-bold">No. HP / WhatsApp <span class="text-danger">*</span></label>
                                <input type="text" 
                                       name="customer_phone" 
                                       id="customer_phone" 
                                       value="{{ old('customer_phone', '081234567890') }}" 
                                       class="form-control @error('customer_phone') is-invalid @enderror" 
                                       placeholder="081234567890" 
                                       required>
                                @error('customer_phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="notes" class="form-label small fw-bold">Catatan Pesanan (Opsional)</label>
                                <textarea name="notes" id="notes" rows="2" class="form-control" placeholder="Contoh: Tulisan di atas cake 'Selamat Ulang Tahun', kirim jam 10 pagi">{{ old('notes') }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Metode Pembayaran & Ringkasan -->
                <div class="col-lg-5">
                    <!-- Metode Pembayaran Card -->
                    <div class="card border-0 shadow-sm rounded-4 p-4 mb-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                        <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">
                            Metode Pembayaran
                        </h5>

                        <div class="d-flex flex-column gap-3">
                            <!-- Option 1: Midtrans -->
                            <label class="form-check-label border rounded-3 p-3 d-flex align-items-center gap-3 cursor-pointer" style="background-color: #FAF5EE;">
                                <input class="form-check-input" type="radio" name="payment_method" value="midtrans" checked>
                                <div>
                                    <strong class="d-block text-dark"><i class="bi bi-qr-code-scan text-primary me-1"></i> Midtrans (QRIS / E-Wallet)</strong>
                                    <small class="text-muted">GoPay, OVO, ShopeePay, DANA, QRIS All Bank</small>
                                </div>
                            </label>

                            <!-- Option 2: Transfer Bank -->
                            <label class="form-check-label border rounded-3 p-3 d-flex align-items-center gap-3 cursor-pointer" style="background-color: #FAF5EE;">
                                <input class="form-check-input" type="radio" name="payment_method" value="transfer">
                                <div>
                                    <strong class="d-block text-dark"><i class="bi bi-bank2 text-success me-1"></i> Transfer Bank</strong>
                                    <small class="text-muted">BCA, Mandiri, BNI, BRI (Konfirmasi Otomatis)</small>
                                </div>
                            </label>

                            <!-- Option 3: COD -->
                            <label class="form-check-label border rounded-3 p-3 d-flex align-items-center gap-3 cursor-pointer" style="background-color: #FAF5EE;">
                                <input class="form-check-input" type="radio" name="payment_method" value="cod">
                                <div>
                                    <strong class="d-block text-dark"><i class="bi bi-cash-stack text-warning me-1"></i> COD (Bayar di Tempat)</strong>
                                    <small class="text-muted">Bayar saat kurir mengantarkan kue ke alamat Anda</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Items Summary -->
                    <div class="card border-0 shadow-sm rounded-4 p-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                        <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">Ringkasan Pesanan</h5>

                        <div class="d-flex flex-column gap-2 mb-3">
                            @foreach($cart as $item)
                                <div class="d-flex justify-content-between small">
                                    <span class="text-muted">{{ $item['name'] }} &times; {{ $item['quantity'] }}</span>
                                    <span class="fw-bold">Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>

                        <hr style="border-color: var(--nuvella-beige-dark);">

                        <div class="d-flex justify-content-between mb-2 small">
                            <span class="text-muted">Subtotal Produk</span>
                            <span class="fw-bold">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-3 small">
                            <span class="text-muted">Ongkos Kirim Flat</span>
                            <span class="fw-bold">Rp {{ number_format($shippingCost, 0, ',', '.') }}</span>
                        </div>

                        <div class="d-flex justify-content-between mb-4 pt-2 border-top">
                            <span class="fw-bold fs-6" style="color: var(--nuvella-chocolate);">Total Pembayaran</span>
                            <span class="fs-5 fw-bold" style="color: var(--nuvella-caramel);">Rp {{ number_format($grandTotal, 0, ',', '.') }}</span>
                        </div>

                        <button type="submit" class="btn btn-caramel w-100 py-3 rounded-pill fw-bold d-flex align-items-center justify-content-center gap-2 shadow">
                            <span>Pesan Sekarang</span>
                            <i class="bi bi-arrow-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
