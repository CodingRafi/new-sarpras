@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .info-box-content p {
            padding-top: 60px;
        }

        .col-5 h1 {
            font-weight: 600;
            font-size: 2rem;
        }

        .card-content {
            font-size: 5rem;
        }

        .col-8 {
            padding-top: 40px;
        }

        .col-5 h1 {
            margin-left: 25px;
            margin-bottom: 30px;
        }

    </style>
@endsection

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">Usulan Lahan</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Main-Content --}}
    <div class="container-fluid">
        {{-- @dd($profil) --}}
        <div class="card">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white font-weight-bold">
                    Profil Sekolah
                </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-sekolah">
                        <table class="table table-hover table-borderless text-nowrap">
                            <tr>
                                <th>NPSN</th>
                                <td>: {{ $profil->npsn }}</td>
                            </tr>
                            <tr>
                                <th>Nama Sekolah</th>
                                <td>: {{ $profil->nama }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>: {{ $profil->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan</th>
                                <td>: {{ $profil->kecamatan }}</td>
                            </tr>
                            <tr>
                                <th>Kabupaten</th>
                                <td>: {{ $profil->kabupaten }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>: {{ $profil->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telepon</th>
                                <td>: {{ $profil->nomor_telepon }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row -->

        <div class="card">
            <div class="card-header" style="background-color: #00a65b">
                <h3 class="card-title text-white font-weight-bold">
                    Usulan
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th rowspan="2" style="vertical-align: middle;">Nama</th>
                                    <th rowspan="2" style="vertical-align: middle;">Jenis Ruang</th>
                                    <th rowspan="2" style="vertical-align: middle;">Panjang</th>
                                    <th rowspan="2" style="vertical-align: middle;">Lebar</th>
                                    <th rowspan="2" style="vertical-align: middle;">Luas</th>
                                    <th rowspan="2" style="vertical-align: middle;">Alamat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle;text-transform: capitalize;">
                                        {{ $data->nama }}</td>
                                    <td style="vertical-align: middle;text-transform: capitalize;">
                                        {{ str_replace('_', ' ', $data->jenis_usulan) }}</td>
                                    <td style="vertical-align: middle;text-transform: capitalize;">
                                        {{ $data->panjang }}</td>
                                    <td style="vertical-align: middle;text-transform: capitalize;">
                                        {{ $data->lebar }}</td>

                                    <td class="text-center" style="vertical-align: middle;">{{ $data->luas }} m²
                                    </td>
                                    <td style="vertical-align: middle;">{{ $data->alamat }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <iframe src="{{ asset('storage/' . $data->proposal) }}" frameborder="0" style="width: 66%;
                                                                    height: 72rem;"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
