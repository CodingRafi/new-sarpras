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
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row child-noneborder shadow-sm">
                    <div class="alert alert-info col-12 col-lg-8 d-flex flex-column justify-content-between">
                        <h5 class="h6"><i class="icon bi bi-bank2"></i> Instansi</h5>
                        <div>
                            <h3>{{ $kcd->instansi }}</h3>
                            <p class="disabled">{{ $kcd->kab }}</p>
                            <small>{{ $kcd->nama }}</small>
                        </div>
                    </div>
                    <div class="callout callout-secondary col-7 col-lg-4 d-flex flex-column justify-content-between">
                        <h5>Total Sekolah</h5>
                        <h1 class="display-4">{{ count($profils) }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card card-default">
            <div class="card-header bg-warning d-flex p-0">
                <h3 class="card-title p-3 text-white">Kantor Cabang Dinas</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><button class="nav-link btn border border-white text-white"
                            data-toggle="modal" data-target="#tambah-cadisdik"><i class="bi bi-plus-lg"></i>
                            Tambah Sekolah</button></li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
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
                                    <form action="/profil-kcd/{{ $profil->id_profil_kcds }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('apakah anda yakin akan mengahapus sekolah ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------------------- MODAL TAMBAH -------------------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-cadisdik">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Petugas</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/profil-kcd" method="post">
                        @csrf
                        <input type="hidden" name="kcd_id" value="{{ $kcd->id }}">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="kab" class="col-sm-2 col-form-label">Sekolah</label>
                                <div class="col-sm-10">
                                    <select class="fstdropdown-select select-jurusan" id="select" multiple name="sekolah[]">
                                        @foreach ($sekolahNoKcds as $profil)
                                            <option value="{{ $profil->id }}">{{ $profil->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn text-white float-right"
                                style="background-color: #00a65b">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
@endsection
