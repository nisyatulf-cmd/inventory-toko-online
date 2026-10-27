<aside class="sidebar" style="background:#1d4ed8; color:#fff; width:250px; min-height:100vh; padding:20px; display:flex; flex-direction:column;">

    <div style="margin-bottom:24px;">
        <h4 style="margin:0; font-weight:700;">Toko Nisya</h4>
        <small style="opacity:.7;">INVENTORY MANAGEMENT</small>
    </div>

    <small style="opacity:.7; margin-bottom:8px;">MENU UTAMA</small>

    <nav style="display:flex; flex-direction:column; gap:6px; flex-grow:1;">
        <a href="/dashboard" class="menu-link">Dashboard</a>
        <a href="/produk" class="menu-link">Data Produk</a>
        <a href="/kategori" class="menu-link">Kategori</a>
        <a href="/supplier" class="menu-link">Supplier</a>
        <a href="/pembelian" class="menu-link">Pembelian</a>
        <a href="/penjualan" class="menu-link">Penjualan</a>
        <a href="/laporan" class="menu-link">Laporan</a>
    </nav>

    {{-- TOMBOL LOGOUT: wajib form POST + @csrf --}}
    <form method="POST" action="{{ route('logout') }}" style="margin-top:20px;">
        @csrf
        <button type="submit"
                style="width:100%; background:#ef4444; color:#fff; border:none; padding:12px; border-radius:10px; font-weight:600; cursor:pointer;">
            Logout
        </button>
    </form>

</aside>

<style>
    .menu-link {
        color: #fff;
        text-decoration: none;
        padding: 10px 14px;
        border-radius: 10px;
    }
    .menu-link:hover {
        background: rgba(255, 255, 255, .15);
    }
</style>