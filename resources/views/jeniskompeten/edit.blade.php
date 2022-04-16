@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/kompeten/{{ $data->id }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="profil_id" value="{{ $data->profil_id }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kopetensi Keahlian</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" placeholder="Nama Kopetensi" required value="{{ $data->nama }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
