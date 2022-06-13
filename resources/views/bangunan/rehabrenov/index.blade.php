@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .input-group-prepend button i {
            position: absolute;
            left: 35px;
        }
    </style>
@endsection

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Rehab/ Renov</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    {{-- --------------------------------------- USULAN RUANG PENUNJANG --------------------------------------- --}}
    <div class="card card-info">
        <div class="card-header" style="background: #25B5E9;">
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
                                        <a href="/bangunan/usulan/{{ $usulan->id }}/edit?home=rehab"
                                            class="btn btn-warning text-white">Edit</a>
                                        <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn text-white mt-2"
                                                style="background-color: #00a65b"
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
                @if (count($datas) > 0)
                    <form action="/bangunan/usulan-ruang-penunjang" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h4 class="modal-title">Usulan Ruang Penunjang</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group row">
                                <label for="jumlah-lahan" class="col-sm-4 col-form-label">Jenis Ruang</label>
                                <select name="pimpinan_id" id="" required class="custom-select col-sm-7">
                                    @foreach ($datas as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
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

    <div class="card">
        <div class="card-header" style="background-color: #fcc12d">
            <h3 class="card-title text-white pt-2 font-weight-bold">Rencana Rehab/ Renov</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-rencana-usulan"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="col">
                        <div class="col-lg-12">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    @if (count($rehabs) > 0)
                                        <table class="table table-bordered table-hover mt-3">
                                            {{-- judul table --}}
                                            <thead>
                                                <tr>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">No
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                        Jenis
                                                        Usulan</th>
                                                    <th colspan="2" class="text-center" style="vertical-align: middle">
                                                        Tingkat
                                                        Kerusakan</th>
                                                    <th colspan="3" class="text-center" style="vertical-align: middle">
                                                        Objek
                                                        Rehab/ Renov
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                        Proposal
                                                    </th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                        Keterangan</th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle">
                                                        Aksi
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center">Persentase</th>
                                                    <th class="text-center">Usia</th>
                                                    <th class="text-center">Objek</th>
                                                    <th class="text-center">Luas Lahan</th>
                                                    <th class="text-center">Gambar</th>
                                                </tr>
                                            </thead>
                                            {{-- end judul table --}}
                                            {{-- isi table --}}
                                            <tbody>
                                                @foreach ($rehabs as $key => $rehab)
                                                    <tr>
                                                        <th class="text-center">{{ $loop->iteration }}</th>
                                                        <td class="text-center" style="text-transform: capitalize;">
                                                            {{ str_replace('_', ' ', $rehab->jenis) }}
                                                        </td>
                                                        <td class="text-center">{{ $rehab->persentase }}%</td>
                                                        <td class="text-center">{{ $rehab->usia }} Tahun</td>
                                                        <td class="text-center">{{ $rehab->objek }}</td>
                                                        <td class="text-center">{{ $rehab->luas_lahan }} m²</td>
                                                        <td class="text-center" style="vertical-align: middle">
                                                            @foreach ($usulanFotos_rehab[$key] as $ke => $foto_rehab)
                                                                @if ($foto_rehab != null)
                                                                    <a href="{{ asset('storage/' . $foto_rehab->nama) }}"
                                                                        class="fancybox"
                                                                        data-fancybox="gallery-rehab{{ $key }}">
                                                                        <img src="{{ asset('storage/' . $foto_rehab->nama) }}"
                                                                            class="rounded"
                                                                            style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                                    </a>
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td class="text-center">
                                                            <a href="{{ asset('storage/' . $rehab->proposal) }}"
                                                                target="_blank">
                                                                <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                            </a>
                                                        </td>
                                                        <td>{{ $rehab->keterangan }}</td>
                                                        <td>
                                                            <div class="card-body">
                                                                <div class="input-group">
                                                                    <div class="input-group-prepend">
                                                                        <button type="button" class="btn"
                                                                            data-toggle="dropdown">
                                                                            <i class="bi bi-three-dots-vertical"></i>
                                                                        </button>
                                                                        <div class="dropdown-menu"
                                                                            style="margin-left: -73px">
                                                                            <a href="/bangunan/ruang-rehabrenov/{{ $rehab->id }}/edit"
                                                                                class="dropdown-item">Edit</a>
                                                                            <form
                                                                                action="/bangunan/ruang-rehabrenov/{{ $rehab->id }}"
                                                                                method="post">
                                                                                @csrf
                                                                                @method('delete')
                                                                                <button type="submit"
                                                                                    class="dropdown-item "
                                                                                    onclick="return confirm('Apakah anda yakin akan menghapus rehab/renov ini?')">Batalkan</button>
                                                                            </form>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Main-Content --}}

    {{-- modal tambah usulan --}}
    <div class="modal fade" id="modal-rencana-usulan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/ruang-rehabrenov" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan Rencana Rehab/ Renov</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- input jumlah ruangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Jenis Usulan</label>
                            <select name="jenis" id="" class="custom-select col-sm-7" required>
                                <option value="ruang_kelas">Ruang Kelas</option>
                                <option value="ruang_praktek">Ruang Praktek</option>
                                <option value="laboratorium">Laboratorium</option>
                                <option value="perpustakaan">Perpustakaan</option>
                                <option value="toilet">Toilet</option>
                            </select>
                        </div>
                        {{-- end input jumlah ruangan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Persentase (%)</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Persentase Kerusakan"
                                id="persentase" name="persentase" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Usia</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Usia" id="usia"
                                name="usia" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Objek</label>
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Objek" id="objek"
                                name="objek" required>
                            <small class="text-danger col-sm-7">Objek seperti : atap, dinding</small>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input luas lahan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Luas Lahan (M²)</label>
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Luas" id="luas"
                                name="luas_lahan" required>
                        </div>
                        {{-- end luas lahan --}}

                        {{-- input Keterangan --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Keterangan</label>
                            <textarea id="" rows="5" class="form-control col-sm-7" name="keterangan" placeholder="Keterangan" required></textarea>
                        </div>
                        {{-- end Keterangan --}}

                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar</label>
                            <input type="file" id="proposal" name="gambar[]" multiple accept="image/*" required>
                        </div>
                        {{-- end upload proposal --}}

                        {{-- upload proposal --}}
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                            <input type="file" id="proposal" name="proposal" accept=".pdf" required>
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
    {{-- end modal tambah usulan --}}

    <div class="content-backdrop fade"></div>
@endsection
