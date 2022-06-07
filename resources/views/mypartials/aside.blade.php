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
                <li class="nav-item has-treeview {{ Request::is('bangunan/*') ? 'menu-open' : (Request::is('bangunan*') ? 'menu-open': '') }}">
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
                        {{-- ---------------------------------------------------------------------------------------- LAB ---------------------------------------------------------------------------------------- --}}

                        <li class="nav-item has-treeview @if (strpos(request('jenis'), 'lab_') === false) '' @else menu-open  @endif">
                            <a href="#" class="nav-link">
                                <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 512.000000 512.000000" preserveAspectRatio="xMidYMid meet">

                                    <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
                                        fill="#000000" stroke="none">
                                        <path d="M1095 5106 c-108 -34 -186 -102 -232 -201 l-28 -60 -3 -406 -3 -407
                                   -182 -4 c-152 -4 -190 -8 -233 -25 -113 -45 -202 -131 -246 -240 -21 -55 -23
                                   -73 -26 -343 -3 -279 -3 -286 18 -313 29 -37 80 -37 109 -1 20 25 21 39 21
                                   281 0 146 5 272 11 296 15 63 68 128 130 162 53 29 57 30 225 33 l172 4 4
                                   -174 c3 -162 5 -177 30 -230 37 -79 98 -142 177 -181 l66 -32 1455 0 1455 0
                                   56 26 c75 36 129 86 167 157 38 72 52 152 52 310 l0 122 148 0 c180 0 234 -13
                                   297 -71 24 -23 54 -62 67 -87 l23 -47 5 -1413 c5 -1385 5 -1414 24 -1428 29
                                   -21 80 -18 102 7 18 21 19 60 22 1393 1 852 -1 1395 -7 1434 -27 177 -157 315
                                   -329 351 -29 6 -120 11 -202 11 l-150 0 0 358 c0 196 -4 384 -9 417 -18 124
                                   -89 223 -199 277 l-67 33 -1440 2 c-1145 1 -1448 -1 -1480 -11z m2896 -148
                                   c53 -18 87 -45 116 -96 l28 -47 0 -625 0 -625 -25 -45 c-14 -24 -45 -58 -68
                                   -75 l-44 -30 -1421 -3 c-1587 -3 -1472 -8 -1541 68 -19 21 -39 56 -45 77 -14
                                   50 -15 1213 -1 1263 13 49 66 109 114 131 39 18 101 19 1447 19 1036 0 1415
                                   -3 1440 -12z" />
                                        <path d="M2433 4735 c-17 -7 -36 -22 -42 -32 -5 -11 -70 -217 -145 -459 -184
                                  -602 -167 -538 -149 -564 34 -49 140 -67 166 -29 8 11 28 65 43 120 l28 99
                                  175 -2 175 -3 32 -109 c17 -60 38 -112 45 -117 42 -27 146 7 163 52 6 19 -26
                                  134 -139 504 -81 264 -154 491 -162 503 -30 47 -124 66 -190 37z m142 -483
                                  l62 -217 -125 -3 c-69 -1 -127 -1 -129 2 -3 2 24 104 58 225 35 121 65 218 68
                                  216 2 -3 32 -103 66 -223z" />
                                        <path d="M1430 4727 l-25 -13 -3 -524 -2 -525 21 -17 c19 -16 49 -18 295 -18
                                  271 0 273 0 288 22 22 30 20 100 -1 127 -17 20 -28 21 -213 23 l-195 3 -3 452
                                  -2 453 -30 15 c-35 18 -96 19 -130 2z" />
                                        <path d="M3040 4728 l-25 -14 -3 -527 -2 -526 24 -16 c21 -14 57 -16 253 -13
                                  211 3 232 5 277 25 110 51 162 160 154 326 -5 120 -29 174 -99 218 l-49 32 34
                                  23 c19 13 44 45 57 71 20 41 24 63 24 149 0 95 -2 104 -30 150 -24 37 -45 56
                                  -90 79 l-59 30 -220 3 c-167 2 -227 -1 -246 -10z m385 -172 c53 -23 69 -59 66
                                  -149 -1 -19 -13 -41 -35 -63 l-34 -34 -111 0 -111 0 0 123 c0 68 3 127 7 130
                                  12 13 183 7 218 -7z m34 -421 c42 -21 61 -71 61 -155 0 -143 -44 -179 -217
                                  -180 l-103 0 0 175 0 175 115 0 c82 0 124 -4 144 -15z" />
                                        <path d="M185 2918 c-47 -25 -45 40 -45 -1455 l0 -1414 25 -24 24 -25 2365 0
                                   c1300 0 2372 3 2381 6 40 16 45 51 45 334 l0 272 -30 30 c-25 24 -36 29 -58
                                   23 -62 -15 -62 -15 -62 -277 l0 -238 -655 0 -654 0 -3 673 -3 672 -23 47 c-38
                                   75 -96 134 -170 170 l-67 33 -690 0 c-665 0 -692 -1 -744 -20 -67 -25 -154
                                   -101 -186 -164 -42 -84 -45 -132 -45 -788 l0 -623 -650 0 -650 0 0 1359 c0
                                   748 -3 1367 -6 1376 -6 15 -54 45 -71 45 -4 0 -17 -6 -28 -12z m2295 -2043 l0
                                   -725 -370 0 -370 0 0 628 c0 698 0 699 63 761 59 57 82 60 395 61 l282 0 0
                                   -725z m751 714 c53 -18 99 -58 120 -103 18 -39 19 -78 19 -688 l0 -648 -370 0
                                   -370 0 0 725 0 725 284 0 c185 0 295 -4 317 -11z" />
                                        <path d="M2199 941 c-21 -22 -29 -39 -29 -66 0 -80 100 -126 155 -71 48 48 40
                                  122 -16 151 -43 23 -77 18 -110 -14z" />
                                        <path d="M2790 942 c-41 -42 -42 -92 -1 -133 41 -41 91 -40 133 1 27 27 30 36
                                  25 72 -7 52 -33 78 -85 85 -36 5 -45 2 -72 -25z" />
                                        <path d="M675 2881 c-51 -23 -111 -89 -124 -138 -6 -21 -11 -131 -11 -249 0
                                   -206 1 -211 26 -262 32 -64 89 -107 161 -122 34 -8 127 -10 246 -8 157 3 200
                                   7 235 22 50 22 108 85 123 136 6 21 9 125 7 267 l-3 231 -30 44 c-20 28 -49
                                   53 -84 71 l-55 27 -225 0 c-197 0 -231 -3 -266 -19z m493 -151 c21 -20 22 -28
                                   22 -225 0 -190 -1 -206 -19 -224 -29 -29 -66 -33 -260 -29 l-173 3 -24 28
                                   c-24 28 -24 32 -24 221 0 180 1 195 21 220 l20 26 208 0 c195 0 209 -1 229
                                   -20z" />
                                        <path d="M2279 2872 c-34 -17 -65 -44 -84 -71 l-30 -43 -3 -231 c-2 -142 1
                                  -246 7 -267 15 -51 73 -114 123 -136 35 -15 78 -19 235 -22 120 -2 212 0 246
                                  8 74 15 128 56 161 121 26 52 26 56 26 263 0 118 -5 228 -11 249 -13 49 -73
                                  115 -124 138 -35 16 -69 19 -266 19 l-227 0 -53 -28z m510 -148 c20 -25 21
                                  -40 21 -224 l0 -197 -26 -24 c-25 -23 -31 -24 -197 -27 -192 -4 -229 0 -258
                                  29 -18 18 -19 34 -19 221 0 270 -22 248 251 248 l208 0 20 -26z" />
                                        <path d="M3915 2886 c-46 -20 -94 -64 -118 -110 -20 -38 -22 -58 -25 -241 -4
                                  -236 3 -284 55 -344 70 -82 86 -86 348 -86 205 0 234 2 265 19 49 26 88 64
                                  113 111 21 38 22 53 22 270 0 218 -1 232 -22 271 -25 47 -73 91 -120 111 -45
                                  18 -475 18 -518 -1z m485 -156 c29 -29 32 -50 28 -248 -4 -245 16 -227 -254
                                 -227 l-206 0 -24 29 -25 28 3 200 c4 259 -19 238 254 238 190 0 205 -1 224
                                 -20z" />
                                        <path d="M710 1591 c-74 -23 -117 -61 -149 -131 -19 -41 -21 -65 -21 -260 0
                                  -205 1 -217 24 -265 28 -60 56 -87 116 -114 41 -19 65 -21 256 -21 236 0 274
                                  7 333 63 66 63 71 86 71 337 0 251 -5 274 -71 337 -59 56 -97 63 -328 62 -113
                                  0 -217 -4 -231 -8z m454 -162 l26 -20 0 -209 0 -209 -26 -20 c-25 -20 -40 -21
                                  -226 -21 -267 0 -248 -19 -248 250 0 269 -19 250 248 250 186 0 201 -1 226
                                  -21z" />
                                        <path d="M3929 1587 c-57 -21 -97 -54 -126 -105 l-28 -47 0 -236 0 -236 30
                                  -49 c19 -30 49 -60 79 -79 l49 -30 218 -3 c132 -2 232 1 256 7 60 16 117 63
                                  144 118 22 45 24 61 27 247 2 127 -1 216 -8 245 -16 63 -55 117 -109 149 -46
                                  27 -47 27 -271 29 -167 2 -234 -1 -261 -10z m472 -166 l29 -29 0 -192 0 -192
                                  -29 -29 -29 -29 -191 0 c-202 0 -231 5 -250 47 -15 32 -15 374 0 407 6 13 21
                                  29 33 34 12 6 103 11 214 11 l194 1 29 -29z" />
                                    </g>
                                </svg>
                                <p>
                                  Laboratorium
                                  <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item {{ request('jenis') == 'lab_biologi' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_biologi"
                                        class="nav-link {{ request('jenis') == 'lab_biologi' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Biologi</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request('jenis') == 'lab_fisika' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_fisika"
                                        class="nav-link {{ request('jenis') == 'lab_fisika' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Fisika</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request('jenis') == 'lab_komputer' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_komputer"
                                        class="nav-link {{ request('jenis') == 'lab_komputer' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Komputer</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request('jenis') == 'lab_kimia' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_kimia"
                                        class="nav-link {{ request('jenis') == 'lab_kimia' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Kimia</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request('jenis') == 'lab_ipa' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_ipa"
                                        class="nav-link {{ request('jenis') == 'lab_ipa' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Ipa</p>
                                    </a>
                                </li>
                                <li class="nav-item {{ request('jenis') == 'lab_bahasa' ? 'active' : '' }}">
                                    <a href="/bangunan?jenis=lab_bahasa"
                                        class="nav-link {{ request('jenis') == 'lab_bahasa' ? 'active' : '' }}">
                                       <i class="bi bi-caret-right"></i>
                                        <p>Laboratorium Bahasa</p>
                                    </a>
                                </li>
                            </ul>
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
                        {{-- ---------------------------------------------------------------------------------------- RUANGAN PIMPINAN ---------------------------------------------------------------------------------------- --}}
                        <li class="nav-item">
                            <a href="/bangunan/pimpinan"
                                class="nav-link {{ Request::is('bangunan/pimpinan') ? 'active' : '' }}">
                                <i class="fa-regular fa-circle"></i>
                                <p>Ruang Pimpinan</p>
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
                                    class="nav-link {{ Request::is('peralatan-sekolah/1') ? 'active' : '' }}">
                                    <i class="fa-regular fa-circle"></i>
                                    <p>{{ $kompil->kompetensi }}</p>
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
