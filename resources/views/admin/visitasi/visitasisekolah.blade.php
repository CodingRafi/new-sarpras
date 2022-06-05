@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
    <style>
        /* .row-data .col-3 {
                                                                                        max-width: 15.5rem !important;
                                                                                    } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

        .input-group-prepend button i {
            position: absolute;
            margin-top: -25px;
        }

        .fstdiv {
            max-width: 75%;
        }

    </style>
@endsection

@section('container')

    <!-- title -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Visitasi Sekolah
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-5">
            <div class="card-header" style="display:flex; background-color: #25b5e9">
                <div class="col-10">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link text-white active font-weight-bold" href="#data-usulan-sekolah"
                                data-toggle="tab">Vasilitasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white font-weight-bold" href="#tambah-usulan-lahan"
                                data-toggle="tab">Tambah</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.card-header DATA SEKOLAH-->
            <div class="card-body p-0">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-usulan-sekolah">
                        <div class="row">
                            <div class="col">
                                @if (count($visitasis) > 0)
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    No
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Nama
                                                    Varifikator</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Nama
                                                    Sekolah</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Keperluan</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Surat Tugas</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Tanggal Visitasi</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($visitasis as $visitasi)
                                                {{-- row 1 --}}
                                                <tr>
                                                    <th class="col-1 text-center" scope="row">
                                                        {{ ($visitasis->currentpage() - 1) * $visitasis->perpage() + $loop->index + 1 }}
                                                    </th>
                                                    <td class="col-1 text-center">{{ $visitasi->nama_verifikator }}</td>
                                                    <td class="col-1 text-center">{{ $visitasi->nama_sekolah }}</td>
                                                    <td class="col-1 text-center">{{ $visitasi->keperluan }}</td>
                                                    <td class="col-1 text-center">
                                                        <a href="{{ asset('storage/' . $visitasi->surat_tugas) }}"
                                                            target="_blank">
                                                            <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                        </a>
                                                    </td>
                                                    <td class="col-1 text-center">{{ $visitasi->tanggal_visitasi }}</td>
                                                    <td class="col-1 text-center">
                                                        <a class="btn text-white" style="background-color: #00a65b"
                                                            href="{{ ($visitasi->status == 'proses_visitasi') ? 'visitasi/' . $visitasi->id . '/edit' : '#' }}"
                                                            {{ $visitasi->status == 'proses_visitasi' ? 'disabled' : '' }}>Edit</a>
                                                        <form action="/visitasi/{{ $visitasi->id }}" method="post"
                                                            style="display: inline-block">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Apakah anda yakin akan menghapus visitasi ini?')"
                                                                {{ $visitasi->status == 'proses_visitasi' ? '' : 'disabled' }}>Hapus</button>
                                                        </form>
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
                                            Tidak ada {{ count($verifikators) > 0 ? 'sekolah' : 'verifikator' }}
                                            ditemukan
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="chart tab-pane" id="tambah-usulan-lahan">
                        <div class="card-body">
                            @if (count($verifikators) > 0 && count($profils) > 0)
                                <form action="/visitasi" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- input nama verifikator --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Verifikator</label>
                                        <select class="fstdropdown-select select-jurusan" id="select" name="user_id">
                                            @foreach ($verifikators as $verifikator)
                                                <option value="{{ $verifikator->id }}">{{ $verifikator->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- end input nama verifikator --}}

                                    {{-- input nama sekolah --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                                        <select class="fstdropdown-select select-jurusan" id="select" name="profil_id">
                                            @foreach ($profils as $profil)
                                                <option value="{{ $profil->id }}">{{ $profil->nama }}
                                                    ({{ $profil->alamat }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- end input nama sekolah --}}

                                    {{-- input keperluan --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Keperluan</label>
                                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Keperluan"
                                            id="keperluan" name="keperluan" required>
                                    </div>
                                    {{-- end input keperluan --}}

                                    {{-- input nama tanggal visitasi --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Tanggal Visitasi</label>
                                        <input type="date" class="form-control col-sm-9"
                                            placeholder="Masukan Tanggal Visitasi" id="visitasi" name="tanggal_visitasi"
                                            required>
                                    </div>
                                    {{-- end input nama tanggal visitasi --}}

                                    {{-- upload file(pdf) --}}
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label pt-1" for="customFile">Surat Tugas</label>
                                        <input type="file" id="chooseFile" accept=".pdf" name="surat_tugas" required>
                                    </div>
                                    {{-- end upload file(pdf) --}}

                                    {{-- button simpan --}}
                                    <button type="submit" class="btn text-white col-sm-1"
                                        style="background-color: #00a65b">Simpan</button>
                                    {{-- end button simpan --}}
                                </form>
                            @else
                                <div class="container d-flex justify-content-center align-items-center"
                                    style="height: 10rem">
                                    <div class="alert" role="alert">
                                        Tidak ada data ditemukan
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection

@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
@endsection
