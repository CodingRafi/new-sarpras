@extends('mylayouts.main')

@section('tambahcss')
    <style>
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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize">
                        Riwayat Bantuan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title text-white pt-2 font-weight-bold" style="text-transform: capitalize">
                Riwayat Bantuan</h3>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    @if (count($riwayats) > 0)
                        <form class="form-inline ml-2" action="/riwayat-bantuan-dinas" method="GET">
                            <div class="input-group" style="width: 50vw">
                                <input class="form-control form-control-navbar" type="search"
                                    placeholder="Search NPSN, sekolah id, nama sekolah" aria-label="Search"
                                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;" name="search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                    <div class="table-responsive">
                        {{-- <div class="col-lg-12"> --}}
                        @if (count($riwayats) > 0)
                            <table class="table table-bordered mt-3">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Nama Sekolah
                                        </th>
                                        <th class="text-center">Tahun Bantuan</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Jenis Bantuan
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Pemberi
                                            Bantuan</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Sumber
                                            Anggaran</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Nilai Bantuan
                                        </th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Foto Manfaat
                                            bantuan</th>
                                        <th rowspan="2" class="text-center" style="vertical-align: middle">Keterangan
                                        </th>
                                    </tr>
                                </thead>
                                {{-- end judul table --}}

                                {{-- isi table --}}
                                <tbody>
                                    @foreach ($riwayats as $key => $riwayat)
                                        <tr>
                                            <td class="text-center">
                                                {{ ($riwayats->currentpage() - 1) * $riwayats->perpage() + $loop->index + 1 }}
                                            </td>
                                            <th class="text-center">{{ $riwayat->nama }}</th>
                                            <th class="text-center">{{ $riwayat->tahun_bantuan }}</th>
                                            <th class="text-center">{{ $riwayat->jenis }}</th>
                                            <th class="text-center">{{ $riwayat->pemberian_bantuan }}</th>
                                            <th class="text-center">{{ $riwayat->sumber_anggaran }}</th>
                                            <th class="text-center">{{ $riwayat->nilai_bantuan }}</th>
                                            <td class="text-center" style="vertical-align: middle">
                                                @foreach ($fotos[$key] as $ke => $foto)
                                                    <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                                        data-fancybox="gallery{{ $key }}">
                                                        <img src="{{ asset('storage/' . $foto->nama) }}"
                                                            class="rounded"
                                                            style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                    </a>
                                                @endforeach
                                            </td>
                                            <td class="text-center">{{ $riwayat->keterangan }}</td>
                                    @endforeach
                                </tbody>
                                {{-- end isi table --}}
                            </table>
                        @else
                            <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                        @endif
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Main-Content --}}
    <div class="content-backdrop fade"></div>
    {{-- End Main --}}
@endsection
