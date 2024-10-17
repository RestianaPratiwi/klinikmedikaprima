<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliController;
use \Illuminate\Auth\Middleware\Authenticate;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);


Route::middleware([Authenticate::class])->group(function () {
    Route::get( 'pasien/create', [App\Http\Controllers\PasienController::class, 'create'])->name('pasien.create');
    Route::resource( 'pasien', PasienController::class );
    Route::resource( 'daftar', DaftarController::class );
    Route::resource( 'poli', PoliController::class );

});

Route::get('logout', function () {
    Auth::logout();
    return redirect('login');
});



