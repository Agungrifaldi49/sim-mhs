<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Dashboard Dosen</a>
        <div class="d-flex">
            <form action="{{ route('dosen.logout') }}" method="POST">
                @csrf
                <button class="btn btn-outline-light btn-sm">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container py-4">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h4 class="fw-bold text-primary">Selamat datang, {{ $dosen->name }} 👋</h4>
            <p class="text-muted mb-4">Anda login sebagai <strong>Dosen</strong>.</p>

            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">Input Nilai</h5>
                            <p class="text-muted mb-1">Masukkan nilai mahasiswa untuk mata kuliah Anda</p>
                            <a href="#" class="btn btn-primary btn-sm">Buka</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center shadow-sm border-0">
                        <div class="card-body">
                            <h5 class="fw-bold">Jadwal Mengajar</h5>
                            <p class="text-muted mb-1">Lihat jadwal mengajar Anda</p>
                            <a href="#" class="btn btn-primary btn-sm">Lihat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

</body>
</html>
