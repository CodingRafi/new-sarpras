@extends('mylayouts.main')

@section('container')
<div class="container">
    {{-- -------------------------------------------------------------------------------------- TITLE --------------------------------------------------------------------------------------  --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">(jenis laboratorium)</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- BODY --------------------------------------------------------------------------------------  --}}
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Detail</h3>
                </div>
                <div class="card-body" style="height: 389px">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box text-white" style="background-image: url(/assets/img/backgrounds/lab-pattern.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text">Kondisi Ideal</span>
                                    <span class="display-4">10</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-box text-white" style="background-image: url(/assets/img/backgrounds/lab-pattern-success.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text">Ketersediaan</span>
                                    <span class="display-4">4</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="info-box text-white" style="background-image: url(/assets/img/backgrounds/lab-pattern-warning.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text">Kekurangan</span>
                                    <span class="display-4">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Kompetensi Keahlian</h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 389px">
                    <table class="table table-head-fixed text-nowrap"">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Kompetensi Keahlian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Rekayasa Perangkat Lunak</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Rekayasa Perangkat Lunak</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Rekayasa Perangkat Lunak</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Rekayasa Perangkat Lunak</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Multimedia</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Teknik Komputer Jaringan</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Teknik Elektronika Industri</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BroadCast</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BroadCast</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BroadCast</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>BroadCast</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
