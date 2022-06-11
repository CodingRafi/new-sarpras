@section('tambahcss')
    <style>
        .aside {
            overflow: auto;
        }

        html {
            scrollbar-width: none;
        }

        ::-webkit-scrollbar {
            display: none;
        }
    </style>
@endsection

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4 aside"
    style="position: fixed; height: 100vh; min-height: 0; top: 0;">
    <!-- Brand Logo -->
    <a href="/profil/{{ Auth::user()->profil_id }}" class="brand-link bg-success"
        style="background-color: #00A65B !important; display: flex; align-items: center;padding: 9px 11px;">
        <div class="bungkusGambar bg-white p-2" style="border-radius: 50%;">
            <img src="/assets/img/avatars/logo-jawa-barat.png" alt="TarunaBhakti Logo" class="brand-image m-auto"
                style="opacity: .8">
        </div>
        <div style="display: flex; flex-direction: column;" class="ml-2">
            <span class="brand-text h6 font-weight-bold" style="margin: 0;font-size: 17px;">SISTEM SARPRAS</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-white">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"
                style="margin-bottom: 5rem">

                {{-- ---------------------------------------------------------------------------------------- DASHBOARD ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/profil/{{ Auth::user()->profil_id }}"
                        class="nav-link {{ Request::is('profil/*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (strtolower(Auth::user()->profil->status_sekolah) == 'swasta')
                    <li class="nav-item">
                        <a href="/lahan" class="nav-link {{ Request::is('lahan') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-map"></i>
                            <p>Ketersediaan & Analisi Lahan</p>
                        </a>
                    </li>
                @else
                    <li
                        class="nav-item has-treeview {{ Request::is('lahan') ? 'menu-open' : (Request::is('usulan-lahan') ? 'menu-open' : '') }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-map"></i>
                            <p>
                                Lahan Sekolah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN LAHAN & ANALISI LAHAN ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/lahan" class="nav-link {{ Request::is('lahan') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Ketersediaan & Analisi Lahan</p>
                                </a>
                            </li>
                            {{-- ---------------------------------------------------------------------------------------- USULAN LAHAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/usulan-lahan"
                                    class="nav-link {{ Request::is('usulan-lahan') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Usulan Lahan Sekolah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- ---------------------------------------------------------------------------------------- BANGUNAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                <li
                    class="nav-item has-treeview {{ Request::is('bangunan/*') ? 'menu-open' : (Request::is('bangunan*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>
                            Bangunan Sekolah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- ---------------------------------------------------------------------------------------- RUANG KELAS ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan?jenis=ruang_kelas"
                                class="nav-link {{ request('jenis') == 'ruang_kelas' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Kelas</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- RUANG PRAKTEK ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/ruang-praktik"
                                class="nav-link {{ Request::is('bangunan/ruang-praktik') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Praktek</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- Laboratorium ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/laboratorium"
                                class="nav-link {{ Request::is('bangunan/laboratorium') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Laboratorium</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- PERPUSTAKAAN ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan?jenis=perpustakaan"
                                class="nav-link {{ request('jenis') == 'perpustakaan' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Perpustakaan</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- TOILET ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan?jenis=toilet"
                                class="nav-link {{ request('jenis') == 'toilet' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Toilet</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- RUANGAN PENUNJANG ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/penunjang"
                                class="nav-link {{ Request::is('bangunan/penunjang') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Penunjang</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- REHAB/RENOV ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/ruang-rehabrenov"
                                class="nav-link {{ Request::is('bangunan/ruang-rehabrenov') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Rehab/Renov</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- ---------------------------------------------------------------------------------------- PERALATAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                @if (count($kompils) > 0)       
                <li class="nav-item has-treeview {{ Request::is('*peralatan*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>
                            Peralatan Sekolah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- ---------------------------------------------------------------------------------------- JURUSAN ---------------------------------------------------------------------------------------- --}}
                        @foreach ($kompils as $kompil)
                            <li class="nav-item">
                                <a href="/peralatan-sekolah/{{ $kompil->id }}"
                                    class="nav-link {{ Request::is('peralatan-sekolah/' . $kompil->id) ? 'active' : '' }}">
                                    {{-- class="nav-link @if (strpos(URL::current(), '/peralatan-sekolah/{{ $kompil->id }}') !== false) active @else '' @endif"> --}}
                                    <i class="fa-regular fa-circle"></i>
                                    <p class="text-truncate" style="width: 180px; vertical-align: middle;">{{ $kompil->kompetensi }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @endif

                {{-- ---------------------------------------------------------------------------------------- RIWAYAT BANTUAN ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/riwayat-bantuan" class="nav-link {{ Request::is('riwayat-bantuan') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-card-text"></i>
                        <p>Riwayat Bantuan</p>
                    </a>
                </li>

                {{-- ---------------------------------------------------------------------------------------- MONITORING & EVALUASI ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item has-treeview">
                    <a href="/visitasi-list" class="nav-link">
                        <i class="nav-icon bi bi-shield-check"></i>
                        <p>
                            Monitoring & Evaluasi
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
