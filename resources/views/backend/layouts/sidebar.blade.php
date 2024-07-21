<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
                <!-- SVG code here -->
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Maicit Dental </span>
        </a>
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Data Pasien -->
        <li class="menu-item {{ request()->routeIs('data-pasien.index') || request()->routeIs('data-pasien.create') || request()->routeIs('data-pasien.edit') ? 'active' : '' }}">
            <a href="{{ route('data-pasien.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Pasien</div>
            </a>
        </li>

        <!-- Data Dokter -->
        <li class="menu-item {{ request()->routeIs('data-dokter.index') || request()->routeIs('data-dokter.create') || request()->routeIs('data-dokter.edit') ? 'active' : '' }}">
            <a href="{{ route('data-dokter.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Dokter</div>
            </a>
        </li>

        <!-- Jadwal Dokter -->
        <li class="menu-item {{ request()->routeIs('data-jadwal.index') || request()->routeIs('data-jadwal.create') || request()->routeIs('data-jadwal.edit') ? 'active' : '' }}">
            <a href="{{ route('data-jadwal.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-time"></i>
                <div data-i18n="Basic">Jadwal Dokter</div>
            </a>
        </li>

        <!-- Data Services -->
        <li class="menu-item {{ request()->routeIs('data-services.index') || request()->routeIs('data-services.create') || request()->routeIs('data-services.edit') ? 'active' : '' }}">
            <a href="{{ route('data-services.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Services</div>
            </a>
        </li>

        <!-- Data Product -->
        <li class="menu-item {{ request()->routeIs('data-product.index') || request()->routeIs('data-product.create') || request()->routeIs('data-product.edit') ? 'active' : '' }}">
            <a href="{{ route('data-product.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Product</div>
            </a>
        </li>

        <!-- Transaksi -->
        <li class="menu-item {{ request()->routeIs('data-transaksi.index') || request()->routeIs('data-transaksi.create') || request()->routeIs('data-transaksi.edit') ? 'active' : '' }}">
            <a href="{{ route('data-transaksi.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Transaksi</div>
            </a>
        </li>
    </ul>
</aside>
