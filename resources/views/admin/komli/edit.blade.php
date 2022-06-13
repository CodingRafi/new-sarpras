@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }

        #upload-dialog {
            display: none !important;
        }

        #pdf-loader {
            display: none
        }

        #pdf-name {
            display: none !important;
        }

        #pdf-preview {
            display: none;
            width: 300px !important;
        }

        #upload-button {
            display: none !important;
        }

        #cancel-pdf {
            display: none !important;
        }

        .preview,
        .preview img {
            /* display: none; */
        }

    </style>
@endsection

@section('container')

    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Kompetensi Keahlian</h3>
    </div>

    <div class="form-edit pt-3">

        <form action="/komli/{{ $data->id }}" method="post" enctype="multipart/form-data" onsubmit="myLoading()">
            @csrf
            @method('patch')
            <div class="container">
                <div class="card pt-3" style="background-color: white; border-radius: 10px; ">
                    {{-- --------------------------------------------- JUMLAH RUANG KELAS --------------------------------------------- --}}
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                            <div class="col-sm-10">
                                <select class="fstdropdown-select select-jurusan" id="select" name="bidang_kompetensi_id">
                                    @foreach ($bidangs as $bidang)
                                        @if ($data->bidang_kompetensi_id == $bidang->id)
                                            <option value="{{ $bidang->id }}" selected>{{ $bidang->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $bidang->id }}">{{ $bidang->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="program" class="col-sm-2 col-form-label">Program</label>
                            <div class="col-sm-10">
                                <select class="fstdropdown-select select-jurusan" id="select" name="program_kompetensi_id">
                                    @foreach ($programs as $program)
                                        @if ($program->id == $data->program_kompetensi_id)
                                            <option value="{{ $program->id }}" selected>{{ $program->nama }}
                                            </option>
                                        @else
                                            <option value="{{ $program->id }}">{{ $program->nama }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kompetensi" class="col-sm-2 col-form-label">Kompetensi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="kompetensi" name="kompetensi" required
                                    placeholder="Masukkan Nama Kompetensi" value="{{ $data->kompetensi }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="spektrum" class="col-sm-2 col-form-label">Spektrum</label>
                            <div class="col-sm-10">
                                <select name="spektrum_id" id="" class="custom-select">
                                    @foreach ($spektrums as $spektrum)
                                        @if ($spektrum->id == $data->spektrum_id)
                                            <option value="{{ $spektrum->id }}" selected>{{ $spektrum->nama }}</option>
                                        @else
                                            <option value="{{ $spektrum->id }}">{{ $spektrum->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-5">
                        <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                    </div>
                    </div>
                    {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                </div>
            </div>
        </form>

    </div>

    {{-- --------------------------------------------- ALERT --------------------------------------------- --}}
    <div class="container container-alert" style="position: fixed;right: 20px;bottom: 25px;width: auto"></div>
    <div id='alrt' style="fontWeight = 'bold'"></div>

    <div class="d-none input-urungkan">

    </div>

    {{-- --------------------------------------------- HIDE --------------------------------------------- --}}
    {{-- <button id="upload-dialog">Choose PDF</button> hide --}}
    {{-- <span id="pdf-name"></span> hide --}}
    {{-- <button id="upload-button">Upload</button> hide --}}
    {{-- <button id="cancel-pdf">Cancel</button> hide --}}
@endsection
@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
@endsection
