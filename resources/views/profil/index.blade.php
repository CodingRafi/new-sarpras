@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <h6>NPSN: {{ $profil->npsn }}</h6>
                <h6>Sekolah Id: {{ $profil->sekolah_id }}</h6>
                <h6>Nama: {{ $profil->nama }}</h6>
                <h6>Status Sekolah: {{ $profil->status_sekolah }}</h6>
                <h6>Alamat: {{ $profilDepo->depo_alamat }}</h6>
                <h6>Provinsi: {{ $profilDepo->depo_provinsi }}</h6>
                <h6>Kabupaten: {{ $profilDepo->depo_kabupaten }}</h6>
                <h6>Kecamatan: {{ $profilDepo->depo_kecamatan }}</h6>
                <h6>Email: {{ $profilDepo->depo_email }}</h6>
                <h6>Website: {{ $profilDepo->depo_website }}</h6>
                <h6>No Telp: {{ $profilDepo->depo_nomor_telepon }}</h6>
                <h6>No Fax:{{ $profilDepo->depo_nomor_fax }}</h6>
                @foreach ($kopetensikeahlians as $key => $kopetensikeahlian)
                    <br>
                    <h6>Kopetensi Keahlian {{ $key + 1 }}</h6>
                    <a href="/kopetensi/{{ $kopetensikeahlian->id }}/edit" class="badge bg-warning border-0" style="width: 20%">Ubah Kompetensi {{ $kopetensikeahlian->nama }}</a>
                    <form action="/kopetensi/{{ $kopetensikeahlian->id }}" class="d-inline" method="POST">
                        @method("delete")
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin?')">Delete</button>
                      </form>
                    <h6>Nama Kopetensi : {{ $kopetensikeahlian->nama }}</h6>
                    <h6>Jumlah Laki Laki : {{ $kopetensikeahlian->jml_lk }}</h6>
                    <h6>Jumlah Perempuan : {{ $kopetensikeahlian->jml_pr }}</h6>
                    <br>
                @endforeach

                @foreach ($koleksis as $koleksi)
                      <br>
                      <a href="/koleksi/{{ $koleksi->slug }}">{{ $koleksi->nama }}</a>
                      <br>
                @endforeach

                <h6>Akreditasi: {{ $profilDepo->depo_akreditas }}</h6>
                <h6>Jumlah Siswa: {{ $profilDepo->depo_jml_siswa }}</h6>
                <a href="/kopetensi/create/{{ $profil->id }}" class="btn btn-primary">Tambah Kopetensi</a>

                <br>
                <a href="/koleksi/create/{{ $profil->id }}" class="btn btn-primary">Buat Koleksi</a>
            </div>

        </div>
        <!-- / Content -->
        <div class="content-backdrop fade"></div>
    </div>
@endsection
