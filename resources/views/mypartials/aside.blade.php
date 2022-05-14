<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-success" style="background-color: #00A65B !important; display: flex; align-items: center;padding: 9px 11px;">
        <div class="bungkusGambar bg-white p-2" style="border-radius: 50%;">
            <img src="/assets/img/avatars/logo-jawa-barat.png" alt="TarunaBhakti Logo" class="brand-image m-auto" style="opacity: .8">
        </div>
        <div style="display: flex; flex-direction: column;" class="ml-2">
          <span class="brand-text h6" style="margin: 0;font-size: 17px;">SISTEM SARPRAS</span>
          <p class="brand-text font-weight-light h6" style="font-size: .8rem;margin: 0;">Admin</p>
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

                {{------------------------------------------------------------------------------------------ LIST SEKOLAH & PROFIL SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item">
                    <a href="/profil/admin" class="nav-link {{ Request::is('profil/*') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-book-half"></i>
                        <p>Profil Sekolah</p>
                    </a>
                </li>

                {{------------------------------------------------------------------------------------------ LAHAN SEKOLAH ------------------------------------------------------------------------------------------}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-map"></i>
                        <p>
                            Lahan Sekolah
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{------------------------------------------------------------------------------------------ KETERSEDIAAN LAHAN & ANALISI LAHAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/lahan" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ketersediaan Lahan & Analisi Lahan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ USULAN LAHAN SEKOLAH ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/lahan/create" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>Usulan Lahan Sekolah</p>
                            </a>
                        </li>
                    </ul>
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
                            <a href="/bangunan/ruang-kelas" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Kelas</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANG PRAKTEK ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/ruang-praktik" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Praktek</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ LAB KOMPUTER ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/lab-komputer" class="nav-link {{ Request::is('bangunan/lab-komputer') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Lab Komputer</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ PERPUSTAKAAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>Perpustakaan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ TOILET ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/toilet" class="nav-link {{ Request::is('bangunan/toilet') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Toilet</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ RUANGAN PIMPINAN ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="/bangunan/pimpinan" class="nav-link {{ Request::is('bangunan/pimpinan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruangan Pimpinan</p>
                            </a>
                        </li>
                        {{------------------------------------------------------------------------------------------ REHAB/RENOV ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
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
                    <a href="#" class="nav-link">
                        <i class="nav-icon bi bi-shield-check"></i>
                        <p>
                            Monitoring & Evaluasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        {{------------------------------------------------------------------------------------------ ############ ------------------------------------------------------------------------------------------}}
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-regular fa-circle"></i>
                                <p>##########</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
