@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard')

@section('content')
<!-- 4 Stat Cards (Matching Mockup Bottom-Center) -->
<div class="row g-4 mb-4">
    <!-- Card 1: Total Produk -->
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background-color: #FDE8D3; color: #D97724; font-size: 1.5rem;">
                    <i class="bi bi-box-seam"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Total Produk</span>
                    <h3 class="font-serif fw-bold mb-0" style="color: var(--admin-primary);">{{ $totalProducts }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 2: Total Pesanan -->
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background-color: #EFE4D6; color: #62361B; font-size: 1.5rem;">
                    <i class="bi bi-cart3"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Total Pesanan</span>
                    <h3 class="font-serif fw-bold mb-0" style="color: var(--admin-primary);">{{ $totalOrders }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 3: Total Pelanggan -->
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background-color: #E3F2FD; color: #1976D2; font-size: 1.5rem;">
                    <i class="bi bi-people"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Total Pelanggan</span>
                    <h3 class="font-serif fw-bold mb-0" style="color: var(--admin-primary);">{{ $totalCustomers }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Card 4: Pendapatan -->
    <div class="col-xl-3 col-sm-6">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <div class="d-flex align-items-center gap-3">
                <div class="rounded-circle d-flex align-items-center justify-content-center" style="width: 52px; height: 52px; background-color: #E8F5E9; color: #2E7D32; font-size: 1.5rem;">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <div>
                    <span class="text-muted small d-block">Pendapatan</span>
                    <h3 class="font-serif fw-bold mb-0 text-truncate" style="color: var(--admin-primary); font-size: 1.35rem;">
                        Rp {{ number_format($revenue, 0, ',', '.') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Middle Row: Penjualan Bulanan & Produk Terlaris (Matching Mockup) -->
<div class="row g-4 mb-4">
    <!-- Left: Penjualan Bulanan Chart (Matching Mockup Line Chart) -->
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <h5 class="font-serif fw-bold mb-3" style="color: var(--admin-primary);">Penjualan Bulanan</h5>
            
            <div class="position-relative py-3">
                <!-- SVG Line Chart (Matching Mockup curve) -->
                <svg viewBox="0 0 500 240" width="100%" height="240" style="overflow: visible;">
                    <!-- Horizontal Grid lines -->
                    <line x1="40" y1="30" x2="480" y2="30" stroke="#F0E5D8" stroke-width="1" stroke-dasharray="4"/>
                    <text x="10" y="35" font-size="11" fill="#9C8B7E">150</text>

                    <line x1="40" y1="80" x2="480" y2="80" stroke="#F0E5D8" stroke-width="1" stroke-dasharray="4"/>
                    <text x="10" y="85" font-size="11" fill="#9C8B7E">100</text>

                    <line x1="40" y1="130" x2="480" y2="130" stroke="#F0E5D8" stroke-width="1" stroke-dasharray="4"/>
                    <text x="10" y="135" font-size="11" fill="#9C8B7E">50</text>

                    <line x1="40" y1="180" x2="480" y2="180" stroke="#F0E5D8" stroke-width="1"/>
                    <text x="20" y="185" font-size="11" fill="#9C8B7E">0</text>

                    <!-- Trend Line with Warm Golden/Brown Gradient -->
                    <defs>
                        <linearGradient id="chartGradient" x1="0" y1="0" x2="0" y2="1">
                            <stop offset="0%" stop-color="#C88344" stop-opacity="0.25"/>
                            <stop offset="100%" stop-color="#C88344" stop-opacity="0.0"/>
                        </linearGradient>
                    </defs>

                    <!-- Area under curve -->
                    <path d="M60 160 Q130 155 190 145 T320 100 T440 65 L440 180 L60 180 Z" fill="url(#chartGradient)"/>

                    <!-- Smooth Curve Line -->
                    <path d="M60 160 Q130 155 190 145 T320 100 T440 65" fill="none" stroke="#C88344" stroke-width="3.5" stroke-linecap="round"/>

                    <!-- Data Points -->
                    <circle cx="60" cy="160" r="4.5" fill="#C88344" stroke="#FFF" stroke-width="2"/>
                    <circle cx="140" cy="155" r="4.5" fill="#C88344" stroke="#FFF" stroke-width="2"/>
                    <circle cx="210" cy="140" r="4.5" fill="#C88344" stroke="#FFF" stroke-width="2"/>
                    <circle cx="290" cy="115" r="4.5" fill="#C88344" stroke="#FFF" stroke-width="2"/>
                    <circle cx="370" cy="90" r="4.5" fill="#C88344" stroke="#FFF" stroke-width="2"/>
                    <circle cx="440" cy="65" r="5" fill="#C88344" stroke="#FFF" stroke-width="2"/>

                    <!-- Month labels -->
                    <text x="50" y="205" font-size="12" fill="#7E6C60">Jan</text>
                    <text x="130" y="205" font-size="12" fill="#7E6C60">Feb</text>
                    <text x="200" y="205" font-size="12" fill="#7E6C60">Mar</text>
                    <text x="280" y="205" font-size="12" fill="#7E6C60">Apr</text>
                    <text x="360" y="205" font-size="12" fill="#7E6C60">Mei</text>
                    <text x="430" y="205" font-size="12" fill="#7E6C60">Jun</text>
                </svg>
            </div>
        </div>
    </div>

    <!-- Right: Produk Terlaris (Matching Mockup) -->
    <div class="col-lg-5">
        <div class="card border-0 shadow-sm rounded-4 p-4 h-100" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
            <h5 class="font-serif fw-bold mb-4" style="color: var(--admin-primary);">Produk Terlaris</h5>

            <div class="d-flex flex-column gap-3">
                @foreach($topProducts as $top)
                    <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg" style="background-color: #FAF4EB;">
                        <img src="{{ $top->image_url }}" alt="{{ $top->name }}" class="rounded-3 shadow-sm" style="width: 52px; height: 52px; object-fit: cover;">
                        <div class="flex-grow-1">
                            <strong class="d-block" style="color: var(--admin-primary); font-size: 0.95rem;">{{ $top->name }}</strong>
                            <small class="text-muted">{{ $top->sales_count ?? rand(70, 120) }} terjual</small>
                        </div>
                        <span class="badge bg-warning text-dark px-3 py-1 rounded-pill small">
                            {{ $top->formatted_price }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<!-- Quick Link to Products & Categories -->
<div class="card border-0 shadow-sm rounded-4 p-4" style="background-color: #FFFFFF; border: 1px solid var(--admin-border) !important;">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h6 class="font-serif fw-bold mb-1" style="color: var(--admin-primary);">Akses Cepat Pengelolaan Data UTS</h6>
            <small class="text-muted">Kelola data produk dan kategori bakery dinamis dari database.</small>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.index') }}" class="btn btn-sm btn-choco-pill px-3">
                <i class="bi bi-box-seam me-1"></i> Buka Data Produk
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-sm btn-outline-choco px-3">
                <i class="bi bi-tags me-1"></i> Buka Data Kategori
            </a>
        </div>
    </div>
</div>
@endsection
