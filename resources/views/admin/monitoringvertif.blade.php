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
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Vertifikator</h1>
            </div>
        </div>
    </div>
</div>
{{-- End Header --}}

{{-- Table --}}
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex p-0" style="background-color: #25b5e9">
            <h3 class="card-title p-3 text-white font-weight-bold" >Sekolah</h3>
        </div>
        <div class="card-body">
            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered table-hover mt-2">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama Sekolah</th>
                            <th>Keperluan</th>
                            <th>Surat Tugas</th>
                            <th>Tanggal Visitasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">1</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan ruang praktik</td>
                            <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                            <td class="text-center" style="vertical-align: middle">20 - 02 - 2022</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #00a65b"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">2</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan ruang praktik</td>
                            <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                            <td class="text-center" style="vertical-align: middle">20 - 02 - 2022</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #00a65b"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">3</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan ruang praktik</td>
                            <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                            <td class="text-center" style="vertical-align: middle">20 - 02 - 2022</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #00a65b"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">4</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan ruang praktik</td>
                            <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                            <td class="text-center" style="vertical-align: middle">20 - 02 - 2022</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #00a65b"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">5</td>
                            <td class="text-center" style="vertical-align: middle">SMK TARUNA BHAKTI DEPOK</td>
                            <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan ruang praktik</td>
                            <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                            <td class="text-center" style="vertical-align: middle">20 - 02 - 2022</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #00a65b"
                                    data-toggle="modal" data-target="#edit">Detail</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- End --}}
        </div>
    </div>
</div>
{{-- End --}}


@endsection
