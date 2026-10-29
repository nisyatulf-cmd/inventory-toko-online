<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk - Toko Nisya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-light">

    <div class="d-flex" style="min-height: 100vh;">
        <!-- Sidebar -->
        <div class="bg-primary text-white p-3 d-flex flex-column justify-content-between" style="width: 250px; flex-shrink: 0;">
            <div>
                <div class="d-flex align-items-center gap-2 mb-4 px-2">
                    <i class="fa-solid fa-boxes-stacked fs-3"></i>
                    <div>
                        <h5 class="m-0 fw-bold">Toko Nisya</h5>
                        <small class="text-white-50" style="font-size: 10px;">INVENTORY MANAGEMENT</small>
                    </div>
                </div>

                <p class="text-uppercase text-white-50 fw-bold mb-2 px-2" style="font-size: 11px;">Menu Utama</p>

                <div class="nav flex-column gap-1">
                    <a class="nav-link text-white rounded" href="{{ route('dashboard') }}"><i class="fa-solid fa-house me-2"></i> Dashboard</a>
                    <a class="nav-link text-primary bg-white fw-bold rounded" href="{{ route('products.index') }}"><i class="fa-solid fa-box me-2"></i> Data Produk</a>
                    <a class="nav-link text-white rounded" href="{{ route('categories.index') }}"><i class="fa-solid fa-layer-group me-2"></i> Kategori</a>
                    <a class="nav-link text-white rounded" href="{{ route('supplier.index') }}"><i class="fa-solid fa-truck me-2"></i> Supplier</a>
                    <a class="nav-link text-white rounded" href="{{ route('pembelian.index') }}"><i class="fa-solid fa-cart-shopping me-2"></i> Pembelian</a>
                    <a class="nav-link text-white rounded" href="{{ route('penjualan.index') }}"><i class="fa-solid fa-cash-register me-2"></i> Penjualan</a>
                    <a class="nav-link text-white rounded" href="{{ route('laporan.index') }}"><i class="fa-solid fa-file-invoice me-2"></i> Laporan</a>
                </div>
            </div>

            <div class="pt-3 border-top border-white-50">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 fw-bold">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h3 class="fw-bold m-0">Data Produk</h3>
                    <small class="text-muted">Kelola daftar produk Toko Nisya</small>
                </div>
                <a href="{{ route('products.create') }}" class="btn btn-primary fw-bold">
                    <i class="fa-solid fa-plus me-1"></i> Tambah Produk
                </a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama Produk</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th style="width: 170px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse (($products ?? []) as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name ?? $product->nama ?? $product->nama_produk ?? '-' }}</td>
                                    <td>{{ optional($product->category)->name ?? optional($product->category)->nama ?? '-' }}</td>
                                    <td>
                                        @php
                                            $harga = $product->selling_price ?? $product->harga_jual ?? $product->harga ?? $product->price ?? null;
                                        @endphp
                                        {{ $harga !== null ? 'Rp ' . number_format($harga, 0, ',', '.') : '-' }}
                                    </td>
                                    <td>{{ $product->stock ?? $product->stok ?? 0 }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">
                                            <i class="fa-solid fa-pen"></i> Edit
                                        </a>
                                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;"
                                              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa-solid fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-4">
                                        Belum ada produk. Klik "Tambah Produk" untuk menambahkan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            @if (isset($products) && method_exists($products, 'links'))
                <div class="mt-3">{{ $products->links() }}</div>
            @endif
        </div>
    </div>

</body>
</html>