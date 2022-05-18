@extends('mylayouts.main')

@section('tambahcss')
    <style>
        /* .row-data .col-3 {
                                        max-width: 15.5rem !important;
                                    } */

        .card-header h4 {
            font-size: 1.2rem !important
        }

        body {
            overflow-x: hidden;
        }

    </style>
@endsection

@section('container')
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Lahan Sekolah</h3>
    </div>

    <div class="form-edit pt-3">
        <div class="card pt-3" style="background-color: white; border-radius: 10px; ">

            <div class="row input pl-5">
                <label class="col-2 mt-3">Nama Lahan</label>
                <input type="text" class="col-9 form-control mt-2" placeholder="Masukan Nama Lahan" required
                    value="{{ $ketersediaan->nama }}" name="nama">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">No Sertifikat</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan No Sertifikat" required
                    value="{{ $ketersediaan->no_sertifikat }}" name="no_sertifikat">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Panjang</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Panjang" required
                    value="{{ $ketersediaan->panjang }}" name="panjang">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Lebar</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Lebar" required
                    value="{{ $ketersediaan->lebar }}" name="lebar">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Luas Lahan</label>
                <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Luas Lahan" required
                    value="{{ $ketersediaan->luas }}" name="luas">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Alamat</label>
                <input type="text" class="col-9 form-control mt-2" placeholder="Masukan Alamat" required
                    value="{{ $ketersediaan->alamat }}" name="alamat">
            </div>

            <div class="form-group row pl-5 pt-1 mb-0">
                <label class="col-sm-2 col-form-label">Jenis Kepemilikan</label>
                <select class="custom-select rounded-0 col-sm-9" id="exampleSelectRounded0" name="jenis_kepemilikan">
                    <option value="sewa" {{ $ketersediaan->jenis_kepemilikan == 'sewa' ? 'selected' : '' }}>Sewa</option>
                    <option value="shm" {{ $ketersediaan->jenis_kepemilikan == 'shm' ? 'selected' : '' }}>SHM</option>
                    <option value="hgb" {{ $ketersediaan->jenis_kepemilikan == 'hgb' ? 'selected' : '' }}>HGB</option>
                </select>
            </div>



            <div class="row input pb-3 pl-5">
                <label class="col-2 mt-3">Keterangan</label>
                <input type="text" class="col-9 form-control mt-2" placeholder="Masukan Keterangan" required
                    value="{{ $ketersediaan->keterangan }}" name="keterangan">
            </div>

            <div class="form-group row pl-5 mb-0">
                <input type="hidden" name="dokumenOld" value="{{ $ketersediaan->bukti_lahan }}">
                <label class="col-sm-2 col-form-label pt-1" for="customFile">Dokumen Bukti Lahan (PDF / Foto)</label>
                <input type="file" id="dokumen_bukti" name="bukti_lahan" accept="image/*, .pdf" required
                    onchange="preview()">
            </div>

            <img src="" class="rounded img-preview pl-5" style="width: 40%;">

            <iframe src="" align="top" height="520" width="93%"
                frameborder="0" scrolling="auto" class="pl-5 iframe-preview" style="display: none;"></iframe>
            {{-- @if (explode('.', explode('/', $ketersediaan->bukti_lahan)[1])[1] == 'png' || explode('.', explode('/', $ketersediaan->bukti_lahan)[1])[1] == 'jpg' || explode('.', explode('/', $ketersediaan->bukti_lahan)[1])[1] == 'jpeg')
            @else
            @endif --}}

            <div class="pb-3 pl-5 pt-3">
                <a href="/lahan" class="btn btn-danger">Kembali</a>
                <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
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


        // Preview
        const iframePreview = document.querySelector('.iframe-preview');
        const dokumen_bukti = document.querySelector('#dokumen_bukti');
        const imgPreview = document.querySelector('.img-preview');
        
        function preview() {
            iframePreview.style.display = 'none';
            imgPreview.style.display = 'none';

            const oFReader = new FileReader();

            oFReader.readAsDataURL(dokumen_bukti.files[0]);

            oFReader.onload = function(oFREvent) {
                if (dokumen_bukti.files[0]['type'].split('/')[1] == 'png' || dokumen_bukti.files[0]['type'].split('/')[
                        1] == 'jpg' || dokumen_bukti.files[0]['type'].split('/')[1] == 'jpeg') {
                    imgPreview.src = oFREvent.target.result;
                    imgPreview.style.display = 'block';
                } else {
                    console.log(oFREvent.target.result);
                    iframePreview.src = oFREvent.target.result;
                    iframePreview.style.display = 'block';
                }
            }



        }
    </script>
@endsection
