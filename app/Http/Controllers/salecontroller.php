<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function index()
    {
        $sales = Sale::with('product')->get();
        $products = Product::all();
        return view('sales.index', compact('sales', 'products'));
    }

    public function create()
    {
        $products = Product::all();
        return view('sales.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'qty' => 'required|numeric',
            'total_price' => 'required|numeric',
            'date' => 'required|date',
        ]);

        Sale::create($request->all());
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil disave & stok otomatis berkurang');
    }
}