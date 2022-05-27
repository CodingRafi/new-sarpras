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
    {{-- @dd($data) --}}
    <div class="title pt-3">
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Usulan Lahan</h3>
    </div>

    <div class="form-edit pt-3">

        <form action="/usulan-peralatan/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card pt-3" style="background-color: white; border-radius: 10px; ">

                {{-- ---------------------------------------------------------------------------------------- NAMA PERALATAN ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label for="nama-peralatan" class="col-2 mt-1">Nama Peralatan</label>
                    <div class="col-sm-9">
                        <div class="input-group peralatan-parent">

                            @foreach ($peralatanOptions as $options)
                                <input type="hidden" class="input-option-{{ $options->id }}"
                                    data-kategori="{{ $options->kategori }}">
                            @endforeach
                            <select class="form-control select-usulan" id="usulan-select" name="peralatan_id" style="{{ ($data->peralatan_id == null) ? 'display:none' : '' }}">
                                <option value="">Pilih Peralatan</option>
                                @foreach ($peralatanOptions as $options)
                                    <option value="{{ $options->id }}" {{ ($data->peralatan_id == $options->id) ? 'selected' : '' }}>
                                        {{ $options->nama }}</option>
                                @endforeach
                            </select>

                            <input type="text" class="form-control input-manual-peralatan" style="{{ ($data->peralatan_id == null) ? '' : 'display:none' }}"
                                id="usulan-text" name="nama_peralatan" value="{{ $data->nama_peralatan }}" placeholder="Masukkan Nama Peralatan">

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
                {{-- ---------------------------------------------------------------------------------------- JUMLAH ---------------------------------------------------------------------------------------- --}}
                <div class="row input pl-5 mt-3">
                    <label for="jumlah" class="col-2 mt-1">Jumlah</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="jumlah" name="jml" value="{{ $data->jml }}">
                    </div>
                </div>

                {{-- --------------------------------------------- PROPOSAL --------------------------------------------- --}}
                <div class="row input pl-5 mt-3" style="margin-top: 10px">
                    <label class="col-2 mt-1" value="{{ $data->proposal }}">Proposal</label>
                    <div class="col-sm-9">
                        <input type="file" id="proposal" name="proposal" value="{{ asset('storage/' . $data->proposal) }}"
                            accept=".pdf">
                    </div>
                    <div class="container d-flex pl-5 mt-3">
                        <iframe class="iframe-proposal border border-rounded shadow-sm"
                            src="{{ asset('storage/' . $data->proposal) }}" frameborder="0" width="300" height="400"
                            style="display: block; border-radius: 10px !important;"></iframe>
                        <div id="pdf-loader">Loading Preview ..</div>
                        <div><canvas id="pdf-preview" class="border border-rounded shadow-sm"
                                style="width: 300px !important; border-radius: 10px !important;"></canvas></div>
                    </div>
                </div>

                {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                <div class="pb-3 pl-5 mt-4">
                    <button type="submit" class="btn text-white tombol-simpan" style="background-color: #00a65b">Simpan</button>
                </div>

            </div>
        </form>

    </div>

    {{-- --------------------------------------------- ALERT --------------------------------------------- --}}
    <div class="container container-alert" style="position: fixed;right: 20px;bottom: 25px;width: auto"></div>
    <div id='alrt' style="fontWeight = 'bold'"></div>

    <div class="d-none input-urungkan">

    </div>

    {{-- --------------------------------------------- HIDE --------------------------------------------- --}}
    {{-- <button id="upload-dialog">Choose PDF</button> hide --}}
    {{-- <span id="pdf-name"></span> hide --}}
    {{-- <button id="upload-button">Upload</button> hide --}}
    {{-- <button id="cancel-pdf">Cancel</button> hide --}}
@endsection

@section('tambahjs')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

    <script src="/pdf.js"></script>
    <script src="/pdf.worker.js"></script>

    {{-- <script>
        function showPreview(event) {
            if (event.target.files.length > 0) {
                var src = URL.createObjectURL(event.target.files[0]);
                var preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
                document.querySelector('.preview').style.display = "block";
                document.getElementById("href-preview").href = src;
            }
        }
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

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
