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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Usulan Peralatan</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <!-- Small boxes (Stat box) -->
        <div class="card mb-5">
            <div class="card-header" style="background-color: #25b5e9">
                <h3 class="card-title text-white font-weight-bold">Data Usulan Peralatan</h3>
            </div>
            <!-- /.card-header DATA SEKOLAH-->
            <div class="card-body p-0">
                @if (count($usulan_peralatans) > 0)
                    <form class="form-inline mt-2" action="/usulan-peralatan" method="GET"
                        style="margin-left:10px; width: 98%;">
                        <div class="input-group m-0 p-0" style="width: 100%;border: 1px solid #ced4da;border-radius: 3px;">
                            <input class="form-control form-control-navbar" type="search"
                                placeholder="Search Nama Sekolah, Kompetensi Keahlian, Nama peralatan" aria-label="Search"
                                style="height: 2.5rem;font-size: 15px;padding: 0 10px;border:none;" name="search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit" style="width: 40px;">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                @endif
                <div class="tab-content p-3">
                    <div class="tab-pane active" id="data-usulan-sekolah">
                        <div class="row">
                            <div class="col">
                                @if (count($usulan_peralatans) > 0)
                                    <table class="table table-responsive table-bordered">
                                        <thead>
                                            {{-- judul table --}}
                                            <tr>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    No
                                                </th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Nama
                                                    Sekolah</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Kompetensi Keahlian</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Nama
                                                    Peralatan</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Jumlah Usulan</th>
                                                <th class="col-1 text-center" style="background-color: #eeeeee" scope="col">
                                                    Proposal</th>
                                            </tr>
                                            {{-- end judul table --}}
                                        </thead>
                                        <tbody>
                                            {{-- isi table --}}
                                            @foreach ($usulan_peralatans as $usulan)
                                            {{-- @dd($usulan) --}}
                                                {{-- @dd($usulan) --}}
                                                <tr>
                                                    <th class="col-1 text-center" scope="row">
                                                        {{ $loop->iteration }}
                                                    </th>
                                                    <td class="col-1 text-center">{{ $usulan->nama }}</td>
                                                    <td class="col-1 text-center">{{ $usulan->kompetensi }}</td>
                                                    <td class="col-1 text-center">{{ $usulan->nama_peralatan_relasi }}
                                                    </td>
                                                    <td class="col-1 text-center">{{ $usulan->jml }}</td>
                                                    <td class="col-1 text-center">
                                                        <a href="{{ asset('storage/' . $usulan->proposal) }}" target="_blank">
                                                            <img src="/img/pdf.png" alt="image" style="width: 30px">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {{-- end isi table --}}
                                        </tbody>
                                    </table>
                                @else
                                    <div class="container d-flex justify-content-center align-items-center"
                                        style="height: 10rem">
                                        <div class="alert" role="alert">
                                            Tidak ada data ditemukan
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    @endsection
