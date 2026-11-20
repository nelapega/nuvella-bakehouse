<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Nuvella Bakehouse Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --admin-sidebar: #4A2814;
            --admin-sidebar-dark: #381E0E;
            --admin-active-menu: #62361B;
            --admin-bg: #F8F5F0;
            --admin-card-bg: #FFFFFF;
            --admin-border: #EADBCE;
            --admin-primary: #5C3218;
            --admin-accent: #C88344;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--admin-bg);
            color: #2D2017;
        }

        /* Sidebar (Matching Mockup Bottom-Center) */
        .admin-sidebar {
            width: 250px;
            min-height: 100vh;
            background-color: var(--admin-sidebar);
            color: #FFFFFF;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .admin-sidebar-brand {
            padding: 24px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #ffffff;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        }

        .admin-sidebar-menu {
            list-style: none;
            padding: 18px 12px;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .admin-sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 16px;
            color: #E2D3C4;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.92rem;
            border-radius: 12px;
            transition: all 0.2s ease;
        }

        .admin-sidebar-link:hover, .admin-sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
        }

        /* Main Wrapper */
        .admin-wrapper {
            margin-left: 250px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Topbar */
        .admin-topbar {
            background-color: #FFFFFF;
            border-bottom: 1px solid var(--admin-border);
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .admin-content {
            padding: 32px;
            flex-grow: 1;
        }

        /* Mockup Table Styling */
        .table-mockup {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .table-mockup th {
            background-color: #FAF4EB;
            color: #5C3218;
            font-size: 0.85rem;
            font-weight: 700;
            padding: 12px 16px;
            border-bottom: 2px solid var(--admin-border);
        }

        .table-mockup td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--admin-border);
            font-size: 0.9rem;
        }

        /* Action Buttons Pill */
        .btn-edit-pill {
            background-color: #FBF0DF;
            color: #A06425;
            border: 1px solid #E5CDB2;
            border-radius: 9999px;
            padding: 4px 14px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
        }

        .btn-edit-pill:hover {
            background-color: #A06425;
            color: #ffffff;
        }

        .btn-delete-pill {
            background-color: #FDE8E8;
            color: #C53030;
            border: 1px solid #F8B4B4;
            border-radius: 9999px;
            padding: 4px 14px;
            font-size: 0.78rem;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-delete-pill:hover {
            background-color: #C53030;
            color: #ffffff;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-wrapper {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar (Matching Mockup Bottom-Center) -->
    <aside class="admin-sidebar" id="adminSidebar">
        <!-- Brand -->
        <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-brand">
            <img src="{{ asset('images/logo.jpg') }}" alt="Logo" style="width: 44px; height: 44px; border-radius: 50%; object-fit: cover; border: 2px solid var(--admin-accent);">
            <div>
                <strong class="d-block font-serif text-white fs-5 lh-1">NUVELLA</strong>
                <small class="text-uppercase text-warning" style="font-size: 0.65rem; letter-spacing: 1.5px;">— BAKEHOUSE —</small>
            </div>
        </a>

        <!-- Menu List (Matching Mockup) -->
        <ul class="admin-sidebar-menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.categories.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="bi bi-tags-fill"></i>
                    <span>Kategori</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.products.index') }}" class="admin-sidebar-link {{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    <i class="bi bi-box-seam-fill"></i>
                    <span>Produk</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link">
                    <i class="bi bi-bag-check-fill"></i>
                    <span>Pesanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link">
                    <i class="bi bi-bar-chart-fill"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.dashboard') }}" class="admin-sidebar-link">
                    <i class="bi bi-gear-fill"></i>
                    <span>Pengaturan</span>
                </a>
            </li>
            <li class="mt-4 pt-3 border-top border-secondary border-opacity-25">
                <a href="{{ route('home') }}" class="admin-sidebar-link text-danger-emphasis">
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto p-3 text-center small text-light opacity-50" style="font-size: 0.72rem;">
            PT Nuvella Pangan Sejahtera &bull; UTS
        </div>
    </aside>

    <!-- Main Content Wrapper -->
    <div class="admin-wrapper">
        <!-- Topbar (Matching Mockup) -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-outline-secondary d-lg-none" type="button" id="sidebarToggle" aria-label="Toggle navigation">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <div class="lh-1">
                    <h5 class="mb-1 fw-bold font-serif" style="color: var(--admin-primary);">@yield('header_title', 'Dashboard')</h5>
                    <small class="text-muted">Selamat datang, Admin!</small>
                </div>
            </div>

            <!-- Profile & Public View -->
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="btn btn-sm btn-outline-choco rounded-pill px-3">
                    <i class="bi bi-globe me-1"></i> Buka Website
                </a>
                <div class="d-flex align-items-center gap-2 border rounded-pill px-3 py-1 bg-light">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Admin" style="width: 28px; height: 28px; border-radius: 50%; object-fit: cover;">
                    <span class="small fw-bold">Admin</span>
                    <i class="bi bi-chevron-down small text-muted"></i>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <main class="admin-content">
            <!-- Global Flash Messages -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert" style="background-color: #E8F5E9; color: #1B5E20;">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill fs-5"></i>
                        <div><strong>Berhasil!</strong> {{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill fs-5"></i>
                        <div><strong>Gagal!</strong> {{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Bootstrap 5.3 Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.getElementById('adminSidebar').classList.toggle('show');
        });
    </script>
    @stack('scripts')
</body>
</html>
