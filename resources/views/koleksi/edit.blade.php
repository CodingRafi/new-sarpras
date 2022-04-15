@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/kopetensi/{{ $data->id }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="profil_id" value="{{ $data->profil_id }}">
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Kopetensi Keahlian</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" placeholder="Nama Kopetensi" required value="{{ $data->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="jml_lk" class="form-label">Jumlah laki laki</label>
                        <input type="number" class="form-control" id="jml_lk" aria-describedby="emailHelp" name="jml_lk" placeholder="Jumlah Laki Laki" required value="{{ $data->jml_lk }}">
                    </div>
                    <div class="mb-3">
                        <label for="jml_pr" class="form-label">Jumlah Perempuan</label>
                        <input type="number" class="form-control" id="jml_pr" aria-describedby="emailHelp" name="jml_pr" placeholder="Jumlah Laki Laki" required value="{{ $data->jml_pr }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
