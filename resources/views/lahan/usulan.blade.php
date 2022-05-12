@extends('mylayouts.main')

@section('container')

<div class="container-fluid mt-3">
    <!-- Small boxes (Stat box) -->
    <div class="card mb-5">
        <div class="card-header" style="background-color: #25b5e9">
            <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link text-white active" href="#data-usulan-sekolah" data-toggle="tab">
                    <i class="bi bi-house-fill mr-1"></i> Data Usulan Lahan Baru</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#tambah-usulan-lahan" data-toggle="tab">
                    <i class="bi bi-plus-circle"></i> Pengajuan Usulan Lahan Baru</a>
                </li>
            </ul>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="row">
                        <div class="col-lg-6">
                            <table class="table table-hover table-border text-nowrap">
                                {{-- judul table --}}
                                <thead>
                                    <tr>
                                      <th class="text-center" scope="col">No</th>
                                      <th class="text-center" scope="col">Nama Lahan</th>
                                      <th class="text-center" scope="col">Jenis Usulan</th>
                                      <th class="text-center" scope="col">Panjang(M)</th>
                                      <th class="text-center" scope="col">Lebar(M)</th>
                                      <th class="text-center" scope="col">Luas Lahan(M²)</th>
                                      <th class="text-center" scope="col">Alamat</th>
                                      <th class="text-center" scope="col">Proposal Lahan</th>
                                      <th class="text-center" scope="col">Status Usulan</th>
                                      <th class="text-center" scope="col">Aksi</th>
                                    </tr>
                                  </thead>
                                {{-- end judul table --}}

                                {{-- isi table --}}
                                <tbody>
                                    <tr>
                                      <th class="text-center" scope="row" >1</th>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center">PROPOSAL</td>
                                      <td class="text-center">20 M</td>
                                      <td class="text-center">10 M</td>
                                      <td class="text-center">30 M²</td>
                                      <td class="text-center">BANDUNG</td>
                                      <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                    </tr>
                                    <tr>
                                      <th class="text-center" scope="row" >2</th>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center">PROPOSAL</td>
                                      <td class="text-center">20 M</td>
                                      <td class="text-center">10 M</td>
                                      <td class="text-center">30 M²</td>
                                      <td class="text-center">BANDUNG</td>
                                      <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                    </tr>
                                    <tr>
                                      <th class="text-center" scope="row" >3</th>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center">PROPOSAL</td>
                                      <td class="text-center">20 M</td>
                                      <td class="text-center">10 M</td>
                                      <td class="text-center">30 M²</td>
                                      <td class="text-center">BANDUNG</td>
                                      <td class="text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                      <td class="text-center">XXXXXX</td>
                                      <td class="text-center"><a href="#" class="btn text-white" style="background-color: #00a65b">Batalkan</a></td>
                                    </tr>
                                  </tbody>
                                {{-- end isi table --}}
                            </table>
                        </div>
                    </div>
                </div>
                <div class="chart tab-pane" id="tambah-usulan-lahan">
                  <div class="card-body">
                    {{-- input nama lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Nama Lahan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Nama Lahan" id="nama-lahan" name="npsn" required value="">
                    </div>
                    {{-- end input nama lahan --}}

                    {{-- input panjang --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Panjang(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan" id="panjang" name="nama" required value="">
                    </div>
                    {{-- end input panjang --}}

                    {{-- input lebar --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Lebar(M)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Lebar Lahan"
                        id="lebar" name="status_sekolah" required value="">
                    </div>
                    {{-- end input lebar --}}

                    {{-- input luas lahan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Luas Lahan(M²)</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Luas Lahan" id="l-lahan"name="lat" required value="">
                    </div>
                    {{-- end input luas lahan --}}

                    {{-- input alamat --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Alamat" id="alamat"
                        name="long" required value="">
                    </div>
                    {{-- end input alamat --}}

                    {{-- upload file(pdf) --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label pt-1" for="customFile">Choose file</label>
                        <input type="file" id="chooseFile">
                    </div>
                    {{-- end upload file(pdf) --}}

                    {{-- input status usulan --}}
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Status Usulan</label>
                        <input type="text" class="form-control col-sm-9" placeholder="Masukan Status Usulan" id="status-usulan" name="website" required value="">
                    </div>
                    {{-- end input status usulan --}}

                    {{-- button simpan --}}
                    <button type="submit" class="btn text-white col-sm-1" style="background-color: #00a65b">Simpan</button>
                    {{-- end button simpan --}}
                 </div>
              </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->


@endsection
