@extends('mylayouts.main')

@section('tambahcss')
    <style>
        .info-box-content p {
            padding-top: 60px;
        }

        .col-5 h1 {
            font-weight: 600;
            font-size: 2rem;
        }

        .card-content {
            font-size: 5rem;
        }

        .col-8 {
            padding-top: 40px;
        }

        .col-5 h1 {
            margin-left: 25px;
            margin-bottom: 30px;
        }

    </style>
@endsection

@section('container')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;text-transform: capitalize;">Usulan {{ str_replace("_", " ", $data->jenis) }}</h1>
                </div>
            </div>
        </div>
    </div>

    {{-- Main-Content --}}
    <div class="container-fluid">
        <div class="info-box p-4 detail-infobox shadow-sm mb-5 bg-body rounded">
            <div class="container">
                <h5 class="card-title">Nama Sekolah : {{ $profil->nama }}</h5>
                <br>
                <h5 class="card-title">Status : {{ $profil->status_sekolah }}</h5>
            </div>
        </div>
    </div>
@endsection
