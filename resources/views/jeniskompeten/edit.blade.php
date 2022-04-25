@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/kompeten/tambahsiswa" method="POST">
                    @csrf
                    @method('patch')
                    <input type="hidden" value="{{ $profil_id }}" name="profil_id">
                    <select class="form-select" aria-label="Default select example" name="kompeten_id">
                        @foreach ($komlis as $key => $komli)
                            <option value="{{ $komli->id }}">{{ $komli->kompetensi }}</option>
                        @endforeach 
                    </select>
                    <div class="mb-3">
                        <label for="jml_lk" class="form-label">Jumlah laki laki</label>
                        <input type="number" class="form-control" id="jml_lk" aria-describedby="emailHelp" name="jml_lk"
                            placeholder="Jumlah Laki Laki" required value="">
                    </div>
                    <div class="mb-3">
                        <label for="jml_pr" class="form-label">Jumlah Perempuan</label>
                        <input type="number" class="form-control" id="jml_pr" aria-describedby="emailHelp" name="jml_pr"
                            placeholder="Jumlah Laki Laki" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
