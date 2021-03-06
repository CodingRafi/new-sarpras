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

    <title>SISTEM SARPRAS</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/icons/favicon_io/favicon-16x16.png">

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
    <!-- Loading Screen -->
    <link rel="stylesheet" href="/assets/css/loadingScreen.css">
    <!-- Font-Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        * {
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

        .sidebar::-webkit-scrollbar {
            display: none;
        }

        @media (max-width:768px) {
            .nama-sekolah {
                display: none;
            }

            .pimpinan-infobox {
                flex-direction: column;
            }
        }

        @media(max-width: 768px) {
            .text-user {
                display: none !important;
            }
        }

        li.hover-dropdown:hover>.dropdown-menu.hover-dropdown {
            display: block !important;
        }

        .rotate-arrow {
            font-size: 1.4rem;
            transition: ease-in-out 250ms;
            transform-origin: center;
        }

        li.hover-dropdown:hover .rotate-arrow {
            transform: rotate(180deg)
        }
    </style>

    @yield('tambahcss')

</head>

<body class="hold-transition sidebar-mini" style="overflow-x: hidden;" onload="myLoadingFirst()" onbeforeunload="myLoading()">
    <div class="wrapper">
        {{-- LOADING SCREEN --}}
        @include('mypartials.loadingScreen')
        {{-- /LOADING SCREEN --}}

        {{-- NAVBAR --}}
        @include('mypartials.navbar')
        {{-- /NAVBAR --}}

        {{-- SIDEBAR --}}
        @can('view_profiladmin')
            @include('mypartials.asideadmin')
        @else
            @include('mypartials.aside')
        @endcan

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

        <!-- FLASH MESSAGE -->
        @if (session()->has('success'))
            <div class="alert text-white alert-dismissible fade show m-0 temp-alert-success" role="alert"
                style="background: #00a65bb7; z-index: 99; position: fixed; bottom: 2vh; right: 2vh;">
                <i class="bi bi-check-lg"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <!-- /FLASH MESSAGE -->

        {{-- Loading --}}
        <div
            style="position: fixed; background: rgba(0, 0, 0, 0.1); width: 100%; height: 100vh; z-index: 9999; display: none; justify-content: center; align-items: center;">
            <div class="loading-container">
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <div class="item"></div>
                <img src="/assets/img/avatars/logo-jawa-barat.png" alt="TarunaBhakti Logo" width="50"
                    class="logo">
            </div>
        </div>
        {{-- End Loading --}}
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

    @yield('peralatanjs')
    <script src="/assets/js/loadingScreen.js"></script>

    <script>
        const tempAlertSuccess = document.querySelector('.temp-alert-success');
        const myTimeout = setTimeout(myGreeting, 5000);

        function myGreeting() {
            if (tempAlertSuccess) {
                tempAlertSuccess.classList.remove('show');
            }
        }
    </script>
</body>




</html>
