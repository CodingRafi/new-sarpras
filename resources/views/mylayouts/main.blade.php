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

  <title>SISTEM SARPRAS | Starter</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/css/all.min.css">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
  <!-- Fancy Box -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Font-Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    *{
      font-size: 14px;
    }
    aside .active {
      background-color: #00A65B !important;
      color: white !important;
    }
    .card .active {
      background-color: white !important;
      color: black !important;
    }
    @media (max-width:768px) {
      .nama-sekolah{
        display: none;
      }
    }
}

  </style>

  @yield('tambahcss')

</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    
    {{-- NAVBAR --}}
    @include('mypartials.navbar')
    {{-- /NAVBAR --}}

    {{-- SIDEBAR --}}
    @include('mypartials.aside')
    {{-- /SIDEBAR --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    

      <!-- Main content -->
      <section class="content pl-2 pr-2">
        
        {{-- CONTAINER --}}
        @yield('container')
        {{-- /CONTAINER --}}

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
  <!-- Fancy Box -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

  @yield('tambahjs')
</body>

</html>
