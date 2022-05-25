@extends('mylayouts.main')

@section('tambahcss')
    <style>
        /* .row-data .col-3 {
                        max-width: 15.5rem !important;
                    } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

    </style>
@endsection

@section('container')
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Ruang Praktik</h3>
    </div>

    <div class="form-edit pt-3">
        <div class="card pt-3" style="background-color: white; border-radius: 10px; ">
            <div class="row input pl-5">
                <label class="col-2 mt-3">Kompetensi Keahlian</label>
                <input type="text" class="col-9 form-control mt-2" placeholder="Masukan Jumlah Ruang">
            </div>
    
            <div class="row input pl-5">
                <div class="container">
                    <div class="row">
                        <label class="col-2 mt-3">Nama Peralatan</label>
                        <div class="p-0" style="width: 685px">
                            <input type="text" class="form-control mt-2" placeholder="Masukan Jumlah Ruang">
                        </div>
                        <div class="col-1">
                            <input type="checkbox" class="form-control mt-2" style="border-color: blue !important" placeholder="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row input pl-5">
                <label for="cars" class="col-2 mt-3">Kategori</label>
                <select name="cars" id="cars" class=" col-9 mt-2 custom-select">
                    <option value="">Utama</option>
                    <option value="">Pendukung</option>
                </select>
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3">Jumlah Usulan</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Luas Lahan">
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3" for="customFile">Proposal</label>
                <input type="file" id="gambar-lahan" class="mt-2 pt-1">
            </div>
    
            <div class="pb-3 pl-5 pt-4">
                <button type="button" class="btn text-white" style="background-color: #00a65b">Simpan</button>
            </div>
        </div>
    </div>

@endsection


@section('tambahjs')
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
