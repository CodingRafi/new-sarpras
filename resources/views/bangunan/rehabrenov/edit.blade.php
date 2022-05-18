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
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Usulan Rehab/ Renov</h3>
    </div>

    <div class="form-edit pt-3">
        <div class="card pt-3" style="background-color: white; border-radius: 10px; ">
            <div class="row input pl-5">
                    <label for="cars" class="col-2 mt-2">Jenis Usulan</label>
                    <select name="cars" id="cars" class=" col-9 custom-select">
                        <option value="">Ruang Guru</option>
                        <option value="">Kantor</option>
                    </select>
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3">Jumlah Usulan</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Jumlah Ruang">
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3">Luas Lahan</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Jumlah Ruang">
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3" for="customFile">Gambar Lahan</label>
                <input type="file" id="gambar-lahan" class="mt-2 pt-1">
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
