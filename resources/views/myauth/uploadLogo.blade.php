<html>

<head>
    <title>SISTEM SARPRAS | Upload Logo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="container-fluid text-center pb-5" style="background-color: rgba(238, 238, 238, 1); min-height: 100vh;">

        <img class="my-4" src="/assets/img/logoJabar.png" width="115">

        <div class="card text-center col-md-9 col-12 p-0 mx-auto mt-4">
            <h5 class="card-header bg-dark text-light">Upload Logo</h5>
            <div class="card-body d-flex flex-column justify-content-center align-items-center" style="min-height:40vh;">
                <form action="/ubah-logo" method="post">
                    @csrf
                    @method('patch')
                    <input type="hidden" name="logo" class="logo-crop">
                    <div class="card text-center" id="uploadimage" style='display:none'>
                        <div class="card-body justify-content-center align-items-center">
                            <div id="image_demo"></div>
                        </div>
                        <div class="card-footer text-muted">
                            <div class="d-grid gap-2 col-10 mx-auto">
                                <button class="crop_image btn btn-primary" type="submit">Crop & Upload Image</button>
                            </div>
                        </div>
                    </div>
                </form>

                <div id="uploaded_image" style="width:200px;"></div>
                {{-- <p class="card-text">Pilih Gambar</p> --}}
                <label for="upload_image" class="btn btn-dark px-5 rounded-pill mt-3" style="width: fit-content">Pilih
                    Gambar</label>
                <input type="file" name="upload_image" id="upload_image" class="d-none" accept="image/*" />
            </div>
        </div>

        {{-- <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    
                   
                    
                </div>
            </div>
        </div> --}}


        {{-- <div class="card">
            <div class="card-header">
                Crop And Upload Image using PHP and JQuery Ajax - Croppie Image Cropper
            </div>
            <div class="card-body">
                <h5 class="card-title">Select Image</h5>
                <input type="file" name="upload_image" id="upload_image" />
            </div>
        </div>

        <div class="card text-center" id="uploadimage" style='display:none'>
            <div class="card-header">
                Upload & Crop Image
            </div>
            <div class="card-body">
                <div id="image_demo" style="width:350px; margin-top:30px"></div>
                <div id="uploaded_image" style="width:350px; margin-top:30px;"></div>
            </div>
            <div class="card-footer text-muted">
                <button class="crop_image">Crop & Upload Image</button>
            </div>
        </div> --}}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>

</body>

</html>

<script>
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

    $(document).ready(function() {
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
                width: 200,
                height: 200,
                type: 'circle' //circle
            },
            boundary: {
                width: 300,
                height: 300
            }
        });
        $('#upload_image').on('change', function() {
            var reader = new FileReader();
            reader.onload = function(event) {
                $image_crop.croppie('bind', {
                    url: event.target.result
                })
            }
            reader.readAsDataURL(this.files[0]);
            $('#uploadimage').show();
        });
        $('.crop_image').click(function(event) {
            $image_crop.croppie('result', {
                type: 'canvas',
                size: 'viewport'
            }).then(function(response) {
                $('.logo-crop').val(response);

                // $.ajax({
                //     url: "/ubah-logo",
                //     dataType: 'json',
                //     type: "post",
                //     data: {
                //         _method: 'post',
                //         _token: $('meta[name="csrf-token"]').attr('content'),
                //         "image": response
                //     },
                //     contentType: false,
                //     processData: false,
                //     success: function(data) {
                //         console.log(data)
                //         // $('#uploaded_image').html(data)
                //     }
                // });
            })
        });
    });
</script>
