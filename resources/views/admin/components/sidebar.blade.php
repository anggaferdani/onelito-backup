<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Onelito</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Ol</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/dashboard') }}"><i class="fas fa-desktop"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Management</li>
            <li class="nav-item {{ $type_menu === 'manage-admin' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/admins') }}"><i class="fas fa-user-group"></i> <span>Admin</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-auction-product' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/auction-products') }}"><i class="fas fa-boxes-stacked"></i> <span>Barang Lelang</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-product-store' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/manage/admins') }}"><i class="fas fa-warehouse"></i> <span>Barang Store</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-auction' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/auctions') }}"><i class="fas fa-calendar-days"></i> <span>Auction</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-member' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/members') }}"><i class="fas fa-users"></i> <span>Peserta</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-winner' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/manage/admins') }}"><i class="fas fa-user"></i> <span>Pemenang</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-buy-store' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/manage/admins') }}"><i class="fas fa-store"></i> <span>Pembelian Store</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-fish' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/fishes') }}"><i class="fas fa-fish"></i> <span>Fish</span></a>
            </li>
    </aside>
</div>
