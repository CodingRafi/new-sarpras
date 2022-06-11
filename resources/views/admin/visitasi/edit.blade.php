@extends('mylayouts.main')

@section('tambahcss')
    <link rel="stylesheet" href="/css/fstdropdown.css">
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
        <h3 class="text-dark display-4 pl-3" style="font-size: 25px">Edit Visitasi Sekolah</h3>
    </div>
        
            <div class="form-edit pt-3">
                <div class="card pt-3" style="background-color: white; border-radius: 10px;">
                    <div class="card-body">
                        <form action="/visitasi/{{ $data->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            {{-- input nama verifikator --}}
                            <div class="row input pl-4">
                                <label class="col-sm-2 col-form-label">Nama Verifikator</label>
                                <select class="fstdropdown-select select-jurusan" id="select" name="user_id">
                                    @foreach ($verifikators as $verifikator)
                                        @if ($verifikator->id == $data->user_id)
                                            <option value="{{ $verifikator->id }}" selected>{{ $verifikator->name }}
                                            </option>
                                        @else
                                            <option value="{{ $verifikator->id }}">{{ $verifikator->name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{-- end input nama verifikator --}}
                            {{-- input nama sekolah --}}
                            <div class="row input pl-4">
                                <label class="col-sm-2 col-form-label">Nama Sekolah</label>
                                <select class="fstdropdown-select select-jurusan" id="select" name="profil_id">
                                    @foreach ($profils as $profil)
                                        @if ($profil->id == $data->profil_id)
                                            <option value="{{ $profil->id }}" selected>{{ $profil->nama }}
                                                ({{ $profil->alamat }})
                                            </option>
                                        @else
                                            <option value="{{ $profil->id }}">{{ $profil->nama }}
                                                ({{ $profil->alamat }})
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            {{-- end input nama sekolah --}}
                            {{-- input keperluan --}}
                            <div class="row input pl-4">
                                <label class="col-sm-2 col-form-label">Keperluan</label>
                                <div class="div">
                                    <input type="text" class="form-control col-sm-13" placeholder="Masukan Keperluan" id="keperluan" name="keperluan" required value="{{ $data->keperluan }}">
                                </div>
                            </div>
                            {{-- end input keperluan --}}
                            {{-- input nama tanggal visitasi --}}
                            <div class="form-group row input pl-4">
                                <label class="col-sm-2 col-form-label">Tanggal Visitasi</label>
                                <div class="div">
                                    <input type="date" class="form-control col-sm-13" placeholder="Masukan Tanggal Visitasi" id="visitasi" name="tanggal_visitasi" required value="{{ $data->tanggal_visitasi }}">
                                </div>
                            </div>
                            {{-- end input nama tanggal visitasi --}}
                            {{-- --------------------------------------------- surat_tugas --------------------------------------------- --}}
                            <div class="row input pl-4 mt-3" style="margin-top: 10px">
                                <label class="col-2 mt-1" value="{{ $data->surat_tugas }}">Surat Tugas</label>
                                <input type="file" id="surat_tugas" name="surat_tugas"
                                    value="{{ asset('storage/' . $data->surat_tugas) }}" accept=".pdf">
                            </div>
                            <div class="container d-flex pl-4 mt-3">
                                <iframe class="iframe-surat_tugas border border-rounded shadow-sm"
                                    src="{{ asset('storage/' . $data->surat_tugas) }}" frameborder="0" width="300" height="400"
                                    style="display: block; border-radius: 10px !important;"></iframe>
                                <div id="pdf-loader">Loading Preview ..</div>
                                <div><canvas id="pdf-preview" class="border border-rounded shadow-sm"
                                        style="width: 300px !important; border-radius: 10px !important;"></canvas></div>
                            </div>
                            {{-- --------------------------------------------- SUBMIT --------------------------------------------- --}}
                            <div class="pb-3 pl-4 mt-4">
                                <button type="submit" class="btn text-white" style="background-color: #00a65b">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
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
    <script src="/js/fstdropdown.js"></script>
    <script>
        setFstDropdown();
    </script>
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
        var iframe = document.querySelector('.iframe-surat_tugas');

        document.querySelector("#surat_tugas").addEventListener('change', function() {
            document.querySelector(".iframe-surat_tugas").style.display = 'none';
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
        //     document.querySelector("#surat_tugas").click();
        // });

        /* Selected File has changed */
        document.querySelector("#surat_tugas").addEventListener('change', function() {

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
            document.querySelector("#surat_tugas").value = '';

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
@endsection
