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

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Monitoring & Evaluasi</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <p style="line-height: 20px">Nama Pengawas : Drs. Jajang Sukmara</p>
                    <p style="line-height: 20px">Tanggal Monitoring : 24-02-2022</p>
                    <p style="line-height: 20px">Keperluan : Validasi</p>
                    <p style="line-height: 20px" class="pb-3">Surat Kerja : <img src="/img/pdf.png" alt=""
                            style="width: 30px"></p>
                    <div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center" scope="col">No</th>
                                        <th class="text-center col-6" scope="col">Unsur yang Diverifikasi</th>
                                        <th class="text-center col-2" scope="col">Belum Layak</th>
                                        <th class="text-center col-2" scope="col">Layak</th>
                                        <th class="text-center col-2" scope="col">Sangat Layak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center" scope="row">1</th>
                                        <td class="text-center">Standar Persyaratan Peralatan Utama</td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="bi bi-check2"></i></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">2</th>
                                        <td class="text-center">Standar Persyaratan Peralatan Pendukung</td>
                                        <td class="text-center"><i class="bi bi-check2"></i></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                    </tr>
                                    <tr>
                                        <th class="text-center" scope="row">3</th>
                                        <td class="text-center">Standar Persyaratan Tempat/ Ruang</td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"><i class="bi bi-check2"></i></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="content-backdrop fade"></div>
@endsection
