<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Batik</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="{{url('fontawesome-free/css/all.min.css')}}">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/icofont/icofont.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/venobox/venobox.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="{{url('/pembeli/DashboardPembeli')}}"><span>Batik Paoman</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Pemesanan Batik</a></li>
          <li><a href="{{url('/')}}"><i class="fa fa-shopping-cart"></i></a></li>
          <li><a href="{{url('/')}}"><i class="fas fa-bell"></i></a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="navbarDropdownpro" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Session::get('nama')}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownpro">
                <a href="{{ url('pembeli/riwayat_Beli') }}" class="dropdown-item"><i class="fas fa-list-ul"></i> Riwayat</a>
                <a class="dropdown-item" href="{{('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>

    <script type="text/javascript">

        function startCalculate(){
            interval=setInterval("Calculate()",1);
        }
        function Calculate(){
            var a=document.form1.harga.value;
            var c=document.form1.qty.value;
            document.form1.jumlah_harga.value=(c*a);
        }
        function stopCalc(){
            clearInterval(interval);
        }
    </script>
  </header><!-- End Header -->

    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="why-us">
        <div class="col-md-12 mt-5">
            <div class="card" >
                <div class="card-body">

                <div class="row">
                    <div class="col-md-5 mt-5">
                        <img src="{{ url('/assets/img/produk/'.$produk->foto) }}" class="rounded mx-auto d-block" width="400">
                    </div>

                    <div class="col-md-7 mt-5">
                        @if(\Session::has('alert'))
                            <div class="alert alert-danger" align="center">
                                <div>{{Session::get('alert')}}</div>
                            </div>
                        @endif

                        <h2>Detail Batik</h2>
                        <table class="table">
                        <form method="post" id="form1" name="form1" action="{{ url ('pesan') }}/{{ $produk->id }}">
                        {{csrf_field()}}
                            <thead>
                                <tr>
                                    <td><strong>Nama Produk</strong></td>
                                    <td width="15px">:</td>
                                    <td>{{$produk->nama}}</td>
                                </tr>
                                <tr>
                                    <td><strong>Stok</strong> </td>
                                    <td width="15px">:</td>
                                    <td>{{$produk->stok}} </td>
                                </tr>
                                <tr>
                                    <td><strong>Harga</strong> </td>
                                    <td width="15px">:</td>
                                    <td><input type="text" name="harga" class="form-control" value="{{$produk->harga}}" onfocus="startCalculate()" onblur="stopCalc()" readonly></td>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Beli</strong> </td>
                                    <td width="15px">:</td>
                                    <td><input type="number" name="qty" class="form-control @error('qty') is-invalid @enderror"  onfocus="startCalculate()" onblur="stopCalc()">
                                        @if ($errors->has('qty')) <span class="invalid-feedback"><strong>{{ $errors->first('qty') }}</strong></span> @endif
                                    <br>
                                </tr>
                                <tr>
                                    <td><strong>Jumlah Harga</strong> </td>
                                    <td width="15px">:</td>
                                    <td><input class="form-control" name="jumlah_harga" onfocus="startCalculate()" onblur="stopCalc()" readonly></td>
                                </tr>
                                <tr>
                                    <td>
                                    <a href="{{ url('/pembeli/DashboardPembeli') }}" class="button-contactFrom btn_2"><i class="fas fa-arrow-left"></i> Kembali</a>
                                        <td width="15px"></td>
                                        <td>

                                            <button class="btn btn-primary text-black py-2 px-3" data-toggle="modal" data-target="#login">
                                                <i class="fas fa-shopping-cart"></i> Pesan</button>
                                        </td>
                                    </td>

                                </tr>
                            </thead>
                        </form>
                        </table>
                    </div>
                </div>

    </section><!-- End Jenis Section -->


  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Paoman ART</h3>
      <p>Batik Paoman Indramayu</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Batik Paoman</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <p>Kelompok 1</p>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
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
