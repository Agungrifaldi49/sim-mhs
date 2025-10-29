<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Dosen\AuthController as DosenAuth;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboard;
use App\Http\Controllers\Mahasiswa\AuthController as MahasiswaAuthController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Admin\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

// ===================== ADMIN =====================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    // mahasiswa
    Route::resource('mahasiswa', MahasiswaController::class);
    // Hanya admin yang bisa masuk
    Route::middleware('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });
});

// ===================== DOSEN =====================
Route::prefix('dosen')->name('dosen.')->group(function () {
    Route::get('/login', [DosenAuth::class, 'showLoginForm'])->name('login');
    Route::post('/login', [DosenAuth::class, 'login'])->name('login.submit');
    Route::get('/register', [DosenAuth::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [DosenAuth::class, 'register'])->name('register.submit');
    Route::post('/logout', [DosenAuth::class, 'logout'])->name('logout');

    // Hanya dosen yang bisa masuk
    Route::middleware('dosen')->group(function () {
        Route::get('/dashboard', [DosenDashboard::class, 'index'])->name('dashboard');
    });
});

// ===================== MAHASISWA =====================
Route::prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    Route::get('/login', [MahasiswaAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [MahasiswaAuthController::class, 'login'])->name('login.submit');
    Route::get('/register', [MahasiswaAuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [MahasiswaAuthController::class, 'register'])->name('register.submit');
    Route::post('/logout', [MahasiswaAuthController::class, 'logout'])->name('logout');

    // Hanya mahasiswa yang bisa masuk
    Route::middleware('mhs')->group(function () {
        Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('dashboard');
    });
});
