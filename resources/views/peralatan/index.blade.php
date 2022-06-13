@extends('myLayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
@endsection

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Peraturan Peralatan</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        {{-- ---------------------------------------------------------------------------------------- PERALATAN SEKOLAH ---------------------------------------------------------------------------------------- --}}
        <div class="card">
            <div class="card-header d-flex p-0" style="background-color: #25b5e9">
                <h3 class="card-title p-3 text-white font-weight-bold">Peralatan Sekolah</h3>
                <ul class="nav nav-pills ml-auto p-2">
                    <li class="nav-item pr-2">
                        <button type="button" class="btn btn-tool border border-light text-white ml-3" style="margin-top: 1px" data-toggle="modal" data-target="#tambah-peralatan"><i class="bi bi-plus"></i> Tambah Peralatan
                        </button>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if (count($peralatans) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th style="background-color: #eeeeee">No</th>
                                    <th style="background-color: #eeeeee">Kompetensi Keahlian</th>
                                    <th style="background-color: #eeeeee">Nama</th>
                                    <th style="background-color: #eeeeee">Kategori</th>
                                    <th style="background-color: #eeeeee">Rasio</th>
                                    <th style="background-color: #eeeeee">Deskripsi</th>
                                    <th style="background-color: #eeeeee">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($peralatans as $peralatan)
                                    <tr>
                                        <td class="text-center">
                                            {{ ($peralatans->currentpage() - 1) * $peralatans->perpage() + $loop->index + 1 }}
                                        </td>
                                        <td class="text-center">{{ $peralatan->kompetensi }}</td>
                                        <td class="text-center">{{ $peralatan->nama }}</td>
                                        <td class="text-center">{{ $peralatan->kategori }}</td>
                                        <td class="text-center">{{ $peralatan->rasio }} unit / Ruang Praktik</td>
                                        <td class="text-center">
                                            <div style="overflow: auto; max-height: 110px;">{{ $peralatan->deskripsi }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="/peralatan/{{ $peralatan->id }}/edit"
                                                class="btn btn-warning text-white">Edit</a>
                                            <form action="/peralatan/{{ $peralatan->id }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn text-white mt-2" style="background-color: #263238"
                                                    onclick="return confirm('Apakah anda yakin akan menghapus peralatan ini?')">Hapus</button>
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

        {{-- ---------------------------------------------------------------------------------------- MODAL PERALATAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="tambah-peralatan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Peralatan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (count($semua_jurusan) > 0)
                            <form class="form-horizontal" action="/peralatan" method="post" onsubmit="myLoading()">
                                @csrf
                                <div class="card-body">
                                    {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi
                                            Keahlian</label>
                                        <div class="col-sm-9">
                                            <select class="fstdropdown-select select-jurusan" id="select" name="komli_id">
                                                @foreach ($semua_jurusan as $jurusan)
                                                    <option value="{{ $jurusan->id }}">{{ $jurusan->kompetensi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kekurangan" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="kekurangan" name="nama" required>
                                        </div>
                                    </div>

                                    {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                        <div class="col-sm-9">
                                            <select name="kategori" id="" class="custom-select" required>
                                                <option value="utama">Utama</option>
                                                <option value="pendukung">Pendukung</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                                    <div class="form-group row">
                                        <label for="kekurangan" class="col-sm-3 col-form-label">Rasio (per ruang
                                            praktik)</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control" id="kekurangan" required
                                                name="rasio">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="kekurangan" class="col-sm-3 col-form-label">Deskripsi</label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi" required></textarea>
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
                                    Tidak ada Kopetensi Keahliaan ditemukan
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL EDIT PERALATAN ---------------------------------------------------------------------------------------- --}}
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
                                {{-- ---------------------------------------------------------------------------------------- KOMPETENSI KEAHLIAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kompetensi-keahlian" class="col-sm-3 col-form-label">Kompetensi
                                        Keahlian</label>
                                    <div class="col-sm-9">
                                        <select class="form-control" id="kompetensi-keahlian">
                                            <option value="belum" selected>Pilih Kompetensi Keahlian</option>
                                            <option value="#">Rekayasa Perangkat Lunak</option>
                                            <option value="#">Ankuntasi</option>
                                        </select>
                                    </div>
                                </div>
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
                                {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="kategori">
                                    </div>
                                </div>
                                {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-3 col-form-label">Kekurangan</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" id="kekurangan">
                                    </div>
                                </div>
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

    </div><!-- /.container-fluid -->
@endsection

@section('peralatanjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
    <script>
        // JavaScript
        const peralatanCheckbox = document.getElementById('peralatan-checkbox');
        const peralatanSelect = document.getElementById('peralatan-select');
        const peralatanText = document.getElementById('peralatan-text');
        const usulanCheckbox = document.getElementById('usulan-checkbox');
        const usulanSelect = document.getElementById('usulan-select');
        const usulanText = document.getElementById('usulan-text');

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
            }
            if (a.target.checked === false) {
                console.log("Checkbox is not checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "block")
                usulanText.style.setProperty("display", "none")
            }
        });
    </script>
@endsection
