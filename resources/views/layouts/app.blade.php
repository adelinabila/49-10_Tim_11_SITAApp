<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'SITA — Sistem Informasi Tugas Akhir & Skripsi')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --purple-primary: #4C1D95;
            --purple-dark: #3B0764;
            --purple-hover: #5B21B6;
            --purple-soft: #EDE9FE;
            --bg-canvas: #F8FAFC;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-canvas);
            color: #1E293B;
        }
        .sidebar {
            width: 270px;
            min-height: 100vh;
            background: linear-gradient(180deg, var(--purple-primary) 0%, var(--purple-dark) 100%);
            color: #FFFFFF;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.12);
        }
        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8);
            padding: 0.75rem 1.25rem;
            margin: 0.25rem 0.75rem;
            border-radius: 0.6rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
            font-size: 0.92rem;
            text-decoration: none;
            transition: all 0.2s ease;
        }
        .nav-link-custom:hover {
            background-color: rgba(255, 255, 255, 0.12);
            color: #FFFFFF;
        }
        .nav-link-custom.active {
            background-color: #FFFFFF;
            color: var(--purple-primary);
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        .main-wrapper {
            margin-left: 270px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .topbar {
            background-color: #FFFFFF;
            border-bottom: 1px solid #E2E8F0;
            padding: 1rem 2rem;
        }
        .btn-purple {
            background-color: var(--purple-primary);
            color: #FFFFFF;
            border: none;
            font-weight: 500;
        }
        .btn-purple:hover {
            background-color: var(--purple-hover);
            color: #FFFFFF;
        }
        .card-formal {
            background: #FFFFFF;
            border: 1px solid #E2E8F0;
            border-radius: 0.85rem;
            box-shadow: 0 1px 3px rgba(15, 23, 42, 0.04);
        }
        .table-purple thead th {
            background-color: var(--purple-soft);
            color: var(--purple-primary);
            font-weight: 600;
            border-bottom: none;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
    <aside class="sidebar d-flex flex-column justify-content-between">
        <div>
            <div class="sidebar-brand d-flex align-items-center gap-3">
                <div class="bg-white text-dark rounded-3 p-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-mortarboard-fill fs-5" style="color: var(--purple-primary);"></i>
                </div>
                <div>
                    <h6 class="mb-0 fw-bold tracking-tight">SITA TEAM 11</h6>
                    <small style="color: rgba(255,255,255,0.7); font-size: 0.75rem;">Sistem Tugas Akhir</small>
                </div>
            </div>

            <div class="mt-3">
                <small class="px-4 text-uppercase fw-semibold" style="font-size: 0.7rem; color: rgba(255,255,255,0.5); letter-spacing: 0.08em;">Menu Utama</small>
                <nav class="mt-2">
                    <a href="{{ route('dashboard') }}" class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="bi bi-grid-1x2-fill"></i> Dashboard
                    </a>
                    <a href="{{ route('topik.index') }}" class="nav-link-custom {{ request()->routeIs('topik.*') ? 'active' : '' }}">
                        <i class="bi bi-journal-bookmark-fill"></i> Topik & Bidang Minat
                    </a>
                    <a href="{{ route('dosen.index') }}" class="nav-link-custom {{ request()->routeIs('dosen.*') ? 'active' : '' }}">
                        <i class="bi bi-person-badge-fill"></i> Dosen Pembimbing
                    </a>
                    <a href="{{ route('mahasiswa.index') }}" class="nav-link-custom {{ request()->routeIs('mahasiswa.*') ? 'active' : '' }}">
                        <i class="bi bi-people-fill"></i> Data Mahasiswa
                    </a>
                    <a href="{{ route('ruang.index') }}" class="nav-link-custom {{ request()->routeIs('ruang.*') ? 'active' : '' }}">
                        <i class="bi bi-building-fill"></i> Ruang & Fasilitas
                    </a>
                </nav>
            </div>
        </div>

        <div class="p-3 border-top" style="border-color: rgba(255,255,255,0.12) !important;">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm w-100 d-flex align-items-center justify-content-center gap-2 py-2">
                    <i class="bi bi-box-arrow-left"></i> Keluar Sistem
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-wrapper">
        <header class="topbar d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-dark">@yield('page-title', 'Dashboard')</h5>
                <small class="text-muted">@yield('page-subtitle', 'Sistem Informasi Tugas Akhir & Skripsi')</small>
            </div>
            <div class="d-flex align-items-center gap-2 bg-light px-3 py-2 rounded-pill border">
                <i class="bi bi-person-circle fs-5" style="color: var(--purple-primary);"></i>
                <span class="fw-semibold small">{{ Auth::user()->name }}</span>
            </div>
        </header>

        <main class="p-4 flex-grow-1">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </main>

        <footer class="px-4 py-3 text-center text-muted small border-top bg-white">
            &copy; {{ date('Y') }} SITA Team 11 — Sistem Informasi Tugas Akhir & Skripsi
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>