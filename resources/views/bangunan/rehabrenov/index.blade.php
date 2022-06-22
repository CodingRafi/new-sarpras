@extends('mylayouts.main')

@section('tambahcss')
<style>
    .input-group-prepend button i {
        position: absolute;
    }

</style>
@endsection

@section('container')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Rehab/Renov</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
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
                                                <a href="{{ asset('storage/' . $foto_rehab->nama) }}" class="fancybox"
                                                    data-fancybox="gallery-rehab{{ $key }}">
                                                    <img src="{{ asset('storage/' . $foto_rehab->nama) }}"
                                                        class="rounded"
                                                        style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                </a>
                                                @endif
                                                @endforeach
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ asset('storage/' . $rehab->proposal) }}" target="_blank">
                                                    <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                </a>
                                            </td>
                                            <td>{{ $rehab->keterangan }}</td>
                                            <td class="text-center">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a href="/bangunan/ruang-rehabrenov/{{ $rehab->id }}/edit"
                                                        class="dropdown-item">Edit</a>
                                                    <form action="/bangunan/ruang-rehabrenov/{{ $rehab->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="dropdown-item "
                                                            onclick="return confirm('Apakah anda yakin akan menghapus rehab/renov ini?')">Batalkan</button>
                                                    </form>
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
            <form action="/bangunan/ruang-rehabrenov" method="post" enctype="multipart/form-data"
                onsubmit="myLoading()">
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
                            <option value="ruang_penunjang">Ruang Penunjang</option>
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
                        <textarea id="" rows="5" class="form-control col-sm-7" name="keterangan"
                            placeholder="Keterangan" required></textarea>
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
