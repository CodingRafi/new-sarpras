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
    {{-- Main-Content --}}

    <div class="container-fluid pt-4">
        <div class="info-box p-4 detail-infobox shadow-sm  mb-5 bg-body rounded">
            <div class="container ">
                <h1>{{ $komli->kompetensi }}</h1>
                <div class="row">
                    <div class="col-5">
                        <div class="d-flex justify-content-center align-items-center p-2">
                            <img src="/img/Kompetensi Keahlian.png" style="width: 20rem" class=" border rounded float-start"
                                alt="...">
                        </div>
                    </div>
                    <div class="col-7 d-flex justify-content-center align-items-center">
                        @if ($kompeten->keterangan)
                            <p style="font-size: 1.2rem;">{{ $kompeten->keterangan }}</p>
                        @else
                            <p style="font-size: 1.2rem;">Maaf Belum ada Keterangan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-6">
                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Kondisi Ideal</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool"><i class="fas fa-minus"
                                    style="display: none"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->kondisi_ideal }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold">Ketersediaan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-ketersediaan"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->ketersediaan }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-6">
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title font-weight-bold text-white">Kekurangan</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool text-white"><i class="bi bi-pencil-square"
                                    data-toggle="modal" data-target="#modal-kekurangan"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1 class="text-center font-weight-bold display-4">{{ $kompeten->kekurangan }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid pt-4">
        <div class="card p-4 detail-infobox shadow-sm mb-5 bg-body rounded">
            <div class="row p-0">
                <div class="col-4">
                    <div class="ml-2 mt-3 p-4 text-center">
                        <img src="/img/Logo Peraturan.png" style="width: 15rem" alt="...">
                    </div>
                </div>
                <div class="col-8">
                    <div class="font-weight-bold">
                        <p style="font-size: 1.6rem !important">PERATURAN MENTERI PENDIDIKAN NASIONAL REPUBLIK INDONESIA
                            NOMOR 40 TAHUN 2008</p>
                        <p style="font-size: 1.6rem !important">STANDAR SARANA DAN PRASARANA UNTUK SEKOLAH <br> MENENGAH
                            KEJURUAN MADRASAH ALIYAH
                            KEJURUAN(SMK/MAK)</p>
                    </div>
                </div>
            </div>
            <hr>
            <div class="">
                <p style="padding: 0px 4.5rem 0px 4.5rem">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse
                    debitis
                    tenetur, sed temporibus vel perferendis, distinctio officiis soluta culpa vitae magni eum modi ab rerum
                    corporis possimus pariatur dolores non. Ad similique obcaecati reiciendis tempore pariatur nam atque
                    fuga, totam necessitatibus quisquam officiis corrupti magnam vitae, non cupiditate suscipit
                    voluptatibus. Modi omnis dolores at fugit cum! Temporibus sit iste quidem voluptates nemo iusto minima
                    deleniti odio? Perspiciatis pariatur mollitia, iure optio a perferendis repudiandae veniam, fugiat, sint
                    aliquid facilis nam!</p>
            </div>
        </div>
    </div>

    {{-- Modal Ketersediaan --}}
    <div class="modal fade" id="modal-ketersediaan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-ketersediaan/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
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
                            <input type="number" class="form-control col-sm-7" placeholder="Masukan Ketersediaan"
                                id="jumlah-ruangan" name="ketersediaan" required value="{{ $kompeten->ketersediaan }}">
                        </div>
                        {{-- end input jumlah ruangan --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal Ketersediaan --}}

    {{-- Modal Kekurangan --}}
    <div class="modal fade" id="modal-kekurangan">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="/kompeten/update-kekurangan/{{ $kompeten->id }}" method="post">
                    @csrf
                    @method('patch')
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
                            <input type="text" class="form-control col-sm-7" placeholder="Masukan Kekurangan"
                                id="jumlah-ruangan" name="kekurangan" required value="{{ $kompeten->kekurangan }}">
                        </div>
                        {{-- end input jumlah ruangan --}}
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn text-white" style="background-color: #00a65b">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- End Modal Kekurangan --}}


    {{-- End Main-Content --}}
@endsection
