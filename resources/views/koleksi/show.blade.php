@extends('mylayouts.main')

@section('container')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="container-fluid">

        <div class="card card-outline card-success">
            <div class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="card-title text-muted">Total: {{ count($fotos) }}</h3>
                        </div>
                        <div class="col">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                @if (count($fotos) < 1 || $koleksi->jenis === 'lain')
                                <a href="/foto/create/{{ $koleksi->slug }}" class="btn btn-success">Tambah foto</a>
                                @endif
                                <a href="/profil/{{ $koleksi->profil_depo_id }}" class="btn btn-dark ml-3">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">

                    @foreach ($fotos as $foto)
                        <div class="item col-lg-3 col-6 mb-3">
                            <div class="shadow-sm rounded border">
                                <form action="/foto/{{ $foto->id }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger shadow-sm" style="position: absolute; right: 8px;" onclick="return confirm('Apakah anda yakin akan menghapus foto ini?')"><i
                                            class="bi bi-trash-fill"></i></button>
                                </form>
                                <a href="{{ asset('storage/' . $foto->filename) }}" class="fancybox"
                                    data-fancybox="gallery1">
                                    <img src="{{ asset('storage/' . $foto->filename) }}" class="rounded"
                                        style="object-fit: cover; width: 100%; aspect-ratio: 1/1;">
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
@endsection
