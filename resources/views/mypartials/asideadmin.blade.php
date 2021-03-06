<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4"
    style="position: fixed; height: 100vh; min-height: 0; top: 0;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-success"
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false" style="margin-bottom: 5rem">

                {{-- ---------------------------------------------------------------------------------------- DASHBOARD ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('dinas'))
                    {{-- ---------------------------------------------------------------------------------------- CABANG DINAS PENDIDIKAN ---------------------------------------------------------------------------------------- --}}
                    <li class="nav-item has-treeview">
                        <a href="/cadisdik" class="nav-link {{ Request::is('cadisdik*') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-bank"></i>
                            <p>
                                Cabang Dinas Pendidikan
                            </p>
                        </a>
                    </li>
                @endif

                @if (Auth::user()->hasRole('dinas'))
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="bi bi-archive"></i>
                            <p>
                                Data Master
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- ---------------------------------------------------------------------------------------- RUANG KELAS ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/jenis-laboratorium"
                                    class="nav-link {{ Request::is('jenis-laboratorium') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Jenis Laboratorium</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/jenis-penunjang"
                                    class="nav-link {{ Request::is('jenis-penunjang') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Jenis Penunjang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- ---------------------------------------------------------------------------------------- LIST SEKOLAH & PROFIL SEKOLAH ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/profil/admin" class="nav-link {{ Request::is('profil/*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book-half"></i>
                        <p>Profil Sekolah</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('dinas'))
                    {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                    <li
                        class="nav-item has-treeview {{ Request::is('bidang-kompetensi')
                            ? 'menu-open'
                            : (Request::is('program-kompetensi')
                                ? 'menu-open'
                                : (Request::is('spektrum')
                                    ? 'menu-open'
                                    : (Request::is('komli')
                                        ? 'menu-open'
                                        : ''))) }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-award"></i>
                            <p>
                                Kompetensi Keahlian
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- ---------------------------------------------------------------------------------------- BIDANG KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/bidang-kompetensi"
                                    class="nav-link {{ Request::is('bidang-kompetensi') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Bidang Keahlian</p>
                                </a>
                            </li>
                            {{-- ---------------------------------------------------------------------------------------- PROGRAM KOMPETENSI ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/program-kompetensi"
                                    class="nav-link {{ Request::is('program-kompetensi') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Program Keahlian</p>
                                </a>
                            </li>
                            {{-- ---------------------------------------------------------------------------------------- SPEKTRUM ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/spektrum" class="nav-link {{ Request::is('spektrum') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Spektrum</p>
                                </a>
                            </li>
                            {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/komli" class="nav-link {{ Request::is('komli') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Kompetensi Keahlian</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                {{-- ---------------------------------------------------------------------------------------- LAHAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/lahan-dinas" class="nav-link {{ Request::is('lahan-dinas') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-map"></i>
                        <p>Usulan Lahan</p>
                    </a>
                </li>

                {{-- ---------------------------------------------------------------------------------------- BANGUNAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                <li
                    class="nav-item has-treeview {{ Request::is('bangunan/*') ? 'menu-open' : (Request::is('bangunan*') ? 'menu-open' : '') }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>
                            Usulan Bangunan
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{-- ---------------------------------------------------------------------------------------- RUANG KELAS ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_kelas"
                                class="nav-link {{ request('jenis') == 'ruang_kelas' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Ruang Kelas</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- RUANG PRAKTEK ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_praktek"
                                class="nav-link {{ request('jenis') == 'ruang_praktek' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Ruang Praktek</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- LABORATORIUM ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=laboratorium"
                                class="nav-link {{ request('jenis') == 'laboratorium' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Laboratorium</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- PERPUSTAKAAN ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=perpustakaan"
                                class="nav-link {{ request('jenis') == 'perpustakaan' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Perpustakaan</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- TOILET ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=toilet"
                                class="nav-link {{ request('jenis') == 'toilet' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Toilet</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- RUANGAN PENUNJANG ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_penunjang"
                                class="nav-link {{ request('jenis') == 'ruang_penunjang' ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Ruangan Penunjang</p>
                            </a>
                        </li>
                        {{-- ---------------------------------------------------------------------------------------- REHAB/RENOV ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/rehab-renov-dinas"
                                class="nav-link {{ Request::is('bangunan/rehab-renov-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Rehab/Renov</p>
                            </a>
                        </li>
                    </ul>
                </li>

                @if (Auth::user()->hasRole('dinas'))
                    {{-- ---------------------------------------------------------------------------------------- PERALATAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
                    <li class="nav-item has-treeview {{ Request::is('*peralatan') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-collection"></i>
                            <p>
                                Peralatan Sekolah
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- ---------------------------------------------------------------------------------------- JURUSAN ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/peralatan"
                                    class="nav-link {{ Request::is('peralatan') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Peralatan Sekolah</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/usulan-peralatan"
                                    class="nav-link {{ Request::is('usulan-peralatan') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Usulan Peralatan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a href="/usulan-peralatan"
                            class="nav-link {{ Request::is('usulan-peralatan') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-collection"></i>
                            <p>Usulan Peralatan</p>
                        </a>
                    </li>
                @endif


                {{-- ---------------------------------------------------------------------------------------- RIWAYAT BANTUAN ---------------------------------------------------------------------------------------- --}}
                <li class="nav-item">
                    <a href="/riwayat-bantuan-dinas"
                        class="nav-link {{ Request::is('riwayat-bantuan-dinas') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-card-text"></i>
                        <p>Riwayat Bantuan</p>
                    </a>
                </li>

                @if (Auth::user()->hasRole('dinas'))
                    {{-- ---------------------------------------------------------------------------------------- MONITORING & EVALUASI ---------------------------------------------------------------------------------------- --}}
                    <li
                        class="nav-item has-treeview {{ Request::is('monitoring') ? 'menu-open' : (Request::is('visitasi') ? 'menu-open' : '') }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-shield-check"></i>
                            <p>
                                Monitoring & Evaluasi
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- ---------------------------------------------------------------------------------------- JURUSAN ---------------------------------------------------------------------------------------- --}}
                            <li class="nav-item">
                                <a href="/monitoring"
                                    class="nav-link {{ Request::is('monitoring') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Monitoring</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/visitasi" class="nav-link {{ Request::is('visitasi') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>Visitasi Sekolah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->hasRole('verifikator'))
                    <li class="nav-item">
                        <a href="/visitasi-list"
                            class="nav-link {{ Request::is('visitasi-list') ? 'active' : '' }}">
                            <i class="nav-icon bi bi-shield-check"></i>
                            <p>Visitasi</p>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
