@extends('layouts.app')

@section('title', 'Hubungi Kami - Nuvella Bakehouse')

@section('content')
<!-- Header -->
<section class="py-5 text-center" style="background: linear-gradient(135deg, #FAF5EE 0%, #EFE6DC 100%); border-bottom: 1px solid var(--nuvella-beige-dark);">
    <div class="container">
        <span class="badge px-3 py-2 rounded-pill text-uppercase" style="background-color: var(--nuvella-caramel); color: #ffffff; font-size: 0.78rem;">
            Kontak & Pelayanan
        </span>
        <h1 class="font-serif display-5 fw-bold mt-2 mb-2" style="color: var(--nuvella-chocolate);">
            Hubungi Nuvella Bakehouse
        </h1>
        <p class="text-muted mx-auto mb-0" style="max-width: 600px;">
            Kami siap menjawab pertanyaan seputar produk bakery kami, pemesanan kustom, hampers acara, atau sekadar menyapa kami.
        </p>
    </div>
</section>

<!-- Content -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Left: Info Kontak -->
            <div class="col-lg-5">
                <div class="card border-0 shadow-sm p-4 rounded-4 h-100" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 56px; height: 56px; border-radius: 50%; object-fit: cover; border: 2px solid var(--nuvella-caramel);">
                        <div>
                            <h4 class="font-serif mb-0" style="color: var(--nuvella-chocolate);">Nuvella Bakehouse</h4>
                            <small class="text-muted">PT Nuvella Pangan Sejahtera</small>
                        </div>
                    </div>

                    <h5 class="font-serif fw-bold mb-3" style="color: var(--nuvella-chocolate);">Informasi Kontak Resmi</h5>

                    <div class="d-flex flex-column gap-3 mb-4">
                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel);">
                                <i class="bi bi-geo-alt-fill fs-5"></i>
                            </div>
                            <div>
                                <strong class="d-block" style="color: var(--nuvella-chocolate);">Alamat Toko & Dapur:</strong>
                                <span class="text-muted small">Jl. Roti Kencana No. 88, Kawasan Kuliner Manis, Kota Indonesia</span>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel);">
                                <i class="bi bi-whatsapp fs-5"></i>
                            </div>
                            <div>
                                <strong class="d-block" style="color: var(--nuvella-chocolate);">WhatsApp Customer Care:</strong>
                                <a href="https://wa.me/6281234567890" target="_blank" class="text-decoration-none small text-success fw-bold">
                                    +62 812-3456-7890 (Respon Cepat)
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel);">
                                <i class="bi bi-envelope-fill fs-5"></i>
                            </div>
                            <div>
                                <strong class="d-block" style="color: var(--nuvella-chocolate);">Email Resmi:</strong>
                                <a href="mailto:halo@nuvellabakehouse.co.id" class="text-decoration-none small text-muted">
                                    halo@nuvellabakehouse.co.id
                                </a>
                            </div>
                        </div>

                        <div class="d-flex align-items-start gap-3">
                            <div class="rounded-circle d-flex align-items-center justify-content-center flex-shrink-0" style="width: 44px; height: 44px; background-color: var(--nuvella-soft-beige); color: var(--nuvella-caramel);">
                                <i class="bi bi-clock-fill fs-5"></i>
                            </div>
                            <div>
                                <strong class="d-block" style="color: var(--nuvella-chocolate);">Jam Buka Toko:</strong>
                                <span class="text-muted small">Senin - Minggu: 07:00 - 21:00 WIB</span>
                            </div>
                        </div>
                    </div>

                    <div class="p-3 rounded-3 mt-auto" style="background-color: var(--nuvella-soft-beige);">
                        <strong class="d-block small" style="color: var(--nuvella-chocolate);"><i class="bi bi-truck me-1"></i> Layanan Pesan Antar:</strong>
                        <span class="text-muted" style="font-size: 0.78rem;">Melayani pengiriman instant/sameday dengan kurir khusus makanan agar bentuk kue tetap utuh sempurna.</span>
                    </div>
                </div>
            </div>

            <!-- Right: Form Pesan -->
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm p-4 p-md-5 rounded-4" style="background-color: #FFFDF9; border: 1px solid var(--nuvella-beige-dark) !important;">
                    <h3 class="font-serif fw-bold mb-2" style="color: var(--nuvella-chocolate);">Kirimkan Pesan atau Pertanyaan</h3>
                    <p class="text-muted small mb-4">Isi formulir di bawah ini, tim Nuvella Bakehouse akan merespons pesan Anda secepatnya.</p>

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label small fw-bold">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Anda" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="email" class="form-label small fw-bold">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="email@contoh.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="phone" class="form-label small fw-bold">Nomor Telepon / WhatsApp</label>
                                <input type="text" name="phone" id="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" placeholder="Contoh: 0812xxxxxxxx">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="subject" class="form-label small fw-bold">Perihal / Subjek <span class="text-danger">*</span></label>
                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" class="form-control @error('subject') is-invalid @enderror" placeholder="Pertanyaan Produk / Pesanan Khusus" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <label for="message" class="form-label small fw-bold">Isi Pesan <span class="text-danger">*</span></label>
                                <textarea name="message" id="message" rows="5" class="form-control @error('message') is-invalid @enderror" placeholder="Tuliskan pertanyaan, pesanan kustom, atau pesan Anda di sini..." required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 pt-2">
                                <button type="submit" class="btn btn-caramel px-4 py-2">
                                    <i class="bi bi-send-fill me-1"></i> Kirim Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
