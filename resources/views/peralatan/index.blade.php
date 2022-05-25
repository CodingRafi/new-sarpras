@extends('myLayouts.main')

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Peralatan (nama jurusan)</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">

    {{-- ---------------------------------------------------------------------------------------- PERATURAN PERMENDIKBUD ----------------------------------------------------------------------------------------  --}}
    <div class="card card-info">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title font-weight-bold">PERATURAN PERMENDIKBUD NO. 11 TAHUN 2020 </h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Jenis</th>
                            <th>Rasio</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td class="text-center">Rekayasa Perangkat Lunak</td>
                            <td class="text-center">Access Point Indoor</td>
                            <td class="text-center">18 unit / Ruang Praktik</td>
                            <td class="text-center"><div style="overflow: auto; max-height: 110px;">
                                Alat untuk menghubungkan antar PC menggunakan gelombang radio (dalam suatu ruangan).
                                    Connectivity : 802.11 n/g/b wireless Operating Modes : Access Point (AP), WDS with AP,
                                    WDS/Bridge (No AP Broadcast), Wireless Client VLAN/SSID Support
                            </div></td>
                        </tr>
                        <tr>
                            <td class="text-center">2</td>
                            <td class="text-center">Rekayasa Perangkat Lunak</td>
                            <td class="text-center">Access Point Outdoor</td>
                            <td class="text-center">18 unit / Ruang Praktik</td>
                            <td class="text-center"><div style="overflow: auto; max-height: 110px;">
                                Alat untuk menghubungkan antar PC menggunakan gelombang radio (jarak jauh antar gedung).Connectivity : 802.11 n/g/b wireless Operating Modes : AP, WDS, WDS
                                    with AP, Wireless Client
                                    VLAN/SSID Support
                            </div></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- PERALATAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
    <div class="card">
        <div class="card-header bg-warning d-flex p-0">
            <h3 class="card-title p-3 text-white font-weight-bold">Peralatan Sekolah</h3>
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item pr-2">
                    <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#tambah-peralatan"><i
                            class="bi bi-plus"></i> Tambah Peralatan
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                        Filter by... <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" style="min-width: auto !important; width: 95px;">
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terbaru</a>
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Alphabet</a>
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terlama</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Kompetensi Keahlian</th>
                            <th>Jenis Alat</th>
                            <th>Kategori</th>
                            <th>Ketersediaan</th>
                            <th>Kekurangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center" style="vertical-align: middle">1</td>
                            <td class="text-center" style="vertical-align: middle">Rekayasa Perangkat Lunak</td>
                            <td class="text-center" style="vertical-align: middle">Access Point</td>
                            <td class="text-center" style="vertical-align: middle">Utama</td>
                            <td class="text-center" style="vertical-align: middle">4</td>
                            <td class="text-center" style="vertical-align: middle">5</td>
                            <td class="text-center" style="vertical-align: middle">Kekurangan</td>
                            <td class="text-center" style="vertical-align: middle">
                                <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9" data-toggle="modal" data-target="#edit">Edit</button>
                                <button class="btn text-white d-inline" style="background-color: #00a65b">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- MODAL PERALATAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-peralatan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Tambah Peralatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="card-body">
                            {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kompetensi-keahlian">
                                        <option value="belum" selected>Pilih Kompetensi Keahlian</option>
                                        <option value="#">Rekayasa Perangkat Lunak</option>
                                        <option value="#">Ankuntasi</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                <div class="col-sm-9">
                                    <div class="input-group peralatan-parent">
                                        
                                        <select class="form-control" id="peralatan-select">
                                            <option value="belum" selected>Pilih Peralatan</option>
                                            <option value="#">Access Point Indoor</option>
                                            <option value="#">Access Point Outdoor</option>
                                        </select>

                                        <input type="text" class="form-control" style="display: none" id="peralatan-text">

                                        {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <input id="peralatan-checkbox" type="checkbox">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-3 col-form-label">Kekurangan</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="kekurangan">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="ketersediaan" class="col-sm-3 col-form-label">Ketersediaan</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="ketersediaan">
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

    {{-- ---------------------------------------------------------------------------------------- MODAL EDIT PERALATAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold">Edit Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="card-body">
                            {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kompetensi-keahlian">
                                        <option value="belum" selected>Pilih Kompetensi Keahlian</option>
                                        <option value="#">Rekayasa Perangkat Lunak</option>
                                        <option value="#">Ankuntasi</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                <div class="col-sm-9">
                                    <div class="input-group peralatan-parent">
                                        
                                        <select class="form-control" id="peralatan-select">
                                            <option value="belum" selected>Pilih Peralatan</option>
                                            <option value="#">Access Point Indoor</option>
                                            <option value="#">Access Point Outdoor</option>
                                        </select>

                                        <input type="text" class="form-control" style="display: none" id="peralatan-text">

                                        {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <input id="peralatan-checkbox" type="checkbox">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kekurangan" class="col-sm-3 col-form-label">Kekurangan</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="kekurangan">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="ketersediaan" class="col-sm-3 col-form-label">Ketersediaan</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="ketersediaan">
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

    {{-- ---------------------------------------------------------------------------------------- USUALAN PERALATAN ---------------------------------------------------------------------------------------- --}}
    <div class="card">
        <div class="card-header bg-dark d-flex p-0">
            <h3 class="card-title p-3 font-weight-bold">Usulan Peralatan</h3>
            <ul class="nav nav-pills ml-auto p-2">
                <li class="nav-item pr-2">
                    <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal" data-target="#tambah-usulan"><i
                            class="bi bi-plus"></i> Tambah Usulan
                    </button>
                </li>
                <li class="nav-item dropdown">
                    <a class="btn btn-light dropdown-toggle" data-toggle="dropdown" href="#">
                        Filter by... <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" style="min-width: auto !important; width: 95px;">
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terbaru</a>
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Alphabet</a>
                        <a class="dropdown-item text-truncate" tabindex="-1" href="#">Terlama</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Kompetensi Keahlian</th>
                        <th>Nama Peralatan</th>
                        <th>Kategori</th>
                        <th>Jumlah Usulan</th>
                        <th>Proposal</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center" style="vertical-align: middle">1</td>
                        <td class="text-center" style="vertical-align: middle">Rekayasa Perangkat Lunak</td>
                        <td class="text-center" style="vertical-align: middle">Access Point</td>
                        <td class="text-center" style="vertical-align: middle">Utama</td>
                        <td class="text-center" style="vertical-align: middle">10</td>
                        <td class="text-center" style="vertical-align: middle"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                        <td></td>
                        <td class="text-center" style="vertical-align: middle"><button class="btn text-white" style="background-color: #00a65b">Batalkan</button></td>
                    </tr>
                </tbody>
            </table>
            {{-- {{ $variable->link() }} --}}
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal">
                        <div class="card-body">
                            {{-- ---------------------------------------------------------------------------------------- KOPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi Keahlian</label>
                                <div class="col-sm-9">
                                    <select class="form-control" id="kompetensi-keahlian2">
                                        <option value="belum" selected>Pilih Kompetensi Keahlian</option>
                                        <option value="#">Rekayasa Perangkat Lunak</option>
                                        <option value="#">Ankuntasi</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                <div class="col-sm-9">
                                    <div class="input-group peralatan-parent">
                                        
                                        <select class="form-control" id="usulan-select">
                                            <option value="belum" selected>Pilih Peralatan</option>
                                            <option value="#">Access Point Indoor</option>
                                            <option value="#">Access Point Outdoor</option>
                                        </select>

                                        <input type="text" class="form-control" style="display: none" id="usulan-text">

                                        {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <input id="usulan-checkbox" type="checkbox">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kategori">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- JUMLAH ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="jumlah">
                                </div>
                            </div>
                            <hr>
                            {{-- ---------------------------------------------------------------------------------------- PROPOSAL ---------------------------------------------------------------------------------------- --}}
                            <div class="form-group row">
                                <label for="proposal" class="col-sm-3 col-form-label">Proposal</label>
                                <div class="col-sm-9">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="proposal">
                                            <label class="custom-file-label" for="proposal">Pilih Proposal</label>
                                        </div>
                                    </div>
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

</div><!-- /.container-fluid -->
@endsection

@section('peralatanjs')
    <script>
        // JavaScript
        const peralatanCheckbox = document.getElementById('peralatan-checkbox');
        const peralatanSelect = document.getElementById('peralatan-select');
        const peralatanText = document.getElementById('peralatan-text');
        const usulanCheckbox = document.getElementById('usulan-checkbox');
        const usulanSelect = document.getElementById('usulan-select');
        const usulanText = document.getElementById('usulan-text');

        peralatanCheckbox.addEventListener('change', e => {
        if(e.target.checked === true) {
            console.log("Checkbox is checked - boolean value: ", e.target.checked)
            peralatanSelect.style.setProperty("display", "none")
            peralatanText.style.setProperty("display", "block")
        }
        if(e.target.checked === false) {
            console.log("Checkbox is not checked - boolean value: ", e.target.checked)
            peralatanSelect.style.setProperty("display", "block")
            peralatanText.style.setProperty("display", "none")
        }
        });

        usulanCheckbox.addEventListener('change', a => {
        if(a.target.checked === true) {
            console.log("Checkbox is checked - boolean value: ", a.target.checked)
            usulanSelect.style.setProperty("display", "none")
            usulanText.style.setProperty("display", "block")
        }
        if(a.target.checked === false) {
            console.log("Checkbox is not checked - boolean value: ", a.target.checked)
            usulanSelect.style.setProperty("display", "block")
            usulanText.style.setProperty("display", "none")
        }
        });
    </script>
@endsection