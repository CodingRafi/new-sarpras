@extends('mylayouts.main')

@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
        left: 35px;
    }

    @media (max-width: 480px) {
        .card .card-title {
            font-size: 14px;
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
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Penunjang</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<div class="container-fluid">

    {{-- ---------------------------------------------------------------------------------------- USULAN PIMPINAN ---------------------------------------------------------------------------------------- --}}
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title text-white font-weight-bold">Ruang Penunjang Tersedia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#tambah-tersedia"><i class="bi bi-plus"></i> Tambah Ketersediaan
                </button>
            </div>
        </div>
        <div class="card-body">
            @if (count($datas) > 0)
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="text-center">
                            <th style="vertical-align: middle;">No</th>
                            <th style="vertical-align: middle;">Jenis Ruang</th>
                            <th style="vertical-align: middle;">Kondisi Ideal</th>
                            <th style="vertical-align: middle;">Ketersediaan</th>
                            <th style="vertical-align: middle;">Kekurangan</th>
                            <th style="vertical-align: middle;">Keterangan</th>
                            <th style="vertical-align: middle;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $data)
                        {{-- @dd($data) --}}
                        <tr>
                            <td class="text-center" style="vertical-align: middle">{{ $loop->iteration }}
                            </td>
                            <td class="text-center" style="vertical-align: middle">{{ $data->nama }}</td>
                            <td class="text-center kondisi_ideal" style="vertical-align: middle">
                                {{ $data->kondisi_ideal }}
                            </td>
                            <td class="text-center ketersediaan" style="vertical-align: middle">
                                {{ $data->ketersediaan }}
                            </td>
                            <td class="text-center kekurangan" style="vertical-align: middle">
                                {{ $data->kekurangan }}
                            </td>
                            <td class="text-center keterangan" style="vertical-align: middle">
                                {{ $data->keterangan }}
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn" data-toggle="dropdown">
                                    <i class="bi bi-three-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <button type="submit" class="dropdown-item tombol-edit-ketersediaan"
                                        data-toggle="modal" data-target="#edit-tersedia"
                                        data-id="{{ $data->id_pimpinan }}">Edit</button>
                                    <form action="/bangunan/penunjang/{{ $data->id_pimpinan }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="dropdown-item"
                                            onclick="return confirm('Apakah anda yakin akan manghapus ketersediaan ruang penunjang ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
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
    <div class="modal fade" id="tambah-tersedia">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Ketersediaan Ruang Penunjang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if (count($jenis_pimpinans) > 0)
                    <form class="form-horizontal" action="/bangunan/penunjang" method="POST" onsubmit="myLoading()">
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
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="luas-lahan" name="kondisi_ideal"
                                        required placeholder="Kondisi Ideal">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="luas-lahan" name="ketersediaan"
                                        required placeholder="Ketersediaan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="luas-lahan" name="kekurangan" required
                                        placeholder="Kekurangan">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="keterangan" id="" cols="30" class="form-control"
                                        placeholder="Keterangan" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Simpan</button>
                        </div>
                    </form>
                    @else
                    <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                        <div class="alert" role="alert">
                            Belum ada jenis ruang Penunjang
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="edit-tersedia">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Ketersediaan Ruang Penunjang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal form-edit" action="/bangunan/penunjang" method="POST"
                        onsubmit="myLoading()">
                        @csrf
                        @method('patch')
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Kondisi Ideal</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-kondisi-ideal" id="luas-lahan"
                                        name="kondisi_ideal" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Ketersediaan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-ketersediaan" id="luas-lahan"
                                        name="ketersediaan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Kekurangan</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-kekurangan" id="luas-lahan"
                                        name="kekurangan" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="luas-lahan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="keterangan" id="" cols="30" class="form-control input-keterangan"
                                        placeholder="Keterangan" required></textarea>
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

    {{-- --------------------------------------- USULAN RUANG PENUNJANG --------------------------------------- --}}
    <div class="card card-info">
        <div class="card-header bg-warning">
            <h3 class="card-title font-weight-bold text-white">Usulan Ruang Penunjang</h3>
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
                            <th rowspan="2" style="vertical-align: middle;">Jumlah Ruang</th>
                            <th colspan="2">Ketersedian Lahan</th>
                            <th rowspan="2" style="vertical-align: middle;">Proposal</th>
                            <th rowspan="2" style="vertical-align: middle;">Keterangan</th>
                            <th rowspan="2" style="vertical-align: middle;">Aksi</th>
                        </tr>
                        <tr class="text-center">
                            <th>Luas Lahan</th>
                            <th>Gambar Lahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulans as $key => $usulan)
                        <tr>
                            <th class="text-center">{{ $loop->iteration }}</th>
                            <td class="text-center text-capitalize">{{ $usulan->nama }}
                            </td>
                            <td class="text-center">{{ $usulan->jml_ruang }}</td>
                            <td class="text-center">{{ $usulan->luas_lahan }} M²</td>
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
                                <a href="/bangunan/usulan/{{ $usulan->id }}/edit?home=penunjang"
                                    class="btn btn-warning text-white">Edit</a>
                                <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn text-white mt-2" style="background-color: #263238"
                                        onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>
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

    {{-- ------------------------------------------- MODAL USULAN ------------------------------------------ --}}
    <div class="modal fade" id="tambah-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/usulan-ruang-penunjang" method="post" enctype="multipart/form-data"
                    onsubmit="myLoading()">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan Ruang Penunjang</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (count($datas) > 0)
                        <div class="form-group row">
                            <label for="jumlah-lahan" class="col-sm-4 col-form-label">Jenis Ruang</label>
                            <select name="pimpinan_id" id="" required class="custom-select col-sm-7">
                                @foreach ($datas as $data)
                                <option value="{{ $data->id_pimpinan }}">{{ $data->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
                            <input type="number" class="form-control col-sm-7 loading-tambah"
                                placeholder="Masukan Jumlah Ruangan" id="jumlah-ruangan" name="jml_ruang" required>
                        </div>
                        {{-- end input jumlah ruangan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Luas Lahan (M²)</label>
                            <input type="number" class="form-control col-sm-7 loading-tambah"
                                placeholder="Masukan Luas Lahan" id="luas-lahan" name="luas_lahan" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- upload gambar lokasi --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
                            <input type="file" class="loading-tambah" id="gambar-lahan" required multiple
                                accept="image/*" name="gambar[]">
                        </div>
                        {{-- end upload gambar lokasi --}}
                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                            <input type="file" class="loading-tambah" id="proposal" required accept=".pdf"
                                name="proposal">
                        </div>
                        {{-- end upload proposal --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn text-white loading-simpan"
                            style="background-color: #00a65b">Simpan</button>
                    </div>
                </form>
                @else
                <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                    <div class="alert" role="alert">
                        Belum ada jenis ruang Penunjang
                    </div>
                </div>
                @endif
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div><!-- /.container-fluid -->
@endsection

@section('tambahjs')
<script>
    const tombolEditKetersediaan = document.querySelectorAll('.tombol-edit-ketersediaan');
    const kondisi_ideal = document.querySelectorAll('.kondisi_ideal');
    const ketersediaan = document.querySelectorAll('.ketersediaan');
    const kekurangan = document.querySelectorAll('.kekurangan');
    const keterangan = document.querySelectorAll('.keterangan');
    const inputKondisiIdeal = document.querySelector('.input-kondisi-ideal');
    const inputKetersediaan = document.querySelector('.input-ketersediaan');
    const inputKekurangan = document.querySelector('.input-kekurangan');
    const inputKeterangan = document.querySelector('.input-keterangan');
    const formEdit = document.querySelector('.form-edit');

    tombolEditKetersediaan.forEach((e, i) => {
        console.log(i)
        e.addEventListener('click', function () {
            inputKondisiIdeal.value = '';
            inputKondisiIdeal.value = kondisi_ideal[i].innerHTML.trim();
            inputKetersediaan.value = '';
            inputKetersediaan.value = ketersediaan[i].innerHTML.trim();
            inputKekurangan.value = '';
            inputKekurangan.value = kekurangan[i].innerHTML.trim();
            inputKeterangan.innerHTML = '';
            inputKeterangan.innerHTML = keterangan[i].innerHTML.trim();
            formEdit.removeAttribute('action');
            formEdit.setAttribute('action', '/bangunan/penunjang/' + e.getAttribute('data-id'));
        })
    });

</script>
@endsection
