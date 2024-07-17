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
        <li class="menu-item {{ request()->is('index.html') ? 'active' : '' }}">
            <a href="index.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Layouts -->
        <li class="menu-item {{ request()->routeIs('data-pasien.index') ? 'active' : '' }}">
            <a href="{{ route('data-pasien.index') }}" class="menu-link @yield('menuDataPasien')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Pasien</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ request()->is('data-booking.index') ? 'active' : '' }}">
            <a href="data-booking.index" class="menu-link">
                <i class="menu-icon tf-icons bx bx-bookmark"></i>
                <div data-i18n="Basic">Data Booking</div>
            </a>
        </li> --}}

        <li class="menu-item {{ request()->routeIs('data-dokter.index') ? 'active' : '' }}">
            <a href="{{ route('data-dokter.index') }}" class="menu-link @yield('menuDataDokter')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Dokter</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('data-jadwal.index') ? 'active' : '' }}">
            <a href="{{ route('data-jadwal.index') }}" class="menu-link @yield('menuDatajadwal')">
                <i class="menu-icon tf-icons bx bx-time"></i>
                <div data-i18n="Basic">Jadwal Dokter</div>
            </a>
        </li>

        {{-- <li class="menu-item {{ request()->is('data-perkembangan.index') ? 'active' : '' }}">
            <a href="{{ route('data-perkembangan.index') }}" class="menu-link @yield('menuDatajadwal')">
                <i class="menu-icon tf-icons  bx bx-refresh"></i>
                <div data-i18n="Basic">Perkembangan</div>
            </a>
        </li> --}}
        
        <li class="menu-item {{ request()->routeIs('data-services.index') ? 'active' : '' }}">
            <a href="{{ route('data-services.index') }}" class="menu-link @yield('menuDataServices')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Services</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('data-product.index') ? 'active' : '' }}">
            <a href="{{ route('data-product.index') }}" class="menu-link @yield('menuDataProduct')">
                <i class="menu-icon tf-icons bx bx-user-plus"></i>
                <div data-i18n="Basic">Data Product</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('data-transaksi.index') ? 'active' : '' }}">
            <a href="{{ route('data-transaksi.index') }}" class="menu-link  @yield('menuDataTransaksi')">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Basic">Transaksi</div>
            </a>
        </li>

        <{{-- li class="menu-item {{ request()->is('cards-basic.html') ? 'active' : '' }}">
            <a href="cards-basic.html" class="menu-link">
                <i class="menu-icon tf-icons bx bx-clipboard"></i>
                <div data-i18n="Basic"> Laporan </div>
            </a>
        </li> --}}
    </ul>
</aside>
