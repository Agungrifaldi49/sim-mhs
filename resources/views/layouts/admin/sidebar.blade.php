<!-- Sidebar Navigasi Admin -->
<nav class="d-flex flex-column text-white vh-100 shadow-sm sidebar-custom">

    <!-- Brand -->
    <div class="d-flex align-items-center mb-4 px-3 py-3 border-bottom border-light">
        <i class="bi bi-speedometer2 fs-4 me-2 text-warning"></i>
        <span class="fs-5 fw-bold">Admin Panel</span>
    </div>

    <!-- Menu -->
    <ul class="nav nav-pills flex-column mb-auto px-2">

        <!-- Dashboard -->
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-house-door me-2"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li><hr class="dropdown-divider bg-light"></li>

        <!-- Master Data -->
        <li>
            <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#masterDataMenu">
                <i class="bi bi-folder me-2"></i>
                <span>Master Data</span>
                <i class="bi bi-caret-down-fill ms-auto small"></i>
            </a>
            <div class="collapse ps-4" id="masterDataMenu">

                <!-- Mahasiswa Submenu -->
                <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#mahasiswaSubMenu">
                    <i class="bi bi-people me-2"></i> Mahasiswa
                    <i class="bi bi-caret-down-fill ms-auto small"></i>
                </a>
                <div class="collapse ps-3" id="mahasiswaSubMenu">
                    <a href="{{route ('admin.mahasiswa.index')}}" class="nav-link text-white ps-4">
                        <i class="bi bi-person me-2"></i> Data Mahasiswa
                    </a>
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-person-check me-2"></i> Aktivasi Akun
                    </a>
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-person-badge me-2"></i> Status Mahasiswa
                    </a>
                </div>

                <!-- Dosen Submenu -->
                <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#dosenSubMenu">
                    <i class="bi bi-person-badge-fill me-2"></i> Dosen
                    <i class="bi bi-caret-down-fill ms-auto small"></i>
                </a>
                <div class="collapse ps-3" id="dosenSubMenu">
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-person-badge me-2"></i> Data Dosen
                    </a>
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-card-checklist me-2"></i> Penugasan
                    </a>
                </div>

                <!-- Mata Kuliah Submenu -->
                <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#matkulSubMenu">
                    <i class="bi bi-journal-bookmark me-2"></i> Mata Kuliah
                    <i class="bi bi-caret-down-fill ms-auto small"></i>
                </a>
                <div class="collapse ps-3" id="matkulSubMenu">
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-book me-2"></i> Data Mata Kuliah
                    </a>
                    <a href="" class="nav-link text-white ps-4">
                        <i class="bi bi-journal-text me-2"></i> Silabus & Kurikulum
                    </a>
                </div>

                <!-- Kelas (single link) -->
                <a href="" class="nav-link text-white">
                    <i class="bi bi-building me-2"></i> Kelas
                </a>

            </div>
        </li>


        <li><hr class="dropdown-divider bg-light"></li>

        <!-- Rencana Studi -->
        <li>
            <a class="nav-link text-white d-flex align-items-center" data-bs-toggle="collapse" href="#rencanaStudiMenu">
                <i class="bi bi-list-check me-2"></i>
                <span>Rencana Studi</span>
                <i class="bi bi-caret-down-fill ms-auto small"></i>
            </a>
            <div class="collapse" id="rencanaStudiMenu">
                <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                    <li><a href="" class="nav-link text-white ps-4"><i class="bi bi-journal-text me-2"></i> IRS</a></li>
                    <li><a href="" class="nav-link text-white ps-4"><i class="bi bi-check2-square me-2"></i> PRS</a></li>
                    <li><a href="" class="nav-link text-white ps-4"><i class="bi bi-list-check me-2"></i> KRS</a></li>
                    <li><a href="" class="nav-link text-white ps-4"><i class="bi bi-chat-left-text me-2"></i> Pesan</a></li>
                </ul>
            </div>
        </li>

        <!-- Menu Lain -->
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-clipboard-check me-2"></i> Nilai</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-calendar-event me-2"></i> Jadwal</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-mortarboard me-2"></i> Tugas Akhir</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-wallet2 me-2"></i> Keuangan</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-megaphone me-2"></i> Pengumuman</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-bar-chart me-2"></i> Laporan</a></li>
        <li><a href="" class="nav-link text-white d-flex align-items-center"><i class="bi bi-gear me-2"></i> Pengaturan</a></li>
    </ul>

    <!-- Logout -->
    <div class="mt-auto px-3 py-3 border-top border-light">
        <a href="#" class="btn btn-warning w-100 d-flex align-items-center justify-content-center fw-bold"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-right me-2"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</nav>

<style>
.nav-link {
    border-radius: .375rem;
    padding: .6rem .75rem;
    margin-bottom: .25rem;
    transition: background 0.2s ease-in-out;
    font-weight: 500;
}
.nav-link:hover, .nav-link.active {
    background: rgba(255, 255, 255, 0.2);
}
.collapse .nav-link {
    font-size: 0.9rem;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
