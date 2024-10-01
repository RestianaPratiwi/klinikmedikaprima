<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PasienController;

Route::resource('pasien', PasienController::class);

Route::get('profile', function (){
    return 'hello world';
});

Route::get('/', function () {
    return view('welcome');
});
