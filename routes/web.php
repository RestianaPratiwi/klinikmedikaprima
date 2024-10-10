<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;
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


Route::group(['middleware'=> 'auth'], function(){
    Route::resource( 'pasien', PasienController::class );
});



