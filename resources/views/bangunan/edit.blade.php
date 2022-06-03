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
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px;text-transform: capitalize;">Edit
            {{ str_replace('_', ' ', $data->jenis) }}</h3>
    </div>

    {{-- <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Horizontal Form</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form class="form-horizontal">
            <div class="card-body">
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck2">
                            <label class="form-check-label" for="exampleCheck2">Remember me</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-info">Sign in</button>
                <button type="submit" class="btn btn-default float-right">Cancel</button>
            </div>
            <!-- /.card-footer -->
        </form>
    </div> --}}

    <div class="card">
        <form class="form-horizontal" action="/usulan-bangunan/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                
                @if ($data->jenis == 'perpustakaan' || $data->jenis == 'toilet')
                <input type="hidden" name="jml_ruang" value="{{ $data->jml_ruang }}">
                @else

                {{-- --------------------------------------------- JUMLAH RUANG --------------------------------------------- --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" style="text-transform: capitalize;">Jumlah {{ str_replace('_', ' ', $data->jenis) }}</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control loading-tambah" placeholder="Masukan Jumlah Ruang" value="{{ $data->jml_ruang }}" name="jml_ruang">
                    </div>
                </div>
                @endif

                {{-- --------------------------------------------- LUAS LAHAN --------------------------------------------- --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Luas Lahan</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control loading-tambah" placeholder="Masukan Luas Lahan" value="{{ $data->luas_lahan }}" name="luas_lahan">
                    </div>
                </div>

                <input type="hidden" name="deleteImage" class="delete-image">

                {{-- --------------------------------------------- GAMBAR LAHAN --------------------------------------------- --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Gambar Lahan</label>
                    <div class="col-sm-9">
                        <input type="file" id="gambar-lahan" name="gambar[]" onchange="previewImage()" multiple class="filename form-control" accept="image/*">
                    </div>
                </div>

                <div class="d-flex flex-wrap container-preview mb-3">
                    <div class="col-sm-3"></div>
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

                {{-- --------------------------------------------- PROPOSAL --------------------------------------------- --}}
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label" value="{{ $data->proposal }}">Proposal</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="file" id="proposal" name="proposal" value="{{ asset('storage/' . $data->proposal) }}" accept=".pdf">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3 col-form-label"></div>
                    <div class="col-sm-9 d-flex">
                        <iframe class="iframe-proposal col-sm-6 border border-rounded shadow-sm p-0" src="{{ asset('storage/' . $data->proposal) }}" frameborder="0" height="400" style="display: block; border-radius: 10px !important;"></iframe>
                        <div id="pdf-loader">Loading Preview ..</div>
                        <div class="col-sm-6 "><canvas id="pdf-preview" class="border border-rounded shadow-sm p-0"
                                style="border-radius: 10px !important;"></canvas></div>
                    </div>
                </div>

                {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                <div class="pb-3 pl-5 mt-4">
                    <button type="submit" class="btn text-white loading-simpan" style="background-color: #00a65b">Simpan</button>
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
        var iframe = document.querySelector('.iframe-proposal');

        document.querySelector("#proposal").addEventListener('change', function() {
            document.querySelector(".iframe-proposal").style.display = 'none';
        });
    </script>

    <script>
        document.getElementById('alrt').innerHTML = '<b>Please wait, Your download will start soon!!!</b>';

        setTimeout(function() {
            document.getElementById('alrt').innerHTML = '';
        }, 5000);
    </script>

    <script>
        var _PDF_DOC,
            _CANVAS = document.querySelector('#pdf-preview'),
            _OBJECT_URL;

        function showPDF(pdf_url) {
            PDFJS.getDocument({
                url: pdf_url
            }).then(function(pdf_doc) {
                _PDF_DOC = pdf_doc;

                // Show the first page
                showPage(1);

                // destroy previous object url
                URL.revokeObjectURL(_OBJECT_URL);
            }).catch(function(error) {
                // trigger Cancel on error
                document.querySelector("#cancel-pdf").click();

                // error reason
                alert(error.message);
            });;
        }

        function showPage(page_no) {
            // fetch the page
            _PDF_DOC.getPage(page_no).then(function(page) {
                // set the scale of viewport
                var scale_required = _CANVAS.width / page.getViewport(1).width;

                // get viewport of the page at required scale
                var viewport = page.getViewport(scale_required);

                // set canvas height
                _CANVAS.height = viewport.height;

                var renderContext = {
                    canvasContext: _CANVAS.getContext('2d'),
                    viewport: viewport
                };

                // render the page contents in the canvas
                page.render(renderContext).then(function() {
                    document.querySelector("#pdf-preview").style.display = 'inline-block';
                    // document.querySelector("#pdf-loader").style.display = 'none';
                });
            });
        }


        /* Show Select File dialog */
        // document.querySelector("#upload-dialog").addEventListener('click', function() {
        //     document.querySelector("#proposal").click();
        // });

        /* Selected File has changed */
        document.querySelector("#proposal").addEventListener('change', function() {

            // user selected file
            var file = this.files[0];

            // allowed MIME types
            var mime_types = ['application/pdf'];

            // Validate whether PDF
            if (mime_types.indexOf(file.type) == -1) {
                alert('Error : Incorrect file type');
                return;
            }

            // validate file size
            if (file.size > 10 * 1024 * 1024) {
                alert('Error : Exceeded size 10MB');
                return;
            }

            // validation is successful

            // hide upload dialog button
            // document.querySelector("#upload-dialog").style.display = 'none';

            // set name of the file
            // document.querySelector("#pdf-name").innerText = file.name;
            // document.querySelector("#pdf-name").style.display = 'inline-block';

            // show cancel and upload buttons now
            // document.querySelector("#cancel-pdf").style.display = 'inline-block';
            // document.querySelector("#upload-button").style.display = 'inline-block';

            // Show the PDF preview loader
            // document.querySelector("#pdf-loader").style.display = 'inline-block';


            // object url of PDF 
            _OBJECT_URL = URL.createObjectURL(file)

            // send the object url of the pdf to the PDF preview function
            showPDF(_OBJECT_URL);
        });

        window.addEventListener('load', function() {
            // document.querySelector('#pdf-file').value(document.querySelector('.filePDF').value)
        });

        /* Reset file input */
        document.querySelector("#cancel-pdf").addEventListener('click', function() {
            // show upload dialog button
            // document.querySelector("#upload-dialog").style.display = 'inline-block';

            // reset to no selection
            document.querySelector("#proposal").value = '';

            // hide elements that are not required
            // document.querySelector("#pdf-name").style.display = 'none';
            document.querySelector("#pdf-preview").style.display = 'none';
            // document.querySelector("#pdf-loader").style.display = 'none';
            // document.querySelector("#cancel-pdf").style.display = 'none';
            // document.querySelector("#upload-button").style.display = 'none';
        });

        /* Upload file to server */
        document.querySelector("#upload-button").addEventListener('click', function() {
            // AJAX request to server
            alert('This will upload file to server');
        });
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
