<!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Batik</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  </head>

  <body>
 <!-- Login Content -->
 <section class="testimonials">
 <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-5 col-lg-12 col-md-5">
        <div class="card shadow-sm my-5">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">

                    <h1 class="h4 text-gray-900 mb-4">Daftar Akun</h1><hr>
                  </div>
                    @if(\Session::has('alert'))
                    <div class="alert alert-danger mb-3" align="center" style="background-color: red; color:white; ">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                    @endif
                    @if(\Session::has('alert-success'))
                        <div class="alert alert-success">
                            <div>{{Session::get('alert-success')}}</div>
                        </div>
                    @endif
                <form class="user" method="post" action="{{ url('/registerPembeli') }}" >
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <input type="text" id="no_hp" name="no_hp" class="form-control" placeholder="No. Hp">
                    </div>
                    <div class="form-group">
                        <textarea type="text" id="alamat" name="alamat" class="form-control" placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group">
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <input type="password" id="confirmation" name="confirmation" class="form-control" placeholder="Confirmation Password">
                        </div>
                    <div class="form-group text-right">
                        <p>Sudah punya akun ? <a href="{{url('login')}}"> Login</a></p>
                    </div>
                    <div class="form-group text-center mt-3">
                        <input type="submit" class="btn btn-warning btn-block" value="Daftar">
                    </div>

                </form>

                </div>
              </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  <!-- Login Content -->

  @include('sweet::alert')
    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

  </body>

  </html>

