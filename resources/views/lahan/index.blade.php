@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }

        .input-group-prepend button i {
            position: absolute;
            margin-top: -25px;
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

    {{-- --------------------------------------------- Row ------------------------------------------------- --}}
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header"
                        style="background-color:#00a65b; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center text-white font-weight-bold">Luas Lahan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">20m²</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header"
                        style="background-color: #25b5e9; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center text-white font-weight-bold">Jenis Kepemilikan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2" style="font-size: 18px; box-sizing:border-box">SHM: {{ $shm }} HGB: {{ $hgb }} Sewa: {{ $sewa }}</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header bg-warning" style="border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center text-white font-weight-bold">Ketersedian Lahan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">{{ $luasKetersediaanLahan }} m²</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header bg-dark" style="border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center font-weight-bold">Kekurangan Lahan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">{{ $luasKekuranganLahan }} m²</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header"
                        style="background-color: #e0e0e0; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center font-weight-bold">Jumlah Usulan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">{{ count($usulanLahans) }}</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
    {{-- --------------------------------------------- End ------------------------------------------------- --}}


    {{-- ------------------------------------------- Lahan Sekolah ---------------------------------------- --}}
    <div class="card mt-3 mb-5">
        <div class="card-header" style="background-color: #25b5e9">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active font-weight-bold" href="#data-lahan-sekolah" data-toggle="tab">
                        <i class="bi bi-house-fill mr-1"></i>Lahan Sekolah</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white font-weight-bold" href="#tambah-usulan-lahan" data-toggle="tab">
                        <i class="bi bi-plus-lg mr-1"></i>Tambah Ketersediaan Lahan</a>
                </li>
            </ul>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-lahan-sekolah" style="min-height: 10rem;">
                    <div class="row">
                        <div class="col">
                            @if (count($ketersediaanLahans) > 0)
                                <table class="table table-hover table-border text-nowrap text-center">
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
                                        @foreach ($ketersediaanLahans as $lahan)
                                            {{-- @dd($lahan) --}}
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $lahan->nama }}</td>
                                                <td>{{ $lahan->no_sertifikat }}</td>
                                                <td>{{ $lahan->panjang }} m²</td>
                                                <td>{{ $lahan->lebar }} m²</td>
                                                <td>{{ $lahan->luas }} m²</td>
                                                <td>{{ $lahan->alamat }}</td>
                                                <td>{{ $lahan->jenis_kepemilikan }}</td>
                                                <td>{{ $lahan->keterangan }}</td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu" style="margin-left: -56px">
                                                                    <a class="dropdown-item"
                                                                        href="/ketersediaan-lahan/{{ $lahan->id }}/edit">Edit</a>
                                                                    <form action="/ketersediaan-lahan/{{ $lahan->id }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin akan menghapus ketersediaan lahan ini?')">Hapus</button>
                                                                    </form>
                                                                    <a class="dropdown-item"
                                                                        href="{{ asset('storage/' . $lahan->bukti_lahan) }}"
                                                                        target="_blank">Lihat
                                                                        Dokumen</a>
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

                <div class="chart tab-pane" id="tambah-usulan-lahan" style="min-height: 10rem;">
                    <div class="card-body">
                        <form action="/ketersediaan-lahan/" method="post" enctype="multipart/form-data">
                            @csrf

                            {{-- input nama lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lahan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan"
                                    id="nama-lahan" name="nama" required>
                            </div>
                            {{-- end input nama lahan --}}

                            {{-- input panjang --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">No Sertifikat</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan No Sertifikat"
                                    id="sert" name="no_sertifikat" required>
                            </div>
                            {{-- end input panjang --}}

                            {{-- input panjang --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Panjang(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan"
                                    id="panjang" name="panjang" required>
                            </div>
                            {{-- end input panjang --}}

                            {{-- input lebar --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lebar(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan"
                                    id="lebar" name="lebar" required>
                            </div>
                            {{-- end input lebar --}}

                            {{-- input alamat --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Alamat</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Alamat" id="alamat"
                                    name="alamat" required>
                            </div>
                            {{-- end input alamat --}}


                            {{-- input jenis kepemilikan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Jenis Kepemilikan</label>
                                <select class="custom-select rounded-0 col-sm-9" id="exampleSelectRounded0" name="jenis_kepemilikan">
                                    <option value="sewa">Sewa</option>
                                    <option value="shm">SHM</option>
                                    <option value="hgb">HGB</option>
                                </select>
                            </div>
                            {{-- end input alamat --}}

                            {{-- input jenis keterangan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Keterangan"
                                    id="Masukan Keterangan" name="keterangan" required>
                            </div>
                            {{-- end input alamat --}}

                            {{-- upload file(pdf) --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label pt-1" for="customFile">Dokumen Bukti Lahan (PDF / Foto)</label>
                                <input type="file" id="chooseFile" name="bukti_lahan" accept="image/*, .pdf" required>
                            </div>
                            {{-- end upload file(pdf) --}}

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
    {{-- ---------------------------------------------- End ------------------------------------------------- --}}


    {{-- -------------------------------------------- Kekurangan Lahan ------------------------------------ --}}
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
                <div class="tab-pane active" id="data-kekurangan-lahan-sekolah" style="min-height: 10rem;">
                    <div class="row">
                        <div class="col">
                            @if (count($kekuranganLahans) > 0)
                                <table class="table table-hover text-nowrap text-center">
                                    {{-- judul table --}}
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Lahan</th>
                                            <th scope="col">Panjang(m)</th>
                                            <th scope="col">Lebar(m)</th>
                                            <th scope="col">Luas Lahan(m)</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    {{-- end judul table --}}

                                    {{-- isi table --}}
                                    <tbody>
                                        @foreach ($kekuranganLahans as $lahan)
                                            <tr>
                                                <input type="hidden" class="id_kekuranganLahan"
                                                    value="{{ $lahan->id }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="nama">{{ $lahan->nama }}</td>
                                                <td class="panjang">{{ $lahan->panjang }} m²</td>
                                                <td class="lebar">{{ $lahan->lebar }} m²</td>
                                                <td>{{ $lahan->luas }} m²</td>
                                                <td class="keterangan">{{ $lahan->keterangan }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-info tombol-edit"
                                                        data-toggle="modal" data-target="#modal-edit">
                                                        Edit
                                                    </button>
                                                    <form action="/kekurangan-lahan/{{ $lahan->id }}" method="post"
                                                        class="d-inline-block">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success"
                                                            onclick="return confirm('Apakah anda yakin akan menghapus kekurangan lahan ini?')">Hapus</button>
                                                    </form>
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

                <div class="chart tab-pane" id="tambah-kekurangan-lahan" style="min-height: 10rem;">
                    <div class="card-body">
                        <form action="/kekurangan-lahan" method="post">
                            @csrf
                            {{-- input nama lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Lahan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan"
                                    id="nama-lahan" name="nama" required>
                            </div>
                            {{-- end input nama lahan --}}

                            {{-- input panjang --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Panjang(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan"
                                    id="panjang" name="panjang" required>
                            </div>
                            {{-- end input panjang --}}

                            {{-- input lebar --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Lebar(M)</label>
                                <input type="number" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan"
                                    id="lebar" name="lebar" required>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Keterangan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Keterangan"
                                id="keterangan" name="keterangan" required>
                            </div>
                            {{-- end input lebar --}}

                            {{-- button simpan --}}
                            <button type="submit" class="btn text-white col-sm-1"
                                style="background-color: #00a65b">Simpan</button>
                        </form>
                        {{-- end button simpan --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ---------------------------------------------------- End ----------------------------------------- --}}

    {{-- --------------------------------------------------- Tab ------------------------------------------ --}}
    <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/kekurangan-lahan/update-kekurangan" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                        <h3 class="modal-title">Edit</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">

                            <input type="hidden" name="id_kekurangan" class="inputIdKekurangan">
                            <div class="row mt-2">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Nama Lahan :</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control col-sm-7 input-nama-edit"
                                        placeholder="Masukan Nama Lahan" id="nmalhn" name="nama" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Panjang :</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-sm-7 panjang-nama-edit"
                                        placeholder="Masukan Panjang" id="jmlpanjang" name="panjang" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Lebar :</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-sm-7 lebar-nama-edit"
                                        placeholder="Masukan Lebar" id="jmllebar" name="lebar" required>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Keterangan :</label>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control col-sm-7 keterangan-nama-edit"
                                        placeholder="Keterangan" id="ketereangan" name="keterangan" required>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-warning text-white">Edit</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- --------------------------------------------------- End ------------------------------------------ --}}
    {{-- End Main-Content --}}

    <div class="content-backdrop fade"></div>
@endsection


@section('tambahjs')
    <script>
        const tombolEdit = document.querySelectorAll('.tombol-edit');
        const inputNamaEdit = document.querySelector('.input-nama-edit');
        const inputPanjangEdit = document.querySelector('.panjang-nama-edit');
        const inputLebarEdit = document.querySelector('.lebar-nama-edit');
        const nama = document.querySelectorAll('.nama');
        const panjang = document.querySelectorAll('.panjang');
        const lebar = document.querySelectorAll('.lebar');
        const inputKetereangan = document.querySelector('.keterangan-nama-edit');
        const id_kekuranganLahan = document.querySelectorAll('.id_kekuranganLahan');
        const inputIdKekurangan = document.querySelector('.inputIdKekurangan');
        const keterangan = document.querySelectorAll('.keterangan');

        tombolEdit.forEach((e, i) => {
            e.addEventListener('click', function() {
                console.log()
                inputNamaEdit.value = '';
                inputNamaEdit.value = nama[i].innerHTML;
                inputPanjangEdit.value = '';
                inputPanjangEdit.value = parseInt(panjang[i].innerHTML.replace('m²', ''));
                inputLebarEdit.value = '';
                inputLebarEdit.value = parseInt(lebar[i].innerHTML.replace('m²', ''));
                inputIdKekurangan.value = '';
                inputIdKekurangan.value = id_kekuranganLahan[i].value;
                inputKetereangan.value = '';
                inputKetereangan.value = keterangan[i].innerHTML;
            })
        });
    </script>
@endsection
