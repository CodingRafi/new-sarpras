<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-success" style="background-color: #00A65B !important; display: flex; align-items: center;padding: 9px 11px;">
        <div class="bungkusGambar bg-white p-2" style="border-radius: 50%;">
            <img src="/assets/img/avatars/logo-jawa-barat.png" alt="TarunaBhakti Logo" class="brand-image m-auto" style="opacity: .8">
        </div>
        <div style="display: flex; flex-direction: column;" class="ml-2">
          <span class="brand-text h6" style="margin: 0;font-size: 17px;">SISTEM SARPRAS</span>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-white">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{------------------------------------------------------------------------------------------ DASHBOARD ------------------------------------------------------------------------------------------}}
                <li class="nav-item">
                    <a href="/" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-house"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                @can('view_profiladmin')     
                {{------------------------------------------------------------------------------------------ LIST SEKOLAH & PROFIL SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item">
                    <a href="/profil/admin" class="nav-link {{ Request::is('profil/*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book-half"></i>
                        <p>Profil Sekolah</p>
                    </a>
                </li>
                @endcan

                {{------------------------------------------------------------------------------------------ LAHAN SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item">
                    <a href="/lahan-dinas" class="nav-link {{ Request::is('lahan-dinas') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-map"></i>
                        <p>Lahan Sekolah</p>
                    </a>
                </li>

                {{------------------------------------------------------------------------------------------ BANGUNAN SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item has-treeview {{ Request::is('bangunan-all/*') ? 'menu-open' : '' }} {{ Request::is('bangunan/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-building"></i>
                        <p>
                            Bangunan Sekolah
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{------------------------------------------------------------------------------------------ RUANG KELAS ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_kelas" class="nav-link {{ (request('jenis') == 'ruang_kelas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Kelas</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANG PRAKTEK ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_praktek" class="nav-link {{ (request('jenis') == 'ruang_praktek') ? 'menu-open' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Praktek</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ LAB KOMPUTER ------------------------------------------------------------------------------------------}}
                        <li class="nav-item has-treeview {{ (request('jenis') == 'lab_komputer') ? 'menu-open' : '' }}{{ (request('jenis') == 'lab_biologi') ? 'menu-open' : '' }} {{ (request('jenis') == 'lab_fisika') ? 'menu-open' : '' }} {{ (request('jenis') == 'lab_kimia') ? 'menu-open' : '' }} {{ (request('jenis') == 'lab_ipa') ? 'menu-open' : '' }} {{ (request('jenis') == 'lab_bahasa') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>
                                    Laboratorium
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{ (request('jenis') == 'lab_biologi') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_biologi" class="nav-link {{ (request('jenis') == 'lab_biologi') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Biologi</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ (request('jenis') == 'lab_fisika') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_fisika" class="nav-link {{ (request('jenis') == 'lab_fisika') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Fisika</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ (request('jenis') == 'lab_komputer') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_komputer" class="nav-link {{ (request('jenis') == 'lab_komputer') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Komputer</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ (request('jenis') == 'lab_kimia') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_kimia" class="nav-link {{ (request('jenis') == 'lab_kimia') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Kimia</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ (request('jenis') == 'lab_ipa') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_ipa" class="nav-link {{ (request('jenis') == 'lab_ipa') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Ipa</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ (request('jenis') == 'lab_bahasa') ? 'active' : '' }}">
                                    <a href="/bangunan-all?jenis=lab_bahasa" class="nav-link {{ (request('jenis') == 'lab_bahasa') ? 'active' : '' }}">
                                        <i class="fa-regular fa-circle"></i>
                                        <p>Laboratorium Bahasa</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        {{------------------------------------------------------------------------------------------ PERPUSTAKAAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=perpustakaan" class="nav-link {{ (request('jenis') == 'perpustakaan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Perpustakaan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ TOILET ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=toilet" class="nav-link {{ (request('jenis') == 'toilet') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Toilet</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANGAN PIMPINAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan-all?jenis=ruang_pimpinan" class="nav-link {{ Request::is('bangunan/ruang-pimpinan-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruangan Pimpinan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ REHAB/RENOV ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/rehab-renov-dinas" class="nav-link {{ Request::is('bangunan/rehab-renov-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Rehab/Renov</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{------------------------------------------------------------------------------------------ PERALATAN SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item has-treeview {{ Request::is('peralatan/*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-collection"></i>
                        <p>
                            Peralatan Sekolah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{------------------------------------------------------------------------------------------ JURUSAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/peralatan" class="nav-link {{ Request::is('peralatan/nama-jurusan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Peralatan Sekolah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/usulan-peralatan" class="nav-link {{ Request::is('peralatan/nama-jurusan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Peralatan</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{------------------------------------------------------------------------------------------ RIWAYAT BANTUAN ------------------------------------------------------------------------------------------}}
                <li class="nav-item">
                    <a href="/riwayat-bantuan" class="nav-link {{ Request::is('riwayat-bantuan') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-card-text"></i>
                        <p>Riwayat Bantuan</p>
                    </a>
                </li>

                {{------------------------------------------------------------------------------------------ MONITORING & EVALUASI ------------------------------------------------------------------------------------------}}
                <li class="nav-item has-treeview">
                    <a href="/monev" class="nav-link">
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
