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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Verifikator</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Table --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex p-0" style="background-color: #25b5e9">
                <h3 class="card-title p-3 text-white font-weight-bold">Sekolah</h3>
            </div>
            <div class="card-body">
                {{-- Table --}}
                <div class="table-responsive">
                    @if (count($visitasis) > 0)
                        <table class="table table-bordered table-hover mt-2">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    @if (Auth::user()->hasRole('verifikator'))
                                        <th>Nama Sekolah</th>
                                    @endif
                                    <th>Keperluan</th>
                                    <th>Surat Tugas</th>
                                    <th>Tanggal Visitasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitasis as $key => $visitasi)
                                    {{-- @dd($visitasi) --}}
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        @if (Auth::user()->hasRole('verifikator'))
                                            <td class="text-center">{{ $visitasi->nama_sekolah }}</td>
                                        @endif
                                        <td class="text-center">{{ $visitasi->keperluan }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="{{ asset('storage/' . $visitasi->surat_tugas) }}" target="_blank">
                                                <img src="/img/pdf.png" alt="image" style="width: 30px">
                                            </a>
                                        </td>
                                        <td class="text-center">{{ $visitasi->tanggal_visitasi }}</td>
                                        <td class="text-center">
                                            <a href="/visitasi/{{ $visitasi->id }}"
                                                class="btn btn-warning text-white">Detail</a>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                    @endif
                </div>
                {{-- End --}}
            </div>
        </div>
    </div>
    {{-- End --}}
@endsection
