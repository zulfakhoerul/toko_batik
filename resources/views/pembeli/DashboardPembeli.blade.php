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
          <li class="active"><a href="{{url('pembeli/DashboardPembeli')}}">Pemesanan Batik</a></li>
          <li>
            <?php
            $pesanan_utama = \App\Keranjang::where('pembeli_id', Session::get('id'))->where('status',0)->first();
            if(!empty($pesanan_utama))
            {
                $notif = \App\Keranjang::where('pembeli_id', Session::get('id'))->count();
            }

            ?>
            <a href="{{url('pembeli/keranjang')}}"><i class="fa fa-shopping-cart"></i>
                @if(!empty($notif))
                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-13px; border-radius:100px; padding:5px;">{{ $notif }}</span>
                @endif
            </a>
          </li>
          <li><a href="{{url('pembeli/riwayat')}}"><i class="fas fa-bell"></i></a></li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle"  id="navbarDropdownpro" href="#"
                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{Session::get('nama')}}
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownpro">
                <a href="{{ url('pembeli/riwayat') }}" class="dropdown-item"><i class="fas fa-list-ul"></i> Riwayat</a>
                <a class="dropdown-item" href="{{('/logout') }}"><i class="fas fa-sign-out-alt"></i> Logout </a>
            </div>
        </li>
        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="why-us">
      <div class="container mt-5">

        <div class="section-title">
          <h2>Mari berbelanja <span>Batik Paoman</span></h2>

        </div>
        <div class="mt-1">
            <center>
                <input class="btn btn-light col-10" type="text" name="cari" placeholder="Cari Nama Batik .."  style="box-shadow: 2px 5px rgba(128, 128, 128, 0.247);">
                <button class="btn btn-warning col-1"><i class="fa fa-search"></i></button>
            </center>
        </div>


        <div class="row mt-5">
            @foreach ($produk as $produk)
          <div class="col-lg-4">
            <div class="box" style="height: 450px">
                <center>
                <img src="{{ url('/assets/img/produk/'.$produk->foto) }}"  alt="" style="width: 290px" height="165px">
            </center>
                <h4>{{ $produk->tipe }} {{$produk->nama}}</h4>
                <p>{{ $produk->deskripsi }}</p>
                <p><i class="fas fa-coins"></i> Rp. {{ $produk->harga }}</p>
            <center>
                <a href="{{ url('/pembeli/detail_produk'.$produk->id) }}" class="btn btn-warning mt-5"><i class="fa fa-shopping-cart"> Pesan</i></a>
            </center>
            </div>
          </div>
          @endforeach
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
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
