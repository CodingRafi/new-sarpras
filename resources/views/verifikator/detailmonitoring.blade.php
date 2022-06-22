    @extends('mylayouts.main')

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
        {{-- <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Visitasi</h1>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- End Header --}}


        @if (Auth::user()->hasRole('verifikator'))
            <div class="card mt-3">
                <div class="card-header text-white" style="background-color: #25b5e9;">
                    <h3 class="card-title font-weight-bold">
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
        @endif
        <!-- /.row -->

        @if ($visitasi->status == 'simpan')
            <form action="/visitasi-publish" method="post" class="mb-3">
                @csrf
                @method('patch')
                <input type="hidden" name="visitasi_id" value="{{ $visitasi->id }}">
                <button type="submit" class="btn text-white" style="background-color: #00a65b"
                    onclick="return confirm('Apakah anda yakin akan mempublish visitasi ini?')">Unggah</button>
            </form>
        @endif


        {{-- Table --}}
        @if ($hasils[0]['unsur'] == null)
            <form action="/hasil-visitasi" method="post">
                @csrf
            @else
                <form action="/hasil-visitasi-update" method="post">
                    @csrf
                    @method('patch')
        @endif
        <div class="container-fluid p-0 {{ Auth::user()->hasRole('verifikator') ? '' : 'mt-3' }}">
            <div class="card">
                <div class="card-header bg-warning">
                    <h3 class="card-title text-white font-weight-bold">Visitasi</h3>
                    @if (Auth::user()->hasRole('verifikator'))
                        <div class="card-tools">
                            <button type="submit" class="btn btn-tool border border-light text-white mr-2">
                                @if ($hasils[0]['unsur'] == null)
                                    Simpan
                                @else
                                    Update
                                @endif
                            </button>
                            {{-- <button type="button" class="btn btn-tool border border-light text-white"
                            style="padding: 10px">Unggah</button> --}}
                        </div>
                    @endif
                </div>
                <div class="card-body">
                    <input type="hidden" value="{{ $visitasi->id }}" name="visitasi_id">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-hover table-borderless text-nowrap">
                                {{-- ---------------------------------------------------------------------------------------- NPSN ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Nama Pengawas</th>
                                    <td class="text-wrap ">: {{ $user->name }}</td>
                                </tr>
                                {{-- ---------------------------------------------------------------------------------------- NAMA SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Tanggal Monitoring</th>
                                    <td class="text-wrap ">: {{ $visitasi->tanggal_visitasi }}</td>
                                </tr>
                                <tr>
                                    <th>Keperluan</th>
                                    <td class="text-wrap ">: {{ $visitasi->keperluan }}</td>
                                </tr>
                                <tr>
                                    <th>Surat Tugas</th>
                                    <td class="text-wrap ">: <a href="{{ asset('storage/' . $visitasi->surat_tugas) }}"
                                            target="_blank"><img src="/img/pdf.png" alt="image" style="width: 30px"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status Visitasi</th>
                                    <td class="text-wrap" style="text-transform: capitalize;">:
                                        {{ $visitasi->status }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    @if (Auth::user()->hasRole('sekolah') && $visitasi->status == 'unggah')
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

                            @if (Auth::user()->hasRole('verifikator'))
                                <tbody>

                                    @if ($hasils[0]['unsur'] == null)
                                        @foreach ($unsurs as $unsur)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    {{ $unsur->unsur }}
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $unsur->id }}"
                                                        value="belum_layak">
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $unsur->id }}"
                                                        value="layak">
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $unsur->id }}"
                                                        value="sangat_layak">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach ($hasils as $hasil)
                                            <tr>
                                                <td class="text-center" style="vertical-align: middle">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    {{ $hasil->unsur }}
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $hasil->id_hasil }}"
                                                        value="belum_layak"
                                                        {{ $hasil->hasil == 'belum_layak' ? 'checked' : '' }}>
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $hasil->id_hasil }}"
                                                        value="layak" {{ $hasil->hasil == 'layak' ? 'checked' : '' }}>
                                                </td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    <input type="radio" name="unsur_id_{{ $hasil->id_hasil }}"
                                                        value="sangat_layak"
                                                        {{ $hasil->hasil == 'sangat_layak' ? 'checked' : '' }}>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            @else
                                <tbody>
                                    @foreach ($hasils as $hasil)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">{{ $hasil->unsur }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {!! $hasil->hasil == 'belum_layak' ? '<i class="bi bi-check-lg"></i>' : '' !!}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {!! $hasil->hasil == 'layak' ? '<i class="bi bi-check-lg"></i>' : '' !!}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {!! $hasil->hasil == 'sangat_layak' ? '<i class="bi bi-check-lg"></i>' : '' !!}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            @endif
                        </table>
                    @endif
                </div>
            </div>
        </div>
        </form>
        {{-- End --}}
    @endsection
