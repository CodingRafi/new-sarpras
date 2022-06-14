@extends('mylayouts.main')

@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
        left: 30px;
    }

    @media(max-width: 768px) {
        .btn-batal {
            margin-top: 5px;
        }
    }

</style>
@endsection

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
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Perpustakaan</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

{{-- Main-Content --}}

{{-- Row --}}
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                {{-- card header --}}
                <div class="card-header text-white" style="background-color: #00a65b">
                    <h4 class="card-title font-weight-bold">Jumlah Peserta Didik</h4>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white"></button>
                    </div>
                </div>
                {{-- end card header --}}
                {{-- card body --}}
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">{{ $jml_siswa }}</h1>
                </div>
                {{-- end card body --}}
            </div>
        </div>

        <div class="col">
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
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->kondisi_ideal }} M</h1>
                </div>
                {{-- end card body --}}
            </div>
        </div>

        <div class="col-lg-3 col-6">

            {{-- -------------------------------------- KETERSEDIAAN --------------------------------------- --}}
            <div class="card card-warning">
                <div class="card-header">
                    <h3 class="card-title text-white font-weight-bold">Ketersediaan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                            data-target="#edit-ketersediaan"><i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->ketersediaan }} M</h1>
                </div>
            </div>

            {{-- ----------------------------------- MODAL KETERSEDIAAN ------------------------------------ --}}
            <div class="modal fade" id="edit-ketersediaan">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="form-horizontal" method="post"
                            action="/bangunan-all/update-ketersediaan/{{ $data->id }}">
                            @csrf
                            @method('patch')
                            <div class="modal-header bg-warning">
                                <h4 class="modal-title text-white">Ketersediaan</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ketersediaan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="ketersediaan"
                                                name="ketersediaan" value="{{ $data->ketersediaan }}">
                                        </div>
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

        <div class="col">
            <div class="card">
                {{-- card header --}}
                <div class="card-header text-white" href="" style="background-color: #263238">
                    <h4 class="card-title font-weight-bold">Kekurangan</h4>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white"></button>
                    </div>
                </div>
                {{-- end card header --}}
                {{-- card body --}}
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->kekurangan }} M</h1>
                </div>
                {{-- end card body --}}
            </div>
        </div>
    </div>
    {{-- End Row --}}

    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title text-white pt-2 font-weight-bold">Usulan Perpustakaan</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="col">
                        <div class="col-lg-12">
                            @if (count($usulans) > 0)
                            <div class="table-responsive">
                                <table class="table table-bordered mt-3">
                                    {{-- judul table --}}
                                    <thead>
                                        <tr>
                                            <th rowspan="2" class="text-center" style="line-height: 70px">No</th>
                                            <th rowspan="2" class="text-center" style="line-height: 70px">Jenis Ruang
                                            </th>
                                            <th colspan="2" class="text-center">Ketersediaan Lahan</th>
                                            <th rowspan="2" class="text-center" style="line-height: 70px">Proposal
                                            </th>
                                            <th rowspan="2" class="text-center" style="line-height: 70px">Keterangan
                                            </th>
                                            <th rowspan="2" class="text-center" style="line-height: 70px">Aksi</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text-center">Luas Lahan</th>
                                            <th scope="col" class="text-center">Gambar Lahan</th>
                                        </tr>
                                    </thead>
                                    {{-- end judul table --}}
                                    {{-- isi table --}}
                                    <tbody>
                                        @foreach ($usulans as $key => $usulan)
                                        <tr>
                                            <th class="text-center">{{ $loop->iteration }}</th>
                                            <td class="text-center text-capitalize">
                                                {{ str_replace('_', ' ', $usulan->jenis) }}</td>
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
                                                <a href="/usulan-bangunan/{{ $usulan->id }}/edit"
                                                    class="btn btn-warning text-white">Edit</a>
                                                <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn text-white mt-2 btn-batal"
                                                        style="background-color: #00a65b"
                                                        onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>
                                                </form>
                                            </td>   
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    {{-- end isi table --}}
                                </table>
                            </div>
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
    {{-- End Main-Content --}}

    {{-- modal tambah usulan --}}
    <div class="modal fade" id="modal-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/usulan-ruang-perpustakaan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

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
    @endsection
