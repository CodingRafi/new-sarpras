@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .input-group-prepend button i {
            position: absolute;
            left: 35px;
        }

    </style>
@endsection

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Rehab/ Renov</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    {{-- --------------------------------------------- info box ------------------------------------------------ --}}
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color:#25b5e9; width: auto; min-width: 300px;">
            <img src="/assets/img/icons/flaticons/town.png"
                style="filter: invert(100%); object-fit: cover; width: 80px; aspect-ratio: 1/1;">
            <div class="ml-4">
                <span class="text-white" style="font-size: 25px">
                    Kondisi Ideal
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">30</h1>
                    <p class="text-white" style="font-size: 15px">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka, Ruang guru
                juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
                peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
                rapat.</p>
        </div>
    </div>
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color:#fcc12d; width: auto; min-width: 300px;">
            <img src="/assets/img/icons/flaticons/building.png"
                style="filter: invert(100%); object-fit: cover; width: 80px; aspect-ratio: 1/1;">
            <div class="ml-4">
                <span class="text-white" style="font-size: 25px">
                    Ketersediaan
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">11</h1>
                    <p class="text-white" style="font-size: 15px">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka, Ruang guru
                juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
                peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
                rapat.</p>
        </div>
    </div>
    <div class="info-box p-0 pimpinan-infobox">
        <span class="info-box-icon p-4" style="background-color:#263238; width: auto; min-width: 300px;">
            <img src="/assets/img/icons/flaticons/school.png"
                style="filter: invert(100%); object-fit: cover; width: 80px; aspect-ratio: 1/1;">
            <div class="ml-4">
                <span class="text-white" style="font-size: 25px">
                    Kekurangan
                </span>
                <div class="d-flex align-items-end justify-content-center">
                    <h1 class="display-4 text-white">3</h1>
                    <p class="text-white" style="font-size: 15px">/ Kantor</p>
                </div>
            </div>
        </span>
        <div class="info-box-content">
            <label>Keterangan:</label>
            <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka, Ruang guru
                juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
                peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
                rapat.</p>
        </div>
    </div>

    {{-- --------------------------------------------- end inf box --------------------------------------------- --}}

    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title text-white">Ruang Pimpinan Tersedia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-jenis-pimpinan"><i class="bi bi-plus"></i> Tambah Jenis Pimpinan
                </button>
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-tersedia"><i class="bi bi-plus"></i> Tambah Ketersediaan Ruang Pimpinan
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            @if (count($datas) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th style="vertical-align: middle;">No</th>
                            <th style="vertical-align: middle;">Jenis Ruang</th>
                            <th style="vertical-align: middle;">Nama</th>
                            <th style="vertical-align: middle;">Luas</th>
                            <th style="vertical-align: middle;">Panjang</th>
                            <th style="vertical-align: middle;">Lebar</th>
                            <th style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                            <tr>
                                <input type="hidden" class="id_pimpinan" value="{{ $data['id'] }}">
                                <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}</td>
                                <td class="text-center jenis" style="vertical-align: middle"
                                    data-id="{{ $data['id_jenis'] }}">{{ $data['jenis'] }}</td>
                                <td class="text-center nama" style="vertical-align: middle">{{ $data['nama'] }}</td>
                                <td class="text-center luas" style="vertical-align: middle">{{ $data['luas'] }}</td>
                                <td class="text-center panjang" style="vertical-align: middle">{{ $data['panjang'] }}
                                </td>
                                <td class="text-center lebar" style="vertical-align: middle">{{ $data['lebar'] }}</td>
                                <td>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu" style="margin-left: -73px">
                                                    <button type="button" class="btn btn-tool tombol-edit-ketersediaan"
                                                        data-toggle="modal" data-target="#edit-tersedia"><i
                                                            class="bi bi-plus"></i>Edit
                                                    </button>
                                                    <form action="/bangunan/pimpinan/{{ $data['id'] }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm('Apakah anda yakin akan manghapus ketersediaan ruang pimpinan ini?')">Hapus</button>
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
                <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                    <div class="alert" role="alert">
                        Data Tidak Ditemukan
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-jenis-pimpinan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/jenis-pimpinan" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jumlah-lahan" class="col-sm-2 col-form-label">Nama Ruang</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="jumlah-lahan" name="nama" required>
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
    <div class="modal fade" id="tambah-tersedia">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Ketersediaan Ruang Pimpinan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/bangunan/pimpinan" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="jumlah-lahan" class="col-sm-2 col-form-label">Jenis Ruang</label>
                                <div class="col-sm-10">
                                    <select name="jenis_pimpinan_id" id="" required class="custom-select">
                                        @foreach ($jenis_pimpinans as $data)
                                            <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Nama Bangunan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="luas-lahan" name="nama" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Panjang Lahan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="luas-lahan" name="panjang" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Lebar Lahan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="luas-lahan" name="lebar" required>
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
    <div class="modal fade" id="edit-tersedia">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Ketersediaan Ruang Pimpinan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/bangunan/pimpinan" method="POST">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <input type="hidden" name="id_pimpinan" class="id_pimpinan_input">
                                <label for="jumlah-lahan" class="col-sm-2 col-form-label">Jenis Ruang</label>
                                <div class="col-sm-10">
                                    <select name="jenis_pimpinan_id" id="" required class="custom-select">
                                        @foreach ($jenis_pimpinans as $data)
                                            <option value="{{ $data->id }}" class="option-jenis">
                                                {{ $data->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Nama Bangunan</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-nama" id="luas-lahan" name="nama"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Panjang Lahan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-panjang" id="luas-lahan" name="panjang"
                                        required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Lebar Lahan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-lebar" id="luas-lahan" name="lebar"
                                        required>
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

    {{-- --------------------------------------- USULAN LAB KOMPUTER --------------------------------------- --}}
    <div class="card card-info">
        <div class="card-header" style="background-color: #fcc12d">
            <h3 class="card-title">Usulan Lab Komputer</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body table-responsive">
            @if (count($usulans) > 0)
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2" style="vertical-align: middle;">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Jenis Ruang</th>
                            <th rowspan="2" style="vertical-align: middle;">Jumlah Ruang</th>
                            <th colspan="2">Ketersedian Lahan</th>
                            <th rowspan="2" style="vertical-align: middle;">Proposal</th>
                            <th rowspan="2" style="vertical-align: middle;">Keterangan</th>
                            <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                        </tr>
                        <tr class="text-center">
                            <th>Gambar Lahan</th>
                            <th>Luas Lahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulans as $key => $usulan)
                            <tr>
                                <th class="text-center">{{ $loop->iteration }}</th>
                                <td class="text-center text-capitalize">{{ $usulanJenis[$key]->nama }}
                                </td>
                                <td class="text-center">{{ $usulan->jml_ruang }}</td>
                                <td class="text-center">{{ $usulan->luas_lahan }} M</td>
                                <td class="text-center" style="vertical-align: middle">
                                    @foreach ($usulanFotos[$key] as $ke => $foto)
                                        <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                            data-fancybox="gallery{{ $key }}">
                                            <img src="{{ asset('storage/' . $foto->nama) }}" class="rounded"
                                                style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                        </a>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                        <img src="/img/pdf.png" alt="image" style="width: 30px">
                                    </a>
                                </td>
                                <td class="text-center">{{ $usulan->keterangan }}</td>
                                <td class="text-center">
                                    <a href="/bangunan/usulan-ruang-pimpinan/{{ $usulan->id }}/edit"
                                        class="btn btn-warning text-white">Edit</a>

                                    <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                        @csrf
                                        @method('delete')

                                        <button type="submit" class="btn text-white" style="background-color: #00a65b"
                                            onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>

                                    </form>
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

    {{-- ------------------------------------------- MODAL USULAN ------------------------------------------ --}}
    <div class="modal fade" id="tambah-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/usulan-ruang-pimpinan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="jumlah-lahan" class="col-sm-4 col-form-label">Jenis Ruang</label>
                            <div class="col-sm-7">
                                <select name="jenis_pimpinan_id" id="" required class="custom-select">
                                    @foreach ($jenis_pimpinans as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Jumlah Ruangan"
                                id="jumlah-ruangan" name="jml_ruang" required>
                        </div>
                        {{-- end input jumlah ruangan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Luas Lahan (M)</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Luas Lahan"
                                id="luas-lahan" name="luas_lahan" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- upload gambar lokasi --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
                            <input type="file" id="gambar-lahan" required multiple accept="image/*" name="gambar[]">
                        </div>
                        {{-- end upload gambar lokasi --}}
                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                            <input type="file" id="proposal" required accept=".pdf" name="proposal">
                        </div>
                        {{-- end upload proposal --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    <div class="card">
        <div class="card-header" style="background-color: #263238">
            <h3 class="card-title text-white pt-2">Rencana Rehab/ Renov</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-rencana-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="col">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    @if (count($rehabs) > 0)
                                        <table class="table table-bordered table-hover mt-3">
                                            {{-- judul table --}}
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="line-height: 170px">No
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="line-height: 170px">Jenis
                                                        Usulan</th>
                                                    <th colspan="2" class="text-center" style="line-height: 70px">
                                                        Tingkat
                                                        Kerusakan</th>
                                                    <th colspan="3" class="text-center" style="line-height: 70px">Objek
                                                        Rehab/ Renov
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="line-height: 170px">
                                                        Proposal
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="line-height: 170px">
                                                        Keterangan</th>
                                                    <th rowspan="2" class="text-center" style="line-height: 170px">Aksi
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="line-height: 70px">Persentase</th>
                                                    <th class="text-center" style="line-height: 70px">Usia</th>
                                                    <th class="text-center" style="line-height: 70px">Objek</th>
                                                    <th class="text-center" style="line-height: 70px">Luas Lahan</th>
                                                    <th class="text-center" style="line-height: 70px">Gambar</th>
                                                </tr>
                                            </thead>
                                            {{-- end judul table --}}
                                            {{-- isi table --}}
                                            <tbody>
                                                @foreach ($rehabs as $key => $rehab)
                                                    <tr>
                                                        <th class="text-center">{{ $loop->iteration }}</th>
                                                        <td class="text-center">
                                                            {{ str_replace('_', ' ', $rehab->jenis) }}
                                                        </td>
                                                        <td class="text-center">{{ $rehab->persentase }}%</td>
                                                        <td class="text-center">{{ $rehab->usia }} Tahun</td>
                                                        <td class="text-center">{{ $rehab->objek }}</td>
                                                        <td class="text-center">{{ $rehab->luas_lahan }} m²</td>
                                                        <td class="text-center" style="vertical-align: middle">
                                                            @foreach ($usulanFotos[$key] as $ke => $foto)
                                                                @if ($foto != null)
                                                                    <a href="{{ asset('storage/' . $foto->nama) }}"
                                                                        class="fancybox"
                                                                        data-fancybox="gallery{{ $key }}">
                                                                        <img src="{{ asset('storage/' . $foto->nama) }}"
                                                                            class="rounded"
                                                                            style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('storage/' . $rehab->proposal) }}"
                                                                target="_blank">
                                                                <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                            </a>
                                                        </td>
                                                        <td>{{ $rehab->keterangan }}</td>
                                                        <td>
                                                            <div class="card-body">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <button type="button" class="btn"
                                                                            data-toggle="dropdown">
                                                                            <i class="bi bi-three-dots-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            style="margin-left: -73px">
                                                                            <a href="/bangunan/ruang-rehabrenov/{{ $rehab->id }}/edit"
                                                                                class="dropdown-item">Edit</a>
                                                                            <form
                                                                                action="/bangunan/ruang-rehabrenov/{{ $rehab->id }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="dropdown-item"
                                                                                    onclick="return confirm('Apakah anda yakin akan menghapus rehab/renov ini?')">Batalkan</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            {{-- end isi table --}}
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Main-Content --}}

    {{-- modal tambah usulan --}}
    <div class="modal fade" id="modal-rencana-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/ruang-rehabrenov" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan Rencana Rehab/ Renov</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jenis Usulan</label>
                            <select name="jenis" id="" class="custom-select col-sm-7" required>
                                <option value="ruang_kelas">Ruang Kelas</option>
                                <option value="ruang_praktek">Ruang Praktek</option>
                                <option value="lab_komputer">Lab Komputer</option>
                                <option value="perpustakaan">Perpustakaan</option>
                                <option value="toilet">Toilet</option>
                                <option value="kantor">Kantor</option>
                                <option value="ruang_guru">Ruang Guru</option>
                            </select>
                        </div>
                        {{-- end input jumlah ruangan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Persentase (%)</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Persentase Kerusakan"
                                id="persentase" name="persentase" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Usia</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Usia" id="usia"
                                name="usia" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Objek</label>
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Objek" id="objek"
                                name="objek" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Luas Lahan (M)</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Luas" id="luas"
                                name="luas_lahan" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input Keterangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan</label>
                            <textarea id="" rows="5" class="form-control col-sm-7" name="keterangan" placeholder="Keterangan" required></textarea>
                        </div>
                        {{-- end Keterangan --}}

                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar</label>
                            <input type="file" id="proposal" name="gambar[]" multiple accept="image/*" required>
                        </div>
                        {{-- end upload proposal --}}

                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                            <input type="file" id="proposal" name="proposal" accept=".pdf" required>
                        </div>
                        {{-- end upload proposal --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- end modal tambah usulan --}}

    <div class="content-backdrop fade"></div>
@endsection
