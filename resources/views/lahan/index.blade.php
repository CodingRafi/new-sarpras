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

    #upload-dialog {
        display: none !important;
    }

    #pdf-loader {
        display: none
    }

    #pdf-name {
        display: none !important;
    }

    #pdf-preview {
        display: none;
        width: 300px !important;
    }

    #upload-button {
        display: none !important;
    }

    #cancel-pdf {
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
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Lahan/ Ketersediaan Lahan
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
                    <div class="card-header" style="background-color:#00a65b; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center text-white font-weight-bold">Total Luas Lahan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">{{ $luasKetersediaanLahan }} m²</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header" style="background-color:#25b5e9; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center font-weight-bold text-white">Kekurangan Lahan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold pt-2">{{ $luasKekuranganLahan }} m²</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

            <div class="col">
                <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                    <div class="card-header"
                        style="background-color: #263238; border-radius: 0px 20px 0px 20px !important">
                        <h4 class="text-center text-white font-weight-bold">Jenis Kepemilikan</h4>
                    </div><!-- /.card-header -->
                    <div class="card-body kepemilikan">
                        <h1 class="text-center font-weight-bold pt-2" style="font-size:18px; box-sizing:border-box">SHM: {{ $shm }} HGB: {{ $hgb }} Sewa: {{ $sewa }} Hibah/Wakaf: {{ $hibah }} Tanah Desa: {{ $tanah_desa }}</h1>
                    </div><!-- /.card-body -->
                </div>
            </div>

        @if (strtolower(Auth::user()->profil->status_sekolah) != 'swasta')
        <div class="col">
            <div class="card" style="border-radius: 0px 20px 0px 20px !important">
                <div class="card-header" style="background-color: #e0e0e0; border-radius: 0px 20px 0px 20px !important">
                    <h4 class="text-center font-weight-bold">Jumlah Usulan Lahan</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">{{ count($usulanLahans) }}</h1>
                </div><!-- /.card-body -->
            </div>
        </div>
        @endif
    </div>
</div>
{{------------------------------------------------ End -----------------------------------------------------------}}


{{---------------------------------------------- Lahan Sekolah ---------------------------------------------------}}
<div class="card mt-3 mb-5">
    <div class="card-header" style="background-color: #25b5e9">
        <ul class="nav nav-pills ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ $errors->any() ? '' : 'active' }} text-white font-weight-bold" href="#data-lahan-sekolah" data-toggle="tab">
                    <i class="bi bi-house-fill mr-1"></i>Lahan Sekolah</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $errors->any() ? 'active' : '' }} text-white font-weight-bold" href="#tambah-usulan-lahan" data-toggle="tab">
                    <i class="bi bi-plus-lg mr-1"></i>Tambah Ketersediaan Lahan</a>
            </li>
        </ul>
    </div>
    <!-- /.card-header DATA SEKOLAH-->
    <div class="card-body p-0">
        <div class="tab-content p-0">
            <div class="tab-pane {{ $errors->any() ? '' : 'active' }}" id="data-lahan-sekolah" style="min-height: 10rem;">
                <div class="row">
                    <div class="col">
                        @if (count($ketersediaanLahans) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover table-border  text-nowrap text-center">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Lahan</th>
                                        <th scope="col">No Sertifikat</th>
                                        <th scope="col">Panjang(m)</th>
                                        <th scope="col">Lebar(m)</th>
                                        <th scope="col">Luas Lahan(m²)</th>
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
                                        <td>{{ $lahan->panjang }} m</td>
                                        <td>{{ $lahan->lebar }} m</td>
                                        <td>{{ $lahan->luas }} m²</td>
                                        <td>{{ $lahan->alamat }}</td>
                                        <td style="text-transform: capitalize;">
                                            {{ str_replace("_", " ", $lahan->jenis_kepemilikan) }}</td>
                                        <td>{{ $lahan->keterangan }}</td>
                                        <td>
                                            <div class="card-body">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <button type="button" class="btn" data-toggle="dropdown">
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
                        </div>
                        @else
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="chart tab-pane {{ $errors->any() ? 'active' : '' }}" id="tambah-usulan-lahan" style="min-height: 10rem;">
                <div class="card-body">
                    <form action="/ketersediaan-lahan/" method="post" enctype="multipart/form-data">
                        @csrf

                        {{-- input nama lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lahan</label>
                            <input type="text" class="form-control col-sm-9  @error('nama') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan Nama Lahan" id="nama-lahan" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input nama lahan --}}

                        {{-- input sertifikat --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Sertifikat</label>
                            <input type="text" class="form-control col-sm-9 @error('no_sertifikat') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan No Sertifikat" id="sert" name="no_sertifikat" value="{{ old('no_sertifikat') }}" required>
                            @error('no_sertifikat')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input sertifikat --}}

                        {{-- input panjang --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Panjang(m)</label>
                            <input type="number" class="form-control col-sm-9 @error('panjang') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan Panjang Lahan" id="panjang" name="panjang" value="{{ old('panjang') }}" step=any required>
                            @error('panjang')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input panjang --}}

                        {{-- input lebar --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lebar(m)</label>
                            <input type="number" class="form-control col-sm-9 @error('lebar') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan Lebar Lahan" id="lebar" name="lebar" value="{{ old('lebar') }}" step=any required>
                            @error('lebar')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input lebar --}}

                        {{-- input alamat --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <input type="text" class="form-control col-sm-9 @error('alamat') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan Alamat" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                            @error('alamat')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input alamat --}}


                        {{-- input jenis kepemilikan --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kepemilikan</label>
                            <select class="custom-select rounded-0 col-sm-9" id="exampleSelectRounded0"
                                name="jenis_kepemilikan">
                                <option value="sewa">Sewa</option>
                                <option value="shm">SHM</option>
                                <option value="hgb">HGB</option>
                                <option value="hibah">Hibah/Wakaf</option>
                                <option value="tanah_desa">Tanah Desa</option>
                            </select>
                        </div>
                        {{-- end input alamat --}}

                        {{-- input jenis keterangan --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <input type="text" class="form-control col-sm-9 @error('keterangan') is-invalid @enderror loading-tambah" 
                            placeholder="Masukan Keterangan" id="Masukan Keterangan" name="keterangan" value="{{ old('keterangan') }}" required>
                             @error('keterangan')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        {{-- end input alamat --}}

                        {{-- upload file(pdf) --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label pt-1" for="customFile">Dokumen Bukti Lahan (PDF /
                                Foto)</label>
                            <input type="file" class="pilih @error('chooseFile') is-invalid @enderror loading-tambah" id="chooseFile" name="bukti_lahan" accept="image/*, .pdf" required onchange="previewImage()" value="{{ old('keterangan') }}" required>
                             @error('chooseFile')
                            <div class="invalid-feedback d-block" style="margin-left: 13vw">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <img class="img-preview col-sm-3 img-thumbnail mb-3" style="display: none">
                        <div id="pdf-loader">Loading Preview ..</div>
                        <div>
                            <canvas id="pdf-preview" class="border border-rounded shadow-sm"
                                style="width: 300px !important; border-radius: 10px !important;"></canvas>
                        </div>
                        {{-- end upload file(pdf) --}}

                        {{-- button simpan --}}
                        <button type="submit" class="btn text-white col-sm-1 loading-simpan"
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
                <a class="nav-link text-white font-weight-bold" href="#data-kekurangan-lahan-sekolah"
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
            <div class="tab-pane" id="data-kekurangan-lahan-sekolah" style="min-height: 10rem;">
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
                                    <th scope="col">Luas Lahan(m²)</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            {{-- end judul table --}}

                            {{-- isi table --}}
                            <tbody>
                                @foreach ($kekuranganLahans as $lahan)
                                <tr>
                                    <input type="hidden" class="id_kekuranganLahan" value="{{ $lahan->id }}">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td class="nama">{{ $lahan->nama }}</td>
                                    <td class="panjang">{{ $lahan->panjang }} m</td>
                                    <td class="lebar">{{ $lahan->lebar }} m</td>
                                    <td>{{ $lahan->luas }} m²</td>
                                    <td class="keterangan">{{ $lahan->keterangan }}</td>
                                    <td>
                                        <button type="button" class="btn text-white tombol-edit"
                                            style="background-color: #25b5e9" data-toggle="modal"
                                            data-target="#modal-edit">
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
                        <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                            <div class="alert" role="alert">
                                Data Tidak Ditemukan
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="chart tab-pane {{ $errors->any() ? 'active' : '' }}" id="tambah-kekurangan-lahan" style="min-height: 10rem;">
                <div class="card-body">
                    <form action="/kekurangan-lahan" method="post">
                        @csrf
                        {{-- input nama lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Lahan</label>
                            <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan" id="nama-lahan" name="nama" required>
                        </div>
                        {{-- end input nama lahan --}}

                        {{-- input panjang --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Panjang(m)</label>
                            <input type="number" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan" id="panjang" name="panjang" required step=any>
                        </div>
                        {{-- end input panjang --}}

                        {{-- input lebar --}}
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Lebar(m)</label>
                            <input type="number" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan" id="lebar" name="lebar" required step=any>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <input type="text" class="form-control col-sm-9" placeholder="Keterangan" id="keterangan" name="keterangan" required>
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
                    <button type="submit" class="btn text-white" style="background-color: #00a65b">Edit</button>
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
<script src="/pdf.js"></script>
<script src="/pdf.worker.js"></script>

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
        e.addEventListener('click', function () {
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

    function previewImage() {
        const image = document.querySelector('#chooseFile');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

        function getExtension(filepicker) {
            return filepicker.split(".").pop().toLowerCase();
        }

        var filepicker = document.getElementById("chooseFile").value;
        var tutupPdf = document.getElementById("pdf-preview");
        var fileextension = getExtension(filepicker);

        if (fileextension == 'jpg' || fileextension == 'jpeg' || fileextension == 'png') {

            if (event.target.files.length > 0) {
                imgPreview.style.display = 'block';
                tutupPdf.style.display = 'none';
            }
        } else {
            if (event.target.files.length > 0) {
                imgPreview.style.display = 'none';
                tutupPdf.style.display = 'block';
            }
        }
    }

</script>

<script>
    var _PDF_DOC,
        _CANVAS = document.querySelector('#pdf-preview'),
        _OBJECT_URL;

    function showPDF(pdf_url) {
        PDFJS.getDocument({
            url: pdf_url
        }).then(function (pdf_doc) {
            _PDF_DOC = pdf_doc;

            // Show the first page
            showPage(1);

            // destroy previous object url
            URL.revokeObjectURL(_OBJECT_URL);
        }).catch(function (error) {
            // trigger Cancel on error
            document.querySelector("#cancel-pdf").click();

            // error reason
            alert(error.message);
        });;
    }

    function showPage(page_no) {
        // fetch the page
        _PDF_DOC.getPage(page_no).then(function (page) {
            // set the scale of viewport
            var scale_required = _CANVAS.width / page.getViewport(1).width;

            // get viewport of the page at required scale
            var viewport = page.getViewport(scale_required);

            // set canvas height
            _CANVAS.height = viewport.height;

            var renderContext = {
                canvasContext: _CANVAS.getContext('2d'),
                viewport: viewport
            };

            // render the page contents in the canvas
            page.render(renderContext).then(function () {
                document.querySelector("#pdf-preview").style.display = 'inline-block';
                // document.querySelector("#pdf-loader").style.display = 'none';
            });
        });
    }


    /* Show Select File dialog */
    // document.querySelector("#upload-dialog").addEventListener('click', function() {
    //     document.querySelector("#proposal").click();
    // });

    /* Selected File has changed */
    document.querySelector("#chooseFile").addEventListener('change', function () {

        // user selected file
        var file = this.files[0];

        // allowed MIME types
        var mime_types = ['application/pdf'];

        // Validate whether PDF
        // if (mime_types.indexOf(file.type) == -1) {
        //     alert('Error : Incorrect file type');
        //     return;
        // }

        // validate file size
        // if (file.size > 10 * 1024 * 1024) {
        //     alert('Error : Exceeded size 10MB');
        //     return;
        // }

        // validation is successful

        // hide upload dialog button
        // document.querySelector("#upload-dialog").style.display = 'none';

        // set name of the file
        // document.querySelector("#pdf-name").innerText = file.name;
        // document.querySelector("#pdf-name").style.display = 'inline-block';

        // show cancel and upload buttons now
        // document.querySelector("#cancel-pdf").style.display = 'inline-block';
        // document.querySelector("#upload-button").style.display = 'inline-block';

        // Show the PDF preview loader
        // document.querySelector("#pdf-loader").style.display = 'inline-block';


        // object url of PDF 
        _OBJECT_URL = URL.createObjectURL(file)

        // send the object url of the pdf to the PDF preview function
        showPDF(_OBJECT_URL);
    });

    window.addEventListener('load', function () {
        // document.querySelector('#pdf-file').value(document.querySelector('.filePDF').value)
    });

    /* Reset file input */
    document.querySelector("#cancel-pdf").addEventListener('click', function () {
        // show upload dialog button
        // document.querySelector("#upload-dialog").style.display = 'inline-block';

        // reset to no selection
        document.querySelector("#chooseFile").value = '';

        // hide elements that are not required
        // document.querySelector("#pdf-name").style.display = 'none';
        document.querySelector("#pdf-preview").style.display = 'none';
        // document.querySelector("#pdf-loader").style.display = 'none';
        // document.querySelector("#cancel-pdf").style.display = 'none';
        // document.querySelector("#upload-button").style.display = 'none';
    });

    /* Upload file to server */
    document.querySelector("#upload-button").addEventListener('click', function () {
        // AJAX request to server
        alert('This will upload file to server');
    });

</script>
@endsection
