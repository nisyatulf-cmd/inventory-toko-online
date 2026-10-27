<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Redirect Halaman Utama
Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Route Dashboard Utama
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Resource Modul Inventaris
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('suppliers', SupplierController::class);
Route::resource('pembelian', PurchaseController::class);
Route::resource('penjualan', SaleController::class);
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

// Route Logout (Bisa GET dan POST agar tidak Error 419 / MethodNotAllowed)
Route::match(['get', 'post'], '/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/dashboard');
})->name('logout');