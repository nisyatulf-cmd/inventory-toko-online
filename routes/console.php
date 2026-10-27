<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman awal
Route::get('/', function () {
    return redirect('/login');
});

// Login (hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Halaman yang butuh login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // LOGOUT harus POST
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Tambahkan route lain milikmu di sini
    // (produk, kategori, supplier, pembelian, penjualan, laporan)
});