@extends('layouts.app')

@section('title', 'Tentang Kami - Nuvella Bakehouse')

@section('content')
<!-- Header Banner -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #FAF5EE 0%, #EFE6DC 100%); border-bottom: 1px solid var(--nuvella-beige-dark);">
    <div class="container">
        <span class="badge px-3 py-2 rounded-pill text-uppercase" style="background-color: var(--nuvella-caramel); color: #ffffff; font-size: 0.78rem;">
            Cerita & Profil Kami
        </span>
        <h1 class="font-serif display-5 fw-bold mt-2 mb-3" style="color: var(--nuvella-chocolate);">
            Tentang Nuvella Bakehouse
        </h1>
        <p class="lead text-muted mx-auto mb-0" style="max-width: 650px;">
            Dedikasi dan ketulusan hati dalam setiap adonan, menghasilkan hidangan roti dan kue terbaik untuk setiap momen berharga Anda.
        </p>
    </div>
</section>

<!-- Profil Usaha & Narasi Brand -->
<section class="py-5">
    <div class="container py-lg-4">
        <div class="row align-items-center g-5">
            <div class="col-lg-5 text-center">
                <div class="card border-0 shadow-lg p-3 rounded-4 mx-auto" style="max-width: 400px; background-color: #FFFDF9; border: 2px solid var(--nuvella-beige-dark) !important;">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo Nuvella Bakehouse" class="img-fluid rounded-4 shadow-sm mb-3">
                    <div class="uts-pill mx-auto mb-2">
                        <i class="bi bi-tag-fill me-1 text-warning"></i> Freshly Baked, Made with Heart
                    </div>
                    <h5 class="font-serif mb-0" style="color: var(--nuvella-chocolate);">PT Nuvella Pangan Sejahtera</h5>
                    <small class="text-muted">Industri Makanan & Artisan Bakery</small>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 mb-3 rounded-pill" style="background-color: var(--nuvella-soft-beige); color: var(--nuvella-chocolate); font-size: 0.8rem; font-weight: 600;">
                    <i class="bi bi-shop me-1 text-warning"></i> Profil Usaha UMKM
                </div>
                
                <h2 class="font-serif display-6 fw-bold mb-4" style="color: var(--nuvella-chocolate);">
                    Menyajikan Kelezatan Nyata, Dipanggang Sepenuh Jiwa
                </h2>

                <div class="p-4 rounded-4 mb-4" style="background-color: #FFFDF9; border-left: 5px solid var(--nuvella-caramel); border-top: 1px solid var(--nuvella-beige-dark); border-right: 1px solid var(--nuvella-beige-dark); border-bottom: 1px solid var(--nuvella-beige-dark);">
                    <p class="fs-6 text-muted mb-0 leading-relaxed" style="line-height: 1.8;">
                        <strong>Nuvella Bakehouse</strong> merupakan usaha bakery yang menyediakan berbagai pilihan roti, cake, cookies, dan pastry dengan cita rasa lezat serta tampilan menarik. Nuvella Bakehouse hadir untuk memberikan pilihan hidangan berkualitas yang cocok dinikmati dalam berbagai suasana. Melalui website ini, pelanggan dapat melihat katalog produk beserta detail dan informasi setiap produk.
                    </p>
                </div>

                <p class="text-muted leading-relaxed mb-4">
                    Berdiri di bawah naungan <strong>PT Nuvella Pangan Sejahtera</strong>, kami berkomitmen untuk selalu menggunakan bahan-bahan baku bermutu tinggi seperti mentega murni Prancis (French butter), cokelat couverture Belgia, susu segar, serta rempah dan biji gandum pilihan tanpa bahan pengawet sintesis.
                </p>

                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 h-100" style="background-color: var(--nuvella-soft-beige);">
                            <h5 class="fw-bold font-serif mb-1" style="color: var(--nuvella-chocolate);"><i class="bi bi-eye-fill me-2 text-warning"></i> Visi Kami</h5>
                            <p class="small text-muted mb-0">Menjadi brand artisan bakery pilihan utama yang menghadirkan kebahagiaan lewat cita rasa hangat, lezat, dan bernutrisi.</p>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded-3 h-100" style="background-color: var(--nuvella-soft-beige);">
                            <h5 class="fw-bold font-serif mb-1" style="color: var(--nuvella-chocolate);"><i class="bi bi-bullseye me-2 text-warning"></i> Misi Kami</h5>
                            <p class="small text-muted mb-0">Menjaga standar kualitas bahan baku, mengutamakan kebersihan dan kehalalan, serta memberikan pelayanan ramah bagi setiap pelanggan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4 Pilar Nilai Brand Nuvella -->
<section class="py-5" style="background-color: #FAF5EE; border-top: 1px solid var(--nuvella-beige-dark); border-bottom: 1px solid var(--nuvella-beige-dark);">
    <div class="container">
        <div class="text-center mb-5">
            <span class="badge px-3 py-2 rounded-pill text-uppercase" style="background-color: var(--nuvella-soft-beige); color: var(--nuvella-chocolate); font-size: 0.78rem;">
                Komitmen Kami
            </span>
            <h2 class="font-serif display-6 fw-bold mt-2" style="color: var(--nuvella-chocolate);">Nilai Utama di Nuvella Bakehouse</h2>
        </div>

        <div class="row g-4">
            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100 text-center" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark);">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel); font-size: 1.8rem;">
                        <i class="bi bi-gem"></i>
                    </div>
                    <h5 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Bahan Baku Pilihan</h5>
                    <p class="small text-muted mb-0">Kami hanya menggunakan butter murni, cokelat asli, dan gandum bermutu tinggi tanpa kompromi pada kualitas.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100 text-center" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark);">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel); font-size: 1.8rem;">
                        <i class="bi bi-clock-history"></i>
                    </div>
                    <h5 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Fresh Every Day</h5>
                    <p class="small text-muted mb-0">Seluruh kue dan roti dipanggang segar di pagi hari untuk memastikan kerenyahan dan kelembutan maksimal saat sampai ke Anda.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100 text-center" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark);">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel); font-size: 1.8rem;">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Higienis & Sehat</h5>
                    <p class="small text-muted mb-0">Proses produksi menerapkan standar sanitasi ketat dan bebas bahan pengawet sintesis berbahaya bagi kesehatan.</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="p-4 rounded-4 h-100 text-center" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark);">
                    <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel); font-size: 1.8rem;">
                        <i class="bi bi-heart-fill"></i>
                    </div>
                    <h5 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Dibuat Dari Hati</h5>
                    <p class="small text-muted mb-0">Setiap sentuhan rasa, aroma, dan kemasan kami dedikasikan untuk menghadirkan senyum dan kebahagiaan di setiap gigitan.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Legalitas Usaha -->
<section class="py-5">
    <div class="container">
        <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
            <div class="row align-items-center g-4">
                <div class="col-md-8">
                    <span class="badge bg-secondary mb-2">Legalitas & Identitas Resmi</span>
                    <h3 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">PT Nuvella Pangan Sejahtera</h3>
                    <p class="text-muted mb-0">
                        Didirikan sebagai perwujudan UMKM kuliner modern Indonesia yang berdaya saing tinggi, mematuhi standar keamanan pangan, dan siap melayani pesanan retail, hampers, catering, maupun corporate event.
                    </p>
                </div>
                <div class="col-md-4 text-md-end">
                    <a href="{{ route('contact') }}" class="btn btn-caramel px-4 py-2">
                        <i class="bi bi-chat-dots me-1"></i> Hubungi Manajemen
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
