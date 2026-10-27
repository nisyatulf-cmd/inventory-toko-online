<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Toko Nisya</title>
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
                    <a class="nav-link text-primary bg-white fw-bold rounded" href="{{ route('dashboard') }}"><i class="fa-solid fa-house me-2"></i> Dashboard</a>
                    <a class="nav-link text-white rounded" href="{{ route('products.index') }}"><i class="fa-solid fa-box me-2"></i> Data Produk</a>
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
                    <h3 class="fw-bold m-0">Dashboard</h3>
                    <small class="text-muted">Selamat datang di sistem inventaris Toko Nisya</small>
                </div>
                <div class="d-flex align-items-center gap-2 bg-white p-2 px-3 rounded shadow-sm border">
                    <i class="fa-solid fa-circle-user fs-3 text-primary"></i>
                    <div>
                        <div class="fw-bold" style="font-size: 14px;">Admin Nisya</div>
                        <small class="text-muted" style="font-size: 11px;">Administrator</small>
                    </div>
                </div>
            </div>

            <div class="card bg-primary text-white p-4 mb-4 border-0 shadow-sm rounded-3">
                <h4 class="fw-bold">Halo, Admin! ✨</h4>
                <p class="mb-0 opacity-75">Kelola produk dan pantau stok dengan mudah. Semoga aktivitas inventaris Toko Nisya hari ini berjalan lancar!</p>
            </div>

            <h5 class="fw-bold mb-3">Ringkasan Inventaris</h5>
            <div class="row g-3 mb-4">
                <div class="col-md-3">
                    <div class="card p-3 bg-white border-0 shadow-sm">
                        <small class="text-muted">Total Produk</small>
                        <h3 class="fw-bold text-primary m-0 mt-1">{{ $totalProduk ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3 bg-white border-0 shadow-sm">
                        <small class="text-muted">Total Kategori</small>
                        <h3 class="fw-bold text-primary m-0 mt-1">{{ $totalKategori ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3 bg-white border-0 shadow-sm">
                        <small class="text-muted">Total Stok</small>
                        <h3 class="fw-bold text-primary m-0 mt-1">{{ $totalStok ?? 0 }}</h3>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card p-3 bg-white border-0 shadow-sm">
                        <small class="text-muted">Stok Menipis</small>
                        <h3 class="fw-bold text-danger m-0 mt-1">{{ $stokMenipis ?? 0 }}</h3>
                    </div>
                </div>