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
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal" data-target="#modal-lg"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col">No</th>
                                <th class="text-center" scope="col">Jurusan</th>
                                <th class="text-center" scope="col">Jumlah Ruangan</th>
                                <th class="text-center" scope="col">Status</th>
                                <th class="text-center" scope="col">Jumlah Ideal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="text-center">Multimedia</td>
                                <td class="text-center">10</td>
                                <td class="text-center">Ideal</td>
                                <td class="text-center">16 Siswa / Kelas</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="text-center">Multimedia</td>
                                <td class="text-center">10</td>
                                <td class="text-center">Ideal</td>
                                <td class="text-center">16 Siswa / Kelas</td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="text-center">Multimedia</td>
                                <td class="text-center">10</td>
                                <td class="text-center">Ideal</td>
                                <td class="text-center">16 Siswa / Kelas</td>
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
                <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal" data-target="#modal-default"><i class="bi bi-plus"></i> Tambah Usulan
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane active" id="">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No</th>
                                <th class="text-center" rowspan="2">Jenis Ruang</th>
                                <th class="text-center" rowspan="2">Jumlah Ruang</th>
                                <th class="text-center" colspan="2">Ketersedian Lahan</th>
                                <th class="text-center" rowspan="2">Proposal</th>
                                <th class="text-center" rowspan="2">Aksi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Gambar Lahan</th>
                                <th class="text-center">Luas Lahan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center" scope="row">1</th>
                                <td class="text-center">Multimedia</td>
                                <td class="text-center">5</td>
                                <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                <td class="text-center">150m²</td>
                                <td class="text-center"><img src="/img/pdf2.png" alt="image" style="width: 30px"></td>
                                <td class="text-center"><a href="#" class="btn btn-success">Batalkan</a></td>
                            </tr>
                            <tr>
                                <th class="text-center" scope="row">2</th>
                                <td class="text-center">Rekayasa Perangkat Lunak</td>
                                <td class="text-center">10</td>
                                <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                <td class="text-center">200m²</td>
                                <td class="text-center"><img src="/img/pdf2.png" alt="image" style="width: 30px"></td>
                                <td class="text-center"><a href="#" class="btn btn-success">Batalkan</a></td>
                            </tr>
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
                            <input type="text" class="form-control col-12" placeholder="Masukan Jumlah Ideal" id="jmlrg"
                                name="long" required value="">
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
        <div class="modal-header">
          <h4 class="modal-title">Usulan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- input jumlah ruangan --}}
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jenis Ruang</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Jenis Ruang" id="jenis-ruang"name="jenis-ruang" required value="">
        </div>
        {{-- end input jumlah ruangan --}}

        {{-- input luas lahan --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Jumlah Ruang" id="jumlah-ruang"
            name="long" required value="">
        </div>
        {{-- end luas lahan --}}

        {{-- upload gambar lokasi --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
            <input type="file" id="gambar-lahan">
        </div>
        {{-- end upload gambar lokasi --}}

        {{-- input luas lahan --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Luas Lahan</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Luas Lahan" id="luas-lahan"
            name="long" required value="">
        </div>
        {{-- end luas lahan --}}

        {{-- upload proposal --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label pt-1" for="customFile">Proposal</label>
            <input type="file" id="proposal">
        </div>
        {{-- end upload proposal --}}
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="button" class="btn text-white" style="background-color: #00a65b">Simpan</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
{{-- end modal tambah usulan --}}


{{-- End Main-Content --}}

@endsection
