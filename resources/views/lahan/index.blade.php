@extends('mylayouts.main')

@section('tambahcss')
<style>
    /* .row-data .col-3 {
        max-width: 15.5rem !important;
    } */

    .card-header h4 {
        font-size: 1.2rem !important
    }

</style>
@endsection

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Lahan Sekolah/ Ketersediaan Lahan
                    Sekolah</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->



{{-- Main-Content --}}

{{-- Row --}}
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-success" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Luas Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
        
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header" style="background-color: #25b5e9; border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center text-white font-weight-bold">Jenis Kepemilikan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">SHM</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
       
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-warning" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center text-white font-weight-bold">Ketersedian Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
    
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-dark" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Kekurangan Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">40m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
        
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header" style="background-color: #e0e0e0; border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Jumlah Usulan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
{{-- End Row --}}

{{-- lahan Sekolah --}}
<div class="container-fluid mt-3">
    <h3 class="mb-3 text-dark">Lahan Sekolah</h3>
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#data-sekolah" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-2"></i></i>Tambah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#edit-data-sekolah" data-toggle="tab"><i
                            class="bi bi-pencil-fill mr-2"></i></i>Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#foto-sekolah" data-toggle="tab"><i
                            class="bi bi-trash mr-2"></i></i>Hapus</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table table-responsive">
                        <thead>
                            <tr>
                                <th></th>
                                <th scope="col">No</th>
                                <th scope="col">Nama Lahan</th>
                                <th scope="col">No Sertifikat</th>
                                <th scope="col">Panjang(m)</th>
                                <th scope="col">Lebar(m)</th>
                                <th scope="col">Luas Lahan(m)</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Jenis Kepemilikan</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Dokumen Bukti Lahan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th><input type="radio" name="list"></th>
                                <th scope="row">1</th>
                                <td>Tanah</td>
                                <td>Proposal</td>
                                <td>35m²</td>
                                <td>85m²</td>
                                <td>120m²</td>
                                <td>Bandung</td>
                                <td>SHM</td>
                                <td>Butuh Pembelian Lahan</td>
                                <td><a href="#" class="btn btn-success">Lihat Dokumen</a></td>
                            </tr>
                            <tr>
                                <th><input type="radio" name="list"></th>
                                <th scope="row">2</th>
                                <td>Kelas</td>
                                <td>Proposal</td>
                                <td>40m²</td>
                                <td>85m²</td>
                                <td>120m²</td>
                                <td>Bandung</td>
                                <td>Sewa</td>
                                <td>Tidak Butuh Pembelian Lahan</td>
                                <td><a href="#" class="btn btn-success">Lihat Dokumen</a></td>
                            </tr>
                            <tr>
                                <th><input type="radio" name="list"></th>
                                <th scope="row">3</th>
                                <td>Tanah</td>
                                <td>Proposal</td>
                                <td>45m²</td>
                                <td>85m²</td>
                                <td>120m²</td>
                                <td>Bandung</td>
                                <td>SHM</td>
                                <td>Tidak Butuh Pembelian Lahan</td>
                                <td><a href="#" class="btn btn-success">Lihat Dokumen</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Lahan Sekolah --}}

{{-- Kekurangan Lahan --}}
<div class="container-fluid mt-3">
    <h3 class="mb-3 text-dark">Kekurangan Lahan</h3>
    <div class="card">
        <div class="card-header bg-warning">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#data-sekolah" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-2"></i></i>Tambah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#edit-data-sekolah" data-toggle="tab"><i
                            class="bi bi-pencil-fill mr-2"></i></i>Edit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#foto-sekolah" data-toggle="tab"><i
                            class="bi bi-trash mr-2"></i></i>Hapus</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Lahan</th>
                                <th scope="col">Panjang(m)</th>
                                <th scope="col">Lebar(m)</th>
                                <th scope="col">Luas Lahan(m)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Tanah</td>
                                <td>Proposal</td>
                                <td>35m²</td>
                                <td>85m²</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Kelas</td>
                                <td>Proposal</td>
                                <td>40m²</td>
                                <td>85m²</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Tanah</td>
                                <td>Proposal</td>
                                <td>45m²</td>
                                <td>85m²</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Kekurangan Lahan --}}

{{-- End Main-Content --}}








<div class="content-backdrop fade"></div>
@endsection
