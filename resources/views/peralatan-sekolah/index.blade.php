@extends('myLayouts.main')

@section('container')
    {{-- @dd($peralatanOptions) --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Peralatan {{ $komli->kompetensi }}
                    </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">

        {{-- ---------------------------------------------------------------------------------------- PERATURAN PERMENDIKBUD ---------------------------------------------------------------------------------------- --}}
        <div class="card card-info">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title font-weight-bold">PERATURAN PERMENDIKBUD NO. 11 TAHUN 2020 </h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($peraturans) > 0)
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
                                @foreach ($peraturans as $peraturan)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($peraturans->currentpage() - 1) * $peraturans->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td class="text-center">{{ $peraturan->kompetensi }}</td>
                                        <td class="text-center">{{ $peraturan->nama }}</td>
                                        <td class="text-center">{{ $peraturan->rasio }} unit / Ruang Praktik</td>
                                        <td class="text-center">
                                            <div style="overflow: auto; max-height: 110px;">
                                                {{ $peraturan->deskripsi }}
                                            </div>
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
                {{-- {{ $variable->link() }} --}}
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- PERALATAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
        <div class="card">
            <div class="card-header bg-warning d-flex p-0">
                <h3 class="card-title p-3 text-white font-weight-bold">Ketersediaan Peralatan Sekolah</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn btn-tool border border-light text-white" style="margin-top: 1px" data-toggle="modal"
                            data-target="#tambah-peralatan"><i class="bi bi-plus"></i> Tambah Peralatan
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($peralatanTersedias) > 0)
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kompetensi Keahlian</th>
                                    <th>Nama Alat</th>
                                    <th>Kategori</th>
                                    <th>Ketersediaan</th>
                                    <th>Kekurangan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peralatanTersedias as $peralatanTersedia)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->kompeten->komli->kompetensi }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->peralatan_id != null ? $peralatanTersedia->peralatan->nama : $peralatanTersedia->nama }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->kategori }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->katersediaan }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->kekurangan }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $peralatanTersedia->status }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <div class="d-sm-flex justify-content-center" style="gap: 5px;">
                                                <a class="btn text-white d-inline"
                                                    href="/peralatan-tersedia/{{ $peralatanTersedia->id }}/edit"
                                                    style="background-color: #FCC12D">Edit</a>
                                                {{-- <form action=""><a class="btn text-white d-inline" style="background-color: #00a65b">Hapus</a></form> --}}
                                                <form action="/peralatan-tersedia/{{ $peralatanTersedia->id }} class="d-inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn text-white d-inline"
                                                        style="background-color: #263228"
                                                        onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Maaf tidak ada data ditemukan
                            </div>
                        </div>
                    @endif
                </div>
                {{-- {{ $variable->link() }} --}}
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL PERALATAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="tambah-peralatan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Ketersediaan Peralatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (count($peralatanOptionsTersedias) > 0)
                            
                        <form class="form-horizontal" action="/peralatan-tersedia" method="post" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="kompeten_id" value="{{ $kompeten->id }}">
                                {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group peralatan-parent">
                                            @foreach ($peralatanOptionsTersedias as $options)
                                                <input type="hidden" class="input-option-{{ $options->id }}"
                                                    data-kategori="{{ $options->kategori }}">
                                            @endforeach
                                            <select class="form-control select-peralatan" id="peralatan-select"
                                                name="peralatan_id">
                                                <option value="">Pilih Peralatan</option>
                                                @foreach ($peralatanOptionsTersedias as $options)
                                                    <option value="{{ $options->id }}">{{ $options->nama }}</option>
                                                @endforeach
                                            </select>
                                            <input type="text" class="form-control input-manual-peralatan"
                                                style="display: none" id="peralatan-text" name="nama"
                                                placeholder="Masukkan Nama Peralatan">

                                            {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <input id="peralatan-checkbox" type="checkbox">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <select name="kategori" id="" class="custom-select select-kategori" disabled>
                                            <option value="utama" class="kategori-utama">Utama</option>
                                            <option value="pendukung" class="kategori-pendukung">Pendukung</option>
                                        </select>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="ketersediaan" class="col-sm-3 col-form-label">Ketersediaan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control loading-tambah" id="ketersediaan" name="katersediaan" required>
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-3 col-form-label">Kekurangan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control loading-tambah" id="kekurangan" name="kekurangan" required>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success float-right tombol-simpan loading-simpan">Simpan</button>
                            </div>
                        </form>
                        @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                               Tidak ada peralatan ditemukan
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>



        {{-- ---------------------------------------------------------------------------------------- USUALAN PERALATAN ---------------------------------------------------------------------------------------- --}}
        <div class="card">
            <div class="card-header bg-dark d-flex p-0">
                <h3 class="card-title font-weight-bold p-3">Usulan Peralatan</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn btn-tool border border-light text-white" style="margin-top:1px" data-toggle="modal"
                            data-target="#tambah-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($usulanPeralatans) > 0)
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
                                @foreach ($usulanPeralatans as $usulanPeralatan)
                                    <tr>
                                        <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $usulanPeralatan->kompetensi }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $usulanPeralatan->peralatan_id != null ? $usulanPeralatan->nama : $usulanPeralatan->nama_peralatan }}
                                        </td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $usulanPeralatan->kategori }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            {{ $usulanPeralatan->jml }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="/storage/{{ $usulanPeralatan->proposal }}">
                                                <img src="/img/pdf.png" alt="image" style="width: 30px">
                                            </a>
                                        </td>
                                        <td>{{ $usulanPeralatan->keterangan }}</td>
                                        <td class="text-center" style="vertical-align: middle">
                                            <a href="/usulan-peralatan/{{ $usulanPeralatan->id }}/edit"
                                                class="btn btn-warning text-white mb-2" style="background-color: #FCC12D">Edit</a>

                                            <form action="/usulan-peralatan/{{ $usulanPeralatan->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn text-white" style="background-color: #263228"
                                                    type="submit"
                                                    onclick="return confirm('Apakah anda yakin akan membatalkan usulan peralatan ini?')">Batalkan</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Maaf tidak ada data ditemukan
                            </div>
                        </div>
                    @endif
                </div>
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
                        <form class="form-horizontal" action="/usulan-peralatan" method="POST"
                            enctype="multipart/form-data" onsubmit="myLoading()">
                            @csrf
                            @if (count($peralatanOptions) > 0)
                                <div class="card-body">

                                    <input type="hidden" name="kompeten_id" value="{{ $kompeten->id }}">
                                    {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                        <div class="col-sm-9">
                                            <div class="input-group peralatan-parent">

                                                @foreach ($peralatanOptions as $options)
                                                    <input type="hidden" class="input-option-{{ $options->id }}"
                                                        data-kategori="{{ $options->kategori }}">
                                                @endforeach
                                                <select class="form-control select-usulan" id="usulan-select"
                                                    name="peralatan_id">
                                                    <option value="">Pilih Peralatan</option>
                                                    @foreach ($peralatanOptions as $options)
                                                        <option value="{{ $options->id }}">
                                                            {{ $options->nama }}</option>
                                                    @endforeach
                                                </select>

                                                <input type="text" class="form-control input-manual-peralatan"
                                                    style="display: none" id="usulan-text" name="nama_peralatan"
                                                    placeholder="Masukkan Nama Peralatan">

                                                {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                                                <div class="input-group-append">
                                                    <span class="input-group-text">
                                                        <input id="usulan-checkbox" type="checkbox">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="kategori" id="" class="custom-select select-kategori" disabled>
                                                <option value="utama" class="kategori-utama">Utama</option>
                                                <option value="pendukung" class="kategori-pendukung">Pendukung</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- ---------------------------------------------------------------------------------------- JUMLAH ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control loading-tambah2" id="jumlah" name="jml">
                                        </div>
                                    </div>
                                    {{-- ---------------------------------------------------------------------------------------- PROPOSAL ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="proposal" class="col-sm-3 col-form-label">Proposal</label>
                                        <div class="col-sm-9">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input class="loading-tambah2" type="file" id="chooseFile" accept=".pdf" name="proposal"
                                                        required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success float-right tombol-simpan loading-simpan2">Simpan</button>
                                </div>
                            @else
                                <div class="container d-flex justify-content-center align-items-center"
                                    style="height: 10rem">
                                    <div class="alert" role="alert">
                                        Belum ada Peralatan ditemukan
                                    </div>
                                </div>
                            @endif

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
        // const selectUsulan = document.querySelectorAll('.select-usulan');
        const kategoriUtama = document.querySelectorAll('.kategori-utama');
        const kategoriPendukung = document.querySelectorAll('.kategori-pendukung');
        const selectKategori = document.querySelectorAll('.select-kategori');
        const inputManualPeralatan = document.querySelectorAll('.input-manual-peralatan');
        const tombolSimpan = document.querySelectorAll('.tombol-simpan');

        peralatanCheckbox.addEventListener('change', e => {
            if (e.target.checked === true) {
                console.log("Checkbox is checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "none")
                peralatanText.style.setProperty("display", "block")
                selectKategori[0].removeAttribute('disabled');
                peralatanSelect.value = '';
            }
            if (e.target.checked === false) {
                console.log("Checkbox is not checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "block")
                peralatanText.style.setProperty("display", "none")
                selectKategori[0].setAttribute('disabled', 'disabled');
                inputManualPeralatan[0].value = '';
            }
        });

        for (let i = 0; i < tombolSimpan.length; i++) {
            tombolSimpan[i].addEventListener('click', function() {
                selectKategori[i].removeAttribute('disabled');
            })
        }

        usulanCheckbox.addEventListener('change', a => {
            if (a.target.checked === true) {
                console.log("Checkbox is checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "none")
                usulanText.style.setProperty("display", "block")
                selectKategori[1].removeAttribute('disabled');
                usulanSelect.value = '';
            }
            if (a.target.checked === false) {
                console.log("Checkbox is not checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "block")
                usulanText.style.setProperty("display", "none")
                selectKategori[1].setAttribute('disabled', 'disabled');
                inputManualPeralatan[1].value = '';
            }
        });

        peralatanSelect.addEventListener('change', function() {
            if (document.querySelector('.input-option-' + peralatanSelect.value).getAttribute('data-kategori')
                .toLowerCase() == 'utama') {
                kategoriUtama[0].setAttribute('selected', 'selected');
                kategoriPendukung[0].removeAttribute('selected');
            } else {
                kategoriPendukung[0].setAttribute('selected', 'selected');
                kategoriUtama[0].removeAttribute('selected');
            }
        })

        usulanSelect.addEventListener('change', function() {
            if (document.querySelector('.input-option-' + usulanSelect.value).getAttribute('data-kategori')
                .toLowerCase() == 'utama') {
                kategoriUtama[1].setAttribute('selected', 'selected');
                kategoriPendukung[1].removeAttribute('selected');
            } else {
                kategoriPendukung[1].setAttribute('selected', 'selected');
                kategoriUtama[1].removeAttribute('selected');
            }
        })
    </script>
@endsection
