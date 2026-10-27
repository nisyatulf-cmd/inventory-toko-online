<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung data aman (jika tabel belum ada/kosong tetap bernilai 0)
        $totalProduk = Schema::hasTable('products') ? Product::count() : 0;
        $totalKategori = Schema::hasTable('categories') ? Category::count() : 0;
        
        // Cek nama kolom stok (stok vs stock)
        $totalStok = 0;
        $stokMenipis = 0;
        $produks = collect();

        if (Schema::hasTable('products')) {
            $column = Schema::hasColumn('products', 'stock') ? 'stock' : (Schema::hasColumn('products', 'stok') ? 'stok' : null);
            if ($column) {
                $totalStok = Product::sum($column);
                $stokMenipis = Product::where($column, '<=', 5)->count();
            }
            $produks = Product::latest()->take(5)->get();
        }

        return view('dashboard', compact(
            'totalProduk',
            'totalKategori',
            'totalStok',
            'stokMenipis',
            'produks'
        ));
    }
}