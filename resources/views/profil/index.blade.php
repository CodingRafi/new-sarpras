@extends('mylayouts.main')

@section('container')

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
                    <a class="nav-link text-white" href="#input-data-sekolah" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-1"></i>Input Data Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#foto-sekolah" data-toggle="tab"><i
                            class="bi bi-plus-lg mr-1"></i>Foto Sekolah</a>
                </li>
            </ul>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body table-responsive p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-sekolah">
                    <table class="table table-hover table-borderless text-nowrap">
                        {{------------------------------------------------------------------------------------------ NPSN ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>NPSN</th>
                            <td>: {{ $profil->npsn }}</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ NAMA SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Nama Sekolah</th>
                            <td>: {{ $profil->nama }}</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ ALAMAT SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Alamat</th>
                            <td>: {{ $profil->alamat }}</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ KOORDINAT SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Koordinat</th>
                            <td>: -</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ EMAIL SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Email</th>
                            <td>: {{ $profil->email }}</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ WEBSITE SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Website</th>
                            <td>: {{ $profil->website }}</td>
                        </tr>

                        {{------------------------------------------------------------------------------------------ NOMOR TELEPON SEKOLAH ------------------------------------------------------------------------------------------}}
                        <tr>
                            <th>Nomor Telepon</th>
                            <td>: {{ $profil->nomor_telepon }}</td>
                        </tr>
                    </table>
                </div>
                <div class="chart tab-pane" id="input-data-sekolah">
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">NPSN</label>
                                <input type="number" class="form-control col-sm-6" placeholder="Input NPSN">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                                <input type="text" class="form-control col-sm-6" placeholder="Input Sekolah">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <input type="text" class="form-control col-sm-6" placeholder="Input Alamat">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Koordinat</label>
                                <input type="text" class="form-control col-sm-6" placeholder="Input Koordinat">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Email</label>
                                <input type="email" class="form-control col-sm-6" placeholder="Input Email">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Website</label>
                                <input type="text" class="form-control col-sm-6" placeholder="Input Website">
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                                <input type="text" class="form-control col-sm-6" placeholder="Input No. Telp">
                            </div>
                        </div>
                        <!-- /.card-body DATA SEKOLAH-->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="chart tab-pane" id="foto-sekolah">
                    <form role="form">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputFile">Tampak Depan Sekolah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tampak Kiri Sekolah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tampak Kanan Sekolah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Tampak Dalam Sekolah</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input">
                                        <label class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

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
                <span class="info-box-icon"><i class="bi bi-people-fill"></i></span>

                {{------------------------------------------------------------------------------------------ JUMLAH ROMBEL ------------------------------------------------------------------------------------------}}
                <div class="info-box-content">
                    <span class="info-box-text">Jumlah Rombel</span>
                    <span class="info-box-number h1">25</span>
                </div>
                <!-- /.info-box-content -->
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="bi bi-person-badge-fill"></i></span>

                {{------------------------------------------------------------------------------------------ JUMLAH JURUSAN ------------------------------------------------------------------------------------------}}
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
                <span class="info-box-icon"><i class="bi bi-bookmark-star-fill text-white"></i></span>

                {{------------------------------------------------------------------------------------------ AKREDITASI ------------------------------------------------------------------------------------------}}
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
                <span class="info-box-icon"><i class="bi bi-person-fill"></i></span>

                {{------------------------------------------------------------------------------------------ JUMLAH SISWA ------------------------------------------------------------------------------------------}}
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
        <section class="col-lg-6 connectedSortable">

            <!-- Data Siswa card-->
            <div class="card">
                <div class="card-header bg-info">
                    <!-- <h3 class="card-title">
              <i class="nav-icon bi bi-person-fill mr-1"></i>
              Data Siswa
            </h3> -->
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="#data-siswa" data-toggle="tab"><i
                                    class="bi bi-person-fill mr-1"></i>Data Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#input-data-siswa" data-toggle="tab"><i
                                    class="bi bi-plus-lg mr-1"></i>Input Data Siswa</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="data-siswa">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    {{------------------------------------------------------------------------------------------ NAMA SEKOLAH ------------------------------------------------------------------------------------------}}
                                    <tr>
                                        <th>Nama Sekolah</th>
                                        <td>{{ $profil->nama }}</td>
                                    </tr>

                                    {{------------------------------------------------------------------------------------------ JUMLAH SISWA LAKI-LAKI ------------------------------------------------------------------------------------------}}
                                    <tr>
                                        <th>Laki-laki</th>
                                        <td>{{ $profil->jml_siswa_l }}</td>
                                    </tr>

                                    {{------------------------------------------------------------------------------------------ JUMLAH SISWA PEREMPUAN ------------------------------------------------------------------------------------------}}
                                    <tr>
                                        <th>Perempuan</th>
                                        <td>{{ $profil->jml_siswa_p }}</td>
                                    </tr>

                                    {{------------------------------------------------------------------------------------------ JUMLAH SISWA KELUAR ------------------------------------------------------------------------------------------}}
                                    <tr>
                                        <th>Keluar</th>
                                        <td>0</td>
                                    </tr>
                                </tbody>

                                {{------------------------------------------------------------------------------------------ TOTAL SISWA ------------------------------------------------------------------------------------------}}
                                <tr>
                                    <th>Total</th>
                                    <td>{{ $profil->jml_siswa_l + $profil->jml_siswa_p }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="chart tab-pane" id="input-data-siswa">
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                                        <input type="text" class="form-control col-sm-6" placeholder="Input Sekolah">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Laki-laki</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Laki-laki">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Perempuan</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Perempuan">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Keluar</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Keluar">
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-6 connectedSortable">

            <!-- Update Data Siswa card -->
            <div class="card">
                <div class="card-header bg-success">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link text-white active" href="#kompetensi-keahlian" data-toggle="tab"><i
                                    class="bi bi-gear-wide-connected mr-1"></i>Kompetensi Keahlian</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="#input-kk" data-toggle="tab"><i
                                    class="bi bi-plus-lg mr-1"></i>Input KK</a>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <div class="tab-pane active" id="kompetensi-keahlian">
                            <table class="table table-bordered table-hover">
                                <tbody>
                                    <tr>
                                        <th>Kompetensi Keahlian</th>
                                        <th>L</th>
                                        <th>P</th>
                                        <th>Jumlah</th>
                                    </tr>

                                    @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                                    <tr>
                                        {{------------------------------------------------------------------------------------------ NAMA KOMPETENSI KEAHLIAN ------------------------------------------------------------------------------------------}}
                                        <td>{{ $kompetens[$key]->nama }}</td>

                                        {{------------------------------------------------------------------------------------------ JUMLAH LAKI-LAKI KK ------------------------------------------------------------------------------------------}}
                                        <td>{{ $kopetensikeahlian->jml_lk }}</td>

                                        {{------------------------------------------------------------------------------------------ JUMLAH PEREMPAUN KK ------------------------------------------------------------------------------------------}}
                                        <td>{{ $kopetensikeahlian->jml_pr }}</td>

                                        {{------------------------------------------------------------------------------------------ TOTAL SISWA KK ------------------------------------------------------------------------------------------}}
                                        <td>{{ $kopetensikeahlian->jml_lk + $kopetensikeahlian->jml_pr }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="chart tab-pane" id="input-kk">
                            <form role="form">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Kompetensi Keahlian</label>
                                        <input type="text" class="form-control col-sm-6" placeholder="Input KK">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Laki-laki</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Laki-laki">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Perempuan</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Perempuan">
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Keluar</label>
                                        <input type="number" class="form-control col-sm-6"
                                            placeholder="Input Jml Keluar">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

    <!-- Riwayat Update Data card -->
    <div class="card">
        <div class="card-header bg-secondary">
            <h3 class="card-title">
                <i class="nav-icon bi bi-alarm-fill mr-1"></i>
                Riwayat Update Data
            </h3>
        </div><!-- /.card-header -->
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Update</th>
                        <th>Tanggal Selesai</th>
                        <th>Durasi</th>
                        <th>Log Update</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>2022-04-06 13:01:12</td>
                        <td>2022-04-06 13:05:12</td>
                        <td>4 Menit</td>
                        <td>Foto Sekolah/Bagian Depan</td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.card-body -->
    </div>
</div><!-- /.container-fluid -->




<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <a href="/profil/{{ $profil->id }}/edit" class="btn btn-warning">Edit Profil</a>
        <h6>NPSN: {{ $profil->npsn }}</h6> {{-- Sudah --}}
        <h6>Sekolah Id: {{ $profil->sekolah_id }}</h6>
        <h6>Nama: {{ $profil->nama }}</h6> {{-- Sudah --}}
        <h6>Status Sekolah: {{ $profil->status_sekolah }}</h6>
        <h6>Alamat: {{ $profil->alamat }}</h6> {{-- Sudah --}}
        <h6>Provinsi: {{ $profil->provinsi }}</h6>
        <h6>Kabupaten: {{ $profil->kabupaten }}</h6>
        <h6>Kecamatan: {{ $profil->kecamatan }}</h6>
        <h6>Email: {{ $profil->email }}</h6> {{-- Sudah --}}
        <h6>Website: {{ $profil->website }}</h6> {{-- Sudah --}}
        <h6>No Telp: {{ $profil->nomor_telepon }}</h6> {{-- Sudah --}}
        <h6>No Fax:{{ $profil->nomor_fax }}</h6>
        @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
        <br>
        <h6>Kopetensi Keahlian {{ $key + 1 }}</h6>
        <a href="/kopetensi/{{ $kopetensikeahlian->id }}/edit" class="badge bg-warning border-0" style="width: 20%">Ubah
            Kompetensi {{ $kopetensikeahlian->nama }}</a>
        <form action="/kopetensi/{{ $kopetensikeahlian->id }}" class="d-inline" method="POST">
            @method("delete")
            @csrf
            <button class="badge bg-danger border-0" onclick="return confirm('Yakin?')">Delete</button>
        </form>
        <h6>Nama Kopetensi : {{ $kopetensikeahlian->nama }}</h6> {{-- Sudah --}}
        <h6>Jumlah Laki Laki : {{ $kopetensikeahlian->jml_lk }}</h6> {{-- Sudah --}}
        <h6>Jumlah Perempuan : {{ $kopetensikeahlian->jml_pr }}</h6> {{-- Sudah --}}
        <br>
        @endforeach

        <h6>Latitude : {{ $profil->lat }}</h6>
        <h6>Longtitude : {{ $profil->long }}</h6>
        <h6>Jumlah Rombel : {{ $profil->jml_rombel ?? 0 }}</h6>

        @foreach ($koleksis as $koleksi)
        <br>
        <a href="/koleksi/{{ $koleksi->slug }}/edit">Edit</a>
        <form action="/koleksi/{{ $koleksi->slug }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
        <a href="/koleksi/{{ $koleksi->slug }}">{{ $koleksi->nama }}</a>
        <br>
        @endforeach

        <h6>Akreditasi: {{ $profil->akreditas }}</h6> {{-- Sudah --}}
        <h6>Jumlah Siswa Laki Laki: {{ $profil->jml_siswa_l }}</h6> {{-- Sudah --}}
        <h6>Jumlah Siswa Perempuan: {{ $profil->jml_siswa_p }}</h6> {{-- Sudah --}}
        <br>
        <a href="/kompeten/create/{{ $profil->id }}">Tambah Kompetensi</a>
        <p>Kompetensi yang tersedia:</p>
        @foreach ($kompetens as $key => $kompeten)

        <a href="/kompeten/{{ $kompeten->id }}/edit">Edit Kompeten</a>
        <form action="/kompeten/{{ $kompeten->id }}" method="POST">
            @csrf
            @method('delete')
            <button type="submit">Delete</button>
        </form>
        <p>{{ $key + 1 }}. {{ $kompeten->nama }}</p> {{-- Sudah --}}

        @endforeach

        <br>

        <a href="/kopetensi/create/{{ $profil->id }}" class="btn btn-primary">Tambah Jumlah Data Siswa Kopetensi</a>

        <br>
        <a href="/koleksi/create/{{ $profil->id }}" class="btn btn-primary">Buat Koleksi</a>

        <br>
    </div>

</div>
<!-- / Content -->
<div class="content-backdrop fade"></div>
@endsection
