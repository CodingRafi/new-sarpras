@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
@endsection

@section('container')
    <div class="card mt-2">
        <div class="card-header" style="background-color: #25b5e9; margin-right: -1px; margin-top: -1px;">
            <h3 class="card-title text-white">Detail Laboratorium</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center" style="background-color: #eeeeee">Jenis Lab</th>
                            <th scope="col" class="text-center" style="background-color: #eeeeee">Peruntukan Jurusan</th>
                            <th scope="col" class="text-center" style="background-color: #eeeeee">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="/jenis-laboratorium-komli-delete" method="post">
                            @csrf
                            @method('delete')
                            <tr>
                                <td class="text-center">
                                    {{ $jenis->jenis }}
                                </td>
                                <td class="text-left">
                                    @foreach ($komlis as $komli)
                                        @if ($komli->kompetensi != null)
                                            <div> <input class="mr-3" type="checkbox" id="komli_id"
                                                    name="id_jenis_laboratorium_komlis[]"
                                                    value="{{ $komli->id_jenis_laboratorium_komlis }}">{{ $komli->kompetensi }}
                                            </div>
                                        @endif
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <div class="div">
                                        <a href="#" class="btn text-white mt-2" data-toggle="modal"
                                            data-target="#modal-tambah" style="background-color: #00a65b;">
                                            Tambah Kompetensi
                                        </a>
                                    </div>
                                    <div class="div">
                                        <button type="submit" class="btn btn-dark mt-2">Hapus Kompetensi</button>
                                    </div>
                                </td>
                            </tr>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- modal tambah --}}
    <div class="modal fade" id="modal-tambah">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Laboratorium</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="/jenis-laboratorium-komli" method="post">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" value="{{ $jenis->id }}" name="jenis_laboratorium_id">
                            <div class="form-group row">
                                <label for="jenis" class="col-sm-3 col-form-label">Peruntukan Jurusan</label>
                                <div class="col-sm-9">
                                    <select class="fstdropdown-select" id="select" name="komlis[]" multiple>
                                        @foreach ($option_komlis as $option)
                                            <option value="{{ $option->id }}">{{ $option->kompetensi }}
                                            </option>
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
    {{-- modal tambah --}}
@endsection


@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
@endsection
