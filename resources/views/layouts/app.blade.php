<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Nuvella Bakehouse - PT Nuvella Pangan Sejahtera. Freshly Baked, Made with Heart. Cake, Cookies, Pastry, dan Roti berkualitas terbaik.">
    <title>@yield('title', 'Nuvella Bakehouse') - PT Nuvella Pangan Sejahtera</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">

    <!-- Google Fonts: Playfair Display & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;0,800;1,400;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Custom Theme Styling -->
    <style>
        :root {
            --nuvella-bg: #FBF8F4;
            --nuvella-card-bg: #FFFFFF;
            --nuvella-cream: #FAF3EB;
            --nuvella-soft-beige: #EFE4D6;
            --nuvella-beige-border: #E8DCCF;
            --nuvella-chocolate: #4A2814;
            --nuvella-chocolate-dark: #2F170A;
            --nuvella-chocolate-light: #6E3F22;
            --nuvella-btn-brown: #5C3218;
            --nuvella-btn-hover: #43220E;
            --nuvella-accent: #C88344;
            --nuvella-text: #2B1D14;
            --nuvella-muted: #7E6C60;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--nuvella-bg);
            color: var(--nuvella-text);
            overflow-x: hidden;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, .font-serif {
            font-family: 'Playfair Display', Georgia, serif;
        }

        /* Navbar Styling */
        .navbar-nuvella {
            background-color: #FDFBF7;
            border-bottom: 1px solid var(--nuvella-beige-border);
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .navbar-brand-logo {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
            border: 1.5px solid var(--nuvella-accent);
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: var(--nuvella-chocolate) !important;
            font-size: 0.95rem;
            padding: 8px 18px !important;
            transition: all 0.2s ease;
        }

        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: var(--nuvella-accent) !important;
        }

        /* Chocolate Pill Button (matching mockup) */
        .btn-choco-pill {
            background-color: var(--nuvella-btn-brown);
            color: #ffffff !important;
            font-weight: 600;
            border-radius: 9999px;
            padding: 10px 24px;
            border: none;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(74, 40, 20, 0.15);
            text-decoration: none;
        }

        .btn-choco-pill:hover {
            background-color: var(--nuvella-btn-hover);
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(74, 40, 20, 0.25);
            color: #ffffff !important;
        }

        .btn-outline-choco {
            border: 1.5px solid var(--nuvella-btn-brown);
            color: var(--nuvella-btn-brown) !important;
            font-weight: 600;
            border-radius: 9999px;
            padding: 9px 22px;
            background-color: transparent;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-outline-choco:hover {
            background-color: var(--nuvella-btn-brown);
            color: #ffffff !important;
        }

        /* Mockup Product Card */
        .mockup-card {
            background-color: #FFFFFF;
            border: 1px solid var(--nuvella-beige-border);
            border-radius: 18px;
            overflow: hidden;
            transition: all 0.3s ease;
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .mockup-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 14px 28px rgba(74, 40, 20, 0.08);
            border-color: var(--nuvella-accent);
        }

        .mockup-card-img-wrap {
            position: relative;
            aspect-ratio: 4/3;
            background-color: #F8F1E7;
            overflow: hidden;
        }

        .mockup-card-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .mockup-card:hover .mockup-card-img {
            transform: scale(1.05);
        }

        .wishlist-btn {
            position: absolute;
            top: 12px;
            right: 12px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.9);
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #7A695C;
            transition: all 0.2s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        .wishlist-btn:hover {
            color: #E53935;
            background-color: #FFFFFF;
            transform: scale(1.1);
        }

        /* Footer */
        .footer-mockup {
            background-color: #381E0F;
            color: #F0E3D5;
            margin-top: auto;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .footer-mockup a {
            color: #DFCEBD;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-mockup a:hover {
            color: #ffffff;
            text-decoration: underline;
        }

        /* Cart Badge */
        .cart-icon-btn {
            position: relative;
            color: var(--nuvella-chocolate);
            font-size: 1.3rem;
            text-decoration: none;
            display: flex;
            align-items: center;
            padding: 6px;
        }

        .cart-badge {
            position: absolute;
            top: -2px;
            right: -4px;
            background-color: #C88344;
            color: #ffffff;
            font-size: 0.68rem;
            font-weight: 700;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Header / Navigation (Matching Mockup) -->
    <header class="sticky-top shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-nuvella">
            <div class="container">
                <!-- Brand / Logo -->
                <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo Nuvella" class="navbar-brand-logo">
                    <div class="lh-1">
                        <span class="font-serif fw-bold d-block" style="color: var(--nuvella-chocolate); font-size: 1.2rem; letter-spacing: 0.5px;">NUVELLA</span>
                        <small class="text-uppercase text-muted" style="font-size: 0.65rem; letter-spacing: 2px;">— BAKEHOUSE —</small>
                    </div>
                </a>

                <!-- Mobile Toggle -->
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navigation Links -->
                <div class="collapse navbar-collapse" id="navbarMain">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}" href="{{ route('products.index') }}">Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                        </li>
                    </ul>

                    <!-- Right Side Icons & Action -->
                    <div class="d-flex align-items-center gap-3">
                        <!-- Search Icon -->
                        <a href="{{ route('products.index') }}" class="text-dark fs-5 text-decoration-none" title="Cari Produk">
                            <i class="bi bi-search" style="color: var(--nuvella-chocolate);"></i>
                        </a>

                        <!-- Shopping Cart Icon with Badge -->
                        @php
                            $cartCount = 0;
                            if(session('cart')) {
                                foreach(session('cart') as $c) {
                                    $cartCount += $c['quantity'];
                                }
                            }
                        @endphp
                        <a href="{{ route('cart.index') }}" class="cart-icon-btn" title="Keranjang Belanja">
                            <i class="bi bi-cart3"></i>
                            @if($cartCount > 0)
                                <span class="cart-badge">{{ $cartCount }}</span>
                            @endif
                        </a>

                        <!-- Login / Admin Pill Button (Matching Mockup) -->
                        <a href="{{ route('admin.dashboard') }}" class="btn-choco-pill py-2 px-3" style="font-size: 0.85rem;" title="Masuk ke Panel Pengelolaan Admin">
                            <i class="bi bi-person"></i>
                            <span>Login</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow-1">
        <!-- Global Flash Alerts -->
        <div class="container mt-3">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4" role="alert" style="background-color: #E8F5E9; color: #1B5E20;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>

        @yield('content')
    </main>

    <!-- Footer (Matching Mockup) -->
    <footer class="footer-mockup pt-5 pb-3">
        <div class="container">
            <div class="row g-4 mb-4">
                <!-- Col 1: Brand -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 48px; height: 48px; border-radius: 50%; border: 1.5px solid var(--nuvella-accent); object-fit: cover;">
                        <div class="lh-1">
                            <h5 class="font-serif fw-bold text-white mb-0" style="letter-spacing: 0.5px;">NUVELLA</h5>
                            <small class="text-uppercase text-warning" style="font-size: 0.65rem; letter-spacing: 2px;">— BAKEHOUSE —</small>
                        </div>
                    </div>
                    <p class="small text-light opacity-75 mb-2 mt-3" style="line-height: 1.7;">
                        <em>Freshly Baked, Made with Heart ♡</em>
                    </p>
                    <p class="small text-light opacity-50" style="font-size: 0.78rem;">
                        PT Nuvella Pangan Sejahtera &bull; Usaha bakery pilihan keluarga menyediakan Cake, Cookies, Pastry, dan Roti hangat segar.
                    </p>
                </div>

                <!-- Col 2: Quick Links -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-white fw-bold mb-3" style="font-size: 0.95rem;">Quick Link</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2 mb-0">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('products.index') }}">Produk</a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>

                <!-- Col 3: Follow Us -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h6 class="text-white fw-bold mb-3" style="font-size: 0.95rem;">Follow Us</h6>
                    <div class="d-flex gap-3 fs-5">
                        <a href="#" class="text-light opacity-75"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="text-light opacity-75"><i class="bi bi-tiktok"></i></a>
                        <a href="#" class="text-light opacity-75"><i class="bi bi-youtube"></i></a>
                    </div>
                </div>

                <!-- Col 4: Newsletter -->
                <div class="col-lg-4 col-md-6">
                    <h6 class="text-white fw-bold mb-2" style="font-size: 0.95rem;">Berlangganan Newsletter</h6>
                    <p class="small text-light opacity-75 mb-3" style="font-size: 0.82rem;">Dapatkan info promo terbaru!</p>
                    <form onsubmit="event.preventDefault(); alert('Terima kasih telah berlangganan newsletter Nuvella Bakehouse!');" class="d-flex gap-2">
                        <div class="input-group">
                            <input type="email" class="form-control rounded-pill rounded-end-0 py-2 px-3 small border-0" placeholder="Masukkan email Anda" required style="font-size: 0.85rem;">
                            <button class="btn btn-choco-pill rounded-pill rounded-start-0 px-3" type="submit" style="background-color: var(--nuvella-accent);">
                                <i class="bi bi-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <hr style="border-color: rgba(255,255,255,0.12);">

            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2 small text-light opacity-50" style="font-size: 0.78rem;">
                <div>
                    &copy; {{ date('Y') }} Nuvella Bakehouse. All rights reserved. (PT Nuvella Pangan Sejahtera)
                </div>
                <div class="d-flex gap-3">
                    <a href="#" class="text-light opacity-75">Privacy Policy</a>
                    <span>|</span>
                    <a href="#" class="text-light opacity-75">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5.3 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
