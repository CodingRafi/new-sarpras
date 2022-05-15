{{-- @dd($logs[0]['keterangan']) --}}

@extends('mylayouts.main')

{{-- @dd($jenis_koleksi_terpilih[0]->id) --}}
{{-- @dd($semua_jurusan[0]) --}}
{{-- @dd($fotos[0][0]) --}}
{{-- @dd($kopetensikeahlians) --}}

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">

    <style>
        .nav-pills .show>.nav-link {
            background-color: transparent !important;
        }

        .dropdown-menu.show {
            top: .4rem !important;
            left: -8rem !important;
        }

        .fstdropdown>.fstlist {
            max-height: 150px !important;
        }

        .fstAll {
            display: none !important;
        }

    </style>
@endsection

@section('container')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Profil Sekolah</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-5">
            <div class="card-header bg-info">
                <ul class="nav nav-pills ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white active" href="#data-sekolah" data-toggle="tab"><i
                                class="bi bi-house-fill mr-1"></i>Data Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#edit-data-sekolah" data-toggle="tab"><i
                                class="bi bi-plus-lg mr-1"></i>Edit Data Sekolah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#foto-sekolah" data-toggle="tab"><i
                                class="bi bi-plus-lg mr-1"></i>Foto Sekolah</a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header DATA SEKOLAH-->
            <div class="card-body p-0">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-sekolah">
                        <div class="row">
                            <div class="col-lg-6">
                                <table class="table table-hover table-borderless text-nowrap">
                                    {{-- ---------------------------------------------------------------------------------------- NPSN ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>NPSN</th>
                                        <td class="text-wrap">: {{ $profil->npsn }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- NAMA SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Nama Sekolah</th>
                                        <td class="text-wrap">: {{ $profil->nama }}</td>
                                    </tr>

                                    {{-- ---------------------------------------------------------------------------------------- Kepala Sekolah---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Kepala Sekolah</th>
                                        <td class="text-wrap">:
                                            {{ $profil->nama_kepala_sekolah ?? 'Data tidak ditemukan' }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- STATUS SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Status Sekolah</th>
                                        <td class="text-wrap">: {{ $profil->status_sekolah }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- ALAMAT SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Alamat</th>
                                        <td class="text-wrap">: {{ $profil->provinsi }}, {{ $profil->kabupaten }},
                                            {{ $profil->kecamatan }}, {{ $profil->alamat }}</td>
                                    </tr>
                                    <tr>
                                        <th>Provinsi</th>
                                        <td class="text-wrap">: {{ $profil->provinsi }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kabupaten</th>
                                        <td class="text-wrap">: {{ $profil->kabupaten }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kecamatan</th>
                                        <td class="text-wrap">: {{ $profil->kecamatan }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- KOORDINAT SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Lintang</th>
                                        <td class="text-wrap">: {{ $profil->lat ?? 'Tidak ada Lintang' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bujur</th>
                                        <td class="text-wrap">: {{ $profil->long ?? 'Tidak ada Bujur' }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- EMAIL SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Email</th>
                                        <td class="text-wrap">: {{ $profil->email }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- WEBSITE SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Website</th>
                                        <td class="text-wrap">: {{ $profil->website }}</td>
                                    </tr>
                                    {{-- ---------------------------------------------------------------------------------------- NOMOR TELEPON SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                    <tr>
                                        <th>Nomor Telepon</th>
                                        <td class="text-wrap">: {{ $profil->nomor_telepon }}</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-3">
                                    {{-- ---------------------------------------------------------------------------------------- EMBED MAP ---------------------------------------------------------------------------------------- --}}
                                    <iframe
                                        src="https://www.google.com/maps?q={{ $profil->lat . ',' . $profil->long }}&hl=es;z=14&output=embed"
                                        frameborder="0" width="100%" height="300" style="border-radius: 15px;"></iframe>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="info-box shadow-none">
                                                <span class="info-box-icon"
                                                    style="background-color: rgba(37, 181, 233, 0.1)"><i
                                                        class="fa-solid fa-users text-info"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">GTK</span>
                                                    <span class="info-box-number">1,410</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="info-box shadow-none">
                                                <span class="info-box-icon"
                                                    style="background-color: rgba(0, 166, 91, 0.06)"><i
                                                        class="fa-solid fa-graduation-cap text-success"></i></span>

                                                <div class="info-box-content">
                                                    <span class="info-box-text">SISWA/I</span>
                                                    <span
                                                        class="info-box-number">{{ $profil->jml_siswa_l + $profil->jml_siswa_p }}</span>
                                                </div>
                                                <!-- /.info-box-content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="chart tab-pane" id="edit-data-sekolah">
                        {{-- ---------------------------------------------------------------------------------------- FORM PROFIL SEKOLAH ---------------------------------------------------------------------------------------- --}}
                        <form action="/profil/{{ $profil->id }}" method="POST">
                            @csrf
                            @method('put')
                            <input type="hidden" name="profil_depo_id" value="{{ $profil->id }}">

                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nama Kepala Sekolah</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Kepala Sekolah"
                                        id="kepala" name="nama_kepala_sekolah"
                                        value="{{ $profil->nama_kepala_sekolah, old('nama_kepala_sekolah') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jumlah Rombel</label>
                                    <input type="number" class="form-control col-sm-6" placeholder="Jumlah Rombel"
                                        id="jml_rombel" name="jml_rombel"
                                        value="{{ $profil->jml_rombel, old('jml_rombel') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kabupaten</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Kabupaten" id="kabupaten"
                                        name="kabupaten" value="{{ $profil->kabupaten, old('kabupaten') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Kecamatan</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Kecamatan" id="kecamatan"
                                        name="kecamatan" value="{{ $profil->kecamatan, old('kecamatan') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Alamat" id="alamat"
                                        name="alamat" value="{{ $profil->alamat, old('alamat') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Lintang</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Lintang" id="lintang"
                                        name="lat" value="{{ $profil->lat, old('lintang') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Bujur</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Bujur" id="bujur"
                                        name="long" value="{{ $profil->long, old('bujur') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Email</label>
                                    <input type="email" class="form-control col-sm-6" placeholder="Email" id="email"
                                        name="email" value="{{ $profil->email, old('email') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Website</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Website" id="website"
                                        name="website" value="{{ $profil->website, old('website') }}">
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control col-sm-6" placeholder="Nomor Telepon"
                                        id="no_telp" name="no_telp" required
                                        value="{{ $profil->nomor_telepon, old('no_telp') }}">
                                </div>
                            </div>
                            <!-- /.card-body DATA SEKOLAH-->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <div class="chart tab-pane p-3" id="foto-sekolah" style="height: 40rem;overflow: auto;">
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                            <a href="/koleksi/create/{{ $profil->id }}" class="btn btn-info" data-toggle="modal"
                                data-target="#buat-koleksi">Buat Koleksi</a>
                        </div>
                        <div class="row row-cols-2">
                            {{-- ---------------------------------------------------------------------------------------- KOLEKSI ---------------------------------------------------------------------------------------- --}}
                            @if ($koleksis->count())
                                @foreach ($koleksis as $key => $koleksi)
                                    <input type="hidden" class="slug-koleksi" value="{{ $koleksi->slug }}">
                                    <div class="col-md-6">
                                        <div class="card mb-3" style="max-width: 540px;">
                                            <div class="row no-gutters">
                                                <div class="col-md-4">
                                                    @if (count($fotos[$key]) > 0)
                                                        <img class="img-thumbnail"
                                                            src="{{ asset('storage/' . $fotos[$key][0]->filename) }}"
                                                            style="height: 140px; width: 100%; object-fit: cover;">
                                                    @else
                                                        <img class="img-thumbnail"
                                                            src="/assets/img/backgrounds/no-image.jpg"
                                                            style="height: 140px; width: 100%; object-fit: cover;">
                                                    @endif
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <a class="card-text d-block nama-koleksi"
                                                            href="/koleksi/{{ $koleksi->slug }}"
                                                            style="color: black;">{{ $koleksi->nama }}</a>
                                                        <p style="text-transform: capitalize">Kategori :
                                                            {{ str_replace('_', ' ', $jenis_koleksi_terpilih[$key]->nama) }}
                                                        </p>
                                                        @if ($jenis_koleksi_terpilih[$key]->id === 5)
                                                            <a href="/foto/create/{{ $koleksi->slug }}"
                                                                class="btn btn-primary bg-info">Tambah</a>
                                                        @endif
                                                        <button type="button"
                                                            class="btn btn-warning text-white tombol-edit-koleksi"
                                                            data-toggle="modal" data-target="#edit-koleksi">
                                                            Edit
                                                        </button>

                                                        <form action="/koleksi/{{ $koleksi->slug }}" method="post"
                                                            class="d-inline-block">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('Apakah anda yakin akan menghapus koleksi ini?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-md-12">
                                    <p class="display-5 text-center text-muted py-4">Tidak Ada Koleksi</p>
                                </div>
                            @endif



                        </div>

                        <div class="modal fade" id="edit-koleksi">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <form action="/koleksi/update-koleksi" method="post">
                                        @csrf
                                        @method('Patch')
                                        <div class="modal-header">
                                            <h4 class="modal-title">Edit Koleksi</h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <input type="hidden" name="profil_depo_id" value="{{ $profil->id }}">
                                            <input type="hidden" name="slug" class="slug-edit-koleksi">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Koleksi</label>
                                                <input type="text" class="form-control input-nama" id="nama" name="nama"
                                                    placeholder="Nama Koleksi" required>
                                            </div>

                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>


                        {{-- ---------------------------------------------------------------------------------------- FORM KOLEKSI BARU ---------------------------------------------------------------------------------------- --}}
                        <div class="modal fade" id="buat-koleksi" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Koleksi
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/koleksi" method="POST">
                                            @csrf
                                            <input type="hidden" name="profil_depo_id" value="{{ $profil->id }}">
                                            <div class="mb-3">
                                                <label for="nama" class="form-label">Nama Koleksi</label>
                                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                                    id="nama" name="nama" placeholder="Nama Koleksi" required
                                                    value="{{ old('nama') }}">
                                                @error('nama')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <select class="custom-select" name="jeniskoleksi_id">
                                                    @foreach ($jenis_koleksis as $jenis)
                                                        @if ($jenis->nama != 'lain')
                                                            <option value="{{ $jenis->id }}"
                                                                style="text-transform: capitalize;">
                                                                {{ str_replace('_', ' ', $jenis->nama) }}</option>
                                                        @endif
                                                    @endforeach
                                                    <option value="5">Lainnya</option>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.row -->

        <div class="row mb-5">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-success">
                    <span class="info-box-icon"><i class="bi bi-people-fill h1"></i></span>

                    {{-- ---------------------------------------------------------------------------------------- JUMLAH ROMBEL ---------------------------------------------------------------------------------------- --}}
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Rombel</span>
                        <span class="info-box-number h1">{{ $profil->jml_rombel ?? '0' }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-info">
                    <span class="info-box-icon"><i class="bi bi-person-badge-fill h1"></i></span>

                    {{-- ---------------------------------------------------------------------------------------- JUMLAH JURUSAN ---------------------------------------------------------------------------------------- --}}
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Jurusan</span>
                        <span class="info-box-number h1">{{ $kopetensikeahlians->count() }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-warning">
                    <span class="info-box-icon"><i class="bi bi-bookmark-star-fill text-white h1"></i></span>

                    {{-- ---------------------------------------------------------------------------------------- AKREDITASI ---------------------------------------------------------------------------------------- --}}
                    <div class="info-box-content">
                        <span class="info-box-text text-white">Kategori</span>
                        <span class="info-box-number h1 text-white">{{ $profil->akreditas }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="info-box mb-3 bg-dark">
                    <span class="info-box-icon"><i class="bi bi-person-fill h1"></i></span>

                    {{-- ---------------------------------------------------------------------------------------- JUMLAH SISWA ---------------------------------------------------------------------------------------- --}}
                    <div class="info-box-content">
                        <span class="info-box-text">Jumlah Siswa</span>
                        <span class="info-box-number h1">{{ $profil->jml_siswa_l + $profil->jml_siswa_p }}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Main row -->
        <div class="row mb-5">
            <!-- Left col -->
            <section class="col-lg-4 connectedSortable">

                <!-- Data Siswa card-->
                <div class="card">
                    <div class="card-header bg-info">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link text-white active"><i class="bi bi-person-fill mr-1"></i>Data Siswa</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body table-responsive"
                        style="max-height: 300px !important; height: 300px !important;">
                        <table class="table table-bordered table-hover">
                            <tbody>
                                {{-- ---------------------------------------------------------------------------------------- NAMA SEKOLAH ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Keterangan</th>
                                    <th>Data Terkini</th>
                                    <th>Data Dapodik</th>
                                </tr>

                                {{-- ---------------------------------------------------------------------------------------- JUMLAH SISWA LAKI-LAKI ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Laki-laki</th>
                                    <td>{{ $profil->jml_siswa_l }}</td>
                                    <td>{{ $profil_depo->depo_jml_siswa_l }}</td>
                                </tr>

                                {{-- ---------------------------------------------------------------------------------------- JUMLAH SISWA PEREMPUAN ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Perempuan</th>
                                    <td>{{ $profil->jml_siswa_p }}</td>
                                    <td>{{ $profil_depo->depo_jml_siswa_p }}</td>
                                </tr>

                                {{-- ---------------------------------------------------------------------------------------- JUMLAH TOTAL ---------------------------------------------------------------------------------------- --}}
                                <tr>
                                    <th>Jumlah</th>
                                    <td>{{ $profil->jml_siswa_l + $profil->jml_siswa_p }}</td>
                                    <td>{{ $profil_depo->depo_jml_siswa_l + $profil_depo->depo_jml_siswa_p }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>


                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- /.Left col -->
            <!-- right col (We are only adding the ID to make the widgets sortable)-->
            <section class="col-lg-4 connectedSortable">

                <!-- Kompetensi Keahlian card -->
                <div class="card">
                    <div class="card-header bg-success">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link text-white awalKopetensi active" href="#kompetensi-keahlian"
                                    data-toggle="tab"><i class="bi bi-gear-wide-connected mr-1"></i>Kompetensi
                                    Keahlian</a>
                            </li>
                            <li class="nav-item dropdown" style="position: absolute; right: 0;">
                                <a class="nav-link" data-toggle="dropdown" href="#"><i
                                        class="bi bi-three-dots-vertical text-white"></i>
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item tambahsiswa" data-toggle="tab" href="#tambah-siswa">Tambah
                                        Siswa</a>
                                    <a class="dropdown-item tambahkopetensi" data-toggle="tab"
                                        href="#tambah-jurusan">Tambah
                                        Jurusan</a>
                                </div>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body"
                        style="overflow-y: auto; max-height: 300px !important; height: 300px !important;">
                        <div class="tab-content p-0">
                            <div class="tab-pane  isikopetensi active" id="kompetensi-keahlian">
                                @if (count($kopetensikeahlians) > 0)
                                    <table class="table table-bordered table-hover">
                                        <tbody>
                                            <tr>
                                                <th>Kompetensi Keahlian</th>
                                                <th>L</th>
                                                <th>P</th>
                                                <th>Jumlah</th>
                                            </tr>

                                            @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                                                <input type="hidden" name="id_kopetensi[]"
                                                    value="{{ $kopetensikeahlian->id }}">
                                                <tr class="barisKopetensi">
                                                    <td>{{ $komli[$key]->kompetensi }}</td>
                                                    <td class="kolomJmlLk">
                                                        <span
                                                            class="span-jmlLk">{{ $kopetensikeahlian->jml_lk }}</span>
                                                        <input type="text" name="jml_lk[]" class="form-text inputJmlLk"
                                                            style="width:50px;display: none;"
                                                            value="{{ $kopetensikeahlian->jml_lk }}">
                                                    </td>
                                                    <td class="kolomJmlPr">
                                                        <span
                                                            class="span-jmlPr">{{ $kopetensikeahlian->jml_pr }}</span>
                                                        <input type="text" name="jml_pr[]" class="form-text inputJmlPr"
                                                            style="width:50px;display: none;"
                                                            value="{{ $kopetensikeahlian->jml_pr }}">
                                                    </td>
                                                    <td>{{ $kopetensikeahlian->jml_lk + $kopetensikeahlian->jml_pr }}
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                @else
                                    <div class="alert text-center text-white" role="alert" style="background: #17A2B8;">
                                        Maaf belum ada jurusan dipilih
                                    </div>
                                @endif
                            </div>
                            <div class="chart tab-pane isitambahsiswa" id="tambah-siswa">
                                @if (count($kopetensikeahlians) > 0)
                                    <form action="/kompeten/tambahsiswa/{{ $profil->id }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" name="profil_id" value="{{ $profil->id }}">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Kompetensi Keahlian</th>
                                                    <th>L</th>
                                                    <th>P</th>
                                                    <th class="th-jumlah">Jumlah</th>
                                                </tr>

                                                @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                                                    <input type="hidden" name="id_kopetensi[]"
                                                        value="{{ $kopetensikeahlian->id }}">
                                                    <tr class="barisKopetensi">
                                                        <td>{{ $komli[$key]->kompetensi }}</td>
                                                        <td class="kolomJmlLk">
                                                            <span
                                                                class="span-jmlLk">{{ $kopetensikeahlian->jml_lk }}</span>
                                                            <input type="text" name="jml_lk[]" class="form-text inputJmlLk"
                                                                style="width:60px;display: none;"
                                                                value="{{ $kopetensikeahlian->jml_lk }}">
                                                        </td>
                                                        <td class="kolomJmlPr">
                                                            <span
                                                                class="span-jmlPr">{{ $kopetensikeahlian->jml_pr }}</span>
                                                            <input type="text" name="jml_pr[]" class="form-text inputJmlPr"
                                                                style="width:60px;display: none;"
                                                                value="{{ $kopetensikeahlian->jml_pr }}">
                                                        </td>
                                                        <td class="td-jumlah">
                                                            {{ $kopetensikeahlian->jml_lk + $kopetensikeahlian->jml_pr }}
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                        <div class="buttonSubmit">
                                            <button class="btn btn-success">Apply</button>
                                        </div>
                                    </form>
                                @else
                                    <div class="alert text-center text-white" role="alert" style="background: #17A2B8;">
                                        Maaf belum ada jurusan dipilih
                                    </div>
                                @endif
                            </div>
                            <div class="chart tab-pane isitambahkopetensi" id="tambah-jurusan">
                                <form style=" {{ count($kopetensikeahlians) > 0 ? 'height: 10rem;' : 'height: 18rem;' }}"
                                    action="/kompeten" method="POST">
                                    @csrf
                                    <input type="hidden" name="profil_id" value="{{ $profil->id }}">
                                    <div class="card-body p-0 ">
                                        <div class="form-group">
                                            <label>Tambah Jurusan</label>

                                            <select class="fstdropdown-select select-jurusan" id="select" multiple
                                                name="jurusanTerpilih[]">
                                                @foreach ($semua_jurusan as $jurusan)
                                                    <option value="{{ $jurusan->id }}">{{ $jurusan->kompetensi }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer p-0 mt-3" style="background: none;">
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                    </div>
                                </form>

                                @if (count($kopetensikeahlians) > 0)
                                    <table class="table table-bordered text-center">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Nama Jurusan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $komli[$key]->kompetensi }}</td>
                                                    <td>
                                                        <form action="/kompeten/{{ $kopetensikeahlian->id }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="btn btn-danger"
                                                                onclick="return confirm('Apakah anda yakin akan menghapus jurusan ini?')">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif

                            </div>
                        </div>

                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
            <!-- right col -->
            <section class="col-lg-4 connectedSortable">

                <!-- Log Pengguna card -->
                <div class="card">
                    <div class="card-header bg-secondary">
                        <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link text-white active"><i class="bi bi-card-heading mr-1"></i>Log
                                    Pengguna</a>
                            </li>
                        </ul>
                    </div><!-- /.card-header -->
                    <div class="card-body"
                        style="overflow-y: auto; max-height: 300px !important;height: 300px !important;">
                        <div class="tab-content p-0">
                            <div class="tab-pane active">
                                @foreach ($logs as $log)
                                    <div class="callout callout-info">
                                        <p>{{ $log['keterangan'] }}</p>
                                        <small>Pengubah : {{ $log['name'] }}<br>{{ $log['created_at'] }}</small>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->

            </section>
        </div>
        <!-- /.row (main row) -->

        <!-- Riwayat Update Data card -->
        <div class="card">
            <div class="card-header bg-secondary">
                <h3 class="card-title">
                    <i class="nav-icon bi bi-alarm-fill mr-1"></i>
                    Rekap
                </h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Kondisi</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>Lahan</td>
                            <td>Tanah 1</td>
                            <td>SHM</td>
                            <td>Ideal</td>
                            <td>
                                <div class="btn btn-success">Detail</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div>
    </div><!-- /.container-fluid -->




    <!-- Content -->

    {{-- <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <a href="/profil/{{ $profil->id }}/edit" class="btn btn-warning">Edit Profil</a>
            <h6>NPSN: {{ $profil->npsn }}</h6>
            <h6>Sekolah Id: {{ $profil->sekolah_id }}</h6>
            <h6>Nama: {{ $profil->nama }}</h6>
            <h6>Status Sekolah: {{ $profil->status_sekolah }}</h6>
            <h6>Alamat: {{ $profil->alamat }}</h6>
            <h6>Provinsi: {{ $profil->provinsi }}</h6>
            <h6>Kabupaten: {{ $profil->kabupaten }}</h6>
            <h6>Kecamatan: {{ $profil->kecamatan }}</h6>
            <h6>Email: {{ $profil->email }}</h6>
            <h6>Website: {{ $profil->website }}</h6>
            <h6>No Telp: {{ $profil->nomor_telepon }}</h6>
            <h6>No Fax:{{ $profil->nomor_fax }}</h6>

            <br>
            <a href="/kompeten/create/{{ $profil->id }}">Tambah Kompetensi</a>
            <a href="/kompeten/tambahsiswa/{{ $profil->id }}">Tambah Siswa</a>
            @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                <h6>Kopetensi Keahlian {{ $key + 1 }}</h6>
                <form action="/kompeten" class="d-inline" method="POST">
                    @method("delete")
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin?')">Delete</button>
                </form>
                <h6>Nama Kopetensi : {{ $komli[$key]->kompetensi }}</h6>
                <h6>Jumlah Laki Laki : {{ $kopetensikeahlian->jml_lk }}</h6>
                <h6>Jumlah Perempuan : {{ $kopetensikeahlian->jml_pr }}</h6>
                <br>
            @endforeach

            <h6>Latitude : {{ $profil->lat }}</h6>
            <h6>Longtitude : {{ $profil->long }}</h6>
            <h6>Jumlah Rombel : {{ $profil->jml_rombel ?? 0 }}</h6>

            @foreach ($koleksis as $koleksi)
                <br>
                <a href="/koleksi/{{ $koleksi->slug }}/edit">Edit</a>
                <p>{{ $koleksi->id }}</p>
                <form action="/koleksi/{{ $koleksi->slug }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit">Delete</button>
                </form>
                <a href="/koleksi/{{ $koleksi->slug }}">{{ $koleksi->nama }}</a>
                <br>
            @endforeach

            <h6>Akreditasi: {{ $profil->akreditas }}</h6>
            <h6>Jumlah Siswa Laki Laki: {{ $profil->jml_siswa_l }}</h6>
            <h6>Jumlah Siswa Perempuan: {{ $profil->jml_siswa_p }}</h6>
            <br>



            <br>

            <br>
            <a href="/koleksi/create/{{ $profil->id }}" class="btn btn-primary">Buat Koleksi</a>

            <br>
        </div>

    </div> --}}
    <!-- / Content -->

    <div class="content-backdrop fade"></div>
@endsection

@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
    <script>
        const barisKopetensi = document.querySelectorAll('.barisKopetensi');
        const kolomJmlLk = document.querySelectorAll('.kolomJmlLk');
        const kolomJmlPr = document.querySelectorAll('.kolomJmlPr');
        const spanJmlLk = document.querySelectorAll('.span-jmlLk');
        const spanJmlPr = document.querySelectorAll('.span-jmlPr');
        const inputJmlLk = document.querySelectorAll('.inputJmlLk');
        const inputJmlPr = document.querySelectorAll('.inputJmlPr');
        const thJumlah = document.querySelector('.th-jumlah');
        const tdJumlah = document.querySelectorAll('.td-jumlah');

        // tombol
        const buttonTambahSiswa = document.querySelector('.tambahsiswa');
        const awalKopetensi = document.querySelector('.awalKopetensi');
        const tambahkopetensi = document.querySelector('.tambahkopetensi');

        // isi
        const isikopetensi = document.querySelector('.isikopetensi');
        const isitambahsiswa = document.querySelector('.isitambahsiswa');
        const isitambahkopetensi = document.querySelector('.isitambahkopetensi');

        buttonTambahSiswa.addEventListener('click', function() {
            barisKopetensi.forEach((e, i) => {
                inputJmlLk[i].style.display = 'block';
                inputJmlPr[i].style.display = 'block';
                spanJmlLk[i].style.display = 'none';
                spanJmlPr[i].style.display = 'none';
                thJumlah.style.display = 'none';
                tdJumlah.forEach(e => {
                    e.style.display = 'none';
                })
            });
            isitambahsiswa.classList.add('active');
            isikopetensi.classList.remove('active');
            isitambahkopetensi.classList.remove('active');
            awalKopetensi.classList.remove('active');
        })

        awalKopetensi.addEventListener('click', function() {
            barisKopetensi.forEach((e, i) => {
                inputJmlLk[i].style.display = 'none';
                inputJmlPr[i].style.display = 'none';
                spanJmlLk[i].style.display = 'block';
                spanJmlPr[i].style.display = 'block';
                thJumlah.style.display = 'block';
                tdJumlah.forEach(e => {
                    e.style.display = 'block';
                })
            })
            isikopetensi.classList.add('active');
            awalKopetensi.classList.add('active');
            isitambahkopetensi.classList.remove('active');
            isitambahsiswa.classList.remove('active');
        })

        tambahkopetensi.addEventListener('click', function() {
            isitambahsiswa.classList.remove('active');
            isikopetensi.classList.remove('active');
            awalKopetensi.classList.remove('active');
            isitambahkopetensi.classList.add('active');
        })


        // search tambah jurusan
        const selectjurusan = document.querySelector('.select-jurusan');

        selectjurusan.addEventListener('change', function() {
            console.log(selectjurusan.value)
        })


        // koleksi
        const tombolEditKoleksi = document.querySelectorAll('.tombol-edit-koleksi');
        const namaKoleksi = document.querySelectorAll('.nama-koleksi');
        const inputNama = document.querySelector('.input-nama');
        const slugKoleksi = document.querySelectorAll('.slug-koleksi');
        const slugEditKoleksi = document.querySelector('.slug-edit-koleksi');

        tombolEditKoleksi.forEach((e, i) => {
            e.addEventListener('click', function() {
                inputNama.value = '';
                inputNama.value = namaKoleksi[i].innerHTML;
                slugEditKoleksi.value = '';
                slugEditKoleksi.value = slugKoleksi[i].value
            })
        })
    </script>
@endsection
