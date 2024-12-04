<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="{{ asset('img/logo-ct-dark.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">Cashier</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active text-primary' : '' }}" href="{{ route('home') }}">
                    @include('layouts.icons.dashboard')
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                @if(Auth::check() && Auth::user()->role !== \App\Entities\UserEntity::ADMINISTRATOR)
                <a class="nav-link {{ Route::currentRouteName() == 'penjualan' ? 'active text-primary' : '' }}" href="{{ route('penjualan') }}">
                    @include('layouts.icons.trolley')
                    <span class="nav-link-text ms-1">Penjualan</span>
                </a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    @include('layouts.icons.penjualan')
                    <span class="nav-link-text ms-1">Rekap Penjualan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'kategori' ? 'active text-primary' : '' }}" href="{{ route('kategori') }}">
                    @include('layouts.icons.category')
                    <span class="nav-link-text ms-1">Kategori</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'produk' ? 'active text-primary' : '' }}" href="{{ route('produk') }}">
                    @include('layouts.icons.product')
                    <span class="nav-link-text ms-1">Produk</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'pegawai' ? 'active text-primary' : '' }}" href="{{ route('pegawai') }}">
                    @include('layouts.icons.employee')
                    <span class="nav-link-text ms-1">Pegawai</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile-static' ? 'active text-primary' : '' }}" href="{{ route('profile') }}">
                    @include('layouts.icons.profile')
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
