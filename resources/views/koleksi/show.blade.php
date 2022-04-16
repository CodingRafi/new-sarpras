@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <a href="/foto/create/{{ $koleksi->slug }}">Tambah foto</a>

                @foreach ($fotos as $foto)
                    <img src="{{ asset('storage/'. $foto->filename) }}" alt="" width="300">
                    <form action="/foto/{{ $foto->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Hapus</button>
                    </form>
                @endforeach
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
