@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .inf0-box {
            border-radius: 15px;
        }

        .info-box:hover {
            cursor: pointer;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
        }

        .input-group-prepend button i {
            position: absolute;
            right: -40px;
            margin-top: -19px;
        }

        @media only screen and (max-width: 480px) {
            .input-group-prepend button i {
                position: absolute;
                right: 4px;
                margin-top: -19px;
            }
        }
    </style>
@endsection

@section('container')
    {{-- Main-Content --}}

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Kompetensi Keahlian</h1>
                </div>
            </div>
        </div>
    </div>


    {{-- Kompetensi Keahlian --}}

    <div class="container-fluid">
        <div class="row">

            @foreach ($kompetens as $id => $kompeten)
                {{-- <div class="col-4 d-flex justify-content-center mt-4">
                    <div class="card h-15 p-4" style="width: 20rem">
                        @if ($kompeten->logo)
                            <h1>ada</h1>
                        @else
                            <img src="/img/Kompetensi Keahlian.png" class="card-img-top border rounded-circle" alt="...">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title mb-2"></h5>
                            <p class="card-text"> Siswa</p>
                        </div>
                        <a href="" class="btn btn-outline-primary">Detail</a>
                    </div>
                </div> --}}
                <a href="/kompeten/{{ $kompeten->id }}" class="col-md-4 col-12">
                    <div class="info-box">
                        @if ($kompeten->logo)
                            <img src="{{ asset('storage/' . $kompeten->logo) }}" alt=""
                                style="width: 9.5rem; margin-top: 10px; margin-bottom: 10px;object-fit: cover;"
                                class="card-img-top border rounded-circle">
                        @else
                            <img src="/img/Kompetensi Keahlian.png" alt=""
                                style="width: 9.5rem; margin-top: 10px; margin-bottom: 10px;"
                                class="card-img-top border rounded-circle">
                        @endif
                        <div class="info-box-content" style="margin-left: 10px; margin-top: 10px; margin-bottom: 10px;">
                            <p class="font-weight-bold" style="font-size: 1.3rem">{{ $komlis[$id]->kompetensi }}</p>
                            <p class="font-weight-normal">{{ $kompeten->jml_lk + $kompeten->jml_pr }} Siswa</p>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>

    {{-- Ruang Praktik --}}
    <div class="container-fluid mt-3">
        <div class="card">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white font-weight-bold">Ruang Praktek Tersedia</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#modal-lg"><i class="bi bi-plus"></i> Tambah Ruang Tersedia
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="">
                        @if (count($datas) > 0)
                            <div class="table-responsive">
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
                                        @foreach ($datas as $data)
                                            <tr>
                                                <input type="hidden" class="id-ruangPraktik" value="{{ $data['id'] }}">
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td class="jurusan">{{ $data['jurusan'] }}</td>
                                                <td class="jml_ruang">{{ $data['jml_ruang'] }}</td>
                                                <td class="status">{{ $data['status'] }}</td>
                                                <td class="jml_ideal">{{ $data['jml_ideal'] }} Siswa / Kelas</td>
                                                <td class="keterangan">{{ $data['keterangan'] }}</td>
                                                <td>
                                                    <div class="card-body">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button type="button" class="btn edit-ketersediaan"
                                                                    data-toggle="dropdown">
                                                                    <i class="bi bi-three-dots-vertical"></i>
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" data-toggle="modal"
                                                                        data-target="#modal-edit">Edit</a>
                                                                    <form
                                                                        action="/bangunan/ruang-praktik/{{ $data['id'] }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button type="submit" class="dropdown-item"
                                                                            onclick="return confirm('Apakah anda yakin akan menghapus ketersedian ruang praktek ini?')">Hapus</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
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
            </div>
        </div>
    </div>

    {{-- Usulan --}}
    <div class="container-fluid mt-2">
        <div class="card">
            <div class="card-header bg-warning">
                <h3 class="card-title text-white font-weight-bold">Usulan Ruang Praktik Baru</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal"
                        data-target="#modal-default"><i class="bi bi-plus"></i> Tambah Usulan
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="">
                        @if (count($usulanPraktek) > 0)
                            <div class="table-responsive">
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
                                                        <a href="{{ asset('storage/' . $foto->nama) }}"
                                                            class="fancybox"
                                                            data-fancybox="gallery{{ $key }}"><img
                                                                src="{{ asset('storage/' . $foto->nama) }}"
                                                                class="rounded"
                                                                style="object-fit: cover; width: 150px; aspect-ratio: 1/1;{{ $ke == 0 ? '' : 'display:none;' }}">
                                                        </a>
                                                    @endforeach
                                                </td>
                                                <td>{{ $usulan->luas_lahan }} m²</td>
                                                <td>
                                                    <a href="{{ asset('storage/' . $usulan->proposal) }}"
                                                        target="_blank">
                                                        <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                    </a>
                                                </td>
                                                <td>{{ $usulan->keterangan }}</td>
                                                <td>
                                                    <form action="/usulan-bangunan/{{ $usulan->id }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-success"
                                                            onclick="return confirm('Apakah anda yakin akan membatalkan usulan ini?')">Batalkan</button>
                                                    </form>
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
            </div>
        </div>
    </div>

    {{-- Modal --}}
    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="/bangunan/ruang-praktik" method="post">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Ruang Praktik Tersedia</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            @if (count($komliPraktekTersedias) > 0)
                                {{-- input jurusan --}}
                                <div class="row">
                                    <div class="col-3">
                                        <label for="cars">Jurusan</label>
                                    </div>
                                    <div class="col">
                                        <select name="kompeten_id" id="cars" class="custom-select col-12"
                                            name="kompeten_id">
                                            @foreach ($komliPraktekTersedias as $key => $komli)
                                                <option value="{{ $kompetenPraktekTersedias[$key]->id }}">
                                                    {{ $komli->kompetensi }}
                                                </option>
                                            @endforeach
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
                                            id="jmlrg" name="jml_ruang" required>
                                    </div>
                                </div>
                                {{-- end input jumlah ruangan --}}
                            @else
                                <div class="container d-flex justify-content-center align-items-center">
                                    <div class="alert" role="alert">
                                        Tidak ada Kompetensi
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

    {{-- modal tambah usulan --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
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
                                <select class="custom-select col-sm-7" aria-label="Default select example"
                                    name="kompeten_id">
                                    @foreach ($komlis as $key => $komli)
                                        <option value="{{ $kompetens[$key]->id }}">{{ $komli->kompetensi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- end input jumlah ruangan --}}

                            {{-- input luas lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
                                <input type="number" class="form-control col-sm-7 loading-tambah"
                                    placeholder="Masukan Jumlah Ruang" id="jumlah-ruang" name="jml_ruang" required>
                            </div>
                            {{-- end luas lahan --}}

                            {{-- upload gambar lokasi --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
                                <input type="file" class="loading-tambah" id="gambar-lahan" name="gambar[]" multiple
                                    accept="image/*" required>
                            </div>
                            {{-- end upload gambar lokasi --}}

                            {{-- input luas lahan --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Luas Lahan</label>
                                <input type="number" class="form-control col-sm-7 loading-tambah"
                                    placeholder="Masukan Luas Lahan" id="luas-lahan" name="luas_lahan" required value="">
                            </div>
                            {{-- end luas lahan --}}

                            {{-- upload proposal --}}
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
                                <input type="file" class="loading-tambah" id="proposal" name="proposal" accept=".pdf"
                                    required>
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
                        <button type="submit" class="btn text-white loading-simpan"
                            style="background-color: #00a65b">Simpan</button>
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
                <form action="/bangunan/ruang-praktik" method="post">
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

                            <input type="hidden" name="id_praktik" class="id_praktik_kirim">
                            <div class="row mt-4">
                                <div class="col-3">
                                    <label for="col-sm-4 col-form-label">Jumlah Ruangan :</label>
                                </div>
                                <div class="col">
                                    <input type="number" class="form-control col-sm-7 jumlah-ruang-edit"
                                        placeholder="Masukan Jumlah Ruang" id="jmlrg" name="jml_ruang" required>
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

@section('tambahjs')
    <script>
        const editKetersediaan = document.querySelectorAll('.edit-ketersediaan');
        const jml_ruang = document.querySelectorAll('.jml_ruang');
        const jumlahRuangEdit = document.querySelector('.jumlah-ruang-edit');
        const id_praktik_kirim = document.querySelector('.id_praktik_kirim');
        const idRuangPraktik = document.querySelectorAll('.id-ruangPraktik');

        editKetersediaan.forEach((e, i) => {
            e.addEventListener('click', function() {
                jumlahRuangEdit.value = '';
                jumlahRuangEdit.value = parseInt(jml_ruang[i].innerHTML);
                id_praktik_kirim.value = '';
                id_praktik_kirim.value = idRuangPraktik[i].value;
            })
        });
    </script>
@endsection
