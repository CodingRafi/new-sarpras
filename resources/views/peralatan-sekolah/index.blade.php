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
                <h3 class="card-title">PERATURAN PERMENDIKBUD NO. 11 TAHUN 2020 </h3>
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
                <h3 class="card-title p-3 text-white">Ketersediaan Peralatan Sekolah</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal"
                            data-target="#tambah-peralatan"><i class="bi bi-plus"></i> Tambah Peralatan
                        </button>
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
                                    <button type="button" class="btn text-white d-inline" style="background-color: #25b5e9"
                                        data-toggle="modal" data-target="#edit">Edit</button>
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
                        <h4 class="modal-title">Tambah Ketersediaan Peralatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/peralatan-tersedia" method="post">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="kompetensi" value="{{ $kompeten->id }}">
                                {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="nama-peralatan" class="col-sm-3 col-form-label">Nama Peralatan</label>
                                    <div class="col-sm-9">
                                        <div class="input-group peralatan-parent">

                                            <select class="form-control" id="peralatan-select" name="">
                                                @foreach ($peralatanOptions as $options)
                                                    <option value="{{ $options->id }}">{{ $options->nama }}</option>
                                                @endforeach
                                            </select>

                                            <input type="text" class="form-control" style="display: none"
                                                id="peralatan-text">

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
                        <h4 class="modal-title">Edit Ketersediaan Peralatan Sekolah</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal">
                            <div class="card-body">
                                {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi
                                        Keahlian</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="kompetensi-keahlian">
                                            @foreach ($peralatanOptions as $options)
                                                <option value="{{ $options->id }}">{{ $options->nama }}</option>
                                            @endforeach
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

                                            <input type="text" class="form-control" style="display: none"
                                                id="peralatan-text">

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
                <h3 class="card-title p-3">Usulan Peralatan</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn text-white" style="background-color: #00a65b" data-toggle="modal"
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
                                            class="btn btn-warning">Edit</a>

                                        <form action="/usulan-peralatan/{{ $usulanPeralatan->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button class="btn text-white" style="background-color: #00a65b" type="submit" onclick="return confirm('Apakah anda yakin akan membatalkan usulan peralatan ini?')">Batalkan</button>
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
                            enctype="multipart/form-data">
                            @csrf
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
                                                style="display: none" id="usulan-text" name="nama_peralatan" placeholder="Masukkan Nama Peralatan">

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
                                        <select name="kategori" id="" class="custom-select select-kategori" disabled>
                                            <option value="utama" class="kategori-utama">Utama</option>
                                            <option value="pendukung" class="kategori-pendukung">Pendukung</option>
                                        </select>
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- JUMLAH ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="jumlah" name="jml">
                                    </div>
                                </div>
                                <hr>
                                {{-- ---------------------------------------------------------------------------------------- PROPOSAL ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="proposal" class="col-sm-3 col-form-label">Proposal</label>
                                    <div class="col-sm-9">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" id="chooseFile" accept=".pdf" name="proposal" required>
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
        const selectUsulan = document.querySelector('.select-usulan');
        const kategoriUtama = document.querySelector('.kategori-utama');
        const kategoriPendukung = document.querySelector('.kategori-pendukung');
        const selectKategori = document.querySelector('.select-kategori');
        const inputManualPeralatan = document.querySelector('.input-manual-peralatan');

        peralatanCheckbox.addEventListener('change', e => {
            if (e.target.checked === true) {
                console.log("Checkbox is checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "none")
                peralatanText.style.setProperty("display", "block")
            }
            if (e.target.checked === false) {
                console.log("Checkbox is not checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "block")
                peralatanText.style.setProperty("display", "none")
            }
        });

        usulanCheckbox.addEventListener('change', a => {
            if (a.target.checked === true) {
                console.log("Checkbox is checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "none")
                usulanText.style.setProperty("display", "block")
                selectKategori.removeAttribute('disabled');
                selectUsulan.value = '';
            }
            if (a.target.checked === false) {
                console.log("Checkbox is not checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "block")
                usulanText.style.setProperty("display", "none")
                selectKategori.setAttribute('disabled', 'disabled');
                inputManualPeralatan.value = '';
            }
        });

        selectUsulan.addEventListener('change', function() {
            if (document.querySelector('.input-option-' + selectUsulan.value).getAttribute('data-kategori')
                .toLowerCase() == 'utama') {
                kategoriUtama.setAttribute('selected', 'selected');
                kategoriPendukung.removeAttribute('selected');
            } else {
                kategoriPendukung.setAttribute('selected', 'selected');
                kategoriUtama.removeAttribute('selected');
            }
        })
    </script>
@endsection
