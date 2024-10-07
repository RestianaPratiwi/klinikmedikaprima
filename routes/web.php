<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
use \Illuminate\Auth\Middleware\Authenticate;

Route::middleware([Authenticate::class])->group(function () {
    Route::resource('pasien', PasienController::class);
});

Route::get('profile', function (){
    return 'hello world';
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
