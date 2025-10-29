<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $dosen = Auth::guard('dosen')->user();
        return view('dosen.dashboard', compact('dosen'));
    }
}
