<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;

use App\Http\Controllers\WargaController;


use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/ketua', function () {
    return view('ketua');
});
Route::get('/anggota', function () {
    return view(' anggota');
});
Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
//projek tahap 1 CRUD
Route::resource('warga', WargaController::class);
//crud users p7
Route::resource('users', UsersController::class);