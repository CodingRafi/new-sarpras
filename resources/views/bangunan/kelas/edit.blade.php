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
        <h3 class="text-dark display-4" style="font-size: 25px">Edit Ruang Kelas</h3>
    </div>

    <div class="form-edit pt-3">
        <div class="card pt-3" style="background-color: white; border-radius:10px; ">
            <div class="input pl-5">
                <label class="col-2 mt-3">Jenis Ruang</label>
                <input type="text" class="col-9" placeholder="Masukan Jenis Ruang">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">No Sertifikat</label>
                <input type="number" class="col-9" placeholder="Masukan No Sertifikat">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">Panjang</label>
                <input type="number" class="col-9" placeholder="Masukan Panjang">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">Lebar</label>
                <input type="number" class="col-9" placeholder="Masukan Lebar">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">Luas Lahan</label>
                <input type="number" class="col-9" placeholder="Masukan Luas Lahan">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">Alamat</label>
                <input type="text" class="col-9" placeholder="Masukan Alamat">
            </div>
    
            <div class="input pl-5">
                <label class="col-2 mt-3">Jenis Kepemilikan</label>
                <input type="text" class="col-9" placeholder="Masukan Jenis Kepemilikan">
            </div>
    
            <div class="input pb-3 pl-5">
                <label class="col-2 mt-3">Keterangan</label>
                <input type="text" class="col-9" placeholder="Masukan Keterangan">
            </div>

            <div class="pb-3 pl-5">
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
