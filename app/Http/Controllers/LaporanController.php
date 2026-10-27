<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Sale;

class LaporanController extends Controller
{
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'product'])->get();
        $sales = Sale::with('product')->get();

        $totalPembelian = $purchases->sum('total_price');
        $totalPenjualan = $sales->sum('total_price');

        return view('laporan.index', compact('purchases', 'sales', 'totalPembelian', 'totalPenjualan'));
    }
}