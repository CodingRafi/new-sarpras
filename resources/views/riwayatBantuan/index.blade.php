@extends('mylayouts.main')

@section('tambahcss')
    <style>
        @media(max-width: 480px) {
        .tombolHapus {
            margin-top: 5px;
        }
    }
    </style>
@endsection

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

<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>

<div class="container-fluid">

    {{-- ---------------------------------------------------------------------------------------- RIWAYAT BANTUAN ---------------------------------------------------------------------------------------- --}}
    <div class="card">
          <div class="card-header d-flex p-0" style="background-color: #25b5e9">
                <h3 class="card-title p-3 text-white font-weight-bold">Riwayat Bantuan</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn text-white border pr-4 pl-4" data-toggle="modal"
                            data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah
                        </button>
                    </li>
                </ul>
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
                            <td class="text-center" style="vertical-align: middle; max-height: 200px !important;">
                                {{ $loop->iteration }}
                            </td>
                            <td class="text-center" style="vertical-align: middle; max-height: 200px !important;">
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
                                <a href="/riwayat-bantuan/{{ $riwayat->id }}/edit"
                                    class="btn btn-warning text-white mt-2">Edit</a>
                                    <button type="button" class="btn text-white tombolHapus mt-2" style="background-color: #263238" data-toggle="modal"
                                        data-target="#confirmhapus" data-id="{{ $riwayat->id }}">
                                        Hapus
                                    </button>
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
                    <h4 class="modal-title">Tambah Riwayat Bantuan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/riwayat-bantuan" method="POST" enctype="multipart/form-data" onsubmit="myLoading()">
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
                                    <input type="text" class="form-control" id="pemberi-bantuan" name="jenis" required>
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
                                            <input type="file" id="foto-bantuan" name="gambar[]" multiple
                                                accept="image/*" class="mt-1" required>
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
                            <button type="submit" class="btn text-white float-right"
                                style="background-color: #00a65b">Simpan</button>
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
                            <button type="submit" class="btn text-white"
                                style="background-color: #00a65b">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="90" color="red" fill="currentColor"
                    class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                    aria-label="Warning:">
                    <path
                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </svg>
                <h4 class="text mt-3">Apakah anda yakin ingin menghapus data ini?</h3>
            </div>
            <div class="row p-3">
                <button type="button" class="col-6 btn btn-dark py-1" data-dismiss="modal">Batal</button>
                <form action="/riwayat-bantuan/" method="post" class="col-6 form-hapus">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger py-1" style="width: 100%">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('tambahjs')
        <script>
            const form = document.querySelector('.form-hapus');
            const tombolHapus = document.querySelectorAll('.tombolHapus');

            tombolHapus.forEach((e,i) => {
                e.addEventListener('click', function(){
                    form.removeAttribute('action');
                    form.setAttribute('action', '/riwayat-bantuan/' + e.getAttribute('data-id'));
                })
            });
        </script>
@endsection
