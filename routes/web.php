<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
oute::get('/anggota', function () {
    return view('ini anggota');
});
