<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        return view('Mahasiswa.login');
    }

    // Login mahasiswa pakai NPM
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'npm' => 'required|numeric',
            'password' => 'required|string',
        ]);

        // Cek apakah ada mahasiswa dengan npm yang cocok
        $mahasiswa = Mahasiswa::where('npm', $credentials['npm'])->first();

        if (!$mahasiswa || !Hash::check($credentials['password'], $mahasiswa->password)) {
            return back()->withErrors([
                'npm' => 'NPM atau password salah.'
            ])->onlyInput('npm');
        }

        // Cek status akun
        if ($mahasiswa->status != 'Aktif') {
            return back()->withErrors([
                'npm' => 'Akun Anda belum disetujui oleh admin. Harap menunggu persetujuan.'
            ])->onlyInput('npm');
        }

        // Login berhasil
        Auth::guard('mhs')->login($mahasiswa);
        $request->session()->regenerate();

        return redirect()->intended(route('Mahasiswa.dashboard'));
    }


    // Tampilkan form register
    public function showRegisterForm()
    {
        return view('Mahasiswa.register');
    }

    // Register mahasiswa
    public function register(Request $request)
    {
        $data = $request->validate([
            'npm' => 'required|numeric|unique:mahasiswa,npm',
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|unique:mahasiswa,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);
        $data['status'] = 'Belum Aktif'; // <-- ini penting

        Mahasiswa::create($data);

        return redirect()->route('Mahasiswa.login')->with('success', 
            'Akun berhasil dibuat. Harap menunggu aktivasi admin sebelum login.');
    }

   
    // Logout mahasiswa
    public function logout(Request $request)
    {
        Auth::guard('Mahasiswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('Mahasiswa.login');
    }
}
