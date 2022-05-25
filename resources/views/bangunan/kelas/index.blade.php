@extends('mylayouts.main')

@section('tambahcss')
    <style>
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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Kelas</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    {{-- Main-Content --}}

    {{-- Row --}}
    <div class="container-fluid">
        <div class="row">
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

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" style="background-color: #25b5e9">
                        <h4 class="card-title font-weight-bold">Kondisi Ideal</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"></button>
                        </div>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataKelas->kondisi_ideal }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" href="" style="background-color: #fcc12d">
                        <h4 class="card-title font-weight-bold">Ketersediaan</h4>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square" data-toggle="modal" data-target="#modal-ketersediaan"></i></button>
                        </div>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataKelas->ketersediaan }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="card">
                    {{-- card header --}}
                    <div class="card-header text-white" href="" style="background-color: #263238">
                        <h4 class="card-title font-weight-bold">Kekurangan</h4>
                    </div>
                    {{-- end card header --}}
                    {{-- card body --}}
                    <div class="card-body" style="height: 112px;">
                        <h1 class="text-center font-weight-bold pt-2">{{ $dataKelas->kekurangan }}</h1>
                    </div>
                    {{-- end card body --}}
                </div>
            </div>
        </div>

        {{-- <div class="alert alert-warning text-white" role="alert">
            Kekurangan didapatkan dari selisih kondisi ideal dan ketersediaan 
        </div> --}}

        <div class="card card-outline card-warning">
            <div class="card-header">
                <h3 class="card-title"><i class="bi bi-info-circle"></i> Informasi</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body text-muted">
                Kekurangan didapatkan dari selisih kondisi ideal dan ketersediaan 
            </div>
        </div>

        {{-- End Row --}}

        <div class="card">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white pt-2 font-weight-bold">Usulan Ruang Kelas Baru</h3>
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
                                @if (count($usulanKelas) > 0)
                                    <table class="table table-bordered mt-3">
                                        {{-- judul table --}}
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">No</th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">Jenis Ruang
                                                </th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">Jumlah
                                                    Ruang
                                                    Kelas</th>
                                                <th colspan="2" class="text-center">Ketersediaan Lahan</th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">Proposal
                                                </th>
                                                <th rowspan="2" class="text-center" style="vertical-align: middle">Keterangan
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
                                            @foreach ($usulanKelas as $key => $usulan)
                                                <tr>
                                                    <th class="text-center">{{ $loop->iteration }}</th>
                                                    <td class="text-center text-capitalize">{{ str_replace("_", " ", $usulan->jenis) }}</td>
                                                    <td class="text-center">{{ $usulan->jml_ruang }}</td>
                                                    <td class="text-center">{{ $usulan->luas_lahan }} M</td>
                                                    <td class="text-center" style="vertical-align: middle">
                                                        @foreach ($usulanFotos[$key] as $ke => $foto)
                                                            <a href="{{ asset('storage/' . $foto->nama) }}"
                                                                class="fancybox" data-fancybox="gallery{{ $key }}">
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
                                                        <a href="/usulan-bangunan/{{ $usulan->id }}/edit" class="btn btn-warning text-white">Edit</a>

                                                        <form action="/usulan-bangunan/{{ $usulan->id }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')

                                                            <button type="submit" class="btn text-white mt-2"
                                                                style="background-color: #00a65b"
                                                                onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>

                                                        </form>
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
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="/bangunan-all/update-ketersediaan/{{ $dataKelas->id }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header">
                            <h4 class="modal-title">Masukan Ketersediaan</h4>
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
                                    value="{{ $dataKelas->ketersediaan }}">
                            </div>
                            {{-- end input jumlah ruangan --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn text-white" style="background-color: #00a65b">Save
                                changes</button>
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
                    <form action="/bangunan-all/{{ $dataKelas->id }}" method="post">
                        @csrf
                        @method('patch')
                        <div class="modal-header">
                            <h4 class="modal-title">Masukan Kekurangan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {{-- input jumlah ruangan --}}
                            <input type="hidden" name="id_ruangKelas" value="{{ $dataKelas->id }}">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Kekurangan</label>
                                <input type="number" class="form-control col-sm-7" placeholder="Masukan Kekurangan"
                                    id="kekurangan" name="kekurangan" required value="{{ $dataKelas->kekurangan }}">
                            </div>
                            {{-- end input jumlah ruangan --}}
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn text-white" style="background-color: #00a65b">Save
                                changes</button>
                        </div>
                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{-- end modal kekurangan --}}

        <!-- modal tambah usulan -->
        <div class="modal fade" id="modal-default">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form action="/bangunan/usulan-ruang-kelas" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Usulan</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
        <div class="content-backdrop fade"></div>

        {{-- Tab --}}
    <div class="modal fade" id="modal-edit">
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
    </div>
        {{-- End Tab --}}

        {{-- End Main --}}
        
    @endsection
