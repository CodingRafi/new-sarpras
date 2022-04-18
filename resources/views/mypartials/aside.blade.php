<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-success elevation-4" style="position: fixed;">
    <!-- Brand Logo -->
    <a href="/" class="brand-link bg-success" style="background-color: #00A65B !important">
      <img src="/assets/img/avatars/TarunaBhaktiLogo.png" alt="TarunaBhakti Logo" class="brand-image img-circle bg-white"
        style="opacity: .8">
      <span class="brand-text font-weight-light">SISTEM SARPRAS</span>
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
            <a href="profil/admin" class="nav-link {{ Request::is('profil/*') ? 'active' : '' }}">
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
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Ketersediaan Lahan & Analisi Lahan</p>
                </a>
              </li>
              {{------------------------------------------------------------------------------------------ USULAN LAHAN SEKOLAH ------------------------------------------------------------------------------------------}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Usulan Lahan Sekolah</p>
                </a>
              </li>
            </ul>
          </li>

          {{------------------------------------------------------------------------------------------ BANGUNAN SEKOLAH ------------------------------------------------------------------------------------------}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-building"></i>
              <p>
                Bangunan Sekolah
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{------------------------------------------------------------------------------------------ ########### ------------------------------------------------------------------------------------------}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>#############</p>
                </a>
              </li>
            </ul>
          </li>

          {{------------------------------------------------------------------------------------------ PERALATAN SEKOLAH ------------------------------------------------------------------------------------------}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-collection"></i>
              <p>
                Peralatan Sekolah
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{------------------------------------------------------------------------------------------ ########### ------------------------------------------------------------------------------------------}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>###############</p>
                </a>
              </li>
            </ul>
          </li>

          {{------------------------------------------------------------------------------------------ RIWAYAT BANTUAN ------------------------------------------------------------------------------------------}}
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon bi bi-card-text"></i>
              <p>
                Riwayat Bantuan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              {{------------------------------------------------------------------------------------------ ########## ------------------------------------------------------------------------------------------}}
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>###########</p>
                </a>
              </li>
            </ul>
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
                  <i class="far fa-circle nav-icon"></i>
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