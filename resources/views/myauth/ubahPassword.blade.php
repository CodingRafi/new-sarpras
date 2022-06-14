<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SISTEM SARPRAS | Reset Password</title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/icons/favicon_io/favicon-16x16.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
        integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
</head>

<body>
    <div class="container-fluid text-center" style="background-color: rgba(238, 238, 238, 1); min-height: 100vh;">

        <img class="my-4" src="/assets/img/logoJabar.png" width="115">



        <div class="card text-center col-md-8 col-12 p-0 mx-auto mt-4">
            {{-- <h5 class="card-header bg-dark text-light">Reset Password</h5> --}}
            <div class="card-body d-flex flex-column justify-content-center align-items-center text-left py-4"
                style="min-height:40vh;">

                <x-auth-validation-errors class="mb-4 text-danger" :errors="$errors" />

                <form style="width: 90%;" action="{{ route('password.updateReset') }}" method="POST">
                    @csrf

                    <div class="form-group pb-2">
                        <label class="font-weight-bold" for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control bg-light border rounded-pill px-4" placeholder="email"
                            name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                    <div class="form-group pb-2">
                        <label class="font-weight-bold" for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control bg-light border rounded-pill px-4"
                            placeholder="Password" id="exampleInputPassword1" required name="password">
                    </div>
                    <div class="form-group">
                        <label class="font-weight-bold" for="exampleInputPassword1">Confirm Password</label>
                        <input type="password" class="form-control bg-light border rounded-pill px-4"
                            placeholder="Confirm Password" id="exampleInputPassword1" name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-dark text-center rounded-pill mt-5" style="width: 100%;">Reset
                        Password</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous">
    </script>
</body>

</html>
