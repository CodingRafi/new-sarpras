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

</style>
@endsection

@section('container')
<!-- title -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Cabang Dinas Pendidikan Jawa Barat</h1>
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
                        <h3>Kantor Cabang Dinas Wilayah I</h3>
                        <p class="disabled">Kabupaten Bogor</p>
                        <small>Asep Sudarsono</small>
                    </div>
                </div>
                <div class="callout callout-secondary col-7 col-lg-4 d-flex flex-column justify-content-between">
                    <h5>Total Sekolah</h5>
                    <h1 class="display-4">34</h1>
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
                <li class="nav-item"><button class="nav-link btn border border-white text-white" data-toggle="modal"
                    data-target="#tambah-cadisdik"><i class="bi bi-plus-lg"></i> Tambah</button></li>
            </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive">
            <table class="table table-head-fixed text-nowrap">
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
                  <tr>
                    <td>1</td>
                    <td>Asep Sudarsono</td>
                    <td>SMK TARUNA BHAKTI</td>
                    <td>20229232</td>
                    <td>Swasta</td>
                    <td>
                        <button class="btn btn-warning text-white" data-toggle="modal" data-target="#edit-cadisdik">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Asep Sudarsono</td>
                    <td>SMK SUKA MAJU 8</td>
                    <td>20239432</td>
                    <td>Negeri</td>
                    <td>
                        <button class="btn btn-warning text-white">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Asep Sudarsono</td>
                    <td>SMK TUGU IBU</td>
                    <td>20229572</td>
                    <td>Swasta</td>
                    <td>
                        <button class="btn btn-warning text-white">Edit</button>
                        <button class="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
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
                <form class="form-horizontal" action="#" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-2 col-form-label">Nama Petugas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="instansi" name="instansi" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kab" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <select class="fstdropdown-select select-jurusan" id="select" multiple name="jurusanTerpilih[]">
                                    <option value="">SMK Taruna Bhakti</option>
                                    <option value="">SMK Tugu Ibu</option>
                                    <option value="">SMK Suka Maju</option>
                                    <option value="">SMK Pasti Bisa</option>
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
                <h4 class="modal-title">Edit Petugas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal form-edit" action="#" method="post">
                    @csrf
                    @method('patch')
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-2 col-form-label">Nama Petugas</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control input-instansi" id="instansi" name="instansi" value="Asep Sudarsono"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kab" class="col-sm-2 col-form-label">Sekolah</label>
                            <div class="col-sm-10">
                                <select class="fstdropdown-select select-jurusan" id="select" multiple name="jurusanTerpilih[]">
                                    <option value="">SMK Taruna Bhakti</option>
                                    <option value="">SMK Tugu Ibu</option>
                                    <option value="">SMK Suka Maju</option>
                                    <option value="">SMK Pasti Bisa</option>
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