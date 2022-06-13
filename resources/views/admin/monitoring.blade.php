@extends('mylayouts.main')

@section('tambahcss')
<link rel="stylesheet" href="/css/fstdropdown.css">

<style>
    .card-header h4 {
        font-size: 1.2rem !important
    }

    .input-group-prepend button i {
        position: absolute;
        margin-top: -10px;
        margin-left: 40px;
    }

    .btn-titik {
        position: absolute;
        margin-left: -60px;
    }

    .fstdiv {
        max-width: 75%;
    }

    .fstdropdown>.fstlist {
        max-height: 100px;
    }

</style>
@endsection

@section('container')

{{-- ---------------------------------------------- TITLE ---------------------------------------------- --}}
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Monitoring & Evaluasi
                </h1>
            </div>
        </div>
    </div>
</div>

{{-- ---------------------------------------------- BODY ---------------------------------------------- --}}
<div class="container-fluid mt-3">
    {{-- ---------------------------------------------- PENGAWAS ---------------------------------------------- --}}
    <div class="card mb-5">
        <div class="card-header" style="display:flex; background-color: #25b5e9">
            <div class="col-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white active font-weight-bold" href="#data-pengawas"
                            data-toggle="tab">Pengawas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#tambah-pengawas"
                            data-toggle="tab">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="table-responsive">
            <div class="card-body ">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-pengawas">
                        <div class="row">
                            <div class="col">
                                @if (count($pengawases) > 0)
                                {{-- ---------------------------------------------- SHOW PENGAWAS ---------------------------------------------- --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                No
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Nama
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Instansi
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Kabupaten/ Kota
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Provinsi
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Email
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Aksi
                                            </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengawases as $pengawas)
                                        {{-- @dd($pengawases[1]) --}}
                                        {{-- row 1 --}}
                                        <tr>
                                            <th class="col-1 text-center" scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="col-1 text-center nama_pengawas">
                                                {{ $pengawas->name }}
                                            </td>
                                            <td class="col-1 text-center instansi_pengawas">
                                                {{ $pengawas->instansi }}
                                            </td>
                                            <td class="col-1 text-center kota_kabupaten_pengawas"
                                                data-kab="{{ $pengawas->id_kota_kabupatens }}">
                                                {{ $pengawas->nama_kota_kabupaten }}
                                            </td>
                                            <td class="col-1 text-center">
                                                {{ $pengawas->provinsi }}
                                            </td>
                                            <td class="col-1 text-center email_pengawas">
                                                {{ $pengawas->email }}
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn " data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item tombol-edit-pengawas"
                                                                    data-toggle="modal" data-target="#modal-edit-pengawas"
                                                                    data-id="{{ $pengawas->id }}">Edit</a>
                                                                <form action="/users/{{ $pengawas->id }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Apakah anda yakin akan menghapus pengawas ini?')">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        {{-- end row 1 --}}
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="container d-flex justify-content-center align-items-center"
                                    style="height: 10rem">
                                    <div class="alert" role="alert">
                                        Data Tidak Ditemukan
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- ---------------------------------------------- CREATE PENGAWAS ---------------------------------------------- --}}
                    <div class="chart tab-pane" id="tambah-pengawas">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" onsubmit="myLoading()">
                                @csrf
                                <input type="hidden" name="role" value="1">
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <input type="email" class="form-control col-sm-9" placeholder="Masukan Email"
                                        id="email" name="email">
                                </div>
                                {{-- end input nama --}}
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama"
                                        id="nama" name="name">
                                </div>
                                {{-- end input nama --}}
                                {{-- input Kabupaten/ Kota --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
                                    <select class="form-control col-9 fstdropdown-select" id="kompetensi-keahlian"
                                        name="kota_kabupaten_id">
                                        @foreach ($kota_kabupatens as $kota)
                                        <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                {{-- end input Kabupaten/ Kota --}}
                                {{-- input nama instansi --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Instansi</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Instansi"
                                        id="instansi" name="instansi">
                                </div>
                                {{-- end input nama sekolah --}}
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Password"
                                        id="password" name="password" value="12345678" disabled>
                                </div>
                                {{-- end input nama --}}

                                {{-- button simpan --}}
                                <button type="submit" class="btn text-white col-sm-1"
                                    style="background-color: #00a65b">Simpan</button>
                                {{-- end button simpan --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- -------------------------------------------- END PENGAWAS -------------------------------------------- --}}

    {{-- --------------------------------------------- VERIFIKATOR --------------------------------------------- --}}
    <div class="card mb-5">
        <div class="card-header" style="display:flex; background-color: #fcc12d">
            <div class="col-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white active font-weight-bold" href="#data-verifikator"
                            data-toggle="tab">Verifikator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#tambah-verifikator"
                            data-toggle="tab">Tambah</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="table-responsive">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-verifikator">
                        <div class="row">
                            <div class="col">
                                @if (count($verifikators) > 0)
                                {{-- --------------------------------------------- SHOW VERIFIKATOR --------------------------------------------- --}}
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                No
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Nama
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Instansi
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Provinsi
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Email
                                            </th>
                                            <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                Aksi
                                            </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($verifikators as $verifikator)
                                        <tr>
                                            <th class="col-1 text-center" scope="row">
                                                {{ $loop->iteration }}
                                            </th>
                                            <td class="col-1 text-center nama_verifikator">
                                                {{ $verifikator->name }}
                                            </td>
                                            <td class="col-1 text-center instansi_verifikator">
                                                {{ $verifikator->instansi }}
                                            </td>
                                            <td class="col-1 text-center">
                                                {{ $verifikator->provinsi }}
                                            </td>
                                            <td class="col-1 text-center email_verifikator">
                                                {{ $verifikator->email }}
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <button type="button" class="btn " data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item tombol-edit-verifikator"
                                                                    data-toggle="modal" data-target="#modal-edit-verifikator"
                                                                    data-id="{{ $verifikator->id }}">Edit</a>
                                                                <form action="/users/{{ $verifikator->id }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="dropdown-item"
                                                                        onclick="return confirm('Apakah anda yakin akan menghapus verifikator ini?')">Hapus</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="container d-flex justify-content-center align-items-center"
                                    style="height: 10rem">
                                    <div class="alert" role="alert">
                                        Data Tidak Ditemukan
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- --------------------------------------------- CREATE VERIFIKATOR --------------------------------------------- --}}
                    <div class="chart tab-pane" id="tambah-verifikator">
                        <div class="card-body">
                            <form action="{{ route('users.store') }}" method="POST" onsubmit="myLoading()">
                                @csrf
                                <input type="hidden" name="role" value="2">
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <input type="email" class="form-control col-sm-9" placeholder="Masukan Email"
                                        id="email" name="email">
                                </div>
                                {{-- end input nama --}}
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama"
                                        id="nama" name="name">
                                </div>
                                {{-- end input nama --}}
                                {{-- input nama instansi --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Instansi</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Instansi"
                                        id="instansi" name="instansi">
                                </div>
                                {{-- end input nama sekolah --}}
                                {{-- input nama --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Password</label>
                                    <input type="text" class="form-control col-sm-9" placeholder="Masukan Password"
                                        id="password" name="password" value="12345678" disabled>
                                </div>
                                {{-- end input nama --}}

                                {{-- button simpan --}}
                                <button type="submit" class="btn text-white col-sm-1"
                                    style="background-color: #00a65b">Simpan</button>
                                {{-- end button simpan --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card-header DATA SEKOLAH-->
{{-- --------------------------------------------- END VERIFIKATOR --------------------------------------------- --}}

{{-- ---------------------------------------- UNSUR YANG DIVERIFIKASI ---------------------------------------- --}}
<div class="card mb-5">
    <div class="card-header" style="display:flex; background-color: #263238">
        <div class="col-10">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link text-white active font-weight-bold" href="#data-unsur" data-toggle="tab">Unsur
                        yang Diverifikasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="#tambah-unsur" data-toggle="tab">Tambah</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-responsive">
        <div class="card-body">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-unsur">
                    <div class="row">
                        <div class="col">
                            @if (count($unsurs) > 0)
                            {{-- ---------------------------------------- SHOW UNSUR YANG DIVERIFIKASI ---------------------------------------- --}}
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center col-1" style="background-color: #eeeeee" scope="col">
                                            No
                                        </th>
                                        <th class="text-center col-11" style="background-color: #eeeeee" scope="col">
                                            Unsur yang Diverifikasi
                                        </th>
                                        <th class="text-center col-11" style="background-color: #eeeeee" scope="col">
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- row 1 --}}
                                    @foreach ($unsurs as $unsur)
                                    <tr>
                                        <th class="text-center col-1" scope="row">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="text-center col-11 unsur-td">
                                            {{ $unsur->unsur }}
                                        </td>
                                        <td>
                                            <div class="card-body">
                                                <div class="input-group">
                                                    <div class="input-group-prepend btn-titik">
                                                        <button type="button" class="btn" data-toggle="dropdown">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" style="margin-left: -20px">
                                                            <button type="button"
                                                                class="btn btn-warning button-unsur dropdown-item"
                                                                data-toggle="modal" data-target="#edit-unsur"
                                                                data-id="{{ $unsur->id }}">Edit
                                                            </button>
                                                            <form action="/unsur-verifikasi/{{ $unsur->id }}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button type="submit"
                                                                    onclick="return confirm('apakah anda yakin akan mengahapus unsur verifikasi ini?')"
                                                                    class="dropdown-item">Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    {{-- end row 1 --}}
                                </tbody>
                            </table>
                            @else
                            <div class="container d-flex justify-content-center align-items-center"
                                style="height: 10rem">
                                <div class="alert" role="alert">
                                    Data Tidak Ditemukan
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="chart tab-pane" id="tambah-unsur">
                    <div class="card-body">

                        {{-- ---------------------------------------- CREATE UNSUR YANG DIVERIFIKASI ---------------------------------------- --}}
                        <form action="/unsur-verifikasi" method="post" onsubmit="myLoading()">
                            @csrf
                            {{-- input unsur verifikator --}}
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Unsur yang Diverifikasi</label>
                                <input type="text" class="form-control col-sm-9"
                                    placeholder="Masukan Unsur yang Diverifikasi" id="unsur" name="unsur" required>
                            </div>
                            {{-- end verifikator --}}
                            {{-- button simpan --}}
                            <button type="submit" class="btn text-white col-sm-1"
                                style="background-color: #00a65b">Simpan</button>
                            {{-- end button simpan --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-unsur">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Unsur yang diverifikasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-unsur" action="/unsur-verifikasi" method="POST" onsubmit="myLoading()">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="unsur" class="col-sm-2 col-form-label">Unsur</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-unsur" id="unsur" name="unsur"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer" style="background: none">
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
{{-- ---------------------------------------- END UNSUR YANG DIVERIFIKASI ---------------------------------------- --}}

{{-- ---------------------------------------- EDIT PENGAWAS ---------------------------------------- --}}
<div class="modal fade" id="modal-edit-pengawas">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/users" method="post" class="form-edit-pengawas" onsubmit="myLoading()">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h3 class="modal-title">Edit</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                        {{-- ---------------------------------------- NAMA PENGAWAS ---------------------------------------- --}}
                        <div class="row mt-2">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Nama</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-sm-7 input-nama-edit-pengawas"
                                placeholder="Masukan Nama Pengawas" id="nama" name="name" required>
                            </div>
                        </div>
                        
                        {{-- ---------------------------------------- INSTANSI PENGAWAS ---------------------------------------- --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Instansi</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-sm-7 input-instansi-pengawas"
                                placeholder="Masukan Nama Instansi" id="nmains" name="instansi" required>
                            </div>
                        </div>
                        
                        {{-- ---------------------------------------- KABUPATEN/KOTA PENGAWAS ---------------------------------------- --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Kabupaten / Kota</label>
                            </div>
                            <div class="col">
                                <select class="form-control col-7 selectpengawas" id="kompetensi-keahlian"
                                name="kota_kabupaten_id">
                                @foreach ($kota_kabupatens as $kota)
                                <option value="{{ $kota->id }}" class="option_kota_kabupatens">
                                    {{ $kota->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                            
                        {{-- ---------------------------------------- EMAIL PENGAWAS ---------------------------------------- --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Email</label>
                            </div>
                            <div class="col">
                                <input type="email" class="form-control col-sm-7 input-email-pengawas"
                                placeholder="Masukan Nama Email" id="nmains" name="email" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning text-white">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ---------------------------------------- END EDIT PENGAWAS ---------------------------------------- --}}

{{-- ---------------------------------------- EDIT VERIFIKATOR ---------------------------------------- --}}
<div class="modal fade" id="modal-edit-verifikator">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/users" method="post" class="form-edit-verifikator" onsubmit="myLoading()">
                @csrf
                @method('PATCH')
                <div class="modal-header">
                    <h3 class="modal-title">Edit</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        
                        {{-- ---------------------------------------- NAMA VERIFIKATOR ---------------------------------------- --}}
                        <div class="row mt-2">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Nama</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-sm-7 input-nama-edit-verifikator"
                                placeholder="Masukan Nama Verifikator" id="nama" name="name" required>
                            </div>
                        </div>
                        
                        {{-- ---------------------------------------- INSTANSI VERIFIKATOR ---------------------------------------- --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Instansi</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-sm-7 input-instansi-verifikator"
                                placeholder="Masukan Nama Instansi" id="nmains" name="instansi" required>
                            </div>
                        </div>
                            
                        {{-- ---------------------------------------- EMAIL VERIFIKATOR ---------------------------------------- --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Email</label>
                            </div>
                            <div class="col">
                                <input type="email" class="form-control col-sm-7 input-email-verifikator"
                                placeholder="Masukan Email" id="nmains" name="email" required>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-warning text-white">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- ---------------------------------------- END EDIT VERIFIKATOR ---------------------------------------- --}}



{{-- Tab Vertifikator --}}
{{-- <div class="modal fade" id="modal-edit-vertifikator">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/kekurangan-lahan/update-kekurangan" method="post">
                @csrf
                @method('PATCH')
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Vertifikator</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <input type="hidden" name="pengawas" class="pengawas">
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Nama Pengawas :</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control col-sm-7 input-nama-edit"
                                        placeholder="Masukan Nama Pengawas" id="nmapg" name="nama" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Instansi :</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-sm-7 panjang-nama-edit"
                                        placeholder="Masukan Nama Instansi" id="nmains" name="instansi" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Kabupaten / Kota :</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-sm-7 lebar-nama-edit"
                                        placeholder="Masukan Kabupaten / Kota" id="kota" name="kota" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Provinsi :</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control col-sm-7 keterangan-nama-edit"
                                        placeholder="Provinsi" id="provinsi" name="provinsi" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning text-white">Edit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div> --}}
{{-- End Tab --}}

</div>
{{-- ---------------------------------------end unsur yg diverifikasi--------------------------------------- --}}
</div>
<!-- /.container-fluid -->
@endsection

@section('tambahjs')
<script src="/js/fstdropdown.js"></script>
<script>
    setFstDropdown();

</script>
<script>
    const inputUnsur = document.querySelector('.input-unsur');
    const unsurTd = document.querySelectorAll('.unsur-td');
    const buttonUnsur = document.querySelectorAll('.button-unsur');
    const formUnsur = document.querySelector('.form-unsur');

    buttonUnsur.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputUnsur.value = '';
            inputUnsur.value = unsurTd[i].innerHTML.trim();
            formUnsur.removeAttribute('action');
            formUnsur.setAttribute('action', '/unsur-verifikasi/' + e.getAttribute('data-id'))
        })
    });

    const nama_pengawas = document.querySelectorAll('.nama_pengawas');
    const instansi_pengawas = document.querySelectorAll('.instansi_pengawas');
    const kota_kabupaten_pengawas = document.querySelectorAll('.kota_kabupaten_pengawas');
    const email_pengawas = document.querySelectorAll('.email_pengawas');
    const inputNamaEditPengawas = document.querySelector('.input-nama-edit-pengawas');
    const inputInstansiPengawas = document.querySelector('.input-instansi-pengawas');
    const option_kota_kabupatens = document.querySelectorAll('.option_kota_kabupatens');
    const inputEmailPengawas = document.querySelector('.input-email-pengawas');
    const tombolEditPengawas = document.querySelectorAll('.tombol-edit-pengawas');
    const selectpengawas = document.querySelector('.selectpengawas');
    const formEditPengawas = document.querySelector('.form-edit-pengawas');

    const nama_verifikator = document.querySelectorAll('.nama_verifikator');
    const instansi_verifikator = document.querySelectorAll('.instansi_verifikator');
    const email_verifikator = document.querySelectorAll('.email_verifikator');
    const inputNamaEditVerifikator = document.querySelector('.input-nama-edit-verifikator');
    const inputInstansiVerifikator = document.querySelector('.input-instansi-verifikator');
    const inputEmailVerifikator = document.querySelector('.input-email-verifikator');
    const tombolEditVerifikator = document.querySelectorAll('.tombol-edit-verifikator');
    const formEditVerifikator = document.querySelector('.form-edit-verifikator');

    function hapusSelected() {
        option_kota_kabupatens.forEach(element => {
            element.removeAttribute('selected');
        });
    }

    tombolEditPengawas.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputNamaEditPengawas.value = '';
            inputNamaEditPengawas.value = nama_pengawas[i].innerHTML.trim();
            inputInstansiPengawas.value = '';
            inputInstansiPengawas.value = instansi_pengawas[i].innerHTML.trim();
            inputEmailPengawas.value = '';
            inputEmailPengawas.value = email_pengawas[i].innerHTML.trim();

            hapusSelected();
            option_kota_kabupatens.forEach((el, index) => {
                console.log(el.value == kota_kabupaten_pengawas[i].getAttribute('data-kab'))
                if (el.value == kota_kabupaten_pengawas[i].getAttribute('data-kab')) {
                    el.setAttribute('selected', 'selected')
                }
            });

            formEditPengawas.removeAttribute('action');
            formEditPengawas.setAttribute('action', '/users/' + e.getAttribute('data-id'))
        })
    });
    
    tombolEditVerifikator.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputNamaEditVerifikator.value = '';
            inputNamaEditVerifikator.value = nama_verifikator[i].innerHTML.trim();
            inputInstansiVerifikator.value = '';
            inputInstansiVerifikator.value = instansi_verifikator[i].innerHTML.trim();
            inputEmailVerifikator.value = '';
            inputEmailVerifikator.value = email_verifikator[i].innerHTML.trim();
            formEditVerifikator.removeAttribute('action');
            formEditVerifikator.setAttribute('action', '/users/' + e.getAttribute('data-id'))
        })
    });

</script>
@endsection
