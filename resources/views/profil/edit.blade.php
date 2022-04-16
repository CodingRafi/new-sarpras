@extends('mylayouts.main')

@section('container')

    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <form action="/profil/{{ $data->id }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="hidden" name="profil_depo_id" value="{{ $data->id }}">
                    <div class="mb-3">
                        <label for="npsn" class="form-label">NPSN</label>
                        <input type="text" class="form-control" id="npsn" aria-describedby="emailHelp" name="npsn" placeholder="NPSN" required value="{{ $data->npsn }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama Sekolah</label>
                        <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" placeholder="Nama Sekolah" required value="{{ $data->nama }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status Sekolah</label>
                        <input type="text" class="form-control" id="status" aria-describedby="emailHelp" name="status_sekolah" placeholder="status" required value="{{ $data->status_sekolah }}">
                    </div>
                    <div class="mb-3">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" aria-describedby="emailHelp" name="provinsi" placeholder="provinsi" required value="{{ $data->provinsi }}">
                    </div>
                    <div class="mb-3">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <input type="text" class="form-control" id="kabupaten" aria-describedby="emailHelp" name="kabupaten" placeholder="kabupaten" required value="{{ $data->kabupaten }}">
                    </div>
                    <div class="mb-3">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" aria-describedby="emailHelp" name="kecamatan" placeholder="kecamatan" required value="{{ $data->kecamatan }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">email</label>
                        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" name="email" placeholder="email" required value="{{ $data->email }}">
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">website</label>
                        <input type="text" class="form-control" id="website" aria-describedby="websiteHelp" name="website" placeholder="website" required value="{{ $data->website }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" aria-describedby="no_telpHelp" name="nomor_telepon" placeholder="No Telepon" required value="{{ $data->nomor_telepon }}">
                    </div>
                    <div class="mb-3">
                        <label for="no_fax" class="form-label">No Fax</label>
                        <input type="text" class="form-control" id="no_fax" aria-describedby="no_faxHelp" name="nomor_fax" placeholder="No Fax" required value="{{ $data->nomor_fax }}">
                    </div>
                    <div class="mb-3">
                        <label for="akreditas" class="form-label">Akreditas</label>
                        <input type="text" class="form-control" id="akreditas" aria-describedby="akreditasHelp" name="akreditas" placeholder="Akreditas" required value="{{ $data->akreditas }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
