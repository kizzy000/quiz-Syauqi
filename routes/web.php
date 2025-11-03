<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('dashboard', DashboardController::class);

Route::resource('mhs', MahasiswaController::class);
