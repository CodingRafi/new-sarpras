@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
@endsection

@section('tambahcss')
    <style>
        /* .row-data .col-3 {
                                max-width: 15.5rem !important;
                            } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

        .fstdiv{
            width: 75% !important;
        }
    </style>
@endsection

@section('container')
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Ruang Praktik</h3>
    </div>

    <form action="/peralatan/{{ $peralatan->id }}" method="POST">
        @csrf
        @method('patch')
        <div class="form-edit pt-3">
            <div class="card pt-3" style="background-color: white; border-radius: 10px; ">
                <div class="row input pl-5">
                    <label class="col-2 mt-3">Kompetensi Keahlian</label>
                    <div class="col-9 pl-0 pr-0">
                        <select name="komli_id" id="" required class=" fstdropdown-select">
                            @foreach ($komlis as $komli)
                                @if ($komli->id == $peralatan->komli_id)
                                    <option value="{{ $komli->id }}" selected>{{ $komli->kompetensi }}</option>
                                @else
                                    <option value="{{ $komli->id }}">{{ $komli->kompetensi }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row input pl-5">
                    <label class="col-2 mt-3">Nama Peralatan</label>
                    <input type="text" class="col-9 form-control mt-2" placeholder="Nama Peralatan" name="nama"
                        value="{{ $peralatan->nama }}" required>
                </div>

                <div class="row input pl-5">
                    <label for="kategori" class="col-2 mt-3">Kategori</label>
                    <select name="kategori" id="cars" class=" col-9 mt-2 custom-select" required>
                        <option value="utama" {{ $peralatan->kategori == 'utama' ? 'selected' : '' }}>Utama</option>
                        <option value="pendukung" {{ $peralatan->kategori == 'pendukung' ? 'selected' : '' }}>Pendukung
                        </option>
                    </select>
                </div>

                <div class="row input pl-5">
                    <label class="col-2 mt-3">Rasio</label>
                    <input type="number" class="col-9 form-control mt-2" placeholder="Rasio" required
                        value="{{ $peralatan->rasio }}" name="rasio">
                </div>

                <div class="row input pl-5">
                    <label for="kekurangan" class="col-2 mt-3">Deskripsi</label>
                    <div class="col-sm-9 pl-0 pr-0">
                        <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" name="deskripsi"
                            required>{{ $peralatan->deskripsi }}</textarea>
                    </div>
                </div>

                <div class="pb-3 pl-5 pt-4">
                    <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                </div>
            </div>
        </div>
    </form>
@endsection


@section('tambahjs')
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
    <script>
        const tombolEdit = document.querySelectorAll('.tombol-edit');
        const inputNamaEdit = document.querySelector('.input-nama-edit');
        const inputPanjangEdit = document.querySelector('.panjang-nama-edit');
        const inputLebarEdit = document.querySelector('.lebar-nama-edit');
        const nama = document.querySelectorAll('.nama');
        const panjang = document.querySelectorAll('.panjang');
        const lebar = document.querySelectorAll('.lebar');
        const id_kekuranganLahan = document.querySelectorAll('.id_kekuranganLahan');
        const inputIdKekurangan = document.querySelector('.inputIdKekurangan');

        tombolEdit.forEach((e, i) => {
            e.addEventListener('click', function() {
                console.log()
                inputNamaEdit.value = '';
                inputNamaEdit.value = nama[i].innerHTML;
                inputPanjangEdit.value = '';
                inputPanjangEdit.value = parseInt(panjang[i].innerHTML.replace('m²', ''));
                inputLebarEdit.value = '';
                inputLebarEdit.value = parseInt(lebar[i].innerHTML.replace('m²', ''));
                inputIdKekurangan.value = '';
                inputIdKekurangan.value = id_kekuranganLahan[i].value;
            })
        });
    </script>
@endsection
