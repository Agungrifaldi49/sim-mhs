<?php

namespace App\Models\Admin;

use Illuminate\Foundation\Auth\User as Authenticatable; // <- ganti ini
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Mahasiswa extends Authenticatable
{
    use HasFactory, Notifiable;

    // Paksa Eloquent pakai tabel mahasiswa (bukan mahasiswas)
    protected $table = 'mahasiswa';

    protected $fillable = [
        'foto',
        'fakultas',
        'program_studi',
        'program',
        'semester',
        'kelas',
        'npm',
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'email',
        'email_affiliasi',
        'alamat_lengkap',
        'status',
        'password', // <- tambahkan supaya bisa simpan password
    ];

    protected $hidden = [
        'password', // biar password tidak ikut ditampilkan
        'remember_token',
    ];
}
