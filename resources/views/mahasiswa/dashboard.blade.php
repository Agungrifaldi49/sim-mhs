@extends('layouts.mahasiswa.sidebar')

@section('styles')
<style>
    body {
        background-color: #f7f4fb;
        color: #4b3e6b;
        font-family: 'Nunito', sans-serif;
    }

    h3, h4, h5 {
        color: #5e42a6;
    }

    /* Card modern */
    .card {
        border-radius: 1rem;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        background-color: #ffffff;
        border: none;
    }
    .card:hover {
        transform: translateY(-6px);
        box-shadow: 0 12px 25px rgba(0,0,0,0.12);
    }

    /* Badge */
    .badge-success {
        background-color: #8e44ad;
    }
    .badge-secondary {
        background-color: #a67c52;
    }

    /* List Pengumuman */
    .list-group-item {
        border-radius: 0.75rem;
        margin-bottom: 0.6rem;
        background-color: #fdf7ff;
        border: none;
    }
    .list-group-item strong {
        color: #5e42a6;
    }

    /* Judul card */
    .card-title {
        color: #6a4ca0;
        font-weight: 600;
    }
    .card-text {
        color: #5e42a6;
        font-size: 1.1rem;
    }

    /* Bagian header mahasiswa */
    .profile-box {
        background: linear-gradient(135deg, #8e44ad, #732d91);
        color: #fff;
        padding: 1.5rem;
        border-radius: 1rem;
        box-shadow: 0 6px 20px rgba(0,0,0,0.1);
    }
    .profile-box h3 {
        color: #fff;
        font-weight: 700;
    }
    .profile-box p strong {
        color: #ffd86b;
    }

    /* Section title */
    h4.section-title {
        margin-bottom: 1rem;
        font-weight: 700;
        color: #5e42a6;
        border-left: 6px solid #8e44ad;
        padding-left: 12px;
    }
</style>
@endsection

@section('content')
<div class="container mt-4">

    

    {{-- Header Mahasiswa --}}
    <div class="profile-box mb-5">
        <h3>Selamat datang, {{ auth()->guard('mhs')->user()->name }} 👋</h3>
        <p><strong>NPM:</strong> {{ auth()->guard('mhs')->user()->npm }}</p>
        <p><strong>Email:</strong> {{ auth()->guard('mhs')->user()->email }}</p>
        <p><strong>Status Akun:</strong> 
            <span class="badge {{ auth()->guard('mhs')->user()->status == 'Aktif' ? 'badge-success' : 'badge-secondary' }}">
                {{ auth()->guard('mhs')->user()->status }}
            </span>
        </p>
    </div>

    {{-- Info Akademik --}}
    <h4 class="section-title">📘 Info Akademik</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-mortarboard fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">Program Studi</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->program_studi ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-people fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">Kelas</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->kelas ?? '-' }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-bar-chart-line fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">IPK</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->ipk ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Ringkasan Akademik --}}
    <h4 class="section-title">📊 Ringkasan Akademik</h4>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-journal-check fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">SKS Terambil</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->sks ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-book-half fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">Jumlah Mata Kuliah</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->mata_kuliah_count ?? 0 }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm p-3 text-center">
                <div class="card-body">
                    <i class="bi bi-clipboard-check fs-1 text-purple"></i>
                    <h5 class="card-title mt-2">Total Kehadiran</h5>
                    <p class="card-text">{{ auth()->guard('mhs')->user()->kehadiran ?? 0 }}%</p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
