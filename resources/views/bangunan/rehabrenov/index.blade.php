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

{{------------------------------------------------ info box -------------------------------------------------}}
<div class="info-box p-0 pimpinan-infobox">
    <span class="info-box-icon bg-warning p-4" style="width: auto; min-width: 300px;"> <img src="/assets/img/icons/flaticons/building.png" style="filter: invert(100%); object-fit: cover; width: 50px; aspect-ratio: 1/1;">
    <div class="ml-4 text-white">
        Ketersediaan
        <div class="d-flex align-items-end justify-content-center">
            <h1 class="display-4" style="font-weight: 600;">11</h1>
            <p>/ Kantor</p>
        </div>
    </div>
    </span>
    <div class="info-box-content">
        <label>Keterangan: </label>
        <p>Ruang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik mereka, Ruang guru juga sRuang guru jga bisa di pakai untuk menyimpan dokumn dokumen penting tentang anak didik. mereka, Ruang guru juga sangat berfungsi untuk para guru guru atau staf sekolah lain nya, dapat dimanfaatkan untuk tempat peristirahatan para guru ketika selesai mengajar, tempat berkumpulnya para guru ketika ingin melakukan rapat.</p>
    </div>
</div>
{{----------------------------------------------- end inf box -----------------------------------------------}}

<div class="card">
    <div class="card-header" style="background-color: #25b5e9">
        <h3 class="card-title text-white pt-2">Usulan</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Tambah Usulan</button>
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
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">2</th>
                                    <td class="text-center">Ruang Guru</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">20 M</td>
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                </tr>
                                <tr>
                                    <th class="text-center">3</th>
                                    <td class="text-center">Ruang Guru</td>
                                    <td class="text-center">3</td>
                                    <td class="text-center">20 M</td>
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
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
    <div class="card-header" style="background-color: #25b5e9">
        <h3 class="card-title text-white pt-2">Rencana Rehab/ Renov</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Tambah Usulan</button>
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
                                    <th class="text-center" style="line-height: 70px">Luas</th>
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
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
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
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
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
                                    <td class="text-center"><img src="/img/kirill-ermakov-sa7IunnCsC0-unsplash.jpg" alt="image" style="width: 30px"></td>
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

{{-- modal ketersediaan --}}
<div class="modal fade" id="modal-ketersediaan">
    <div class="modal-dialog">
      <div class="modal-content">
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
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Ketersediaan" id="ketersediaan"name="jumlah-ruangan" required value="">
        </div>
        {{-- end input jumlah ruangan --}}
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn text-white" style="background-color: #00a65b">Save changes</button>
        </div>
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
        <div class="modal-header">
          <h4 class="modal-title">Masukan Kekurangan</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          {{-- input jumlah ruangan --}}
          <div class="form-group row">
            <label class="col-sm-4 col-form-label">Kekurangan</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Kekurangan" id="kekurangan"name="jumlah-ruangan" required value="">
        </div>
        {{-- end input jumlah ruangan --}}
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn text-white" style="background-color: #00a65b">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
{{-- end modal kekurangan --}}

<!-- modal tambah usulan -->
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
            <label class="col-sm-4 col-form-label">Jumlah Ruangan</label>
            <input type="text" class="form-control col-sm-7" placeholder="Masukan Jumlah Ruangan" id="jumlah-ruangan"name="jumlah-ruangan" required value="">
        </div>
        {{-- end input jumlah ruangan --}}

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
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn text-white" style="background-color: #00a65b">Save changes</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

<div class="content-backdrop fade"></div>
@endsection
