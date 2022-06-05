@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">

    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }

        .child-noneborder>* {
            border-radius: 0;
            box-shadow: none;
            margin-bottom: 0;
        }

        .fstAll {
            display: none !important;
        }

    </style>
@endsection

@section('container')
    <!-- title -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Cabang Dinas Pendidikan Jawa Barat
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <!-- body -->
    {{-- -------------------------------------------------------------------------------------------------- INSTANSI CARD -------------------------------------------------------------------------------------------------- --}}
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-body">
                        <div class="child-noneborder shadow-sm">
                            <div class="alert text-white d-flex flex-column justify-content-between"
                                style="background-color: #25b5e9">
                                <button type="button" class="btn btn-tool text-dark mr-1 text-white"
                                    style="position: absolute; right:3px;" data-toggle="modal"
                                    data-target="#edit-kcd"><i class="icon bi bi-pencil-square m-0"
                                        style="position: absolute; right:0;color: white"></i>
                                </button>
                                <h5 class="h6"><i class="icon bi bi-bank2"></i> Instansi</h5>
                                <div>
                                    <h3>{{ $kcd->instansi }}</h3>
                                    <p class="disabled">{{ $kcd->kab }}</p>
                                    <small>{{ $kcd->nama }}</small>
                                    <span class="email float-right"><i class="bi bi-postcard-fill"></i>
                                        {{ $kcd->email }}</span>
                                </div>

                            </div>

                            <div class="callout callout-secondary d-flex flex-column justify-content-between">
                                <div class="d-flex">
                                    <h5>Total Sekolah</h5>

                                </div>
                                <h1 class="display-4">{{ count($profils) }}</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card card-default">
                    <div class="card-header d-flex p-0" style="background-color: #00a65b">
                        <h3 class="card-title p-3 text-white">Kantor Cabang Dinas</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive pt-0" style="height: 220px">
                        @if (count($kabupatens) > 0)
                            <table class="table table-head-fixed text-nowrap text-center">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Kota/Kabupaten</th>
                                        <th style="width: 70px;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kabupatens as $kabupaten)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $kabupaten->nama }}</td>
                                            <td>
                                                <form action="/profil-kcd/{{ $kabupaten->id_profil_kcds }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('apakah anda yakin akan mengahapus wilayah ini?')">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card card-default">
            <div class="card-header bg-warning d-flex p-0">
                <h3 class="card-title p-3 text-white">Kantor Cabang Dinas</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
                @if (count($profils) > 0)
                    <table class="table table-head-fixed text-nowrap text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Petugas</th>
                                <th>Sekolah</th>
                                <th>NPSN</th>
                                <th>Status</th>
                                <th style="width: 70px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($profils as $profil)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $kcd->nama }}</td>
                                    <td>{{ $profil->nama }}</td>
                                    <td>{{ $profil->npsn }}</td>
                                    <td>{{ $profil->status_sekolah }}</td>
                                    <td>
                                        <a href="/profil/{{ $profil->id }}" class="btn btn-success">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                        <div class="alert" role="alert">
                            Data Tidak Ditemukan
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- ------------------------------------------------ modal kcd ------------------------------------------------ --}}
    <div class="modal fade {{ $errors->any() ? 'show' : '' }}" id="edit-kcd" {{ $errors->any() ? 'show' : '' }}>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #25b5e9; margin-left:-1px">
                    <h4 class="modal-title text-white">Edit Data Cabang Dinas Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/users/{{ $kcd->id_user }}" method="POST">
                    {{-- @dd($kcd) --}}
                    @csrf
                    @method('patch')
                    <div class="modal-body">
                        <div class="card-body">
                            {{-- ------------------------------------------- input nama pemimpin ------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Pimpinan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                        name="name" placeholder="Masukan Nama Pimpinan"
                                        value="{{ old('name', $kcd->nama) }}" required>
                                    @error('name')
                                        <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- ----------------------------------------- end input nama pemimpin ----------------------------------------- --}}

                            {{-- ----------------------------------------------- input email ----------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                        name="email" placeholder="Masukan Email" value="{{ old('email', $kcd->email) }}"
                                        required>
                                    @error('email')
                                        <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            {{-- --------------------------------------------- end input email --------------------------------------------- --}}
                            @if ($kcd->password == null)
                                <div class="form-group row">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password" placeholder="Masukan Password" value="12345678"
                                            required disabled>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn text-white float-right" style="background-color: #00a65b">Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- ----------------------------------------------- end modal kcd ----------------------------------------------- --}}

@endsection

@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
@endsection
