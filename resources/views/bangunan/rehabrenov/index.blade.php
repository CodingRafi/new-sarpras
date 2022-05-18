@extends('mylayouts.main')

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

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Ruang Rehab/ Renov</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>

{{----------------------------------------------- info box --------------------------------------------------}}
<div class="info-box p-0 pimpinan-infobox">
    <span class="info-box-icon p-4" style="background-color:#25b5e9; width: auto; min-width: 207px;">
        <img src="/assets/img/icons/flaticons/town.png"
            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
        <div class="ml-4">
            <span class="text-white">
                Kondisi Ideal
            </span>
            <div class="d-flex align-items-end justify-content-center">
                <h1 class="display-4 text-white">30</h1>
                <p class="text-white">/ Kantor</p>
            </div>
        </div>
    </span>
    <div class="info-box-content">
        <label>Keterangan:</label>
        <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka,     Ruang guru
            juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
            peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
            rapat.</p>
    </div>
</div>
<div class="info-box p-0 pimpinan-infobox">
    <span class="info-box-icon p-4" style="background-color:#fcc12d; width: auto; min-width: 207px;">
        <img src="/assets/img/icons/flaticons/building.png"
            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
        <div class="ml-4">
            <span class="text-white">
                Ketersediaan
            </span>
            <div class="d-flex align-items-end justify-content-center">
                <h1 class="display-4 text-white">11</h1>
                <p class="text-white">/ Kantor</p>
            </div>
        </div>
    </span>
    <div class="info-box-content">
        <label>Keterangan:</label>
        <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka, Ruang guru
            juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
            peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
            rapat.</p>
    </div>
</div>
<div class="info-box p-0 pimpinan-infobox">
    <span class="info-box-icon p-4" style="background-color:#263238; width: auto; min-width: 207px;">
        <img src="/assets/img/icons/flaticons/school.png"
            style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
        <div class="ml-4">
            <span class="text-white">
                Kekurangan
            </span>
            <div class="d-flex align-items-end justify-content-center">
                <h1 class="display-4 text-white">3</h1>
                <p class="text-white">/ Kantor</p>
            </div>
        </div>
    </span>
    <div class="info-box-content">
        <label>Keterangan:</label>
        <p>Ruang guru jga bisa di pakai untuk menyimpan dokumen dokumen penting tentang anak didik mereka, Ruang guru
            juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat
            peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan
            rapat.</p>
    </div>
</div>

{{----------------------------------------------- end inf box -----------------------------------------------}}

<div class="card">
    <div class="card-header" style="background-color: #25b5e9">
        <h3 class="card-title text-white pt-2">Usulan</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal" data-target="#modal-usulan"><i class="bi bi-plus"></i> Tambah Usulan
            </button>
        </div>
    </div>
    <!-- /.card-header DATA SEKOLAH-->
    <div class="card-body p-0">
        <div class="tab-content p-0">
            <div class="tab-pane active" id="data-usulan-sekolah">
                <div class="col">
                    <div class="col-lg-12">
                        <table class="table table-bordered mt-3">
                            {{-- judul table --}}
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="line-height: 70px">No</th>
                                    <th rowspan="2" class="text-center" style="line-height: 70px">Jenis Usulan</th>
                                    <th rowspan="2" class="text-center" style="line-height: 70px">Jumlah Usulan</th>
                                    <th colspan="2" class="text-center">Ketersediaan Lahan</th>
                                    <th rowspan="2" class="text-center" style="line-height: 70px">Proposal</th>
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
                                <tr>
                                    <th class="text-center">1</th>
                                    <td class="text-center">Ruang Guru</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">20 M</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">2</th>
                                    <td class="text-center">Ruang Guru</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">20 M</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">3</th>
                                    <td class="text-center">Ruang Guru</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">20 M</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                              </tbody>
                            {{-- end isi table --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header" style="background-color: #fcc12d">
        <h3 class="card-title text-white pt-2">Rencana Rehab/ Renov</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool border border-light text-white" data-toggle="modal" data-target="#modal-rencana-usulan"><i class="bi bi-plus"></i> Tambah Usulan
            </button>
        </div>
    </div>
    <!-- /.card-header DATA SEKOLAH-->
    <div class="card-body p-0">
        <div class="tab-content p-0">
            <div class="tab-pane active" id="data-usulan-sekolah">
                <div class="col">
                    <div class="col-lg-12">
                        <table class="table table-bordered mt-3">
                            {{-- judul table --}}
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center" style="line-height: 170px">No</th>
                                    <th rowspan="2" class="text-center" style="line-height: 170px">Jenis Usulan</th>
                                    <th colspan="2" class="text-center" style="line-height: 70px">Tingkat Kerusakan</th>
                                    <th colspan="3" class="text-center" style="line-height: 70px">Objek Rehab/ Renov</th>
                                    <th rowspan="2" class="text-center" style="line-height: 170px">Proposal</th>
                                    <th rowspan="2" class="text-center" style="line-height: 170px">Aksi</th>
                                </tr>
                                <tr>
                                    <th class="text-center" style="line-height: 70px">Persentase</th>
                                    <th class="text-center" style="line-height: 70px">Usia</th>
                                    <th class="text-center" style="line-height: 70px">Objek</th>
                                    <th class="text-center" style="line-height: 70px">Luas Lahan</th>
                                    <th class="text-center" style="line-height: 70px">Gambar</th>
                                </tr>
                              </thead>
                            {{-- end judul table --}}

                            {{-- isi table --}}
                            <tbody>
                                <tr>
                                    <th class="text-center">1</th>
                                    <td class="text-center">Ruang Pembelajaran Umum</td>
                                    <td class="text-center">45%</td>
                                    <td class="text-center">10 Tahun</td>
                                    <td class="text-center">Atap</td>
                                    <td class="text-center">150m²</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">2</th>
                                    <td class="text-center">Ruang Pembelajaran Umum</td>
                                    <td class="text-center">45%</td>
                                    <td class="text-center">10 Tahun</td>
                                    <td class="text-center">Atap</td>
                                    <td class="text-center">150m²</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">3</th>
                                    <td class="text-center">Ruang Pembelajaran Umum</td>
                                    <td class="text-center">45%</td>
                                    <td class="text-center">10 Tahun</td>
                                    <td class="text-center">Atap</td>
                                    <td class="text-center">150m²</td>
                                    <td class="text-center" style="vertical-align: middle"><a href="/assets/img/backgrounds/school.jpg" class="fancybox" data-fancybox="gallery1"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" class="rounded" style="object-fit: cover; width: 150px; aspect-ratio: 1/1;"></a></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                              </tbody>
                            {{-- end isi table --}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Main-Content --}}

{{-- modal tambah usulan --}}
<div class="modal fade" id="modal-usulan">
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
            <label class="col-sm-4 col-form-label">Jenis Usulan</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Jenis Usulan" id="jenis-usulan"name="jenis-usulan" required value="">
        </div>
        {{-- end input jumlah ruangan --}}

        {{-- input luas lahan --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Jumlah Ruang</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Jumlah Usulan" id="jumlah-usulan"
            name="long" required value="">
        </div>
        {{-- end luas lahan --}}

        {{-- input luas lahan --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label">Luas Lahan</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Luas Lahan" id="luas-lahan"
            name="long" required value="">
        </div>
        {{-- end luas lahan --}}

        {{-- upload gambar lokasi --}}
        <div class="form-group row">
            <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar Lahan</label>
            <input type="file" id="gambar-lahan">
        </div>
        {{-- end upload gambar lokasi --}}

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

{{-- modal tambah usulan --}}
<div class="modal fade" id="modal-rencana-usulan">
  <div class="modal-dialog">
    <div class="modal-content">
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
          <input type="text" class="form-control col-sm-7" placeholder="Masukan Jenis Usulan" id="jenis-usulan"name="jenis-usulan" required value="">
      </div>
      {{-- end input jumlah ruangan --}}

      {{-- input luas lahan --}}
      <div class="form-group row">
          <label class="col-sm-4 col-form-label">Persentase</label>
          <input type="text" class="form-control col-sm-7" placeholder="Masukan Persentase Kerusakan" id="persentase"
          name="long" required value="">
      </div>
      {{-- end luas lahan --}}

      {{-- input luas lahan --}}
      <div class="form-group row">
          <label class="col-sm-4 col-form-label">Usia</label>
          <input type="text" class="form-control col-sm-7" placeholder="Masukan Usia" id="usia"
          name="long" required value="">
      </div>
      {{-- end luas lahan --}}

      {{-- input luas lahan --}}
      <div class="form-group row">
          <label class="col-sm-4 col-form-label">Objek</label>
          <input type="text" class="form-control col-sm-7" placeholder="Masukan Objek" id="objek"
          name="long" required value="">
      </div>
      {{-- end luas lahan --}}
      
      {{-- input luas lahan --}}
      <div class="form-group row">
          <label class="col-sm-4 col-form-label">Luas Lahan</label>
          <input type="text" class="form-control col-sm-7" placeholder="Masukan Luas" id="luas"
          name="long" required value="">
      </div>
      {{-- end luas lahan --}}

      {{-- upload proposal --}}
      <div class="form-group row">
          <label class="col-sm-4 col-form-label pt-1" for="customFile">Gambar</label>
          <input type="file" id="proposal">
      </div>
      {{-- end upload proposal --}}
      
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

<div class="content-backdrop fade"></div>
@endsection
