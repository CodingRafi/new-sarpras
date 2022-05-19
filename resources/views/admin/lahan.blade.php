@extends('myLayouts.main')

@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
        left: 35px;
    }

</style>
@endsection

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Lahan Sekolah</h1>
            </div>
        </div>
    </div>
</div>
{{-- End Header --}}

<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning d-flex p-0">
            <h3 class="card-title p-3 text-white">Peralatan Sekolah</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <ul class="nav nav-pills ml-auto p-2">
                        <li class="nav-item dropdown" style="display: flex">
                            <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                Filter by... <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" style="min-width: auto !important; width: 95px;">
                                <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terbaru</a>
                                <a class="dropdown-item text-truncate" tabindex="-1" href="#">Alphabet</a>
                                <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terlama</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline ml-2">
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
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Status Sekolah</th>
                            <th>Kabupaten / Kota</th>
                            <th>Kantor Cabang Dinas</th>
                            <th>Status Lahan</th>
                            <th>Usulan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">1</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Swasta</td>
                            <td class="text-center" style="vertical-align: middle">Depok</td>
                            <td class="text-center" style="vertical-align: middle">Kantor Cabang Dinas Pendidikan
                                Wilayah II (KCD wilayah 2)</td>
                            <td class="text-center" style="vertical-align: middle">Lahan Ideal</td>
                            <td class="text-center" style="vertical-align: middle">Tidak Ada Usulan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                    data-toggle="modal" data-target="#edit">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>
</div>



@endsection
