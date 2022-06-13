@extends('mylayouts.main')

@section('tambahcss')
    <style>
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

    <!-- title -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Spektrum
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="text-white card-title">Data Spektrum</h3>
            <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                data-target="#tambah-spektrum"><i class="bi bi-plus"></i> Tambah Spektrum
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($spektrums) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">No</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Nama Spektrum</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Aturan</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Tanggal</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Lampiran</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($spektrums as $spektrum)
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ ($spektrums->currentpage() - 1) * $spektrums->perpage() + $loop->index + 1 }}
                                    </th>
                                    <td class="text-center spektrum-spektrum">{{ $spektrum->nama }}</td>
                                    <td class="text-center spektrum-spektrum">{{ $spektrum->aturan }}</td>
                                    <td class="text-center spektrum-spektrum">{{ $spektrum->tanggal }}</td>
                                    <td class="text-center spektrum-spektrum">
                                        <a href="{{ asset('storage/' . $spektrum->lampiran) }}" target="_blank">
                                            <img src="/img/pdf.png" alt="image" style="width: 30px">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <a href="/spektrum/{{ $spektrum->id }}/edit" class="btn btn-warning text-white">Edit</a>
                                            <form action="/spektrum/{{ $spektrum->id }}" method="post"
                                                class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-success"
                                                    onclick="return confirm('Apakah anda yakin akan menghapus spektrum kompetensi ini? semua sekolah yang menggunakan spektrum kompetensi ini akan terhapus')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $spektrums->links() }}
                @else
                    <div class="container d-flex justify-content-center align-items-center" style="height: 10rem">
                        <div class="alert" role="alert">
                            Belum ada Kopetensi keahlian ditemukan
                        </div>
                    </div>
                @endif
            </div>
        </div>
        {{-- modal input kompetensi keahlian --}}
        <div class="modal fade" id="tambah-spektrum">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Spektrum</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/spektrum" method="post" enctype="multipart/form-data" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama Spektrum</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="nama" name="nama" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="aturan" class="col-sm-2 col-form-label">Aturan</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="aturan" name="aturan" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lampiran" class="col-sm-2 col-form-label">Lampiran</label>
                                    <div class="col-sm-10">
                                        <input type="file" id="lampiran" name="lampiran" required accept=".pdf">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn text-white float-right"
                                    style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal input kompetensi keahlian --}}
    </div>
@endsection

@section('tambahjs')
    <script></script>
@endsection
