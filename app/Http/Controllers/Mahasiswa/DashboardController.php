<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $mahasiswa = Auth::guard('mhs')->user();
        return view('mahasiswa.dashboard', compact('mahasiswa'));
    }
}
