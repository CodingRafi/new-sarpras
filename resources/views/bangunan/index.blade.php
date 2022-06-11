@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }
    </style>
@endsection

@section('container')
    {{-- @dd(request('jenis') == 'lab_biologi') --}}
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize">
                        {{ str_replace('_', ' ', request('jenis')) }}</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main-Content --}}

    {{-- Row --}}
    <div class="container-fluid">
        <div class="row">
            @if (request('jenis') == 'perpustakaan' || request('jenis') == 'toilet')
                <div class="col-lg-3 col-6">
                    <div class="card">
                        {{-- card header --}}
                        <div class="card-header text-white" style="background-color: #00a65b">
                            <h4 class="card-title font-weight-bold">Jumlah Siswa</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white"></button>
                            </div>
                        </div>
                        {{-- end card header --}}
                        {{-- card body --}}
                        <div class="card-body" style="height: 112px;">
                            <h1 class="text-center font-weight-bold pt-2">
                                {{ $profil->jml_siswa_l + $profil->jml_siswa_p }}</h1>
                        </div>
                        {{-- end card body --}}
                    </div>
                </div>
            @else
                <div class="col-lg-3 col-6">
                    <div class="card">
                        {{-- card header --}}
                        <div class="card-header text-white" style="background-color: #00a65b">
                            <h4 class="card-title font-weight-bold">Jumlah Rombel</h4>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white"></button>
                            </div>
                        </div>
                        {{-- end card header --}}
                        {{-- card body --}}
                        <div class="card-body" style="height: 112px;">
                            <h1 class="text-center font-weight-bold pt-2">{{ $profil->jml_rombel ?? 0 }}</h1>
                        </div>
                        {{-- end card body --}}
                    </div>
                </div>
            @endif

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" style="background-color: #25b5e9">
                        <h4 class="card-title font-weight-bold">Kondisi Ideal</h4>
                        <div class="card-tools">
                            @if (request('jenis') == 'toilet' || request('jenis') == 'perpustakaan')
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                    data-target="#edit-ideal"><i class="bi bi-pencil-square"></i>
                                </button>
                            @else
                                <button type="button" class="btn btn-tool text-white"></button>
                            @endif
                        </div>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataBangunan->kondisi_ideal }}
                            {{ request('jenis') == 'perpustakaan' ? 'm²' : '' }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>

            <div class="modal fade" id="edit-ideal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #25b5e9; margin-left:-0.5px">
                            <h4 class="modal-title text-white">Kondisi Ideal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="/bangunan-all/update-kondisi-ideal/{{ $dataBangunan->id }}">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ideal" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="ideal" name="kondisi_ideal"
                                                value="{{ $dataBangunan->kondisi_ideal }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn text-white float-right"
                                        style="background-color: #00a65b">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" href="" style="background-color: #fcc12d">
                        <h4 class="card-title font-weight-bold">Ketersediaan</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-ketersediaan"></i></button>
                        </div>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataBangunan->ketersediaan }}
                            {{ request('jenis') == 'perpustakaan' ? 'm²' : '' }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" href="" style="background-color: #263238">
                        <h4 class="card-title font-weight-bold">Kekurangan</h4>
                        <div class="card-tools">
                            @if (request('jenis') == 'toilet')
                                <button type="button" class="btn btn-tool" data-toggle="modal"
                                    data-target="#edit-kekurangan"><i class="bi bi-pencil-square"></i>
                                </button>
                            @endif
                        </div>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataBangunan->kekurangan }}
                            {{ request('jenis') == 'perpustakaan' ? 'm²' : '' }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>
        </div>

        <div class="modal fade" id="edit-kekurangan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark" style="margin-left: -0.5px">
                        <h4 class="modal-title">Kekurangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/bangunan-all/update-kekurangan/{{ $dataBangunan->id }}"
                            method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="kekurangan" name="kekurangan"
                                            value="{{ $dataBangunan->kekurangan }}">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>X
        </div>

        {{-- <div class="alert alert-warning text-white" role="alert">
            Kekurangan didapatkan dari selisih kondisi ideal dan ketersediaan 
        </div> --}}

        @if (request('jenis') == 'ruang_kelas')
            <div class="card card-outline card-warning">
                <div class="card-header">
                    <h3 class="card-title"><i class="bi bi-info-circle"></i> Informasi</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body text-muted">
                    Kekurangan didapatkan dari selisih kondisi ideal dan ketersediaan
                </div>
            </div>
        @endif

        {{-- End Row --}}
        <div class="card" style="margin-bottom: 10rem !important">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white pt-2 font-weight-bold" style="text-transform: capitalize">Usulan
                    {{ str_replace('_', ' ', request('jenis')) }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#modal-default"><i class="bi bi-plus"></i> Tambah Usulan
                    </button>
                </div>
            </div>
            <!-- /.card-header DATA SEKOLAH-->
            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="tab-pane active" id="data-usulan-sekolah">
                        <div class="table-responsive">
                            {{-- <div class="col-lg-12"> --}}
                            @if (count($usulanBangunan) > 0)
                                <table class="table table-bordered mt-3">
                                    {{-- judul table --}}
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Jenis
                                                Ruang
                                            </th>
                                            @if (request('jenis') != 'perpustakaan')
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                    Jumlah
                                                    Ruang
                                                    {{ str_replace('_', ' ', request('jenis')) }}</th>
                                            @endif
                                            <th colspan="2" class="text-center">Ketersediaan Lahan</th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Proposal
                                            </th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                Keterangan
                                            </th>
                                            <th rowspan="2" class="text-center" style="vertical-align: middle">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">Luas Lahan</th>
                                            <th scope="col" class="text-center">Gambar Lahan</th>
                                        </tr>
                                    </thead>
                                    {{-- end judul table --}}

                                    {{-- isi table --}}
                                    <tbody>
                                        @foreach ($usulanBangunan as $key => $usulan)
                                            <tr>
                                                <th class="text-center">{{ $loop->iteration }}</th>
                                                <td class="text-center text-capitalize">
                                                    {{ str_replace('_', ' ', $usulan->jenis) }}</td>
                                                @if (request('jenis') != 'perpustakaan')
                                                    <td class="text-center">{{ $usulan->jml_ruang }}</td>
                                                @endif
                                                <td class="text-center">{{ $usulan->luas_lahan }} M²</td>
                                                <td class="text-center" style="vertical-align: middle">
                                                    @foreach ($usulanFotos[$key] as $ke => $foto)
                                                        <a href="{{ asset('storage/' . $foto->nama) }}"
                                                            class="fancybox"
                                                            data-fancybox="gallery{{ $key }}">
                                                            <img src="{{ asset('storage/' . $foto->nama) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                        </a>
                                                    @endforeach
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ asset('storage/' . $usulan->proposal) }}"
                                                        target="_blank">
                                                        <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                    </a>
                                                </td>
                                                <td class="text-center">{{ $usulan->keterangan }}</td>
                                                <td class="text-center">
                                                    <a href="/usulan-bangunan/{{ $usulan->id }}/edit"
                                                        class="btn btn-warning text-white">Edit</a>

                                                    <button type="button" class="btn text-white tombolHapus"
                                                        data-toggle="modal" data-target="#confirmhapus"
                                                        data-id="{{ $usulan->id }}" style="background-color: #263238">
                                                        Hapus
                                                    </button>
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
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Main-Content --}}

        {{-- modal ketersediaan --}}
        <div class="modal fade" id="modal-ketersediaan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/bangunan-all/update-ketersediaan/{{ $dataBangunan->id }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header bg-warning" style="margin-left: -0.5px">
                            <h4 class="modal-title text-white">Masukan Ketersediaan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- input jumlah ruangan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Ketersediaan</label>
                                <input type="number" class="form-control col-sm-7" placeholder="Masukan Ketersediaan"
                                    id="ketersediaan" name="ketersediaan" required
                                    value="{{ $dataBangunan->ketersediaan }}">
                            </div>
                            {{-- end input jumlah ruangan --}}
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
        {{-- end modal ketersediaan --}}

        {{-- modal kekurangan --}}
        <div class="modal fade" id="modal-kekurangan">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/bangunan-all/{{ $dataBangunan->id }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header" style="margin-left: -0.5px">
                            <h4 class="modal-title">Masukan Kekurangan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- input jumlah ruangan --}}
                            <input type="hidden" name="id_ruangKelas" value="{{ $dataBangunan->id }}">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kekurangan</label>
                                <input type="number" class="form-control col-sm-7" placeholder="Masukan Kekurangan"
                                    id="kekurangan" name="kekurangan" required value="{{ $dataBangunan->kekurangan }}">
                            </div>
                            {{-- end input jumlah ruangan --}}
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
        {{-- end modal kekurangan --}}

        <!-- modal tambah usulan -->
        <div class=" modal fade modal-bangunan {{ $errors->any() ? 'show' : '' }}" id="modal-default"
            style="{{ $errors->any() ? 'display: block;background: rgba(69,90,100, .5);' : '' }}">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    @if (request('jenis') == 'ruang_kelas')
                        <form action="/bangunan/usulan-ruang-kelas" method="post" enctype="multipart/form-data">
                        @elseif(request('jenis') == 'toilet')
                            <form action="/bangunan/usulan-toilet" method="post" enctype="multipart/form-data">
                            @elseif(request('jenis') == 'perpustakaan')
                                <form action="/bangunan/usulan-ruang-perpustakaan" method="post"
                                    enctype="multipart/form-data">
                    @endif
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title" style="text-transform: capitalize;">Usulan
                            {{ str_replace('_', ' ', request('jenis')) }}</h4>
                        <button type="button" class="close tombol-exnya" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        @if (request('jenis') == 'toilet' || request('jenis') == 'ruang_kelas')
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
                            <input type="number"
                                class="form-control col-sm-7 @error('jml_ruang') is-invalid @enderror loading-tambah"
                                placeholder="Masukan Jumlah Ruangan" id="jumlah-ruangan" name="jml_ruang"
                                value="{{ old('jml_ruang') }}" required>
                            @error('jml_ruang')
                                <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        @endif
                        {{-- end input jumlah ruangan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Luas Lahan (m²)</label>
                            <input type="number"
                                class="form-control col-sm-7 @error('luas_lahan') is-invalid @enderror loading-tambah"
                                placeholder="Masukan Luas Lahan" id="luas-lahan" name="luas_lahan"
                                value="{{ old('luas_lahan') }}" required>
                            @error('luas_lahan')
                                <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- end luas lahan --}}

                        {{-- upload gambar lokasi --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan
                                <br><small class="text-danger">*Note Max 1 Gambar 5MB</small></label>
                            <input type="file" id="gambar-lahan" multiple accept="image/*" name="gambar[]"
                                class="gambar-lahan mt-2 @error('gambar') is-invalid @enderror loading-tambah"
                                value="{{ old('gambar') }}" required>
                            @error('gambar.*')
                                <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- end upload gambar lokasi --}}

                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1 @error('proposal') is-invalid @enderror"
                                value="{{ old('proposal') }}" for="customFile">Proposal</label>
                            <input type="file" class="loading-tambah" id="proposal" accept=".pdf" name="proposal" required>
                            @error('proposal')
                                <div class="invalid-feedback d-block" style="margin-left: 21vw">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        {{-- end upload proposal --}}

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default tombol-Close" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white loading-simpan"
                            style="background-color: #00a65b">Simpan</button>
                    </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        <div class="content-backdrop fade"></div>

        {{-- Modal Confirm --}}
        <div class="modal fade" id="confirmhapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="110" height="90" color="red" fill="currentColor"
                            class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img"
                            aria-label="Warning:">
                            <path
                                d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                        </svg>
                        <h4 class="text mt-3">Apakah anda yakin ingin menghapus data ini?</h3>
                    </div>
                    <div class="row p-3">
                        <button type="button" class="col-6 btn btn-dark py-1" data-dismiss="modal">Batal</button>
                        <form action="/usulan-bangunan/" method="post" class="col-6 form-hapus">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger py-1" style="width: 100%">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Modal --}}


    @section('tambahjs')
        <script>
            const close = document.querySelector('.tombol-exnya');
            const modal = document.querySelector('.modal-bangunan');
            const tombolClose = document.querySelector('.tombol-Close');

            close.addEventListener('click', function() {
                modal.classList.remove('show');
                modal.style.display = 'none';
                modal.style.background = 'none';
            })
            tombolClose.addEventListener('click', function() {
                modal.classList.remove('show');
                modal.style.display = 'none';
                modal.style.background = 'none';
            })
        </script>

        <script>
            const form = document.querySelector('.form-hapus');
            const tombolHapus = document.querySelectorAll('.tombolHapus');

            tombolHapus.forEach((e, i) => {
                e.addEventListener('click', function() {
                    form.removeAttribute('action');
                    form.setAttribute('action', '/usulan-bangunan/' + e.getAttribute('data-id'));
                })
            });
        </script>
    @endsection

    {{-- Tab --}}
    {{-- <div class="modal fade" id="modal-edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/bangunan/usulan-ruang-kelas" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header">
                            <h3 class="modal-title">Edit</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container">

                                <input type="hidden" class="id_usulan_modal" name="id">

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label for="col-sm-4 col-form-label">Jumlah Ruang Kelas :</label>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control col-sm-7 panjang-nama-edit"
                                            placeholder="Masukan Jumlah Ruang" id="jmlrg" name="jumlah" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label for="col-sm-4 col-form-label">Luas Lahan :</label>
                                    </div>
                                    <div class="col">
                                        <input type="number" class="form-control acol-sm-7 lebar-nama-edit"
                                            placeholder="Masukan Luas" id="jmlluas" name="luas" required>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar</label>
                                    </div>
                                    <div class="col">
                                        <input type="file" id="gambar-lahan">
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-3">
                                        <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                                    </div>
                                    <div class="col">
                                        <input type="file" id="proposal">
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
        </div> --}}
    {{-- End Tab --}}

    {{-- End Main --}}
@endsection
