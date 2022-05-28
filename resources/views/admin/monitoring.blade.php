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
    <!-- Small boxes (Stat box) -->

    {{------------------------------------------------ pengawas ------------------------------------------------}}
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
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
                    <div class="chart tab-pane" id="tambah-pengawas">
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
    {{---------------------------------------------- end pengawas ----------------------------------------------}}

    {{----------------------------------------------- verifikator -----------------------------------------------}}
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
        <!-- /.card-header DATA SEKOLAH-->
        <div class="table-responsive">
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-verifikator">
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
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
    {{--------------------------------------------- end verifikator ---------------------------------------------}}

    {{------------------------------------------ unsur yg diverifikasi ------------------------------------------}}
    <div class="card mb-5">
        <div class="card-header" style="display:flex; background-color: #263238">
            <div class="col-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white active font-weight-bold" href="#data-unsur"
                            data-toggle="tab">Unsur yang Diverifikasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#tambah-unsur"
                            data-toggle="tab">Tambah</a>
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
                                            <th class="text-center col-11" style="background-color: #eeeeee"
                                                scope="col">
                                                Unsur yang Diverifikasi
                                            </th>
                                            <th class="text-center col-11" style="background-color: #eeeeee"
                                                scope="col">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- row 1 --}}
                                        <tr>
                                            <th class="text-center col-1" scope="row">
                                                1
                                            </th>
                                            <td class="text-center col-11">
                                                Standar persyaratan peralatan utama
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend btn-titik">
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                            <th class="text-center col-1" scope="row">
                                                2
                                            </th>
                                            <td class="text-center col-11">
                                                Standar persyaratan peralatan pendukung
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend btn-titik">
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
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
                                            <th class="text-center col-1" scope="row">
                                                3
                                            </th>
                                            <td class="text-center col-11">
                                                Standar persyaratan tempat/ ruang
                                            </td>
                                            <td>
                                                <div class="card-body">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend btn-titik">
                                                            <button type="button" class="btn" data-toggle="dropdown">
                                                                <i class="bi bi-three-dots-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" style="margin-left: -20px">
                                                                <a class="dropdown-item" href="">Edit</a>
                                                                <a class="dropdown-item" href="">Hapus</a>
                                                            </div>
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
                    <div class="chart tab-pane" id="tambah-unsur">
                        <div class="card-body">
                            <form action="/usulan-lahan" method="post" enctype="multipart/form-data">
                                {{-- input unsur verifikator --}}
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Unsur yang Diverifikasi</label>
                                    <input type="text" class="form-control col-sm-9"
                                        placeholder="Masukan Unsur yang Diverifikasi" id="verifikator"
                                        name="verifikator" required>
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
    </div>
    {{-----------------------------------------end unsur yg diverifikasi-----------------------------------------}}
</div>
<!-- /.container-fluid -->

@endsection
