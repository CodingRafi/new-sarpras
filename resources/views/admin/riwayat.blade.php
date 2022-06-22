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
                    @if (count($profils) > 0)
                        <div class="search" style="display: flex">
                            <a class="btn btn-light dropdown-toggle" style="border: 1px solid #263238"
                                data-toggle="dropdown" href="#">
                                Filter... <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu" style="min-width: auto !important; width: 160px;">
                                <form action="/riwayat-bantuan-dinas" method="get">
                                    @if (request('search'))
                                        <input type="hidden" value="{{ request('search') }}" name="search">
                                    @endif
                                    <input type="hidden" name="search" value="">
                                    <input type="hidden" name="filter" value="belum">
                                    <button class="dropdown-item text-truncate kab" tabindex="-1" type="submit">Belum Pernah
                                        Dapat</button>
                                </form>
                                <form action="/riwayat-bantuan-dinas" method="get">
                                    @if (request('search'))
                                        <input type="hidden" value="{{ request('search') }}" name="search">
                                    @endif
                                    <input type="hidden" name="search" value="">
                                    <input type="hidden" name="filter" value="sudah">
                                    <button class="dropdown-item text-truncate kab" tabindex="-1" type="submit">Sudah Pernah
                                        Dapat</button>
                                </form>
                            </div>
                            <form class="form-inline ml-2" action="/riwayat-bantuan-dinas" method="GET"
                                style="width: 100%;">
                                {{-- <input type="hidden" name="filter" value=""> --}}
                                @if (request('filter'))
                                    <input type="hidden" value="{{ request('filter') }}" name="filter">
                                @endif
                                <div class="input-group"
                                    style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                                    <input class="form-control form-control-navbar" type="search"
                                        placeholder="Search Nama Sekolah" aria-label="Search"
                                        style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;" name="search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                    <div class="table-responsive">
                        {{-- <div class="col-lg-12"> --}}
                        @if (count($profils) > 0)
                            <table class="table table-bordered mt-3">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">No</th>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">Nama Sekolah</th>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">NPSN</th>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">Status Sekolah</th>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">Jumlah Riwayat</th>
                                        <th rowspan="2" class="text-center"
                                            style="vertical-align: middle; background-color:#eeeeee">Aksi</th>
                                    </tr>
                                </thead>
                                {{-- end judul table --}}

                                {{-- isi table --}}
                                <tbody>
                                    @foreach ($datas as $key => $profil)
                                        <tr>
                                            <td class="text-center">
                                                {{ ($profils ->currentpage()-1) * $profils ->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td class="text-center">{{ $profil['nama'] }}</td>
                                            <td class="text-center">{{ $profil['npsn'] }}</td>
                                            <td class="text-center">{{ $profil['status_sekolah'] }}</td>
                                            <td class="text-center">{{ $profil['jml_riwayat'] }}</td>
                                            <td class="text-center"><a
                                                    href="/riwayat-bantuan/{{ $profil['id_profil'] }}"
                                                    class="btn text-white" style="background-color: #00a65b">Detail</a>
                                            </td>
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
                        {{ $profils->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Main-Content --}}
    <div class="content-backdrop fade"></div>
    {{-- End Main --}}
@endsection
