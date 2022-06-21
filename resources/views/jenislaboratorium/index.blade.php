@extends('mylayouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">Jenis Laboratorium</h1>
                </div>
            </div>
        </div>
    </div>
    {{-- End Header --}}

    <div class="container-fluid">
        <div class="card">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white font-weight-bold">Jenis Laboratorium</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#tambah-laboratorium"><i class="bi bi-plus"></i> Tambah Jenis Laboratorium
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($jenis_labolatoriums) > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">No</th>
                                    <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">Jenis</th>
                                    <th rowspan="2" style="vertical-align: middle; background-color:#eeeeee;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jenis_labolatoriums as $i => $jenis)
                                    <tr>
                                        <th class="text-center">{{ $loop->iteration }}</th>
                                        <td class="text-center text-capitalize nama-laboratorium"
                                            data-id="{{ $jenis->id }}">
                                            {{ $jenis->jenis }}</td>
                                        <td class="text-center text-capitalize">
                                            <a href="/jenis-laboratorium/{{ $jenis->id }}" class="btn text-white"
                                                style="background-color: #00a65b">Detail</a>
                                            <button type="button" class="btn btn-warning button-laboratorium text-white"
                                                data-toggle="modal" data-target="#edit-laboratorium"
                                                data-id="{{ $jenis->id }}">Edit
                                            </button>
                                            <form action="/jenis-laboratorium/{{ $jenis->id }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn text-white"
                                                    style="background-color: #263238"
                                                    onclick="return confirm('Apakah anda yakin akan menghapus jenis laboratorium ini?')">Hapus</button>
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
    <div class="modal fade" id="tambah-laboratorium">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Jenis Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (count($komlis) > 0)
                        <form class="form-horizontal" action="/jenis-laboratorium" method="POST" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Jenis Laboratorium</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="jenis" id="" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                    <div class="col-sm-9">
                                        <select class="fstdropdown-select" id="select" name="komli_id[]" multiple>
                                            @foreach ($komlis as $komli)
                                                <option value="{{ $komli->id }}">{{ $komli->kompetensi }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right">Simpan</button>
                            </div>
                        </form>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Tidak ada kompetensi keahlian tersedia
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-laboratorium">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Jenis Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-laboratorium" action="/jenis-pimpinan" method="POST"
                        onsubmit="myLoading()">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="nama" class="col-sm-3 col-form-label">Jenis Laboratorium</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control input-nama-laboratorium" id="nama"
                                        name="jenis" required>
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
