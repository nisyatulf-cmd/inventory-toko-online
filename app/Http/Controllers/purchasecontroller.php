<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Menampilkan daftar transaksi pembelian
     */
    public function index()
    {
        $purchases = Purchase::with(['supplier', 'product'])->latest()->get();
        return view('pembelian.index', compact('purchases'));
    }

    /**
     * Menampilkan form tambah pembelian
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        return view('pembelian.create', compact('suppliers', 'products'));
    }

    /**
     * Menyimpan data pembelian baru & menambah stok produk
     */
    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id'  => 'required|exists:products,id',
            'qty'         => 'required|numeric|min:1',
            'total_price' => 'required|numeric',
            'date'        => 'required|date',
        ]);

        Purchase::create([
            'supplier_id' => $request->supplier_id,
            'product_id'  => $request->product_id,
            'qty'         => $request->qty,
            'total_price' => $request->total_price,
            'date'        => $request->date,
        ]);

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil ditambahkan dan stok bertambah!');
    }

    /**
     * Menghapus data pembelian
     */
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil dihapus!');
    }
}