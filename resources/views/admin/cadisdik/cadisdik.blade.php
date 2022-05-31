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
    <div class="container">
        <div class="card card-default">
            <div class="card-header bg-success d-flex p-0">
                <h3 class="card-title p-3">Kantor Cabang Dinas</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item"><button class="nav-link btn border border-white text-white"
                            data-toggle="modal" data-target="#tambah-cadisdik"><i class="bi bi-plus-lg"></i>
                            Tambah Cadisdik</button></li>
                </ul>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                @if (count($kcds) > 0)
                    @foreach ($kcds as $ke => $kcd)
                        <div class="row child-noneborder shadow-sm">
                            <div class="alert alert-info col-12 col-lg-6 d-flex flex-column justify-content-between">
                                <h5 class="h6"><i class="icon bi bi-bank2"></i> Instansi</h5>
                                <div>
                                    <h3 class="instansi">{{ $kcd->instansi }}</h3>
                                    <p class="kab">{{ $kcd->kab }}</p>
                                    <small class="nama">{{ $kcd->nama }}</small>
                                </div>
                            </div>
                            <div
                                class="callout callout-secondary col-7 col-lg-4 d-flex flex-column justify-content-between">
                                <h5>Total Sekolah</h5>
                                <h1 class="display-4">{{ count($profil_kcds[$ke]) }}</h1>
                            </div>
                            <div class="callout callout-secondary col-5 col-lg-2 d-flex flex-column justify-content-between"
                                style="gap: 0.5rem;">
                                <a class="btn btn-info text-white" href="/cadisdik/{{ $kcd->id }}"
                                    style="text-decoration: none">Detail</a>
                                <button class="btn btn-warning text-white tombol-edit-cadisdik" data-toggle="modal"
                                    data-target="#edit-cadisdik" data-id="{{ $kcd->id }}">Edit</button>
                                <form action="/cadisdik/{{ $kcd->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" style="width: 100%;"
                                        onclick="return confirm('Apakah anda yakin akan menghapus cadisdik ini?')">Hapus</button>
                                </form>
                            </div>
                        </div>
                        <hr>
                    @endforeach
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

    {{-- -------------------------------------------------------------------------------------------------- MODAL TAMBAH -------------------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-cadisdik">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Kantor Cabang Dinas Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/cadisdik" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Petugas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="instansi" name="instansi" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kab" class="col-sm-2 col-form-label">Kota/Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kab" name="kab" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kab" class="col-sm-2 col-form-label">Sekolah</label>
                                <div class="col-sm-10">
                                    <select class="fstdropdown-select select-jurusan" id="select" multiple name="sekolah[]">
                                        @foreach ($profils as $profil)
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

    {{-- -------------------------------------------------------------------------------------------------- MODAL EDIT -------------------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="edit-cadisdik">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Kantor Cabang Dinas Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-edit" action="#" method="post" class="form-edit">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="instansi" class="col-sm-2 col-form-label">Instansi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-instansi" id="instansi" name="instansi"
                                        value="Kantor Cabang Dinas Wilayah I" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Petugas</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-nama-cadisdik" id="nama" name="nama"
                                        value="Asep Sudarsono" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="kab" class="col-sm-2 col-form-label">Kabupaten</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-kab" id="kab" name="kab"
                                        value="Kabupaten Bogor" required>
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
    <script>
        setFstDropdown();
    </script>
    <script>
        const tombolEditCadisdik = document.querySelectorAll('.tombol-edit-cadisdik');
        const nama = document.querySelectorAll('.nama');
        const kab = document.querySelectorAll('.kab');
        const instansi = document.querySelectorAll('.instansi');
        const inputInstansi = document.querySelector('.input-instansi');
        const inputNamaCadisdik = document.querySelector('.input-nama-cadisdik');
        const inputKab = document.querySelector('.input-kab');
        const formEdit = document.querySelector('.form-edit');

        tombolEditCadisdik.forEach((e, i) => {
            e.addEventListener('click', function() {
                inputInstansi.value = '';
                inputInstansi.value = instansi[i].innerHTML;
                inputNamaCadisdik.value = '';
                inputNamaCadisdik.value = nama[i].innerHTML;
                inputKab.value = '';
                inputKab.value = kab[i].innerHTML;
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/cadisdik/' + e.getAttribute('data-id'))
            })
        });
    </script>
@endsection
