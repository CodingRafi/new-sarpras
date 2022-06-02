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
    <div class="card mt-2">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="text-white card-title">Data Program Keahlian</h3>
            <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                data-target="#tambah-program"><i class="bi bi-plus"></i> Tambah Program Keahlian
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($programs) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">No</th>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">Nama program</th>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <th class="text-center" scope="row">
                                    {{ ($programs->currentpage() - 1) * $programs->perpage() + $loop->index + 1 }}</th>
                                <td class="text-center program-program">{{ $program->nama }}</td>
                                <td class="text-center">
                                    <div>
                                        <button type="button" class="btn text-white btn-warning tombol-edit-program"
                                            data-toggle="modal" data-target="#edit" data-id="{{ $program->id }}">Edit
                                        </button>
                                        <form action="/program-kompetensi/{{ $program->id }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Apakah anda yakin akan menghapus program kompetensi ini? semua sekolah yang menggunakan program kompetensi ini akan terhapus')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $programs->links() }}
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
        <div class="modal fade" id="tambah-program">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Program Keahlian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/program-kompetensi" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="program" class="col-sm-2 col-form-label">Program</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="program" name="nama" required>
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

        {{-- modal edit --}}
        <div class="modal fade" id="edit">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Program Keahlian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-edit" action="/program-kompetensi" method="post">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="program" class="col-sm-2 col-form-label">Program</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-program" id="program" name="nama"
                                            required>
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
        {{-- end modal edit --}}
    </div>
@endsection

@section('tambahjs')
    <script>
        const programprogram = document.querySelectorAll('.program-program');
        const tombolEditprogram = document.querySelectorAll('.tombol-edit-program');
        const inputprogram = document.querySelector('.input-program');
        const formEdit = document.querySelector('.form-edit');

        tombolEditprogram.forEach((e, i) => {
            e.addEventListener('click', function() {
                inputprogram.value = '';
                inputprogram.value = programprogram[i].innerHTML;
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/program-kompetensi/' + e.getAttribute('data-id'));
            })
        });
    </script>
@endsection
