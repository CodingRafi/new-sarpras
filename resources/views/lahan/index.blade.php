@extends('mylayouts.main')

@section('tambahcss')
<style>
    /* .row-data .col-3 {
        max-width: 15.5rem !important;
    } */

    .card-header h4 {
        font-size: 1.2rem !important
    }

</style>
@endsection

@section('container')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Lahan Sekolah/ Ketersediaan Lahan
                    Sekolah</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


{{-- Main-Content --}}

{{------------------------------------------------------ Row ------------------------------------------------------}}
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-success" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Luas Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>

        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header" style="background-color: #25b5e9; border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center text-white font-weight-bold">Jenis Kepemilikan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">SHM</h1>
                </div><!-- /.card-body -->
            </div>
        </div>

        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-warning" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center text-white font-weight-bold">Ketersedian Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>

        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header bg-dark" style="border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Kekurangan Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">40m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>

        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header" style="background-color: #e0e0e0; border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Jumlah Usulan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
</div>
{{----------------------------------------------------- End -------------------------------------------------------}}


{{------------------------------------------------- Lahan Sekolah -----------------------------------------------}}
<div class="card mt-3 mb-5">
    <div class="card-header" style="background-color: #25b5e9">
        <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white active font-weight-bold" href="#data-lahan-sekolah" data-toggle="tab">
                    <i class="bi bi-house-fill mr-1"></i>Lahan Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="#tambah-usulan-lahan" data-toggle="tab">
                    <i class="bi bi-plus-lg mr-1"></i>Tambah Usulan Lahan</a>
            </li>
        </ul>
    </div>
    <!-- /.card-header DATA SEKOLAH-->
    <div class="card-body p-0">
        <div class="tab-content p-0">
            <div class="tab-pane active" id="data-lahan-sekolah">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover table-border text-nowrap">
                            {{-- judul table --}}
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lahan</th>
                                    <th scope="col">No Sertifikat</th>
                                    <th scope="col">Panjang(m)</th>
                                    <th scope="col">Lebar(m)</th>
                                    <th scope="col">Luas Lahan(m)</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kepemilikan</th>
                                    <th scope="col">Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            {{-- end judul table --}}

                            {{-- isi table --}}
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tanah</td>
                                    <td>123456</td>
                                    <td>35m²</td>
                                    <td>85m²</td>
                                    <td>120m²</td>
                                    <td>Bandung</td>
                                    <td>PDF</td>
                                    <td>Butuh Pembelian Lahan</td>
                                    <td>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="margin-left: -56px">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Hapus</a>
                                                        <a class="dropdown-item" href="#">Lihat Dokumen</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Kelas</td>
                                    <td>1234567</td>
                                    <td>40m²</td>
                                    <td>85m²</td>
                                    <td>120m²</td>
                                    <td>Bandung</td>
                                    <td>Sewa</td>
                                    <td>Tidak Butuh Pembelian Lahan</td>
                                    <td>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="margin-left: -56px">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Hapus</a>
                                                        <a class="dropdown-item" href="#">Lihat Dokumen</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Tanah</td>
                                    <td>12345678</td>
                                    <td>45m²</td>
                                    <td>85m²</td>
                                    <td>120m²</td>
                                    <td>Bandung</td>
                                    <td>SHM</td>
                                    <td>Tidak Butuh Pembelian Lahan</td>
                                    <td>
                                        <div class="card-body">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <button type="button" class="btn" data-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" style="margin-left: -56px">
                                                        <a class="dropdown-item" href="#">Edit</a>
                                                        <a class="dropdown-item" href="#">Hapus</a>
                                                        <a class="dropdown-item" href="#">Lihat Dokumen</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            {{-- end isi table --}}
                        </table>
                    </div>
                </div>
            </div>

            <div class="chart tab-pane" id="tambah-usulan-lahan">
                <div class="card-body">
                    {{-- input nama lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lahan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan"
                            id="nama-lahan" name="npsn" required value="">
                    </div>
                    {{-- end input nama lahan --}}

                    {{-- input panjang --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">No Sertifikat</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan No Sertifikat" id="sert"
                            name="nama" required value="">
                    </div>
                    {{-- end input panjang --}}

                    {{-- input panjang --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Panjang(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan"
                            id="panjang" name="status_sekolah" required value="">
                    </div>
                    {{-- end input panjang --}}

                    {{-- input lebar --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lebar(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan" id="lebar"
                            name="status_sekolah" required value="">
                    </div>
                    {{-- end input lebar --}}

                    {{-- input luas lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Luas Lahan(M²)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Luas Lahan" id="l-lahan"
                            name="lat" required value="">
                    </div>
                    {{-- end input luas lahan --}}

                    {{-- input alamat --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Alamat" id="alamat"
                            name="long" required value="">
                    </div>
                    {{-- end input alamat --}}


                    {{-- input jenis kepemilikan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Jenis Kepemilikan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Jenis Kepemilikan"
                            id="Jenis Kepemilikan" name="long" required value="">
                    </div>
                    {{-- end input alamat --}}

                    {{-- input jenis keterangan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Keterangan"
                            id="Masukan Keterangan" name="long" required value="">
                    </div>
                    {{-- end input alamat --}}

                    {{-- upload file(pdf) --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label pt-1" for="customFile">Choose file</label>
                        <input type="file" id="chooseFile">
                    </div>
                    {{-- end upload file(pdf) --}}

                    {{-- button simpan --}}
                    <button type="submit" class="btn text-white col-sm-1"
                        style="background-color: #00a65b">Simpan</button>
                    {{-- end button simpan --}}
                </div>     
            </div> 
        </div>   
    </div>
</div> 
{{----------------------------------------------------- End -----------------------------------------------------}}


{{------------------------------------------------ Kekurangan Lahan -------------------------------------------}}
<div class="card mb-5">
    <div class="card-header" style="background-color: #FCC12D">
        <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white active font-weight-bold" href="#data-kekurangan-lahan-sekolah"
                    data-toggle="tab">
                    <i class="bi bi-house-fill mr-1"></i>Kekurangan Lahan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white font-weight-bold" href="#tambah-kekurangan-lahan" data-toggle="tab">
                    <i class="bi bi-plus-lg mr-1"></i>Tambah Kekurangan Lahan</a>
            </li>
        </ul>
    </div>
    <!-- /.card-header DATA SEKOLAH-->
    <div class="card-body p-0">
        <div class="tab-content p-0">
            <div class="tab-pane active" id="data-kekurangan-lahan-sekolah">
                <div class="row">
                    <div class="col">
                        <table class="table table-hover text-nowrap">
                            {{-- judul table --}}
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lahan</th>
                                    <th scope="col">Panjang(m)</th>
                                    <th scope="col">Lebar(m)</th>
                                    <th scope="col">Luas Lahan(m)</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            {{-- end judul table --}}

                            {{-- isi table --}}
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tanah</td>
                                    <td>Proposal</td>
                                    <td>35m²</td>
                                    <td>85m²</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-edit">
                                            Edit
                                        </button>
                                        <a href="#" class="btn btn-success">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tanah</td>
                                    <td>Proposal</td>
                                    <td>35m²</td>
                                    <td>85m²</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-edit">
                                            Edit
                                        </button>
                                        <a href="#" class="btn btn-success">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Tanah</td>
                                    <td>Proposal</td>
                                    <td>35m²</td>
                                    <td>85m²</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal"
                                            data-target="#modal-edit">
                                            Edit
                                        </button>
                                        <a href="#" class="btn btn-success">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                            {{-- end isi table --}}
                        </table>
                    </div>
                </div>
            </div>

            <div class="chart tab-pane" id="tambah-kekurangan-lahan">
                <div class="card-body">
                    {{-- input nama lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lahan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan"
                            id="nama-lahan" name="npsn" required value="">
                    </div>
                    {{-- end input nama lahan --}}


                    {{-- input panjang --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Panjang(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan"
                            id="panjang" name="status_sekolah" required value="">
                    </div>
                    {{-- end input panjang --}}

                    {{-- input lebar --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lebar(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan" id="lebar"
                            name="status_sekolah" required value="">
                    </div>
                    {{-- end input lebar --}}

                    {{-- input luas lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Luas Lahan(M²)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Luas Lahan" id="l-lahan"
                            name="lat" required value="">
                    </div>
                    {{-- end input luas lahan --}}

                    {{-- button simpan --}}
                    <button type="submit" class="btn text-white col-sm-1"
                        style="background-color: #00a65b">Simpan</button>
                    {{-- end button simpan --}}
                </div>
            </div>
        </div>
    </div>
</div>
{{------------------------------------------------------ End -------------------------------------------------}}

{{----------------------------------------------------- Tab -----------------------------------------------------}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Edit</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">

                    <div class="row mt-2">
                        <div class="col-3">
                            <label for="col-sm-4 col-form-label">Nama Lahan :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Nama Lahan"
                                id="nmalhn" name="long" required value="">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="col-sm-4 col-form-label">Panjang :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Panjang"
                                id="jmlpanjang" name="long" required value="">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="col-sm-4 col-form-label">Lebar :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Lebar" id="jmllebar"
                                name="long" required value="">
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col-3">
                            <label for="col-sm-4 col-form-label">Luas Lahan :</label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Luas Lahan"
                                id="jmlluas" name="long" required value="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-warning text-white">Edit</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{----------------------------------------------------- End -------------------------------------------------------}}
{{-- End Main-Content --}}

<div class="content-backdrop fade"></div>
@endsection
