@extends('mylayouts.main')

@section('tambahcss')
    <style>
        /* .row-data .col-3 {
                            max-width: 15.5rem !important;
                        } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

        .input-group-prepend button i {
            position: absolute;
            margin-top: -25px;
        }

    </style>
@endsection

@section('container')
<div class="container-fluid mt-3">
    <!-- Small boxes (Stat box) -->
    <div class="card mb-5">
        <div class="card-header" style="display:flex; background-color: #25b5e9">
            <div class="col-10">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link text-white active font-weight-bold" href="#data-usulan-sekolah" data-toggle="tab">Peralatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white font-weight-bold" href="#tambah-usulan-lahan" data-toggle="tab">Tambah Usulan</a>
                    </li>
                </ul>
            </div>
            <div class="card-tools text-right ml-3 col-2">
                <a class="btn text-dark dropdown-toggle mr-2" style="background-color:aliceblue; border: 1px solid #263238" data-toggle="dropdown" href="#">
                    Filter by... 
                <span class="caret"></span>
                </a>
                <div class="dropdown-menu" style="min-width: auto !important; width: 160px;">
                    <a class="dropdown-item text-dark" tabindex="-1" href="#">Kota/ Kabupaten</a>
                    <a class="dropdown-item text-dark" tabindex="-1" href="#">Kantor Cabang Dinas</a>
                </div>
            </div>
        </div>
        <!-- /.card-header DATA SEKOLAH-->
        <div class="card-body p-0">
            <div class="tab-content p-0">
                <div class="tab-pane active" id="data-usulan-sekolah">
                    <div class="row">
                        <div class="col">
                            <table class="table table-responsive table-bordered">
                                <thead>
                                  <tr>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">No</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Kompetensi Keahlian</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Jenis</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Kategori Peralatan</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Rasio</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Referensi Dokumen Legal</th>
                                    <th class="col-4 text-center" style="background-color: #eeeeee" scope="col">Deskripsi</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  {{-- row 1 --}}
                                  <tr>
                                    <th class="col-1 text-center" scope="row">1</th>
                                    <td class="col-1 text-center">Teknik Komputer Jaringan</td>
                                    <td class="col-1 text-center">Access Point Indoor</td>
                                    <td class="col-1 text-center">Utama</td>
                                    <td class="col-1 text-center">18 unit/ ruang praktik</td>
                                    <td class="col-1 text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="col-4 text-center">Alat untuk menghubungkan antar PC menggunakan gelombang radio (dalam suatu ruangan). Connectivity : 802.11 n/g/b wireless Operating Modes : Access Point (AP), WDS with AP, WDS/Bridge (No AP Broadcast), Wireless Client VLAN/SSID Support</td>
                                  </tr>
                                  {{-- end row 1 --}}
            
                                  {{-- row 2 --}}
                                  <tr>
                                    <th class="col-1 text-center" scope="row">2</th>
                                    <td class="col-1 text-center">Teknik Komputer Jaringan</td>
                                    <td class="col-1 text-center">Access Point Outdoor</td>
                                    <td class="col-1 text-center">Pendukung</td>
                                    <td class="col-1 text-center">18 unit/ ruang praktik</td>
                                    <td class="col-1 text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="col-4 text-center">Alat untuk menghubungkan antar PC menggunakan gelombang radio (jarak jauh antar gedung).Connectivity : 802.11 n/g/b wireless Operating Modes : AP, WDS, WDS
                                        with AP, Wireless Client
                                        VLAN/SSID Support</td>
                                  </tr>
                                  {{-- end row 2 --}}
            
                                  {{-- row 3 --}}
                                  <tr>
                                    <th class="col-1 text-center">3</th>
                                    <td class="col-1 text-center">Teknik Komputer Jaringan</td>
                                    <td class="col-1 text-center">Cleaver dan Stripper</td>
                                    <td class="col-1 text-center">Pendukung</td>
                                    <td class="col-1 text-center">6 unit/ ruang praktik</td>
                                    <td class="col-1 text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                    <td class="col-4 text-center">Alat untuk mengupas kabel optic dan memotong core. Cladding diameter: approx. 125mm Fiber count: Single fiber Coating diameter: Up to 12 fiber
                                        ribbon Cleave lenght: approx. 10mm</td>
                                  </tr>
                                  {{-- end row 3 --}}
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>

                <div class="chart tab-pane" id="tambah-usulan-lahan">
                    <div class="card-body">
                        <form action="/usulan-lahan" method="post" enctype="multipart/form-data">
                            {{-- input kompetensi keahlian --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kompetensi Keahlian</label>
                                <select class="form-control col-9" id="kompetensi-keahlian">
                                    <option value="belum" selected>Rekayasa Perangkat Lunak</option>
                                    <option value="#">Teknik Elektronika Industri</option>
                                    <option value="#">Broadcast</option>
                                    <option value="#">Multimedia</option>
                                    <option value="#">Teknik Komputer Jaringan</option>
                                </select>
                            </div>
                            {{-- end input kompetensi keahlian --}}

                            {{-- input nama peralatan --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Peralatan</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Panjang Lahan" id="panjang" name="panjang" required>
                            </div>
                            {{-- end input nama peralatan --}}

                            {{-- input kategori --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Kategori</label>
                                <select class="form-control col-9" id="kompetensi-keahlian">
                                    <option value="belum" selected>Rekayasa Perangkat Lunak</option>
                                    <option value="#">Teknik Elektronika Industri</option>
                                </select>
                            </div>
                            {{-- end input kategori --}}
                            
                            {{-- input rasio --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Rasio</label>
                                <input type="text" class="form-control col-sm-9" placeholder="Masukan Alamat" id="alamat" name="alamat" required>
                            </div>
                            {{-- end input rasio --}}

                            {{-- upload file(pdf) --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label pt-1" for="customFile">Upload File (PDF)</label>
                                <input type="file" id="chooseFile" accept=".pdf" name="proposal" required>
                            </div>
                            {{-- end upload file(pdf) --}}

                            {{-- input deskripsi --}}
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Deskripsi</label>
                                <textarea class="form-control col-sm-9" name="" cols="30" rows="5"></textarea>
                            </div>
                            {{-- end input deskripsi --}}

                            {{-- button simpan --}}
                            <button type="submit" class="btn text-white col-sm-1"
                                style="background-color: #00a65b">Simpan</button>
                            {{-- end button simpan --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

@endsection
