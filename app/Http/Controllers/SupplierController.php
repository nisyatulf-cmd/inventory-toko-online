<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Menampilkan daftar supplier.
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Menampilkan form tambah supplier.
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Menyimpan data supplier baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        Supplier::create($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail supplier tertentu.
     */
    public function show($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Menampilkan form edit supplier.
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Mengupdate data supplier di database.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_supplier' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);

        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil diperbarui.');
    }

    /**
     * Menghapus data supplier.
     */
    public function destroy($id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->delete();

        return redirect()->route('supplier.index')->with('success', 'Data supplier berhasil dihapus.');
    }
}