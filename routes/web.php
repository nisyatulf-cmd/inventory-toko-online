<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\LaporanController;

/*
|--------------------------------------------------------------------------
| Web Routes - Toko Nisya
|--------------------------------------------------------------------------
*/

// Halaman utama diarahkan ke dashboard
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Login (hanya untuk yang belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.process');
});

// Logout (GET dan POST supaya tombol logout tetap jalan)
Route::match(['get', 'post'], '/logout', [AuthController::class, 'logout'])->name('logout');

// Semua halaman di bawah ini wajib login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);

    // Supplier (dua nama, supaya route('supplier.*') dan route('suppliers.*') sama-sama jalan)
    Route::resource('supplier', SupplierController::class);
    Route::resource('suppliers', SupplierController::class);

    // Pembelian (route('pembelian.*') dan route('purchases.*') sama-sama jalan)
    Route::resource('pembelian', PurchaseController::class);
    Route::resource('purchases', PurchaseController::class);

    // Penjualan (route('penjualan.*') dan route('sales.*') sama-sama jalan)
    Route::resource('penjualan', SaleController::class);
    Route::resource('sales', SaleController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});