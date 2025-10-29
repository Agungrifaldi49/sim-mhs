<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Dosen\Dosen;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('dosen')->check()) {
            return redirect()->route('dosen.dashboard');
        }
        return view('dosen.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('dosen')->attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('dosen.dashboard')->with('success', 'Login berhasil!');
        }

        return back()->with('error', 'Email atau password salah');
    }

    public function showRegisterForm()
    {
        return view('dosen.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosens,nidn',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:dosens,email',
            'password' => 'required|min:6|confirmed',
        ]);

        Dosen::create([
            'nidn' => $request->nidn,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('dosen.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::guard('dosen')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dosen.login')->with('success', 'Anda telah logout.');
    }
}
