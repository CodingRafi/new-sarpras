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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Pimpinan</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    {{-- Table --}}
    <div class="container-fluid">
        <div class="card">
            <div class="card-header d-flex p-0" style="background-color: #25b5e9">
                <h3 class="card-title p-3 text-white">Ruang Pimpinan</h3>
                <div class="card-tools float-right d-flex align-items-center">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#tambah-jenis-pimpinan"><i class="bi bi-plus"></i> Tambah Jenis Pimpinan
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- Table --}}
                <div class="table-responsive">
                    @if (count($usulanBangunans) > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover mt-2">
                                <div class="search" style="display: flex">
                                    <ul class="nav nav-pills ml-auto p-2 col-1" style="max-width: 11%;">
                                        <li class="nav-item dropdown">
                                            <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                                                Filter by ... <span class="caret"></span>
                                            </a>
                                            <div class="dropdown-menu" style="min-width: auto !important; width: 125px;">
                                                <a class="dropdown-item text-truncate kab" tabindex="-1"
                                                    href="/bangunan/ruang-pimpinan-dinas?filter=kota">Kota/ Kabupaten</a>
                                                <a class="dropdown-item text-truncate kcd" tabindex="-1"
                                                    href="/bangunan/ruang-pimpinan-dinas?filter=kcd">Kantor Cabang Dinas</a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="md-2 col-11" style="max-width: 89%;">
                                        <form class="form-inline ml-2" action="/bangunan/ruang-pimpinan-dinas" method="GET"
                                            style="width: 100%;">
                                            <div class="input-group"
                                                style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                                                <input class="form-control form-control-navbar" type="search"
                                                    placeholder="Search Nama Sekolah" aria-label="Search"
                                                    style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;"
                                                    name="search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Nama Sekolah</th>
                                        <th>Status Sekolah</th>
                                        <th>Kabupaten / Kota</th>
                                        <th>Kantor Cabang Dinas</th>
                                        <th>Proposal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usulanBangunans as $key => $usulan)
                                        <tr>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ ($usulanBangunans->currentpage() - 1) * $usulanBangunans->perpage() + $loop->index + 1 }}
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->nama }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->status_sekolah }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->kabupaten }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                {{ $usulan->instansi }}</td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                                    <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                </a>
                                            </td>
                                            <td class="text-center" style="vertical-align: middle">
                                                <a href="/usulan-bangunan/{{ $usulan->id }}"
                                                    class="btn text-white d-inline"
                                                    style="background-color: #25b5e9">Detail</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                    @endif
                </div>

                <div class="modal fade" id="tambah-jenis-pimpinan">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Jenis Ruang Pimpinan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" action="/jenis-pimpinan" method="post">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="jumlah-lahan" class="col-sm-2 col-form-label">Nama Ruang</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" id="jumlah-lahan" name="nama" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success float-right">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End --}}
                {{-- Pagination --}}
                <div class="float-right">
                    {{ $usulanBangunans->links() }}
                </div>
                {{-- End --}}
            </div>
        </div>
    </div>
    {{-- End --}}


@endsection
