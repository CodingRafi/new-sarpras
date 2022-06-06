<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/img/icons/favicon_io/favicon-16x16.png">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>

    {{-- My CSS --}}
    <link rel="stylesheet" href="/css/style.css">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <!-- Content -->

    {{-- <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <h4 class="mb-2">Welcome to Sneat! 👋</h4>
              <p class="mb-4">Please sign-in to your account and start the adventure</p>

              <form id="formAuthentication" class="mb-3" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{ route('password.request') }}">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember"/>
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div> --}}

    <div class="container-fluid pt-3 container-paling-luar" style="background: #EEEEEE; min-height: 100vh;" data-color="#EEEEEE">
      <div class="container p-0">
        <div class="row">
          <div class="col-md-4">
            <div class="container-fluid p-0">
              <div class="d-flex row-bulet-warna" style="gap: 1rem">
                <div class="a">
                  <button style="padding: 20px;border-radius: 50%;border: none;background-color: #25B5E9;" data-color="#25B5E9" class="button-warna"></button>
                </div>
                <div class="q">
                  <button style="padding: 20px;border-radius: 50%;border: none;background-color: #00A65B;" data-color="#00A65B" class="button-warna"></button>
                </div>
                <div class="a">
                  <button style="padding: 20px;border-radius: 50%;border: none;background-color: #FCC12D;" data-color="#FCC12D" class="button-warna"></button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8"></div>
        </div>
      </div>
        <div class="container d-flex justify-content-center p-0 con-main" style="min-height: 90vh;">
            <div class="row bagian-row">
                <div class="col con-img p-0" style="border-radius: 10px 0 0 10px">
                    <div class="container con-img-text">
                        <h1>Sistem <span>Sarpras</span></h1>
                        <h3 class="mb-1">Sarana Prasarana</h3>
                        <p style="font-weight: 200">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                            been the industry's standard dummy text ever since the 1500s</p>
                    </div>
                </div>
                <div class="col-7 d-flex justify-content-center align-items-center">
                    <form action="{{ route('login') }}" method="POST" style="width: 90%;">
                        @csrf
                        <div class="container p-0">
                            <h1 class="mb-3" style="color: #263238;">Masuk</h1>
                            <div class="mb-3">
                                <select class="form-select select-pilihan" aria-label="Default select example">
                                    <option value="belum" selected>Masuk Sebagai</option>
                                    <option value="dinas">Dinas Pendidikan</option>
                                    <option value="sekolah">Sekolah</option>
                                    <option value="kcd">Cadisdik Wil</option>
                                    <option value="pengawas">Pengawas</option>
                                    <option value="verifikator">Verifikator</option>
                                </select>
                            </div>
                            <div class="mb-3 div-email">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control input-email" id="email" placeholder="name@example.com"
                                    name="login" disabled>
                            </div>
                            <div class="mb-3 div-npsn" style="display: none;">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" class="form-control input-npsn" id="npsn" placeholder="NPSN" name="login">
                            </div>
                            <div class="mb-3 form-password-toggle">
                              <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                              </div>
                              <div class="input-group input-group-merge">
                                <input
                                  type="password"
                                  id="password"
                                  class="form-control input-password"
                                  name="password"
                                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                  aria-describedby="password"
                                  disabled
                                />
                                <span class="input-group-text cursor-pointer" style="background: none;"><i class="bx bx-hide"></i></span>
                              </div>
                            </div>
                            <div class="mb-3">
                                <div class="container p-0">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember"
                                                    name="remember">
                                                <label class="form-check-label" for="remember">
                                                    Remember Me
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-6 d-flex justify-content-end align-items-center">
                                          <a href="{{ route('password.request') }}" class="text-success" style="font-size: 12.5px; text-decoration: none; font-weight: 600;">Lupa Password?</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-grid gap-2">
                                    <button class="btn tombol-masuk" type="submit" style="background: #00A65B;color: #fff;" disabled>Masuk</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>

    <script>

      // Option
      const inputEmail = document.querySelector('.input-email');
      const inputNpsn = document.querySelector('.input-npsn');
      const divEmail = document.querySelector('.div-email');
      const divNpsn = document.querySelector('.div-npsn');
      const inputPassword = document.querySelector('.input-password');
      const tombolMasuk = document.querySelector('.tombol-masuk');
      let sebelum;

      const selectPilihan = document.querySelector('.select-pilihan');
      selectPilihan.addEventListener('change', function(){
        if (selectPilihan.value == 'belum') {
          if(sebelum == 'sekolah'){
            inputNpsn.setAttribute('disabled', 'disabled');
            inputPassword.setAttribute('disabled', 'disabled');
          }else{
            inputPassword.setAttribute('disabled', 'disabled');
            inputEmail.setAttribute('disabled', 'disabled');
          }
          tombolMasuk.setAttribute('disabled', 'disabled')
        } else if (selectPilihan.value != 'belum' && selectPilihan.value == 'sekolah') {
          inputEmail.setAttribute('disabled', 'disabled');
          divEmail.style.display = 'none';
          inputNpsn.removeAttribute('disabled');
          divNpsn.style.display = 'block';
          inputPassword.removeAttribute('disabled');
          sebelum = 'sekolah';
          tombolMasuk.removeAttribute('disabled');
        }else{
          inputEmail.removeAttribute('disabled');
          divEmail.style.display = 'block';
          inputNpsn.setAttribute('disabled', 'disabled');
          divNpsn.style.display = 'none';
          inputPassword.removeAttribute('disabled');
          sebelum = 'lainnya';
          tombolMasuk.removeAttribute('disabled');
        }
      })


      // Warna Background
      const buttonWarna = document.querySelectorAll('.button-warna');
      const containerPalingLuar = document.querySelector('.container-paling-luar');
      let warnaSebelumnya;
      buttonWarna.forEach((e,i) => {
        e.addEventListener('click', function(){
          warnaSebelumnya = containerPalingLuar.getAttribute('data-color');
          containerPalingLuar.style.backgroundColor = e.getAttribute('data-color');
          containerPalingLuar.setAttribute('data-color', e.getAttribute('data-color'));
          e.style.backgroundColor = warnaSebelumnya;
          e.setAttribute('data-color', warnaSebelumnya);
        })
      });

      let random = Math.round(Math.random() * 12 + 1);
      if(random <= 3){
        containerPalingLuar.style.backgroundColor = '#EEEEEE';
        containerPalingLuar.setAttribute('data-color', '#EEEEEE');
        buttonWarna[0].style.backgroundColor = '#25B5E9'
        buttonWarna[0].setAttribute('data-color', '#25B5E9');
        buttonWarna[1].style.backgroundColor = '#00A65B';
        buttonWarna[1].setAttribute('data-color', '#00A65B');
        buttonWarna[2].style.backgroundColor = '#FCC12D';
        buttonWarna[2].setAttribute('data-color', '#FCC12D');
      }else if(random > 3 && random <= 6){
        containerPalingLuar.style.backgroundColor = '#25B5E9';
        containerPalingLuar.setAttribute('data-color', '#25B5E9');
        buttonWarna[0].style.backgroundColor = '#EEEEEE'
        buttonWarna[0].setAttribute('data-color', '#EEEEEE');
        buttonWarna[1].style.backgroundColor = '#00A65B';
        buttonWarna[1].setAttribute('data-color', '#00A65B');
        buttonWarna[2].style.backgroundColor = '#FCC12D';
        buttonWarna[2].setAttribute('data-color', '#FCC12D');
      }else if(random > 6 && random <= 9){
        containerPalingLuar.style.backgroundColor = '#00A65B';
        containerPalingLuar.setAttribute('data-color', '#00A65B');
        buttonWarna[0].style.backgroundColor = '#EEEEEE'
        buttonWarna[0].setAttribute('data-color', '#EEEEEE');
        buttonWarna[1].style.backgroundColor = '#25B5E9';
        buttonWarna[1].setAttribute('data-color', '#25B5E9');
        buttonWarna[2].style.backgroundColor = '#FCC12D';
        buttonWarna[2].setAttribute('data-color', '#FCC12D');
      }else{
        containerPalingLuar.style.backgroundColor = '#FCC12D';
        containerPalingLuar.setAttribute('data-color', '#FCC12D');
        buttonWarna[0].style.backgroundColor = '#EEEEEE'
        buttonWarna[0].setAttribute('data-color', '#EEEEEE');
        buttonWarna[1].style.backgroundColor = '#25B5E9'; 
        buttonWarna[1].setAttribute('data-color', '#25B5E9');
        buttonWarna[2].style.backgroundColor = '#00A65B';
        buttonWarna[2].setAttribute('data-color', '#00A65B');
      }




    </script>
</body>

</html>
