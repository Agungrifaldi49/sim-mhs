@extends('layouts.admin.app')

@section('content')
<div class="container my-4">
    {{-- Judul & Tombol Tambah --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="fw-bold text-primary">
            <i class="bi bi-people-fill me-2"></i> Data Mahasiswa
        </h2>
        <a href="{{ route('admin.mahasiswa.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah Mahasiswa
        </a>
    </div>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i> 
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Card Tabel --}}
    <div class="card shadow-sm border-0">
        <form method="GET" class="row g-2 mb-3" id="filterForm">
            <div class="col-md-3">
                <input type="text" name="npm" class="form-control" placeholder="Cari NPM" value="{{ request('npm') }}" oninput="this.form.submit()">
            </div>
            <div class="col-md-3">
                <input type="text" name="nama_lengkap" class="form-control" placeholder="Cari Nama" value="{{ request('nama_lengkap') }}" oninput="this.form.submit()">
            </div>
            <div class="col-md-3">
                <input type="text" name="program_studi" class="form-control" placeholder="Cari Prodi" value="{{ request('program_studi') }}" oninput="this.form.submit()">
            </div>
            <div class="col-md-2">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="all" {{ request('status')=='all'?'selected':'' }}>Semua Status</option>
                    <option value="Belum Aktif" {{ request('status')=='Belum Aktif'?'selected':'' }}>Belum Aktif</option>
                    <option value="Aktif" {{ request('status')=='Aktif'?'selected':'' }}>Aktif</option>
                    <option value="Cuti" {{ request('status')=='Cuti'?'selected':'' }}>Cuti</option>
                    <option value="Lulus" {{ request('status')=='Lulus'?'selected':'' }}>Lulus</option>
                    <option value="Dropout" {{ request('status')=='Dropout'?'selected':'' }}>Dropout</option>
                </select>
            </div>
        </form>


        <div class="card-body">
            <div class="table-responsive">
               <table class="table table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Semester</th>
                        <th>Email</th>
                        <th>Status</th> {{-- Tambahkan ini --}}
                        <th width="160">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($mahasiswas as $mhs)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">
                                @if($mhs->foto)
                                    <img src="{{ asset('uploads/mahasiswa/'.$mhs->foto) }}" 
                                        alt="foto" class="rounded-circle border" width="50" height="50" 
                                        style="object-fit: cover;">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>{{ $mhs->npm }}</td>
                            <td>{{ $mhs->nama_lengkap }}</td>
                            <td>{{ $mhs->program_studi }}</td>
                            <td class="text-center">{{ $mhs->semester }}</td>
                            <td>{{ $mhs->email }}</td>
                            <td class="text-center">
                                <p class="mb-1">
                                    @php
                                        $statusClass = match($mhs->status) {
                                            'Belum Aktif' => 'secondary',
                                            'Aktif'       => 'success',
                                            'Cuti'        => 'warning',
                                            'Lulus'       => 'primary',
                                            'Dropout'     => 'danger',
                                            default       => 'secondary',
                                        };
                                    @endphp

                                    <span class="badge bg-{{ $statusClass }}">
                                        {{ $mhs->status ?? 'Belum Aktif' }}
                                    </span>
                                </p>

                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-sm btn-info me-1" 
                                        data-bs-toggle="modal" data-bs-target="#detailModal{{ $mhs->id }}">
                                    <i class="bi bi-eye-fill"></i>
                                </button>

                                <a href="{{ route('admin.mahasiswa.edit', $mhs->id) }}" 
                                class="btn btn-sm btn-warning me-1">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="{{ route('admin.mahasiswa.destroy', $mhs->id) }}" 
                                    method="POST" style="display:inline-block"
                                    onsubmit="return confirm('Yakin hapus data mahasiswa ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">
                                <i class="bi bi-info-circle me-2"></i> Data mahasiswa tidak ditemukan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>

            {{-- Pagination --}}
            <div class="d-flex justify-content-center mt-3">
                {{ $mahasiswas->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Modal Detail Mahasiswa --}}
@foreach ($mahasiswas as $mhs)
<div class="modal fade" id="detailModal{{ $mhs->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $mhs->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="detailModalLabel{{ $mhs->id }}">
                    <i class="bi bi-person-lines-fill me-2"></i> Detail Mahasiswa
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" style="max-height: 75vh; overflow-y: auto;">
                <div class="row g-3">
                    {{-- Kolom Kiri: Foto + Identitas --}}
                    <div class="col-md-4 text-center">
                        @if($mhs->foto)
                            <img src="{{ asset('uploads/mahasiswa/'.$mhs->foto) }}" 
                                class="rounded-circle border mb-2" width="140" height="140" style="object-fit: cover;">
                        @else
                            <span class="text-muted">Tidak ada foto</span>
                        @endif

                        <div class="mt-3 p-2 border rounded shadow-sm bg-light text-start">
                            <h6 class="text-primary fw-bold mb-2"><i class="bi bi-person-fill me-1"></i> Identitas</h6>
                            <p class="mb-1"><strong>Nama:</strong> {{ $mhs->nama_lengkap }}</p>
                            <p class="mb-1"><strong>Jenis Kelamin:</strong> {{ $mhs->jenis_kelamin }}</p>
                            <p class="mb-1"><strong>TTL:</strong> {{ $mhs->tempat_lahir }}, {{ $mhs->tanggal_lahir }}</p>
                            <p class="mb-1"><strong>Status:</strong> 
                                @if($mhs->status)
                                    {{ $mhs->status }}
                                @else
                                    <span class="text-muted">Belum ditentukan</span>
                                @endif
                            </p>
                        </div>
                    </div>

                    {{-- Kolom Kanan: Pendidikan, Kontak, Alamat --}}
                    <div class="col-md-8">
                        {{-- Pendidikan --}}
                        <div class="mb-3 p-3 border rounded shadow-sm bg-light">
                            <h6 class="text-primary fw-bold mb-2"><i class="bi bi-journal-bookmark me-1"></i> Pendidikan</h6>
                            <div class="row">
                                <div class="col-md-6"><strong>Fakultas:</strong> {{ $mhs->fakultas }}</div>
                                <div class="col-md-6"><strong>Prodi:</strong> {{ $mhs->program_studi }}</div>
                                <div class="col-md-6"><strong>Program:</strong> {{ $mhs->program }}</div>
                                <div class="col-md-6"><strong>Semester:</strong> {{ $mhs->semester }}</div>
                                <div class="col-md-6"><strong>Kelas:</strong> {{ $mhs->kelas }}</div>
                                <div class="col-md-6"><strong>Agama:</strong> {{ $mhs->agama }}</div>
                            </div>
                        </div>

                        {{-- Kontak --}}
                        <div class="mb-3 p-3 border rounded shadow-sm bg-light">
                            <h6 class="text-primary fw-bold mb-2"><i class="bi bi-telephone-fill me-1"></i> Kontak</h6>
                            <div class="row">
                                <div class="col-md-6"><strong>No HP:</strong> {{ $mhs->no_hp ?? '-' }}</div>
                                <div class="col-md-6"><strong>Email:</strong> {{ $mhs->email }}</div>
                                <div class="col-md-12"><strong>Email Affiliasi:</strong> {{ $mhs->email_affiliasi ?? '-' }}</div>
                            </div>
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3 p-3 border rounded shadow-sm bg-light">
                            <h6 class="text-primary fw-bold mb-2"><i class="bi bi-geo-alt-fill me-1"></i> Alamat</h6>
                            <p class="mb-0">{{ $mhs->alamat_lengkap }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="bi bi-x-circle me-1"></i> Tutup
                </button>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection
