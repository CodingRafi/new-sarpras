@extends('mylayouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">Jenis Ruang Penunjang</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white font-weight-bold">Jenis Ruang Penunjang</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#tambah-jenis-pimpinan"><i class="bi bi-plus"></i> Tambah Jenis
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($jenisPimpinans) > 0)
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr class="text-center">
                                <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">No</th>
                                <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">Nama Ruang
                                </th>
                                <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenisPimpinans as $key => $jenis)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center text-capitalize nama-jenis-pimpinan" data-id="{{ $jenis->id }}">
                                    {{ $jenis->nama }}</td>
                                <td class="text-center text-capitalize">
                                    <button type="button" class="btn btn-warning button-jenis-pimpinan text-white"
                                        data-toggle="modal" data-target="#edit-jenis-pimpinan">Edit
                                    </button>
                                    <form action="/jenis-penunjang/{{ $jenis->id }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn text-white" style="background-color: #263238"
                                            onclick="return confirm('Apakah anda yakin akan menghapus jenis ruang penunjang ini?')">Hapus</button>
                                    </form>
                                </td>
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
            </div>
        </div>
    </div>
    
    {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-jenis-pimpinan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Ketersediaan Ruang Penunjang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/jenis-penunjang" method="POST" onsubmit="myLoading()">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" required>
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
    
    <div class="modal fade" id="edit-jenis-pimpinan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jenis Ruang Penunjang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-jenis-pimpinan" action="/jenis-penunjang" method="POST"
                        onsubmit="myLoading()">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-nama-jenis-pimpinan" id="nama" name="nama"
                                        required>
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
@endsection
