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
            <li class="nav-item {{ $type_menu === 'manage-product' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/products') }}"><i class="fas fa-warehouse"></i> <span>Barang Store</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-auction' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/auctions') }}"><i class="fas fa-calendar-days"></i> <span>Auction</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'current-auction' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/current-auctions') }}"><i class="fas fa-calendar-days"></i> <span>Current Auction</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-member' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/members') }}"><i class="fas fa-users"></i> <span>Member</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-auction-winner' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/auction-winners') }}"><i class="fas fa-user"></i> <span>Pemenang Lelang</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-order' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/orders') }}"><i class="fas fa-store"></i> <span>Onelito Store</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-fish' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/fishes') }}"><i class="fas fa-fish"></i> <span>Koi Stock</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'manage-champion-fish' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/champion-fishes') }}"><i class="fas fa-fish"></i> <span>Champion Koi</span></a>
            </li>
            <li class="menu-header">Lelang Bot</li>
            <li class="nav-item {{ $type_menu === 'bot-member' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/bot/member') }}"><i class="fas fa-users"></i> <span>Data Member</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'bot-user' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/bot/user') }}"><i class="fas fa-users"></i> <span>Data User</span></a>
            </li>
            <li class="nav-item {{ $type_menu === 'bot-winner' ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ url('admin/bot/winner') }}"><i class="fas fa-users"></i> <span>Pemenang Lelang</span></a>
            </li>
    </aside>
</div>
