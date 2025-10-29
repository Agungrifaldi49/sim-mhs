
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'Dashboard Mahasiswa')</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@yield('styles')
<style>
    body {
        background-color: #f7f4fb;
        color: #2d1b3c;
        font-family: 'Nunito', sans-serif;
    }

    /* Header Modern */
    .header {
        background: linear-gradient(90deg, #8e44ad, #732d91);
        color: #fff;
        padding: 0.6rem 1rem;
        border-radius: 0 0 15px 15px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: sticky;
        top: 0;
        z-index: 1050;
        box-shadow: 0 3px 15px rgba(0,0,0,0.1);
    }
    .header .logo {
        display: flex;
        align-items: center;
    }
    .header .logo img {
        height: 45px;
        margin-right: 0.5rem;
    }
    .header .search-bar {
        position: relative;
        width: 300px;
    }
    .header .search-bar input {
        border-radius: 50px;
        padding-left: 2.5rem;
        width: 100%;
        border: none;
    }
    .header .search-bar .bi-search {
        position: absolute;
        top: 50%;
        left: 0.9rem;
        transform: translateY(-50%);
        color: #888;
        pointer-events: none;
    }
    .header .profile-dropdown .btn {
        background-color: rgba(255,255,255,0.15);
        border: none;
        color: #fff;
        border-radius: 50px;
        transition: 0.3s;
    }
    .header .profile-dropdown .btn:hover {
        background-color: rgba(255,255,255,0.3);
    }

    /* Sidebar Modern */
    .sidebar {
        background-color: #fff;
        min-height: 100vh;
        padding: 1rem;
        border-right: 1px solid #ddd;
        position: sticky;
        top: 0;
    }
    .sidebar .menu-card {
        display: flex;
        align-items: center;
        padding: 12px 15px;
        border-radius: 10px;
        margin-bottom: 0.7rem;
        transition: all 0.3s;
        cursor: pointer;
        color: #2d1b3c;
        background-color: #fff;
        font-weight: 500;
    }
    .sidebar .menu-card i {
        font-size: 1.5rem;
        margin-right: 12px;
        color: #732d91;
    }
    .sidebar .menu-card:hover {
        background-color: #8e44ad;
        color: #fff;
        transform: translateX(5px);
    }
    .sidebar .menu-title {
        font-size: 14px;
    }

    /* Card konten */
    .card {
        border-radius: 1rem;
        transition: transform 0.2s, box-shadow 0.2s;
        background-color: #fff;
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    /* Mobile Sidebar */
    @media (max-width: 768px) {
        .sidebar {
            position: fixed;
            top: 0;
            margin-top: 12%;
            left: -100%;
            width: 250px;
            z-index: 1030;
            transition: 0.3s;
            box-shadow: 2px 0 12px rgba(0,0,0,0.2);
        }
        .sidebar.show {
            left: 0;
        }
        .content-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            background-color: rgba(0,0,0,0.4);
            z-index: 1020;
        }
        .content-overlay.show {
            display: block;
        }
    }
</style>
</head>
<body>

{{-- Header --}}
<div class="header">
    <div class="d-flex align-items-center">
        <button class="btn btn-light d-md-none me-2" id="btn-toggle-sidebar"><i class="bi bi-list"></i></button>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            
        </div>
    </div>
    <div class="search-bar d-none d-md-block">
        <input type="text" placeholder="Cari mata kuliah, pengumuman...">
        <i class="bi bi-search"></i>
    </div>
    <div class="profile-dropdown">
        @auth('mhs')
        <div class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle fs-3 me-2"></i>
            <span class="d-none d-md-inline">{{ auth()->guard('mhs')->user()->name }}</span>

            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow">
                <li><a class="dropdown-item" href=""><i class="bi bi-person me-2"></i> Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('mahasiswa.logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                    </form>
                </li>
            </ul>
        </div>
        @else
        <a href="{{ route('mahasiswa.login') }}" class="btn btn-primary btn-sm">Login</a>
        @endauth
    </div>
</div>

<div class="container-fluid">
<div class="row">
    {{-- Sidebar Desktop --}}
    <div class="col-md-3 col-lg-2 d-none d-md-block sidebar">
        <a href="{{ route('mahasiswa.dashboard') }}" class="text-decoration-none"><div class="menu-card"><i class="bi bi-speedometer2"></i><div class="menu-title">Dashboard</div></div></a>
        <a href="" class="text-decoration-none"><div class="menu-card"><i class="bi bi-person"></i><div class="menu-title">Profil Mahasiswa</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-book"></i><div class="menu-title">Mata Kuliah / KRS</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-calendar3"></i><div class="menu-title">Jadwal Kuliah</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-file-text"></i><div class="menu-title">Nilai / Transkrip</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-wallet2"></i><div class="menu-title">Pembayaran / Keuangan</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-megaphone"></i><div class="menu-title">Pengumuman</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-file-earmark-text"></i><div class="menu-title">Surat / Dokumen Akademik</div></div></a>
        <form method="POST" action="{{ route('mahasiswa.logout') }}">
            @csrf
            <button type="submit" class="menu-card w-100 text-start border-0 bg-transparent"><i class="bi bi-box-arrow-right"></i> <div class="menu-title d-inline">Logout</div></button>
        </form>
    </div>

    {{-- Mobile Sidebar --}}
    <div class="sidebar d-md-none" id="mobileSidebar">
        <a href="{{ route('mahasiswa.dashboard') }}" class="text-decoration-none"><div class="menu-card"><i class="bi bi-speedometer2"></i><div class="menu-title">Dashboard</div></div></a>
        <a href="" class="text-decoration-none"><div class="menu-card"><i class="bi bi-person"></i><div class="menu-title">Profil Mahasiswa</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-book"></i><div class="menu-title">Mata Kuliah / KRS</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-calendar3"></i><div class="menu-title">Jadwal Kuliah</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-file-text"></i><div class="menu-title">Nilai / Transkrip</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-wallet2"></i><div class="menu-title">Pembayaran / Keuangan</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-megaphone"></i><div class="menu-title">Pengumuman</div></div></a>
        <a href="#" class="text-decoration-none"><div class="menu-card"><i class="bi bi-file-earmark-text"></i><div class="menu-title">Surat / Dokumen Akademik</div></div></a>
        <form method="POST" action="{{ route('mahasiswa.logout') }}">
            @csrf
            <button type="submit" class="menu-card w-100 text-start border-0 bg-transparent"><i class="bi bi-box-arrow-right"></i> <div class="menu-title d-inline">Logout</div></button>
        </form>
    </div>
    <div class="content-overlay d-md-none" id="contentOverlay"></div>

    {{-- Konten Utama --}}
    <div class="col-md-9 col-lg-10 mt-4">
        @yield('content')
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Toggle sidebar mobile
    const btnToggle = document.getElementById('btn-toggle-sidebar');
    const mobileSidebar = document.getElementById('mobileSidebar');
    const contentOverlay = document.getElementById('contentOverlay');

    btnToggle.addEventListener('click', () => {
        mobileSidebar.classList.toggle('show');
        contentOverlay.classList.toggle('show');
    });

    contentOverlay.addEventListener('click', () => {
        mobileSidebar.classList.remove('show');
        contentOverlay.classList.remove('show');
    });
</script>
@stack('scripts')
</body>
</html>

