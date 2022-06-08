@extends('mylayouts.main')

@section('tambahcss')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }
    </style>
@endsection

@section('container')
    {{-- @dd($data) --}}
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Ketersediaan Peralatan</h3>
    </div>

    <div class="form-edit pt-3">
        <form action="/peralatan-tersedia/{{ $data->id }}" method="post">
            @csrf
            @method('patch')
            <input type="hidden" name="profil_id" value="{{ Auth::user()->profil_id }}">
            <input type="hidden" name="kompeten_id" value="{{ $data->kompeten_id }}">
            <div class="card pt-3" style="background-color: white; border-radius: 10px; ">

                {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label for="nama-peralatan" class="col-2 mt-1">Nama Peralatan</label>
                    <div class="col-sm-9">
                        <div class="input-group peralatan-parent">
                            @foreach ($peralatanOptions as $options)
                                <input type="hidden" class="input-option-{{ $options->id }}" data-kategori="{{ $options->kategori }}">
                            @endforeach
                            <select class="form-control select-usulan" id="usulan-select" name="peralatan_id" style="{{ ($data->peralatan_id == null) ? 'display:none' : '' }}">
                                <option value="">Pilih Peralatan</option>
                                @foreach ($peralatanOptions as $options)
                                    <option value="{{ $options->id }}" {{ ($data->peralatan_id == $options->id) ? 'selected' : '' }}> {{ $options->nama }}</option>
                                @endforeach
                            </select>

                            <input type="text" class="form-control input-manual-peralatan" style="{{ ($data->peralatan_id == null) ? '' : 'display:none' }}"
                                id="usulan-text" name="nama" value="{{ $data->nama_peralatan }}" placeholder="Masukkan Nama Peralatan">

                            {{-- ---------------------------------------------------------------------------------------- CHECKBOX ---------------------------------------------------------------------------------------- --}}
                            <div class="input-group-append">   
                                <span class="input-group-text"> 
                                    <input id="usulan-checkbox" type="checkbox" {{ ($data->peralatan_id == null) ? 'checked' : '' }} >
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- KATEGORI ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label for="kategori" class="col-2 mt-1">Kategori</label>
                    <div class="col-sm-9">
                        <select class="custom-select select-kategori" name="kategori" {{ ($data->peralatan_id == null) ? '' : 'disabled' }} >
                            <option value="utama" class="kategori-utama" {{ ($data->kategori == 'utama') ? 'selected' : '' }}>Utama</option>
                            <option value="pendukung" class="kategori-pendukung" {{ ($data->kategori == 'pendukung') ? 'selected' : '' }}>Pendukung</option>
                        </select>
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- KETERSEDIAAN ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label class="col-2 mt-1">Ketersediaan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control loading-tambah" name="katersediaan" value="{{ $data->katersediaan }}">
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- KEKURANGAN ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label class="col-2 mt-1">Kekurangan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control loading-tambah" name="kekurangan" value="{{ $data->kekurangan }}">
                    </div>
                </div>
                {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                <div class="pb-3 pl-5 mt-4">
                    <button type="submit" class="btn text-white tombol-simpan loading-simpan" style="background-color: #00a65b">Simpan</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('tambahjs')
    <script>
        const usulanCheckbox = document.getElementById('usulan-checkbox');
        const usulanSelect = document.getElementById('usulan-select');
        const usulanText = document.getElementById('usulan-text');
        const selectUsulan = document.querySelector('.select-usulan');
        const kategoriUtama = document.querySelector('.kategori-utama');
        const kategoriPendukung = document.querySelector('.kategori-pendukung');
        const selectKategori = document.querySelector('.select-kategori');
        const inputManualPeralatan = document.querySelector('.input-manual-peralatan');
        const tombolSimpan = document.querySelector('.tombol-simpan');

        usulanCheckbox.addEventListener('change', a => {
            if (a.target.checked === true) {
                // console.log("Checkbox is checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "none")
                usulanText.style.setProperty("display", "block")
                selectKategori.removeAttribute('disabled');
                selectUsulan.value = '';
            }
            if (a.target.checked === false) {
                // console.log("Checkbox is not checked - boolean value: ", a.target.checked)
                usulanSelect.style.setProperty("display", "block")
                usulanText.style.setProperty("display", "none")
                selectKategori.setAttribute('disabled', '');
                inputManualPeralatan.value = '';
            }
        });

        tombolSimpan.addEventListener('click', function(){
            selectKategori.removeAttribute('disabled');
        })

        selectUsulan.addEventListener('change', function() {
            let sel = document.querySelector('.input-option-' + selectUsulan.value).getAttribute('data-kategori')
                .toLowerCase();
            if (sel == 'utama') {
                kategoriUtama.setAttribute('selected', 'selected');
                kategoriPendukung.removeAttribute('selected');
                selectKategori.value = sel
            } else {
                kategoriPendukung.setAttribute('selected', 'selected');
                kategoriUtama.removeAttribute('selected');
                selectKategori.value = sel
            }
        })
    </script>
@endsection
