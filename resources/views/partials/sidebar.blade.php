<nav id="sidebar" class="sidebar-wrapper sidebar-dark">
    <div class="sidebar-content" data-simplebar style="height: calc(100% - 60px);">
        <div class="sidebar-brand">
            <a href="{{ url('/dashboard') }}">
                <h3 class="text-center">
                    CRUD
                </h3>
            </a>
        </div>

        <ul class="sidebar-menu">
            <li class="{{ request()->is('menu-utama*') ? 'active' : '' }}">
                <a href="{{ url('menu-utama') }}">
                    <i class="ti ti-home me-2"></i>
                    Main Menu
                </a>
            </li>

            <li class="{{ request()->is('kategori-produk*') ? 'active' : '' }}">
                <a href="{{ url('kategori-produk') }}">
                    <i class="ti ti-folder me-2"></i>
                    Kategori Produk
                </a>
            </li>

            <li class="{{ request()->is('produk*') ? 'active' : '' }}">
                <a href="{{ url('produk') }}">
                    <i class="ti ti-box me-2"></i>
                    Produk
                </a>
            </li>

            <li class="{{ request()->is('transaksi*') ? 'active' : '' }}">
                <a href="{{ url('transaksi') }}">
                    <i class="ti ti-shopping-cart me-2"></i>
                    Transaksi
                </a>
            </li>
        </ul>
    </div>
</nav>
