@extends('layouts.admin.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">
                <i class="bi bi-person-plus-fill me-2"></i> Tambah Mahasiswa
            </h4>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    {{-- Foto --}}
                    <div class="col-md-6">
                        <label class="form-label">Foto</label>
                        <input type="file" name="foto" class="form-control">
                    </div>

                    {{-- Fakultas --}}
                    <div class="col-md-6">
                        <label class="form-label">Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" name="fakultas" class="form-control" required>
                        </div>
                    </div>

                    {{-- Program Studi --}}
                    <div class="col-md-6">
                        <label class="form-label">Program Studi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-journal-bookmark"></i></span>
                            <input type="text" name="program_studi" class="form-control" required>
                        </div>
                    </div>

                    {{-- Program --}}
                    <div class="col-md-6">
                        <label class="form-label">Program</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-list-check"></i></span>
                            <select name="program" class="form-select" required>
                                <option value="Reguler">Reguler</option>
                                <option value="Non-Reguler">Non-Reguler</option>
                            </select>
                        </div>
                    </div>

                    {{-- Semester --}}
                    <div class="col-md-3">
                        <label class="form-label">Semester</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-123"></i></span>
                            <input type="number" name="semester" class="form-control" required>
                        </div>
                    </div>

                    {{-- Kelas --}}
                    <div class="col-md-3">
                        <label class="form-label">Kelas</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                            <input type="text" name="kelas" class="form-control" required>
                        </div>
                    </div>

                    {{-- NPM --}}
                    <div class="col-md-6">
                        <label class="form-label">NPM</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                            <input type="text" name="npm" class="form-control" required>
                        </div>
                    </div>

                    {{-- Nama Lengkap --}}
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" name="tempat_lahir" class="form-control" required>
                        </div>
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                            <input type="date" name="tanggal_lahir" class="form-control" required>
                        </div>
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="col-md-6">
                        <label class="form-label">Jenis Kelamin</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-gender-ambiguous"></i></span>
                            <select name="jenis_kelamin" class="form-select" required>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    {{-- Agama --}}
                    <div class="col-md-6">
                        <label class="form-label">Agama</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-book"></i></span>
                            <input type="text" name="agama" class="form-control" required>
                        </div>
                    </div>

                    {{-- No HP --}}
                    <div class="col-md-6">
                        <label class="form-label">No HP</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-phone"></i></span>
                            <input type="text" name="no_hp" class="form-control">
                        </div>
                    </div>

                    {{-- Email --}}
                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>

                    {{-- Email Affiliasi --}}
                    <div class="col-md-6">
                        <label class="form-label">Email Affiliasi</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
                            <input type="email" name="email_affiliasi" class="form-control">
                        </div>
                    </div>

                    {{-- Alamat Lengkap --}}
                    <div class="col-md-6">
                        <label class="form-label">Alamat Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
                            <textarea name="alamat_lengkap" class="form-control" rows="3" required></textarea>
                        </div>
                    </div>
                     {{-- Status Mahasiswa --}}
                <div class="col-md-6">
                    <label class="form-label">Status Mahasiswa</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person-check-fill"></i></span>
                        <select name="status" class="form-select" required>
                            <option value="Belum Aktif">Belum Aktif</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Lulus">Lulus</option>
                            <option value="Dropout">Dropout</option>
                        </select>
                    </div>
                </div>
                </div>
               


                {{-- Tombol --}}
                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-save-fill me-1"></i> Simpan
                    </button>
                    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left-circle me-1"></i> Kembali
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
