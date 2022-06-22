@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Kompetensi Keahlian
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="text-white card-title">Data Kompetensi Keahlian</h3>
            <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                data-target="#tambah-kompetensi"><i class="bi bi-plus"></i> Tambah Komli
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($komlis) > 0)
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">No</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Bidang</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Program</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Kompetensi</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Nama Spektrum</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Lampiran Spektrum</th>
                                <th class="text-center" scope="col" style="background-color: #eeeeee">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($komlis as $komli)
                            {{-- @dd($komli) --}}
                                <tr>
                                    <th class="text-center" scope="row">
                                        {{ ($komlis->currentpage() - 1) * $komlis->perpage() + $loop->index + 1 }}</th>
                                    <td class="text-center komli-bidang">{{ $komli->nama_bidang }}</td>
                                    <td class="text-center komli-program">{{ $komli->nama_program }}</td>
                                    <td class="text-center komli-kompetensi">{{ $komli->kompetensi }}</td>
                                    <td class="text-center komli-kompetensi">{{ $komli->nama }}</td>
                                    <td class="text-center komli-kompetensi">
                                        <a href="{{ asset('storage/' . $komli->lampiran) }}" target="_blank">
                                            <img src="/img/pdf.png" alt="image" style="width: 30px">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <div>
                                            <a href="/komli/{{ $komli->id_komlis }}/edit" class="btn btn-warning text-white mt-2">Edit</a>
                                            <form action="/komli/{{ $komli->id_komlis }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger mt-2" onclick="return confirm('Apakah anda yakin akan menghapus jurusan ini? semua sekolah yang menggunakan jurusan ini akan terhapus')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $komlis->links() }}
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
        <div class="modal fade" id="tambah-kompetensi">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Kompetensi Keahlian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/komli" method="post" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <select class="fstdropdown-select select-jurusan" id="select"
                                            name="bidang_kompetensi_id">
                                            @foreach ($bidangs as $bidang)
                                                <option value="{{ $bidang->id }}">{{ $bidang->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="program" class="col-sm-2 col-form-label">Program</label>
                                    <div class="col-sm-10">
                                        <select class="fstdropdown-select select-jurusan" id="select"
                                            name="program_kompetensi_id">
                                            @foreach ($programs as $program)
                                                <option value="{{ $program->id }}">{{ $program->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kompetensi" name="kompetensi"
                                            required placeholder="Masukkan Nama Kompetensi">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="spektrum" class="col-sm-2 col-form-label">Spektrum</label>
                                    <div class="col-sm-10">
                                        <select name="spektrum_id" id="" class="custom-select">
                                            @foreach ($spektrums as $spektrum)
                                                <option value="{{ $spektrum->id }}">{{ $spektrum->nama }}</option>
                                            @endforeach
                                        </select>
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
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
@endsection
