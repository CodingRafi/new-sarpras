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
                <li class="nav-item has-treeview {{ Request::is('bangunan/*') ? 'menu-open' : '' }}">
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
                            <a href="/bangunan/ruang-kelas-dinas" class="nav-link {{ Request::is('bangunan/ruang-kelas-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Kelas</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANG PRAKTEK ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/ruang-praktik-dinas" class="nav-link {{ Request::is('bangunan/ruang-praktik-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Praktek</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ LAB KOMPUTER ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/lab-komputer-dinas" class="nav-link {{ Request::is('bangunan/lab-komputer-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Lab Komputer</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ PERPUSTAKAAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/perpustakaan-dinas" class="nav-link {{ Request::is('bangunan/perpustakaan-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Perpustakaan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ TOILET ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/toilet-dinas" class="nav-link {{ Request::is('bangunan/toilet-dinas') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Toilet</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANGAN PIMPINAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/ruang-pimpinan-dinas" class="nav-link {{ Request::is('bangunan/ruang-pimpinan-dinas') ? 'active' : '' }}">
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
                            <a href="/peralatan/nama-jurusan" class="nav-link {{ Request::is('peralatan/nama-jurusan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>(nama jurusan)</p>
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
