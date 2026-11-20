@extends('layouts.app')

@section('title', 'Pesanan Berhasil - Nuvella Bakehouse')

@section('content')
<section class="py-5">
    <div class="container text-center py-4">
        <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5 mx-auto" style="max-width: 650px; background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
            <div class="rounded-circle d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 80px; height: 80px; background-color: #E8F5E9; color: #2E7D32; font-size: 2.5rem;">
                <i class="bi bi-check-lg"></i>
            </div>

            <h2 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Pesanan Berhasil Dibuat!</h2>
            <p class="text-muted small mb-4">
                Terima kasih, <strong>{{ $order->customer_name }}</strong>! Pesanan Anda telah tercatat dalam sistem kami.
            </p>

            <div class="p-3 bg-light rounded-3 text-start mb-4 small">
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Nomor Pesanan:</span>
                    <strong class="text-dark">{{ $order->order_number }}</strong>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Tanggal:</span>
                    <span>{{ $order->created_at->format('d M Y, H:i') }} WIB</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Metode Pembayaran:</span>
                    <span class="text-uppercase fw-bold text-primary">{{ $order->payment_method }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="text-muted">Alamat Pengiriman:</span>
                    <span>{{ $order->customer_address }}, {{ $order->customer_city }} ({{ $order->customer_postal_code }})</span>
                </div>
                <hr>
                <div class="d-flex justify-content-between fw-bold fs-6">
                    <span style="color: var(--nuvella-chocolate);">Total Tagihan:</span>
                    <span style="color: var(--nuvella-caramel);">{{ $order->formatted_grand_total }}</span>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2 justify-content-center">
                <a href="https://wa.me/6281234567890?text={{ urlencode('Halo Nuvella Bakehouse, saya sudah membuat pesanan dengan nomor ' . $order->order_number . ' atas nama ' . $order->customer_name . ' total ' . $order->formatted_grand_total . '. Mohon diproses ya, terima kasih!') }}" 
                   target="_blank" class="btn btn-caramel px-4 rounded-pill">
                    <i class="bi bi-whatsapp me-1"></i> Konfirmasi ke WhatsApp Admin
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-chocolate px-4 rounded-pill">
                    <i class="bi bi-bag me-1"></i> Belanja Lagi
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
