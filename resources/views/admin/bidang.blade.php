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
                    <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Bidang Keahlian
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-2">
        <div class="card-header" style="background-color: #25b5e9">
            <h3 class="text-white card-title">Data Bidang Keahlian</h3>
            <button type="button" class="btn btn-tool border border-light text-white ml-3" data-toggle="modal"
                data-target="#tambah-bidang"><i class="bi bi-plus"></i> Tambah Bidang Keahlian
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (count($bidangs) > 0)
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">No</th>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">Nama Bidang</th>
                            <th class="text-center" scope="col" style="background-color: #eeeeee">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bidangs as $bidang)
                            <tr>
                                <th class="text-center" scope="row">
                                    {{ ($bidangs->currentpage() - 1) * $bidangs->perpage() + $loop->index + 1 }}</th>
                                <td class="text-center bidang-bidang">{{ $bidang->nama }}</td>
                                <td class="text-center">
                                    <div>
                                        <button type="button" class="btn text-white btn-warning tombol-edit-bidang"
                                            data-toggle="modal" data-target="#edit" data-id="{{ $bidang->id }}">Edit
                                        </button>
                                        <form action="/bidang-kompetensi/{{ $bidang->id }}" method="post" class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-success"
                                                onclick="return confirm('Apakah anda yakin akan menghapus bidang kompetensi ini? semua sekolah yang menggunakan bidang kompetensi ini akan terhapus')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $bidangs->links() }}
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
        <div class="modal fade" id="tambah-bidang">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Bidang Keahlian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" action="/bidang-kompetensi" method="post" onsubmit="myLoading()">
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="bidang" name="nama" required>
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
                        <h4 class="modal-title">Edit Bidang Keahlian</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal form-edit" action="/bidang-kompetensi" method="post" onsubmit="myLoading()">
                            @csrf
                            @method('patch')
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="bidang" class="col-sm-2 col-form-label">Bidang</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control input-bidang" id="bidang" name="nama"
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
        const bidangBidang = document.querySelectorAll('.bidang-bidang');
        const tombolEditbidang = document.querySelectorAll('.tombol-edit-bidang');
        const inputBidang = document.querySelector('.input-bidang');
        const formEdit = document.querySelector('.form-edit');

        tombolEditbidang.forEach((e, i) => {
            e.addEventListener('click', function() {
                inputBidang.value = '';
                inputBidang.value = bidangBidang[i].innerHTML;
                formEdit.removeAttribute('action');
                formEdit.setAttribute('action', '/bidang-kompetensi/' + e.getAttribute('data-id'));
            })
        });
    </script>
@endsection
