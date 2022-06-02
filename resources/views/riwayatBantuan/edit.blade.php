@extends('mylayouts.main')

@section('tambahcss')
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
        .card-header h4 {
            font-size: 1.2rem !important
        }

        #upload-dialog {
            display: none !important;
        }

        #pdf-loader {
            display: none
        }

        #pdf-name {
            display: none !important;
        }

        #pdf-preview {
            display: none;
            width: 300px !important;
        }

        #upload-button {
            display: none !important;
        }

        #cancel-pdf {
            display: none !important;
        }

        .preview,
        .preview img {
            /* display: none; */
        }

    </style>
@endsection

@section('container')
    {{-- @dd($data->jenis) --}}
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px;text-transform: capitalize;">Edit Riwayat Bantuan</h3>
    </div>

    <div class="card">
        <form class="form-horizontal" action="/riwayat-bantuan/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">

                {{-- ---------------------------------------------------------------------------------------- TAHUN BANTUAN ---------------------------------------------------------------------------------------- --}}
                <div class="form-group row">
                    <label for="tahun-bantuan" class="col-sm-3 col-form-label">Tahun Bantuan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="tahun-bantuan" name="tahun_bantuan"
                            required value="{{ $data->tahun_bantuan }}">
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- JENIS BANTUAN ---------------------------------------------------------------------------------------- --}}
                <div class="form-group row">
                    <label for="jenis-bantuan" class="col-sm-3 col-form-label">Jenis Bantuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pemberi-bantuan" name="jenis"
                            required value="{{ $data->jenis }}">
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- PEMBERI BANTUAN ---------------------------------------------------------------------------------------- --}}
                <div class="form-group row">
                    <label for="pemberi-bantuan" class="col-sm-3 col-form-label">Pemberi Bantuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="pemberi-bantuan"
                            name="pemberian_bantuan" required value="{{ $data->pemberian_bantuan }}">
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- SUMBER ANGGARAN ---------------------------------------------------------------------------------------- --}}
                <div class="form-group row">
                    <label for="sumber-anggaran" class="col-sm-3 col-form-label">Sumber Anggaran</label>
                    <div class="col-sm-9">
                        <select class="form-control" id="Sumber Anggaran" name="sumber_anggaran" required>
                            <option value="" selected>Pilih Sumber Anggaran</option>
                            <option value="apbn" {{ ($data->sumber_anggaran == 'apbn') ? 'selected' : '' }}>APBN</option>
                            <option value="apbd" {{ ($data->sumber_anggaran == 'apbd') ? 'selected' : '' }}>APBD</option>
                            <option value="lain" {{ ($data->sumber_anggaran == 'lain') ? 'selected' : '' }}>Sumber Lainnya</option>
                        </select>
                    </div>
                </div>
                {{-- ---------------------------------------------------------------------------------------- NILAI BANTUAN ---------------------------------------------------------------------------------------- --}}
                <div class="form-group row">
                    <label for="nilai-bantuan" class="col-sm-3 col-form-label">Nilai Bantuan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="nilai-bantuan" name="nilai_bantuan"
                            required value="{{ $data->nilai_bantuan }}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="keterangan" name="keterangan"
                            required value="{{ $data->keterangan }}">
                    </div>
                </div>

                {{-- --------------------------------------------- GAMBAR LAHAN --------------------------------------------- --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gambar Lahan</label>
                    <div class="col-sm-9">
                        <input type="file" id="gambar-lahan" name="gambar[]" onchange="previewImage()" multiple class="filename form-control" accept="image/*">
                    </div>
                </div>

                <div class="d-flex flex-wrap container-preview mb-3">
                    @foreach ($fotos as $foto)
                    <div class="item col-sm-3 col-6 container-image ">
                        <div class="shadow-sm rounded border">
                            <button class="btn btn-danger shadow-sm button-hapus-image"
                                style="position: absolute; right: 8px;" type="button"><i
                                    class="bi bi-trash-fill"></i></button>
                            <a href="{{ asset('storage/' . $foto->nama) }}" class="fancybox a-image"
                                data-fancybox="gallery1" data-id="{{ $foto->id }}">
                                <img src="{{ asset('storage/' . $foto->nama) }}" class="rounded"
                                    style="object-fit: cover; width: 100%; aspect-ratio: 1/1;">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                <div class="pb-3 pl-5 mt-4">
                    <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                </div>
            </div>
        </form>
    </div>

    {{-- --------------------------------------------- ALERT --------------------------------------------- --}}
    <div class="container container-alert" style="position: fixed;right: 20px;bottom: 25px;width: auto"></div>
    <div id='alrt' style="fontWeight = 'bold'"></div>

    <div class="d-none input-urungkan">
    </div>
@endsection

@section('tambahjs')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script src="/pdf.js"></script>
    <script src="/pdf.worker.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        function previewImage() {

            let countFiles = $('.filename')[0].files.length;

            for (let x = 0; x < countFiles; x++) {
                let imgPath = $('.filename')[0].files[x]['name'];
                let extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
                let image_holder = $('.container-preview');

                if (extn == "png" || extn == "jpg" || extn == "jpeg") {
                    if (typeof(FileReader) != "undefined") {

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            let div1 = document.createElement('div');
                            div1.setAttribute('class', 'item col-sm-3 col-6 container-image');
                            let div2 = document.createElement('div');
                            div2.setAttribute('class', 'shadow-sm rounded border');
                            div1.appendChild(div2);
                            let a = document.createElement('a');
                            a.setAttribute('href', e.target.result);
                            a.setAttribute('class', 'fancybox a-image');
                            a.setAttribute('data-fancybox', 'gallery1');
                            div2.appendChild(a);
                            let img = document.createElement('img');
                            img.setAttribute('id', 'file-ip-1-preview');
                            img.setAttribute('style', 'object-fit: cover; width: 100%; aspect-ratio: 1/1;');
                            img.setAttribute('src', e.target.result);
                            a.appendChild(img);
                            let containerPreview = document.querySelector('.container-preview');
                            containerPreview.appendChild(div1);

                        }

                        image_holder.show();
                        reader.readAsDataURL($('.filename')[0].files[x]);

                    } else {
                        alert("This browser does not support FileReader.");
                    }
                } else {
                    alert("Pls select only images");
                }
            }
        }
    </script>

    <script>
        const buttonHapusImage = document.querySelectorAll('.button-hapus-image');
        const aImage = document.querySelectorAll('.a-image');
        const containerImage = document.querySelectorAll('.container-image');
        const containerAlert = document.querySelector('.container-alert');
        const deleteImage = document.querySelector('.delete-image');
        const inputUrungkan = document.querySelector('.input-urungkan');

        // let gambarHapus = [];

        // function addImageDelete(data){
        //     gambarHapus.push(data);
        //     let gambar = gambarHapus.map(function(e, i) {
        //         return e;
        //     });

        //     deleteImage.value = gambar;
        // }

        function batalkan(i) {
            containerImage[i].style.display = 'block';
            console.log(document.querySelector(`input-ke${i}`))
        }

        function inputBatal() {
            document.querySelector('.alert-ke' + i).style.display = 'none';
            console.log('oke')

            return 1;
        }

        function validate(validate) {

        }

        buttonHapusImage.forEach((e, i) => {
            e.addEventListener('click', function() {

                let hasilConfirm = confirm('Apakah anda yakin akan mengapus gambar ini?');

                if (hasilConfirm == true) {
                    containerImage[i].style.display = 'none';
                    containerAlert.innerHTML += `<div class="toast align-items-center show alert-ke${i}" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                            <div class="toast-body">
                                Gambar Berhasil Dihapus
                            </div>
                        </div>
                    </div>`;

                    let input = document.createElement('input')
                    input.setAttribute('type', 'hidden');
                    input.setAttribute('class', `input-ke${i}`)
                    input.setAttribute('onchange', `inputBatal();`)
                    inputUrungkan.appendChild(input);

                    let urungkan = document.querySelector(`.urungkan-ke${i}`);

                    let id = '';
                    id = aImage[i].getAttribute('data-id');

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: '/foto/delete-sigle-foto/' + id,
                        dataType: 'json',
                        type: 'DELETE',
                        data: {
                            _method: 'delete',
                            _token: $('meta[name="csrf-token"]').attr('content')
                        },
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            console.log(response);
                        }
                    });

                    const myTimeout = setTimeout(function() {
                        document.querySelector('.alert-ke' + i).style.display = 'none';
                    }, 2000);
                }

            })
        });
    </script>
@endsection
