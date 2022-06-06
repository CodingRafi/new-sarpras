<html>

<head>
    <title>SISTEM SARPRAS | Forgot Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">


    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
</head>

<body>
    <div class="container-fluid text-center" style="background-color: rgba(238, 238, 238, 1); height: 100vh;">

        <img class="my-4" src="/assets/img/logoJabar.png" width="115">

        <div class="card text-center col-md-8 col-12 p-0 mx-auto mt-4">
            {{-- <h5 class="card-header bg-dark text-light">Reset Password</h5> --}}

            <div class="card-body d-flex flex-column justify-content-center align-items-center text-left py-4"
                style="min-height:40vh;">
                @if (session('status'))
                    <div class="alert alert-primary" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form style="width: 90%;" action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-group pb-2">
                        <label class="font-weight-bold" for="exampleInputEmail1">Lupa Password?</label>
                        <p style="font-size: 12px; color:rgb(125, 125, 125);">Masukan email anda, kami akan kirimkan
                            kode verifikasi ke email anda</p>
                    </div>

                    <div class="form-group pb-2">
                        <label class="font-weight-bold" for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control bg-light border rounded-pill px-4"
                            placeholder="Masukan email anda" name="email">
                    </div>

                    <button type="submit" class="btn btn-dark text-center rounded-pill mt-3" style="width: 100%;">Lanjut
                    </button>
                </form>

                <div class="text-center mt-2">
                    <a href="/login"><i class="bi bi-arrow-left">Kembali ke login</i></a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
