@extends('mylayouts.main')

@section('container')
<div class="container">
    {{-- -------------------------------------------------------------------------------------- TITLE --------------------------------------------------------------------------------------  --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">{{ $jenis_laboratorium->jenis }}
                    </h1>
                </div>
            </div>
        </div>
    </div>

    {{-- -------------------------------------------------------------------------------------- BODY --------------------------------------------------------------------------------------  --}}
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="card card-info">
                <div class="card-header" style="background-color: #25b5e9">
                    <h3 class="card-title font-weight-bold">Detail</h3>
                </div>
                <div class="card-body" style="min-height: 390px;">
                    <div class="row">
                        <div class="col">
                            <div class="info-box text-white"
                                style="background-image: url(/assets/img/backgrounds/lab-pattern.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">Kondisi Ideal</span>
                                    <span class="display-4 font-weight-bold">{{ $laboratorium->kondisi_ideal }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="info-box text-white"
                                style="background-image: url(/assets/img/backgrounds/lab-pattern-success.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">Ketersediaan</span>
                                    <span class="display-4 font-weight-bold">{{ $laboratorium->ketersediaan }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="info-box text-white"
                                style="background-image: url(/assets/img/backgrounds/lab-pattern-warning.png);">
                                <div class="info-box-content">
                                    <span class="info-box-text font-weight-bold">Kekurangan</span>
                                    <span class="display-4 font-weight-bold">{{ $laboratorium->kekurangan }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card card-outline card-warning">
                                <div class="card-header">
                                    <h3 class="card-title">Keterangan</h3>
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <svg style="color: gray" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body text-muted" style="max-height: 12rem;overflow: auto;">
                                    Conubia netus vulputate dis tempor pharetra at viverra praesent litora cras mi sem est potenti blandit tempus proin turpis parturient morbi dolor pede dui nunc eros neque in vitae quam cubilia fames iaculis nisl suspendisse egestas sagittis eu erat euismod per letius montes massa porttitor semper vehicula ligula nibh curae tortor ex senectus inceptos himenaeos nam hendrerit orci pulvinar velit augue fringilla porta nascetur rutrum fusce mus aliquam finibus eget facilisi ullamcorper libero bibendum metus ut tristique odio efficitur tincidunt ultricies felis lacinia vestibulum cursus dapibus rhoncus suscipit ac habitasse nullam torquent mollis eleifend nulla scelerisque sollicitudin habitant penatibus    
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
                    <h3 class="card-title font-weight-bold" style="background-color: #00a65b">Diperuntukkan untuk Kompetensi Keahlian</h3>
                </div>
                <div class="card-body table-responsive p-0" style="height: 389px">
                    <table class="table table-head-fixed text-nowrap"">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Diperuntukkan untuk Kompetensi Keahlian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($komlis as $komli)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $komli->kompetensi }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
