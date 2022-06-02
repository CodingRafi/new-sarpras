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
                                    <div class="container-fluid p-0 d-flex flex-wrap">
                                        @foreach ($profil_kcd_kabs[$ke] as $kabupaten)
                                            <p class="kab">{{ $kabupaten->nama . ', ' }}</p>
                                        @endforeach
                                    </div>
                                    <small class="nama">{{ $kcd->nama }}</small>
                                </div>
                            </div>
                            <div
                                class="callout callout-secondary col-7 col-lg-4 d-flex flex-column justify-content-between">
                                <h5>Total Sekolah</h5>
                                <h1 class="display-4" style="font-weight: 550">{{ count($profils[$ke]) }}</h1>
                            </div>
                            <div class="callout callout-secondary col-5 col-lg-2 d-flex flex-column justify-content-between"
                                style="gap: 0.5rem;">
                                <a class="btn btn-info text-white" href="/cadisdik/{{ $kcd->id }}"
                                    style="text-decoration: none">Detail</a>
                                <button class="btn btn-warning text-white tombol-edit-cadisdik" data-toggle="modal"
                                    data-target="#edit-cadisdik" data-id="{{ $kcd->id }}">Tambah Wilayah</button>
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

    {{-- -------------------------------------------------------------------------------------------------- MODAL EDIT -------------------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="edit-cadisdik">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Wilayah Cabang Dinas Pendidikan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/profil-kcd" method="post" class="form-edit">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <input type="hidden" name="kcd_id" value="" class="kcd_id">
                                <label for="instansi" class="col-sm-2 col-form-label">Kota Kabupaten</label>
                                <div class="col-sm-10">
                                    <select class="fstdropdown-select select-jurusan" id="select" multiple
                                        name="id_kota_kabupaten[]">
                                        @foreach ($kotas as $kota)
                                            <option value="{{ $kota->id }}">{{ $kota->nama }}
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
    <script>
        setFstDropdown();
    </script>
    <script>
        const tombolEditCadisdik = document.querySelectorAll('.tombol-edit-cadisdik');
        const kcd_id = document.querySelector('.kcd_id');

        tombolEditCadisdik.forEach((e, i) => {
            e.addEventListener('click', function() {
                kcd_id.value = '';
                kcd_id.value = e.getAttribute('data-id');
            })
        });
    </script>
@endsection
