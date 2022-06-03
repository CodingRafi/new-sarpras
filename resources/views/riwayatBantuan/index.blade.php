@extends('myLayouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Riwayat Bantuan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">

        {{-- ---------------------------------------------------------------------------------------- RIWAYAT BANTUAN ---------------------------------------------------------------------------------------- --}}
        <div class="card mb-5">
            <div class="card-header" style="background-color: #25b5e9">
                <div class="container row p-0">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item mr-1">
                            <button type="button" class="btn text-white border pr-4 pl-4" data-toggle="modal"
                                data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($riwayats) > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Tahun Bantuan</th>
                                    <th style="vertical-align: middle;">Jenis Bantuan</th>
                                    <th style="vertical-align: middle;">Pemberi Bantuan</th>
                                    <th style="vertical-align: middle;">Sumber Anggaran</th>
                                    <th style="vertical-align: middle;">Nilai Bantuan</th>
                                    <th style="vertical-align: middle;">Foto Bantuan</th>
                                    <th style="vertical-align: middle;">Keterangan Bantuan</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayats as $key => $riwayat)
                                    <tr>
                                        <td class="text-center"
                                            style="vertical-align: middle; max-height: 200px !important;">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="text-center"
                                            style="vertical-align: middle; max-height: 200px !important;">
                                            {{ $riwayat->tahun_bantuan }}</td>
                                        <td style="vertical-align: middle">{{ $riwayat->jenis }}</td>
                                        <td style="vertical-align: middle">{{ $riwayat->pemberian_bantuan }}</td>
                                        <td style="vertical-align: middle" style="text-transform: capitalize">
                                            {{ $riwayat->sumber_anggaran == 'lain' ? 'Sumber Lainnya' : $riwayat->sumber_anggaran }}
                                        </td>
                                        <td style="vertical-align: middle">{{ $riwayat->nilai_bantuan }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            @foreach ($fotos[$key] as $ke => $foto)
                                                <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                                    data-fancybox="gallery1">
                                                    <img src="{{ asset('storage/' . $foto->nama) }}" class="rounded"
                                                        style="object-fit: cover; width: 100px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align: middle; height: 200px !important;">
                                            <div style="overflow: auto; max-height: 200px;">{{ $riwayat->keterangan }}</div>
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="/riwayat-bantuan/{{ $riwayat->id }}/edit" class="btn btn-warning text-white">edit</a>
                                            <form action="/riwayat-bantuan/{{ $riwayat->id }}" method="post" class="mt-2">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn text-white" onclick="return confirm('Apakah anda yakin akan menghapus riwayat bantuan ini?')" style="background-color: #00a65b">Hapus</button>
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

        {{-- ---------------------------------------------------------------------------------------- MODAL TAMBAH USULAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="tambah">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Usulan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/riwayat-bantuan" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                {{-- ---------------------------------------------------------------------------------------- TAHUN BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="tahun-bantuan" class="col-sm-3 col-form-label">Tahun Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="tahun-bantuan" name="tahun_bantuan"
                                            required>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- JENIS BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="jenis-bantuan" class="col-sm-3 col-form-label">Jenis Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pemberi-bantuan" name="jenis"
                                            required>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- PEMBERI BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="pemberi-bantuan" class="col-sm-3 col-form-label">Pemberi Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pemberi-bantuan"
                                            name="pemberian_bantuan" required>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- SUMBER ANGGARAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="sumber-anggaran" class="col-sm-3 col-form-label">Sumber Anggaran</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="Sumber Anggaran" name="sumber_anggaran" required>
                                            <option value="" selected>Pilih Sumber Anggaran</option>
                                            <option value="apbn">APBN</option>
                                            <option value="apbd">APBD</option>
                                            <option value="lain">Sumber Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- NILAI BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="nilai-bantuan" class="col-sm-3 col-form-label">Nilai Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nilai-bantuan" name="nilai_bantuan"
                                            required>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- MANFAAT BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="foto-bantuan" class="col-sm-3 col-form-label">Foto Manfaat Bantuan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="">
                                                <input type="file" id="foto-bantuan" name="gambar[]" multiple accept="image/*" class="mt-1" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- KETERAGAN BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="keterangan-bantuan" class="col-sm-3 col-form-label">Keterangan
                                        Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="keterangan-bantuan" required
                                            name="keterangan">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right" style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL EDIT USULAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Usulan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                {{-- ---------------------------------------------------------------------------------------- TAHUN BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="tahun-bantuan" class="col-sm-3 col-form-label">Tahun Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="tahun-bantuan">
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- JENIS BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="jenis-bantuan" class="col-sm-3 col-form-label">Jenis Bantuan</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="jenis-bantuan">
                                            <option value="belum" selected>Pilih Jenis Bantuan</option>
                                            <option value="#">opsi 1</option>
                                            <option value="#">opsi 2</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- PEMBERI BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="pemberi-bantuan" class="col-sm-3 col-form-label">Pemberi Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="pemberi-bantuan">
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- SUMBER ANGGARAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="sumber-anggaran" class="col-sm-3 col-form-label">Sumber Anggaran</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="Sumber Anggaran">
                                            <option value="belum" selected>Pilih Sumber Anggaran</option>
                                            <option value="#">opsi 1</option>
                                            <option value="#">opsi 2</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- NILAI BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="nilai-bantuan" class="col-sm-3 col-form-label">Nilai Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nilai-bantuan">
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- MANFAAT BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="foto-bantuan" class="col-sm-3 col-form-label">Foto Manfaat Bantuan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto-bantuan">
                                                <label class="custom-file-label" for="gambar-lokasi">Pilih Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- KETERAGAN BANTUAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="keterangan-bantuan" class="col-sm-3 col-form-label">Keterangan
                                        Bantuan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="keterangan-bantuan">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
