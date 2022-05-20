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
                                  {{-- judul table --}}
                                  <tr>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">No</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Nama Sekolah</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Kompetensi Keahlian</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Nama Peralatan</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Jumlah Usulan</th>
                                    <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">Proposal</th>
                                  </tr>
                                  {{-- end judul table --}}
                                </thead>
                                <tbody>
                                  {{-- isi table --}}
                                  <tr>
                                    <th class="col-1 text-center" scope="row">1</th>
                                    <td class="col-1 text-center">SMKS TARUNA BHAKTI DEPOK</td>
                                    <td class="col-1 text-center">Rekayasa Perangkat Lunak</td>
                                    <td class="col-1 text-center">Laptop</td>
                                    <td class="col-1 text-center">10</td>
                                    <td class="col-1 text-center"><img src="/img/pdf.png" alt="image" style="width: 30px"></td>
                                  </tr>
                                  {{-- end isi table --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.container-fluid -->

@endsection
