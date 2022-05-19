@extends('mylayouts.main')

@section('tambahcss')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

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
    {{-- @dd($data) --}}
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Ruang Kelas</h3>
    </div>

    <div class="form-edit pt-3">

        <form action="/usulan-bangunan/{{ $data->id }}" method="post">
            @csrf
            @method('patch')
            <div class="card pt-3" style="background-color: white; border-radius: 10px; ">


                <div class="row input pl-5 mt-2">
                    <label class="col-2 mt-3">Jumlah Ruang Kelas</label>
                    <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Jumlah Ruang"
                        value="{{ $data->jml_ruang }}" name="jml_ruang">
                </div>

                <div class="row input pl-5 mt-2">
                    <label class="col-2 mt-3">Luas Lahan</label>
                    <input type="number" class="col-9 form-control mt-2" placeholder="Masukan Luas Lahan"
                        value="{{ $data->jml_ruang }}" name="luas_lahan">
                </div>

                <div class="row input pl-5 mt-3" style="margin-top: 10px">
                    <label class="col-2 mt-1">Gambar Lahan</label>
                    <input type="file" id="gambar-lahan" nama="gambar[]">
                </div>
                <div class="container d-flex pl-5 mt-3">
                    @foreach ($fotos as $foto)
                        <div class="item col-lg-3 col-6 mb-3 container-image">
                            <div class="shadow-sm rounded border">
                                <button class="btn btn-danger shadow-sm button-hapus-image"
                                    style="position: absolute; right: 8px;" type="button"><i
                                        class="bi bi-trash-fill"></i></button>
                                <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox a-image"
                                    data-fancybox="gallery1">
                                    <img src="{{ asset('storage/' . $foto->nama) }}" class="rounded"
                                        style="object-fit: cover; width: 100%; aspect-ratio: 1/1;">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row input pl-5 mt-3" style="margin-top: 10px">
                    <label class="col-2 mt-1">Proposal</label>
                    <input type="file" id="proposal" name="proposal">
                </div>

                <div class="pb-3 pl-5 mt-4">
                    <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                </div>

                
            </div>
        </form>
        
    </div>

    <div class="container container-alert" style="position: fixed;right: 20px;bottom: 25px;width: auto">
        
    </div>
@endsection

@section('tambahjs')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script>
        const buttonHapusImage = document.querySelectorAll('.button-hapus-image');
        const aImage = document.querySelectorAll('.a-image');
        const containerImage = document.querySelectorAll('.container-image');
        const containerAlert = document.querySelector('.container-alert');

        let gambarHapus = [];

        let gambar = gambarHapus.map(function(e, i){
            console.log(e);
        });

        buttonHapusImage.forEach((e, i) => {
            e.addEventListener('click', function() {

                let hasilConfirm = confirm('Apakah anda yakin akan mengapus gambar ini?');

                if (hasilConfirm == true) {
                    gambarHapus.push(aImage[i].getAttribute('href'));
                    containerImage[i].style.display = 'none';
                    containerAlert.innerHTML += `<div class="toast align-items-center show alert-ke${i}" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Hello, world! This is a toast message.
                            </div>
                            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                                aria-label="Close"></button>
                        </div>
                    </div>`;
                    const myTimeout = setTimeout(function() {
                        document.querySelector('.alert-ke' + i).style.display = 'none';
                    }, 10000);
                }

            })
        });
    </script>
@endsection
