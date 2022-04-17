<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3 | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font-Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .card .active {
      background-color: white !important;
      color: black !important;
    }

  </style>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->
      <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
          <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span>SISTEM SARPRAS</span>
          <img src="dist/img/TarunaBhaktiLogo.png" alt="TarunaBhakti Logo" class="brand-image img-circle bg-white"
            width="33" style="opacity: .8">
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-success elevation-4 bg-success">
      <!-- Brand Logo -->
      <a href="../index.html" class="brand-link">
        <img src="dist/img/TarunaBhaktiLogo.png" alt="TarunaBhakti Logo" class="brand-image img-circle bg-white"
          style="opacity: .8">
        <span class="brand-text font-weight-light">SISTEM SARPRAS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar bg-white">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="../index.html" class="nav-link">
                <i class="nav-icon bi bi-house"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="profil_sekolah.html" class="nav-link active">
                <i class="nav-icon bi bi-book-half"></i>
                <p>
                  Profil Sekolah
                  <!-- <span class="right badge badge-danger">New</span> -->
                </p>
              </a>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-map"></i>
                <p>
                  Lahan Sekolah
                  <i class="fas fa-angle-left right"></i>
                  <!-- <span class="badge badge-danger right">6</span> -->
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Top Navigation + Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/boxed.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Boxed</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Sidebar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-topnav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Navbar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/fixed-footer.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Fixed Footer</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/layout/collapsed-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Collapsed Sidebar</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-building"></i>
                <p>
                  Bangunan Sekolah
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/charts/chartjs.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>ChartJS</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/flot.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Flot</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/charts/inline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Inline</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-collection"></i>
                <p>
                  Peralatan Sekolah
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Icons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/buttons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Buttons</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/sliders.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Sliders</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/modals.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Modals & Alerts</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/navbar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Navbar & Tabs</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/timeline.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Timeline</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/UI/ribbons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Ribbons</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-card-text"></i>
                <p>
                  Riwayat Bantuan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/forms/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>General Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/advanced.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Advanced Elements</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/editors.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Editors</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/forms/validation.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Validation</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="nav-icon bi bi-shield-check"></i>
                <p>
                  Monitoring & Evaluasi
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="pages/tables/simple.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Simple Tables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/data.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>DataTables</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="pages/tables/jsgrid.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>jsGrid</p>
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

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark pl-4">Profil Sekolah</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content pl-4 pr-4">
        

        @yield('container')


        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card mb-5">
              <div class="card-header bg-info">
                <ul class="nav nav-pills ml-auto">
                  <li class="nav-item">
                    <a class="nav-link text-white active" href="#data-sekolah" data-toggle="tab"><i
                        class="bi bi-house-fill mr-1"></i>Data Sekolah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#input-data-sekolah" data-toggle="tab"><i
                        class="bi bi-plus-lg mr-1"></i>Input Data Sekolah</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white" href="#foto-sekolah" data-toggle="tab"><i
                        class="bi bi-plus-lg mr-1"></i>Foto Sekolah</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <div class="tab-content p-0">
                  <div class="tab-pane active" id="data-sekolah">
                    <table class="table table-hover table-borderless text-nowrap">
                      <tr>
                        <th>NPSN</th>
                        <td>: 20268220</td>
                      </tr>
                      <tr>
                        <th>Nama Sekolah</th>
                        <td>: SMKS WIRA BUANA 2</td>
                      </tr>
                      <tr>
                        <th>Alamat</th>
                        <td>: JL. CAMAT KANANG PINTU AIR NO.13 RT5 RW 7 Pabuaran Kode Pos 16320</td>
                      </tr>
                      <tr>
                        <th>Koordinat</th>
                        <td>: -</td>
                      </tr>
                      <tr>
                        <th>Email</th>
                        <td>: smkwb2@wirabuana.sch.id</td>
                      </tr>
                      <tr>
                        <th>Website</th>
                        <td>: http://www.wirabuana.sch.id</td>
                      </tr>
                      <tr>
                        <th>Nomor Telepon</th>
                        <td>: 02187984656</td>
                      </tr>
                    </table>
                  </div>
                  <div class="chart tab-pane" id="input-data-sekolah">
                    <form role="form">
                      <div class="card-body">
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">NPSN</label>
                          <input type="number" class="form-control col-sm-6" placeholder="Input NPSN">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                          <input type="text" class="form-control col-sm-6" placeholder="Input Sekolah">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Alamat</label>
                          <input type="text" class="form-control col-sm-6" placeholder="Input Alamat">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Koordinat</label>
                          <input type="text" class="form-control col-sm-6" placeholder="Input Koordinat">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Email</label>
                          <input type="email" class="form-control col-sm-6" placeholder="Input Email">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Website</label>
                          <input type="text" class="form-control col-sm-6" placeholder="Input Website">
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                          <input type="text" class="form-control col-sm-6" placeholder="Input No. Telp">
                        </div>
                      </div>
                      <!-- /.card-body -->
  
                      <div class="card-footer">
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </form>
                  </div>
                  <div class="chart tab-pane" id="foto-sekolah">
                    <form role="form">
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputFile">Tampak Depan Sekolah</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input">
                              <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Tampak Kiri Sekolah</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input">
                              <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Tampak Kanan Sekolah</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input">
                              <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputFile">Tampak Dalam Sekolah</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input">
                              <label class="custom-file-label">Choose file</label>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-body -->
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
  
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.row -->
  
            <div class="row mb-5">
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-success">
                  <span class="info-box-icon"><i class="bi bi-people-fill"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Rombel</span>
                    <span class="info-box-number h1">25</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-info">
                  <span class="info-box-icon"><i class="bi bi-person-badge-fill"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Jurusan</span>
                    <span class="info-box-number h1">5</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-warning">
                  <span class="info-box-icon"><i class="bi bi-bookmark-star-fill text-white"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text text-white">Kategori</span>
                    <span class="info-box-number h1 text-white">A</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-dark">
                  <span class="info-box-icon"><i class="bi bi-person-fill"></i></span>
  
                  <div class="info-box-content">
                    <span class="info-box-text">Jumlah Siswa</span>
                    <span class="info-box-number h1">265</span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
              </div>
              <!-- ./col -->
            </div>
  
            <!-- Main row -->
            <div class="row mb-5">
              <!-- Left col -->
              <section class="col-lg-6 connectedSortable">
  
                <!-- Data Siswa card-->
                <div class="card">
                  <div class="card-header bg-info">
                    <!-- <h3 class="card-title">
                      <i class="nav-icon bi bi-person-fill mr-1"></i>
                      Data Siswa
                    </h3> -->
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link text-white active" href="#data-siswa" data-toggle="tab"><i
                            class="bi bi-person-fill mr-1"></i>Data Siswa</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#input-data-siswa" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-1"></i>Input Data Siswa</a>
                      </li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body table-responsive">
                    <div class="tab-content p-0">
                      <div class="tab-pane active" id="data-siswa">
                        <table class="table table-bordered table-hover">
                          <tbody>
                            <tr>
                              <th>Nama Sekolah</th>
                              <td>SMKS WIRA BUANA</td>
                            </tr>
                            <tr>
                              <th>Laki-laki</th>
                              <td>179</td>
                            </tr>
                            <tr>
                              <th>Perempuan</th>
                              <td>16</td>
                            </tr>
                            <tr>
                              <th>Keluar</th>
                              <td>0</td>
                            </tr>
                          </tbody>
                          <tr>
                            <th>Total</th>
                            <td>195</td>
                          </tr>
                        </table>
                      </div>
                      <div class="chart tab-pane" id="input-data-siswa">
                        <form role="form">
                          <div class="card-body">
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                              <input type="text" class="form-control col-sm-6" placeholder="Input Sekolah">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Laki-laki</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Laki-laki">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Perempuan</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Perempuan">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Keluar</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Keluar">
                            </div>
                          </div>
                          <!-- /.card-body -->
  
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
  
              </section>
              <!-- /.Left col -->
              <!-- right col (We are only adding the ID to make the widgets sortable)-->
              <section class="col-lg-6 connectedSortable">
  
                <!-- Update Data Siswa card -->
                <div class="card">
                  <div class="card-header bg-success">
                    <ul class="nav nav-pills ml-auto">
                      <li class="nav-item">
                        <a class="nav-link text-white active" href="#kompetensi-keahlian" data-toggle="tab"><i
                            class="bi bi-gear-wide-connected mr-1"></i>Kompetensi Keahlian</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link text-white" href="#input-kk" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-1"></i>Input KK</a>
                      </li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content p-0">
                      <div class="tab-pane active" id="kompetensi-keahlian">
                        <table class="table table-bordered table-hover">
                          <tbody>
                            <tr>
                              <th>Kompetensi Keahlian</th>
                              <th>L</th>
                              <th>P</th>
                              <th>Jumlah</th>
                            </tr>
                            <tr>
                              <td>RPL</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                            </tr>
                            <tr>
                              <td>TEI</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                            </tr>
                            <tr>
                              <td>MM</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                            </tr>
                            <tr>
                              <td>BC</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                            </tr>
                            <tr>
                              <td>TKJ</td>
                              <td>xxx</td>
                              <td>xxx</td>
                              <td>xxx</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <div class="chart tab-pane" id="input-kk">
                        <form role="form">
                          <div class="card-body">
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Kompetensi Keahlian</label>
                              <input type="text" class="form-control col-sm-6" placeholder="Input KK">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Laki-laki</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Laki-laki">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Perempuan</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Perempuan">
                            </div>
                            <div class="form-group row">
                              <label class="col-sm-2 col-form-label">Keluar</label>
                              <input type="number" class="form-control col-sm-6" placeholder="Input Jml Keluar">
                            </div>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
  
              </section>
              <!-- right col -->
            </div>
            <!-- /.row (main row) -->
  
            <!-- Riwayat Update Data card -->
            <div class="card">
              <div class="card-header bg-secondary">
                <h3 class="card-title">
                  <i class="nav-icon bi bi-alarm-fill mr-1"></i>
                  Riwayat Update Data
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Tanggal Update</th>
                      <th>Tanggal Selesai</th>
                      <th>Durasi</th>
                      <th>Log Update</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>2022-04-06 13:01:12</td>
                      <td>2022-04-06 13:05:12</td>
                      <td>4 Menit</td>
                      <td>Foto Sekolah/Bagian Depan</td>
                    </tr>
                  </tbody>
                </table>
              </div><!-- /.card-body -->
            </div>
          </div><!-- /.container-fluid -->


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2022 <a href="https://smktarunabhakti.net/">SMK Taruna Bhakti</a>.</strong>
      All rights reserved.
      <div class="float-right d-none d-sm-inline-block">
        <!-- <b>Version</b> 3.0.4 -->
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="/js/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="/js/adminlte.min.js"></script>
</body>

</html>
