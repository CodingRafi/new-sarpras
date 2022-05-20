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
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Monitoring Dan Evaluasi</h1>
            </div>
        </div>
    </div>
</div>
{{-- End Header --}}

{{-- Table --}}
<div class="container-fluid">
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9; padding-top: 20px; padding-bottom: 20px">
            <h3 class="card-title text-white font-weight-bold">Ruang Praktek Tersedia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white mr-2" style="padding: 10px">Simpan</button>
                <button type="button" class="btn btn-tool border border-light text-white" style="padding: 10px">Unggah</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <table class="table table-hover table-borderless text-nowrap">
                        {{-- ---------------------------------------------------------------------------------------- NPSN ---------------------------------------------------------------------------------------- --}}
                        <tr>
                            <th>Nama Pengawas</th>
                            <td class="text-wrap ">: Drs Jajang Sukmara</td>
                        </tr>
                        {{-- ---------------------------------------------------------------------------------------- NAMA SEKOLAH ---------------------------------------------------------------------------------------- --}}
                        <tr>
                            <th>Tanggal Monitoring</th>
                            <td class="text-wrap ">: 19 - 02 - 2022</td>
                        </tr>
                        <tr>
                            <th>Keperluan</th>
                            <td class="text-wrap ">: Vasilatasi</td>
                        </tr>
                        <tr>
                            <th>Surat Tugas</th>
                            <td class="text-wrap ">: <img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                        </tr>
                    </table>  
                </div>
            </div>
            <table class="table table-bordered table-hover mt-2">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Unsur Yang Divertifikasi</th>
                        <th>Belum Layak</th>
                        <th>Layak</th>
                        <th>Sangat Layak</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="vertical-align: middle">1</td>
                        <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan
                            ruang praktik</td>
                        <td class="text-center" style="vertical-align: middle"><i class="bi bi-check-lg"></i></td>
                        <td class="text-center" style="vertical-align: middle"></td>
                        <td class="text-center" style="vertical-align: middle"></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="vertical-align: middle">1</td>
                        <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan
                            ruang praktik</td>
                        <td class="text-center" style="vertical-align: middle"></td>
                        <td class="text-center" style="vertical-align: middle"></td>
                        <td class="text-center" style="vertical-align: middle"><i class="bi bi-check-lg"></i></td>
                    </tr>
                    <tr>
                        <td class="text-center" style="vertical-align: middle">1</td>
                        <td class="text-center" style="vertical-align: middle">Memverifikasi bangunan ruang kelas dan
                            ruang praktik</td>
                        <td class="text-center" style="vertical-align: middle"></td>
                        <td class="text-center" style="vertical-align: middle"><i class="bi bi-check-lg"></i></td>
                        <td class="text-center" style="vertical-align: middle"></td>
                    </tr>
                </tbody>
            </table>
        </div>
        {{-- End --}}


        @endsection
