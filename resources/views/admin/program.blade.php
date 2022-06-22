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

    .loading-container {
        position: relative;
        width: 110px;
        height: 110px;
        margin: auto;
    }

    .loading-container .item {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border: 5px solid #fff;
        border-radius: 50%;
        border-top-color: transparent;
        border-bottom-color: transparent;
        animation: spin 2s ease infinite;
    }

    .loading-container .logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        border-radius: 50%;
        border-top-color: transparent;
        border-bottom-color: transparent;
    }

    .loading-container .item:nth-child(1) {
        width: 100px;
        height: 100px;
        border-inline-color: rgba(0, 166, 91, 1);
    }

    .loading-container .item:nth-child(2) {
        width: 120px;
        height: 120px;
        animation-delay: 0.1s;
        border-inline-color: rgba(37, 181, 233, 1);
    }

    .loading-container .item:nth-child(3) {
        width: 140px;
        height: 140px;
        animation-delay: 0.2s;
        border-inline-color: rgba(252, 193, 45, 1);
    }

    .loading-container .item:nth-child(4) {
        width: 110px;
        height: 110px;
        animation-delay: 0.3s;
        opacity: 0;
    }

    @keyframes spin {
        50% {
            transform: translate(-50%, -50%) rotate(180deg);
        }

        100% {
            transform: translate(-50%, -50%) rotate(0deg);
        }
    }

    @media(max-width: 768px) {
        .btn-hapus{
            margin-top: 8px;
        }
    }

</style>
@endsection

@section('container')

{{-- Loading --}}
<div class="loading-program"
    style="position: fixed; background: rgba(0, 0, 0, 0.1); width: 100%; height: 100vh; z-index: 9999; display: flex; justify-content: center; align-items: center; top: 0; left: 0; display: none;">
    <div class="loading-container">
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <img src="/assets/img/avatars/logo-jawa-barat.png" alt="TarunaBhakti Logo" width="50" class="logo">
    </div>
</div>
{{-- End Loading --}}

<!-- title -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark display-4" style="padding: 0 !important;">Program Keahlian
                </h1>
            </div>
        </div>
    </div>
</div>

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
                                <form action="/program-kompetensi/{{ $program->id }}" method="post"
                                    class="d-inline-block">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-hapus" onclick="return confirm('Apakah anda yakin akan menghapus program kompetensi ini? semua sekolah yang menggunakan program kompetensi ini akan terhapus')">Hapus</button>
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
                    <form class="form-horizontal" action="/program-kompetensi" method="post" onsubmit="myLoading()">
                        @csrf
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="program" class="col-sm-2 col-form-label">Program</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-loading" id="program" name="nama"
                                        value="">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn text-white float-right tbl-loading"
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
                    <form class="form-horizontal form-edit" action="/program-kompetensi" method="post"
                        onsubmit="myLoading()">
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
    const loading = document.querySelector('.tbl-loading')
    const tampilloading = document.querySelector('.loading-program')
    const inputLoading = document.querySelector('.input-loading')

    loading.addEventListener('click', loadingPreview);

    function loadingPreview() {
        tampilloading.style.display = 'flex';
    }

    tombolEditprogram.forEach((e, i) => {
        e.addEventListener('click', function () {
            inputprogram.value = '';
            inputprogram.value = programprogram[i].innerHTML;
            formEdit.removeAttribute('action');
            formEdit.setAttribute('action', '/program-kompetensi/' + e.getAttribute('data-id'));
        })
    });

</script>
@endsection
