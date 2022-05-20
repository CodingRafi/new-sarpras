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

{{-- Table --}}
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-warning d-flex p-0">
            <h3 class="card-title p-3 text-white">Lahan</h3>
        </div>
        <div class="card-body">
            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-2">
                    <div class="search" style="display: flex">
                        <ul class="nav nav-pills ml-auto p-2">
                            <li class="nav-item dropdown">
                                <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                    Filter by ... <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu" style="min-width: auto !important; width: 125px;">
                                    <a class="dropdown-item text-truncate" tabindex="-1" href="#">Nama Sekolah</a>
                                    <a class="dropdown-item text-truncate" tabindex="-1" href="#">Kabupaten</a>
                                    <a class="dropdown-item text-truncate" tabindex="-1" href="#">Kota</a>
                                </div>
                            </li>
                        </ul>
                        <div class="md-2">
                            <form action="simple-results.html">
                                <div class="input-group">
                                    <input type="search" class="form-control form-control-lg" placeholder="Cari Sekolah"
                                        style="width: 910px">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">2</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Swasta</td>
                            <td class="text-center" style="vertical-align: middle">Depok</td>
                            <td class="text-center" style="vertical-align: middle">Kantor Cabang Dinas Pendidikan
                                Wilayah II (KCD wilayah 2)</td>
                            <td class="text-center" style="vertical-align: middle">Lahan Ideal</td>
                            <td class="text-center" style="vertical-align: middle">Tidak Ada Usulan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">3</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Swasta</td>
                            <td class="text-center" style="vertical-align: middle">Depok</td>
                            <td class="text-center" style="vertical-align: middle">Kantor Cabang Dinas Pendidikan
                                Wilayah II (KCD wilayah 2)</td>
                            <td class="text-center" style="vertical-align: middle">Lahan Ideal</td>
                            <td class="text-center" style="vertical-align: middle">Tidak Ada Usulan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">4</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Swasta</td>
                            <td class="text-center" style="vertical-align: middle">Depok</td>
                            <td class="text-center" style="vertical-align: middle">Kantor Cabang Dinas Pendidikan
                                Wilayah II (KCD wilayah 2)</td>
                            <td class="text-center" style="vertical-align: middle">Lahan Ideal</td>
                            <td class="text-center" style="vertical-align: middle">Tidak Ada Usulan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">5</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Swasta</td>
                            <td class="text-center" style="vertical-align: middle">Depok</td>
                            <td class="text-center" style="vertical-align: middle">Kantor Cabang Dinas Pendidikan
                                Wilayah II (KCD wilayah 2)</td>
                            <td class="text-center" style="vertical-align: middle">Lahan Ideal</td>
                            <td class="text-center" style="vertical-align: middle">Tidak Ada Usulan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- End --}}
            {{-- Pagination --}}
            <div class="float-right">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            {{-- End --}}
        </div>
    </div>
</div>
{{-- End --}}



@endsection
