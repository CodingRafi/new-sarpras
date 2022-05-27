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
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Peralatan Sekolah</h3>
    </div>

    <form class="form-edit pt-3" method="post" action="/peralatan-tersedia/{{ $data->id }}">
        @csrf
        @method('patch')
        <div class="card pt-3" style="background-color: white; border-radius: 10px; ">
            <input type="hidden" name="kompeten_id" value="{{ $data->kompeten_id }}">
    
            <div class="row input pl-5">
                <div class="container">
                    <div class="row">
                        <label class="col-2 mt-3">Nama Peralatan</label>
                        <div class="p-0" style="width: 685px">
                            <input type="text" id="peralatan-text" class="form-control mt-2" name="nama" value="{{ $data->nama }}">
                            <select class="form-control mt-2" id="peralatan-select" style="display: none">
                                <option selected disabled>Pilih Peralatan</option>
                                @foreach ($peraturans as $peraturan)
                                <option value="{{ $peraturan->nama }}">{{ $peraturan->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-1">
                            <input type="checkbox" id="peralatan-checkbox" class="form-control mt-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Kategori</label>
                <select class=" col-9 mt-2 custom-select" name="kategori">
                    @if ($data->kategori == 'utama')
                    <option value="utama" selected>Utama</option>
                    <option value="pendukung">Pendukung</option>
                    @else
                    <option value="pendukung" selected>Pendukung</option>
                    <option value="utama">Utama</option>
                    @endif
                </select>
            </div>
    
            <div class="row input pl-5">
                <label class="col-2 mt-3">Ketersediaan</label>
                <input type="number" class="col-9 form-control mt-2" name="katersediaan" value="{{ $data->katersediaan }}">
            </div>

            <div class="row input pl-5">
                <label class="col-2 mt-3">Kekurangan</label>
                <input type="number" class="col-9 form-control mt-2" name="kekurangan" value="{{ $data->kekurangan }}">
            </div>
    
            <div class="pb-3 pl-5 pt-4">
                <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
            </div>
            
        </div>
    </form>
@endsection


@section('tambahjs')
    <script>
        const peralatanCheckbox = document.getElementById('peralatan-checkbox');
        const peralatanSelect = document.getElementById('peralatan-select');
        const peralatanText = document.getElementById('peralatan-text');

        peralatanCheckbox.addEventListener('change', e => {
            if (e.target.checked === false) {
                console.log("Checkbox is checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "none")
                peralatanSelect.removeAttribute("name")
                peralatanText.style.setProperty("display", "block")
                peralatanText.setAttribute("name", "nama")
            }
            if (e.target.checked === true) {
                console.log("Checkbox is not checked - boolean value: ", e.target.checked)
                peralatanSelect.style.setProperty("display", "block")
                peralatanSelect.setAttribute("name", "nama")
                peralatanText.style.setProperty("display", "none")
                peralatanText.removeAttribute("name")
            }
        });
    </script>
@endsection
