@extends('mylayouts.main')

@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
        left: 35px;
    }

    .dropdown-menu {
        position: absolute;
         !important top: 22px;
         !important left: -11px;
         !important
    }

    @media(max-width: 480px) {
        .btn-batal {
            margin-top: 5px;
        }
    }

</style>
@endsection

@section('container')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Toilet</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="container-fluid">


    <div class="row">
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- JUMLAH PESERTADIDIK ---------------------------------------------------------------------------------------- --}}
            <div class="card">
                <div class="card-header" style="background-color: #00a65b">
                    <h3 class="card-title font-weight-bold text-white">Jumlah Peserta Didik</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool"><i class="fas fa-minus" style="display: none"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <h1 class="text-center font-weight-bold pt-2">{{ $jml_siswa }}</h1>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KONDISI IDEAL ---------------------------------------------------------------------------------------- --}}
            <div class="card card-info">
                <div class="card-header" style="background-color: #25b5e9">
                    <h3 class="card-title font-weight-bold">Kondisi Ideal</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                            data-target="#edit-ideal"><i class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->kondisi_ideal }}</h1>
                </div>
            </div>

            {{-- ---------------------------------------------------------------------------------------- MODAL IDEAL ---------------------------------------------------------------------------------------- --}}
            <div class="modal fade" id="edit-ideal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #25b5e9">
                            <h4 class="modal-title text-white">Kondisi Ideal</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" method="post"
                                action="/bangunan-all/update-kondisi-ideal/{{ $data->id }}">
                                @csrf
                                @method('patch')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="ideal" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                        <div class="col-sm-10">
                                            <input type="number" class="form-control" id="ideal" name="kondisi_ideal"
                                                value="{{ $data->kondisi_ideal }}">
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
        </div>
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
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
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->ketersediaan }}</h1>
                </div>
            </div>

            {{-- ---------------------------------------------------------------------------------------- MODAL KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
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
        <div class="col-lg-3 col-6">

            {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
            <div class="card card-dark">
                <div class="card-header">
                    <h3 class="card-title font-weight-bold">Kekurangan</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-toggle="modal" data-target="#edit-kekurangan"><i
                                class="bi bi-pencil-square"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex align-items-end justify-content-center">
                    <h1 class="text-center font-weight-bold pt-2">{{ $data->kekurangan }}</h1>
                </div>
            </div>
        </div>

        {{-- ---------------------------------------------------------------------------------------- MODAL KEKURANGAN ---------------------------------------------------------------------------------------- --}}
        <div class="modal fade" id="edit-kekurangan">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h4 class="modal-title">Kekurangan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/bangunan-all/update-kekurangan/{{ $data->id }}"
                            method="POST">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kekurangan" class="col-sm-2 col-form-label">Kekurangan</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="kekurangan" name="kekurangan"
                                            value="{{ $data->kekurangan }}">
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
    </div>

    {{-- ---------------------------------------------------------------------------------------- USULAN TOILET ---------------------------------------------------------------------------------------- --}}
    <div class="card card-info">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title font-weight-bold">Usulan Toilet</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (count($usulans) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th rowspan="2" style="vertical-align: middle;">No</th>
                            <th rowspan="2" style="vertical-align: middle;">Jenis Ruang</th>
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
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Launch demo modal
                                    </button>
                                </form>
                        </tr>
                        @endforeach
                    </tbody>
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

    {{-- ---------------------------------------------------------------------------------------- MODAL USULAN ---------------------------------------------------------------------------------------- --}}
    <div class="modal fade" id="tambah-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/usulan-toilet" method="post" enctype="multipart/form-data">
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
                            <input type="file" id="gambar-lahan" class="form-control is-invalid" required multiple
                                accept="image/*" name="gambar[]">
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

    {{-- Modal Hapus --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

</div><!-- /.container-fluid -->
@endsection
