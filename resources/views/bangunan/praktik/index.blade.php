@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .card {
            border-radius: 15px;
        }

        .card:hover {
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .card img {
            border-radius: 15px
        }

        .card-body h5 {
            font-size: 1.3rem;
            font-weight: 700
        }

        .card-body p {
            font-size: 1.2rem;
            font-weight: 500;
        }

    .input-group-prepend button i {
        position: absolute;
        right: -40px;
        margin-top: -19px;
    }

    @media(max-width 480px) {}

</style>
@endsection

@section('container')
{{-- Main-Content --}}

{{-- Kompetensi Keahlian --}}
<div class="container d-flex justify-content-center">
    <div class="row" style="width: 95%">
        <div class="col-4 d-flex justify-content-center mt-4">
            <div class="card h-15 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Rekayasa Perangkat Lunak</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center mt-4">
            <div class="card h-20 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Broadcast</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center mt-4">
            <div class="card h-20 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Teknik Komputer Jaringan</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center mt-2">
            <div class="card h-20 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Teknik Elektronika Indusrtri</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center mt-2">
            <div class="card h-20 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Multimedia</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
        <div class="col-4 d-flex justify-content-center mt-2">
            <div class="card h-20 p-4" style="width: 20rem">
                <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                <div class="card-body">
                    <h5 class="card-title mb-2">Akutansi</h5>
                    <p class="card-text">30 Siswa</p>
                </div>
                <button type="button" class="btn btn-outline-primary">Detail</button>
            </div>
        </div>
    </div>
</div>

{{-- Ruang Praktik --}}
<div class="container-fluid mt-3">
    <div class="card">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="card-title text-white">Ruang Praktek Tersedia</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-lg"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table table-bordered table-hover text-center">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Jumlah Ruangan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Jumlah Ideal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Multimedia</td>
                                <td>10</td>
                                <td>Ideal</td>
                                <td>16 Siswa / Kelas</td>
                                <td></td>
                                <td>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-edit">Edit</a>
                                                    <a class="dropdown-item" href="">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Multimedia</td>
                                <td>10</td>
                                <td>Ideal</td>
                                <td>16 Siswa / Kelas</td>
                                <td></td>
                                <td>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-edit">Edit</a>
                                                    <a class="dropdown-item" href="">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">1</th>
                                <td>Multimedia</td>
                                <td>10</td>
                                <td>Ideal</td>
                                <td>16 Siswa / Kelas</td>
                                <td></td>
                                <td>
                                    <div class="card-body">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <button type="button" class="btn" data-toggle="dropdown">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-toggle="modal"
                                                        data-target="#modal-edit">Edit</a>
                                                    <a class="dropdown-item" href="">Hapus</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Usulan --}}
<div class="container-fluid mt-2">
    <div class="card">
        <div class="card-header bg-warning">
            <h3 class="card-title text-white">Usulan Ruang Praktik Baru</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                    data-target="#modal-default"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table table-hover table-bordered text-center">
                        <thead>
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Jenis Ruang</th>
                                <th rowspan="2">Jumlah Ruang</th>
                                <th colspan="2">Ketersedian Lahan</th>
                                <th rowspan="2">Proposal</th>
                                <th rowspan="2">Keterangan</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Gambar Lahan</th>
                                <th class="text-center">Luas Lahan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usulanPraktek as $key => $usulan)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $komliUsulan[$key]->kompetensi }}</td>
                                    <td>{{ $usulan->jml_ruang }}</td>
                                    <td style="vertical-align: middle">
                                        @foreach ($usulanFotos[$key] as $ke => $foto)    
                                        <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox"
                                            data-fancybox="gallery{{ $key }}"><img src="{{ asset('storage/' . $foto->nama) }}"
                                                class="rounded"
                                                style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                        </a>
                                        @endforeach
                                    </td>
                                    <td>{{ $usulan->luas_lahan }} m²</td>
                                    <td>
                                        <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                            <img src="/img/pdf.png" alt="image" style="width: 30px">
                                        </a>
                                    </td>
                                    <td>
                                        <form action="/bangunan/usulan-ruang-praktik/{{ $usulan->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-success" onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Usulan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        {{-- input jurusan --}}
                        <div class="row">
                            <div class="col-3">
                                <label for="cars">Jurusan</label>
                            </div>
                            <div class="col">
                                <select name="cars" id="cars" class="btn btn-outline-secondary col-12">
                                    <option value="">Rekayasa Perangkat Lunak</option>
                                    <option value="">Teknik Elektronika Industri</option>
                                    <option value="">Broadcast</option>
                                    <option value="">Multimedia</option>
                                    <option value="">Teknik Komputer Jaringan</option>
                                </select>
                            </div>
                        </div>
                        {{-- end input jurusan --}}

                        {{-- input jumlah ruangan --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label>Jumlah Ruangan</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-12" placeholder="Masukan Jumlah Ruang"
                                    id="jmlrg" name="long" required value="">
                            </div>
                        </div>
                        {{-- end input jumlah ruangan --}}

                        {{-- input status --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label>Status</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-12" placeholder="Masukan Status" id="jmlrg"
                                    name="long" required value="">
                            </div>
                        </div>
                        {{-- end input status --}}

                        {{-- input jumlah ideal --}}
                        <div class="row mt-4">
                            <div class="col-3">
                                <label>Jumlah Ideal</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-12" placeholder="Masukan Jumlah Ideal"
                                    id="jmlrg" name="long" required value="">
                            </div>
                        </div>
                        {{-- end input jumlah ideal --}}

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success">Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal tambah usulan --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/bangunan/usulan-ruang-praktik" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Usulan</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (count($komlis) > 0)
                            {{-- input jumlah ruangan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jenis Ruang</label>
                                <select class="custom-select col-sm-7" aria-label="Default select example" name="kompeten_id">
                                    @foreach ($komlis as $key => $komli)
                                        <option value="{{ $kompetens[$key]->id }}">{{ $komli->kompetensi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- end input jumlah ruangan --}}

                            {{-- input luas lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
                                <input type="number" class="form-control col-sm-7" placeholder="Masukan Jumlah Ruang"
                                    id="jumlah-ruang" name="jml_ruang" required>
                            </div>
                            {{-- end luas lahan --}}

                            {{-- upload gambar lokasi --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
                                <input type="file" id="gambar-lahan" name="gambar[]" multiple accept="image/*" required>
                            </div>
                            {{-- end upload gambar lokasi --}}

                            {{-- input luas lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Luas Lahan</label>
                                <input type="number" class="form-control col-sm-7" placeholder="Masukan Luas Lahan"
                                    id="luas-lahan" name="luas_lahan" required value="">
                            </div>
                            {{-- end luas lahan --}}

                            {{-- upload proposal --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                                <input type="file" id="proposal" name="proposal" accept=".pdf" required>
                            </div>
                            {{-- end upload proposal --}}
                        @else
                            <div class="container d-flex justify-content-center align-items-center">
                                <div class="alert" role="alert">
                                    Tidak ada Kompetensi ditemukan
                                  </div>
                            </div>
                        @endif
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

{{-- Tab --}}
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="/kekurangan-lahan/update-kekurangan" method="post">
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
                                <label for="col-sm-4 col-form-label">Jurusan :</label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control col-sm-7 input-nama-edit"
                                    placeholder="Masukan Nama Jurusan" id="nmajk" name="jurusan" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Jumlah Ruangan :</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control col-sm-7 panjang-nama-edit"
                                    placeholder="Masukan Jumlah Ruang" id="jmlrg" name="ruang" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Status :</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control col-sm-7 lebar-nama-edit"
                                    placeholder="Masukan Status" id="status" name="status" required>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-3">
                                <label for="col-sm-4 col-form-label">Jumlah Ideal :</label>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control col-sm-7 lebar-nama-edit"
                                    placeholder="Masukan Jumlah Ideal" id="jmlidl" name="ideal" required>
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


    {{-- End Main-Content --}}
@endsection
