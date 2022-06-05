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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">Rehab Renov</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Main-Content --}}
    <div class="container-fluid">
        {{-- @dd($profil) --}}
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="card-title">
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
            <div class="card-header bg-success">
                <h3 class="card-title">
                    Usulan
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="">
                        <table class="table table-hover table-bordered text-center">
                            <thead class="bg-light text-center">
                                <tr>
                                    <th style="vertical-align: middle;">Jenis Usulan</th>
                                    <th style="vertical-align: middle;">Persentase</th>
                                    <th style="vertical-align: middle;">Usia</th>
                                    <th style="vertical-align: middle;">Objek</th>
                                    <th style="vertical-align: middle;">Luas Lahan</th>
                                    <th style="vertical-align: middle;">Keterangan</th>
                                    <th style="vertical-align: middle;">Gambar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle;text-transform: capitalize">{{ $data->jenis }}</td>
                                    <td style="vertical-align: middle;">{{ $data->persentase }}</td>
                                    <td style="vertical-align: middle;">{{ $data->usia }}</td>
                                    <td style="vertical-align: middle;">{{ $data->objek }}</td>
                                    <td class="text-center" style="vertical-align: middle;">{{ $data->luas_lahan }} m²
                                    </td>
                                    <td style="vertical-align: middle;">{{ $data->keterangan }}</td>
                                    <td style="vertical-align: middle">
                                        @foreach ($usulanFoto as $key => $foto)
                                            <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                                data-fancybox="gallery"><img src="{{ asset('storage/' . $foto->nama) }}"
                                                    class="rounded"
                                                    style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $key == 0 ? '' : 'display:none;' }}">
                                            </a>
                                        @endforeach
                                    </td>
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
