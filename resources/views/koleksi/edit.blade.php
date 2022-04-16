@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/koleksi/{{ $koleksi->slug }}" method="POST">
                    @csrf
                    @method('patch')
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Koleksi</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" placeholder="Nama Koleksi" required value="{{ $koleksi->nama }}">
                    </div>
                    <select class="form-select" aria-label="Default select example" name="jenis">
                        <option value="bangunan" {{ $koleksi->jenis == 'bangunan' ? 'selected' : '' }}>Bangunan Sekolah</option>
                        <option value="gerbang" {{ $koleksi->jenis == 'gerbang' ? 'selected' : '' }}>Gerbang</option>
                        <option value="fasilitas" {{ $koleksi->jenis == 'fasilitas' ? 'selected' : '' }}>Fasilitas</option>
                      </select>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
