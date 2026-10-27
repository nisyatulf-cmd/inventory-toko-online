<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Admin dan Staff: melihat daftar produk dan stok
    public function index(Request $request)
    {
        $products = Product::with('category')
            ->when($request->search, function ($q, $search) {
                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhere('sku', 'like', "%{$search}%");
                });
            })
            ->when($request->category_id, function ($q, $id) {
                $q->where('category_id', $id);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        $categories = Category::orderBy('name')->get();

        return view('products.index', compact('products', 'categories'));
    }

    // Admin saja: halaman tambah produk
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('products.create', compact('categories'));
    }

    // Admin saja: menyimpan produk baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'sku' => [
                'required',
                'string',
                'max:50',
                'unique:products,sku',
            ],
            'name' => [
                'required',
                'string',
                'max:150',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'stock' => [
                'required',
                'integer',
                'min:0',
            ],
            'minimum_stock' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        Product::create($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Admin dan Staff: melihat detail produk
    public function show(Product $product)
    {
        $product->load('category');

        return view('products.show', compact('product'));
    }

    // Admin saja: halaman edit produk
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view('products.edit', compact('product', 'categories'));
    }

    // Admin saja: memperbarui produk
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'sku' => [
                'required',
                'string',
                'max:50',
                Rule::unique('products', 'sku')->ignore($product->id),
            ],
            'name' => [
                'required',
                'string',
                'max:150',
            ],
            'category_id' => [
                'required',
                'exists:categories,id',
            ],
            'purchase_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'selling_price' => [
                'required',
                'numeric',
                'min:0',
            ],
            'stock' => [
                'required',
                'integer',
                'min:0',
            ],
            'minimum_stock' => [
                'required',
                'integer',
                'min:0',
            ],
        ]);

        $product->update($data);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diubah.');
    }

    // Admin saja: menghapus produk
    public function destroy(Product $product)
    {
        // Produk yang sudah digunakan dalam transaksi tidak boleh dihapus
        if (
            $product->saleItems()->exists() ||
            $product->purchaseItems()->exists()
        ) {
            return back()->withErrors([
                'delete' => 'Produk sudah dipakai di transaksi, tidak bisa dihapus.',
            ]);
        }

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
}