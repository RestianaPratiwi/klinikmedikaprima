<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\LaporanDaftarController;
use App\Http\Controllers\LaporanPasienController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use \Illuminate\Auth\Middleware\Authenticate;

// Rute Login: Redirect pengguna yang sudah login ke halaman home
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/home');  // Jika sudah login, arahkan ke halaman home
    }
    return view('auth.login');  // Jika belum login, tampilkan halaman login
});

// Rute home (setelah login)
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', function () {
        return view('home');  // Tampilkan halaman home setelah login
    });

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    
    Route::resource('laporan-daftar', LaporanDaftarController::class);
    Route::resource('laporan-pasien', LaporanPasienController::class);
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('poli', PoliController::class);
});

// Rute logout
Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});

Auth::routes([
    'register' => false,  // Nonaktifkan registrasi
    'reset' => false,     // Nonaktifkan reset password
    'verify' => false,    // Nonaktifkan verifikasi email
]);
