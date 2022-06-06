@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .widget-hover {
            transition: 200ms;

        }

        .widget-hover:hover {
            background-color: rgb(224, 224, 224);
        }

    </style>
@endsection

@section('container')
    {{-- ---------------------------------------------------------------------------------------- TITLE ---------------------------------------------------------------------------------------- --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Profil User</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- BODY ---------------------------------------------------------------------------------------- --}}
    <div class="container">
        <div class="card card-widget widget-user ">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                @if (Auth::user()->hasRole('dinas'))
                    <h5 class="widget-user-desc">Dinas Pendidikan</h5>
                @elseif (Auth::user()->hasRole('kcd'))
                    <h5 class="widget-user-desc">Cadisdik</h5>
                @else
                    <h5 class="widget-user-desc">Sekolah</h5>
                @endif
            </div>
            <div class="widget-user-image">
                @if (Auth::user()->foto_profil != '/img/logo_navbar.png')
                    <img class="img-circle elevation-2" style="aspect-ratio: 1/1;" src="/logo/{{ Auth::user()->foto_profil }}"
                        alt="User Avatar">
                @else
                    <img class="img-circle elevation-2" style="aspect-ratio: 1/1;" src="{{ Auth::user()->foto_profil }}"
                        alt="User Avatar">
                @endif
            </div>
            <div class="card-footer pb-5">
                <div class="text-center">
                    <p class="text-muted">{{ Auth::user()->email }}</p>
                </div>
                <div class="row">
                    <div class="col border-right widget-hover">
                        <a href="{{ route('password.ubah') }}" class="description-block text-dark font-weight-bold">
                            <h5 class="description-header"><i class="bi bi-key-fill"></i></h5>
                            <p>Ubah Password</p>
                        </a>
                        <!-- /.description-block -->
                    </div>
                    
                    <!-- /.col -->
                    @if ( Auth::user()->hasRole('dinas') )
                        
                    @endif
                    <div class="col border-right widget-hover">
                        <a href="#" class="description-block text-dark font-weight-bold">
                            <h5 class="description-header"><i class="bi bi-postcard-fill"></i></h5>
                            <p>Ubah Email</p>
                        </a>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                    <div class="col widget-hover">
                        <a href="/upload-logo" class="description-block text-dark font-weight-bold">
                            <h5 class="description-header"><i class="bi bi-image-fill"></i></h5>
                            <p>Upload Logo</p>
                        </a>
                        <!-- /.description-block -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
        </div>

    </div>
@endsection
