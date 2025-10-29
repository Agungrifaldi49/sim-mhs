<?php

namespace App\Models\Mahasiswa;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Mahasiswa extends Authenticatable
{
    protected $table = 'mahasiswa'; // tabel mahasiswa
    protected $fillable = [
        'nama', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}