<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0">
                <div class="card-body p-4">
                    <h4 class="text-center mb-3 fw-bold text-success">Register Mahasiswa</h4>

                    <form method="POST" action="{{ route('mahasiswa.register.submit') }}">
                        @csrf
                        <div class="mb-3">
                            <label>NPM</label>
                            <input type="text" name="npm" class="form-control" required placeholder="Masukkan NPM">
                        </div>
                        <div class="mb-3">
                            <label>Nama</label>
                            <input type="text" name="nama_lengkap" class="form-control" required placeholder="Masukkan nama">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required placeholder="Masukkan email">
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required placeholder="Masukkan password">
                        </div>
                        <div class="mb-3">
                            <label>Konfirmasi Password</label>
                            <input type="password" name="password_confirmation" class="form-control" required placeholder="Ulangi password">
                        </div>
                        <button type="submit" class="btn btn-success w-100">Daftar</button>
                    </form>

                    <div class="text-center mt-3">
                        <small>Sudah punya akun? <a href="{{ route('mahasiswa.login') }}">Login di sini</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
