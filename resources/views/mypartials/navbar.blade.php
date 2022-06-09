<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light"
    style="background-color: #00A65B !important;height: 11vh;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                    class="fas fa-bars text-light"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    {{-- <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form> --}}


    @if (!Auth::user()->hasRole('sekolah'))
        <form class="form-inline ml-2" action="/profil/admin" method="GET">
            <div class="input-group" style="width: 50vw">
                <input class="form-control form-control-navbar" type="search"
                    placeholder="Search NPSN, sekolah id, nama sekolah" aria-label="Search"
                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;" name="search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    @endif


    {{-- <form action="/logout" method="post">
      @csrf
      <button type="submit" class="btn btn-danger">Logout</button>
    </form> --}}

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <div class="nav-item container d-block">
            <div class="container p-0 d-flex justify-content-end">
                <span class="text-white text-user" style="font-size: 20px; font-weight: 600;">{{ Auth::user()->name }}</span>
            </div>
            @if (Auth::user()->hasRole('dinas'))
                <span class="text-white text-right badge float-right text-user"
                    style="background-color:#fcc12d53; border:1.5px solid #fcc12d; font-weight: 600; display:flex;justify-content:center; width:fit-content !important"><i
                        class="bi bi-info-circle mr-2"></i><span class="text-user" style="font-size: 12px; margin-top: 1px;">Masuk Sebagai
                        Dinas Pendidikan</span>
                </span>
            @elseif(Auth::user()->hasRole('kcd'))
                <span class="text-white text-right badge float-right text-user"
                    style="background-color:#fcc12d53; border:1.5px solid #fcc12d; font-weight: 600; display:flex;justify-content:center; width:fit-content !important"><i
                        class="bi bi-info-circle mr-2"></i><span class="text-user" style="font-size: 12px; margin-top:1px;">Masuk Sebagai
                        Cadisdik</span>
                </span>
            @else
                <span class="text-white text-right badge float-right text-user"
                    style="background-color:#fcc12d53; border:1.5px solid #fcc12d; font-weight: 600; display:flex;justify-content:center; width:fit-content !important"><i
                        class="bi bi-info-circle mr-2"></i><span class="text-user" style="font-size: 12px; margin-top:1px;">Masuk Sebagai
                        {{ Auth::user()->getRoleNames()->first() }}</span>
                </span>
            @endif
        </div>
        <li class="nav-item dropdown hover-dropdown" style="margin-top: 7px">
            <a class="nav-link mr-2 d-flex align-items-center" href="#" style="padding: 0; height: auto !important;">
                @if (Auth::user()->foto_profil != '/img/logo_navbar.png')
                    <img src="/logo/{{ Auth::user()->foto_profil }}" class="brand-image img-circle bg-white"
                        style="width: 45px; height: 45px; aspect-ratio: 1/1; cursor: auto;">
                @else
                    <img src="{{ Auth::user()->foto_profil }}" class="brand-image img-circle bg-white"
                        style="width: 45px; height: 45px; aspect-ratio: 1/1; cursor: auto;">
                @endif
                <i class="bi bi-caret-down-fill ml-2 rotate-arrow text-light"></i>
            </a>

            <div class="dropdown-menu float-right border-0 hover-dropdown"
                style="right: 0px!important; left: auto!important;">
                {{-- <a class="dropdown-item" tabindex="-1" href="#" style="color: grey"><i class="bi bi-pencil-square"
                        style="width: 20px"></i> Ubah Password</a>
                <a class="dropdown-item" tabindex="-1" href="/upload-logo" style="color: grey"><i
                        class="bi bi-image" style="width: 20px"></i> Tambah Logo</a> --}}
                <a class="dropdown-item" tabindex="-1" href="/user-settings" style="color: grey"><i
                        class="bi bi-person-fill mr-2" style="width: 20px"></i> Profil</a>
                <div class="dropdown-divider"></div>
                <form action="/logout" method="post">
                    @csrf
                    <button class="dropdown-item text-danger" tabindex="-1" type="submit"
                        style="border: none; background: none; color: grey;"><i class="bi bi-box-arrow-left mr-2"
                            style="width: 20px"></i> Keluar</button>
                </form>
            </div>
        </li>
    </ul>

    {{-- <div class="alert d-flex align-items-center" role="alert" style="    position: absolute;top: 13vh;right: 1vw;border-radius: 30px;background: rgba(255, 193, 7, .67);padding: 6px 38px 6px 15px;">
        <svg class="bi flex-shrink-0 me-2 mr-2" width="15" height="15" role="img" aria-label="Warning:"
            style="color: white">
            <use xlink:href="#exclamation-triangle-fill" />
        </svg>
        <div class="text-white" style="font-size: 14px">
            Masuk Sebagai {{ Auth::user()->getRoleNames()->first() }}
        </div>
    </div> --}}
</nav>
<!-- /.navbar -->
