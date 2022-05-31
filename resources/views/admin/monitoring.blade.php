@extends('mylayouts.main')

@section('tambahcss')
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

    </style>
@endsection

@section('container')
    <div class="container-fluid mt-3">
        {{-- ---------------------------------------------- pengawas ---------------------------------------------- --}}
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
                                                    Aksi
                                                </th>
                                        </thead>
                                        <tbody>
                                            {{-- row 1 --}}
                                            <tr>
                                                <th class="col-1 text-center" scope="row">
                                                    1
                                                </th>
                                                <td class="col-1 text-center">
                                                    ADE ROMLAH
                                                </td>
                                                <td class="col-1 text-center">
                                                    -
                                                </td>
                                                <td class="col-1 text-center">
                                                    Kab. Kuningan
                                                </td>
                                                <td class="col-1 text-center">
                                                    Jawa Barat
                                                </td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -20px">
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#modal-edit">Edit</a>
                                                                    <a class="dropdown-item" href="">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- end row 1 --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="tambah-pengawas">
                            <div class="card-body">
                                <form action="/create-pengawas" method="post">
                                    {{-- input nama --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama"
                                            id="nama" name="nama" required>
                                    </div>
                                    {{-- end input nama --}}
                                    {{-- input nama instansi --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Instansi</label>
                                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Instansi"
                                            id="instansi" name="instansi" required>
                                    </div>
                                    {{-- end input nama sekolah --}}

                                    {{-- input Kabupaten/ Kota --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
                                        <select class="form-control col-9" id="kompetensi-keahlian">
                                            <option value="belum" selected>Bandung</option>
                                            <option value="#">Bogor</option>
                                            <option value="#">Jakarta</option>
                                        </select>
                                    </div>
                                    {{-- end input Kabupaten/ Kota --}}
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
        {{-- -------------------------------------------- end pengawas -------------------------------------------- --}}

        {{-- --------------------------------------------- verifikator --------------------------------------------- --}}
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
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    No
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    Nama
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    Instansi
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    Kabupaten/ Kota
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    Provinsi
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee"
                                                    scope="col">
                                                    Aksi
                                                </th>
                                        </thead>
                                        <tbody>
                                            {{-- row 1 --}}
                                            <tr>
                                                <th class="col-1 text-center" scope="row">
                                                    1
                                                </th>
                                                <td class="col-1 text-center">
                                                    ADE ROMLAH
                                                </td>
                                                <td class="col-1 text-center">
                                                    -
                                                </td>
                                                <td class="col-1 text-center">
                                                    Kab. Kuningan
                                                </td>
                                                <td class="col-1 text-center">
                                                    Jawa Barat
                                                </td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -20px">
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#modal-edit-vertifikator">Edit</a>
                                                                    <a class="dropdown-item" href="">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- end row 1 --}}
                                            {{-- row 2 --}}
                                            <tr>
                                                <th class="col-1 text-center" scope="row">
                                                    2
                                                </th>
                                                <td class="col-1 text-center">
                                                    AGUS HERMAWAN, S.PD M.SI
                                                </td>
                                                <td class="col-1 text-center">
                                                    Cabang Dinas Pendidikan Wilayah XI
                                                </td>
                                                <td class="col-1 text-center">
                                                    Kab. Majalengka
                                                </td>
                                                <td class="col-1 text-center">
                                                    Jawa Barat
                                                </td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -20px">
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#modal-edit-vertifikator">Edit</a>
                                                                    <a class="dropdown-item" href="">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            {{-- end row 2 --}}
                                            {{-- row 3 --}}
                                            <tr>
                                                <th class="col-1 text-center" scope="row">
                                                    3
                                                </th>
                                                <td class="col-1 text-center">
                                                    ASEP SUHENDI, S.PD, MM
                                                </td>
                                                <td class="col-1 text-center">
                                                    Cadisdik Wi.X Jawa Barat
                                                </td>
                                                <td class="col-1 text-center">
                                                    Cirebon
                                                </td>
                                                <td class="col-1 text-center">
                                                    Jawa Barat
                                                </td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -20px">
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#modal-edit-vertifikator">Edit</a>
                                                                    <a class="dropdown-item" href="">Hapus</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </td>
                                            </tr>
                                            {{-- end row 3 --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="chart tab-pane" id="tambah-verifikator">
                            <div class="card-body">
                                <form action="/usulan-lahan" method="post" enctype="multipart/form-data">
                                    {{-- input nama --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama</label>
                                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama"
                                            id="nama" name="nama" required>
                                    </div>
                                    {{-- end input nama --}}
                                    {{-- input nama instansi --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Instansi</label>
                                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Instansi"
                                            id="instansi" name="instansi" required>
                                    </div>
                                    {{-- end input nama sekolah --}}
                                    {{-- input Kabupaten/ Kota --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kabupaten/ Kota</label>
                                        <select class="form-control col-9" id="kompetensi-keahlian">
                                            <option value="belum" selected>Bandung</option>
                                            <option value="#">Bogor</option>
                                            <option value="#">Jakarta</option>
                                        </select>
                                    </div>
                                    {{-- end input Kabupaten/ Kota --}}
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
    {{-- ------------------------------------------- end verifikator ------------------------------------------- --}}

    {{-- ---------------------------------------- unsur yg diverifikasi ---------------------------------------- --}}
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
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -20px">
                                                                    <button type="button"
                                                                        class="btn btn-warning button-unsur dropdown-item"
                                                                        data-toggle="modal" data-target="#edit-unsur"
                                                                        data-id="{{ $unsur->id }}">Edit
                                                                    </button>
                                                                    <form action="/unsur-verifikasi" method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit"
                                                                            onclick="return confirm('apakah anda yakin akan mengahapus unsur verifikasi ini?')">Hapus</button>
                                                                    </form>
                                                                    <a class="dropdown-item" href="">Hapus</a>
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
                            </div>
                        </div>
                    </div>
                    <div class="chart tab-pane" id="tambah-unsur">
                        <div class="card-body">
                            <form action="/unsur-verifikasi" method="post">
                                @csrf
                                {{-- input unsur verifikator --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unsur yang Diverifikasi</label>
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
                        <form class="form-horizontal form-unsur" action="/unsur-verifikasi" method="POST">
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
    {{-- ---------------------------------------end unsur yg diverifikasi--------------------------------------- --}}
    </div>

    {{-- Tab Pengawas --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/kekurangan-lahan/update-kekurangan" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h3 class="modal-title">Edit Pengawas</h3>
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
    </div>
    {{-- End Tab --}}



    {{-- Tab Vertifikator --}}
    <div class="modal fade" id="modal-edit-vertifikator">
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
    </div>
    {{-- End Tab --}}

    </div>
    {{-- ---------------------------------------end unsur yg diverifikasi--------------------------------------- --}}
    </div>
    <!-- /.container-fluid -->
@endsection

@section('tambahjs')
    <script>
        const inputUnsur = document.querySelector('.input-unsur');
        const unsurTd = document.querySelectorAll('.unsur-td');
        const buttonUnsur = document.querySelectorAll('.button-unsur');
        const formUnsur = document.querySelector('.form-unsur');

        buttonUnsur.forEach((e, i) => {
            e.addEventListener('click', function() {
                inputUnsur.value = '';
                inputUnsur.value = unsurTd[i].innerHTML.trim();
                formUnsur.removeAttribute('action');
                formUnsur.setAttribute('action', '/unsur-verifikasi/' + e.getAttribute('data-id'))
            })
        });
    </script>
@endsection
