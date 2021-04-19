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
          <li><a href="{{url('pembeli/keranjang')}}"><i class="fa fa-shopping-cart"></i></a></li>
          <li><a href="{{url('pembeli/')}}"><i class="fas fa-bell"></i></a></li>

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
            <div class="container">
                <a href="{{ url('pembeli/DashboardPembeli') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

                    <div class="row">

                        <div class="col-7">
                            <div class="card">
                                <div class="card-body">
                                    <H4><i class="fas fa-shopping-cart"></i> Keranjang</H4>
                                    @if(!empty($keranjang))
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Foto</th>
                                                <th>Nama Produk</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Jumlah Harga</th>
                                                <th><center>Action</center></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                                $no = 1;
                                            ?>
                                            @foreach($keranjang as $keranjang)
                                                <tr>
                                                    <td>{{ $no++ }}</td>
                                                    <td><img src="{{ url('/assets/img/produk/'.$keranjang->produk->foto) }}" class="rounded mx-auto d-block img-fluid" ></td>
                                                    <td>{{$keranjang->produk->nama}}</td>
                                                    <td>{{$keranjang->qty}}</td>
                                                    <td>Rp.{{number_format($keranjang->produk->harga)}}</td>
                                                    <td>Rp.{{number_format($keranjang->jumlah_harga)}}</td>
                                                    <td>
                                                    <form action="{{ url('pembeli/keranjang') }}/{{ $keranjang->id }}" method="post">
                                                                @csrf
                                                                {{ method_field('DELETE') }}
                                                                <button type="submit" class="btn btn-danger" onclick="
                                                                return confirm('Anda Yakin Akan Menghapus Data ?');"><i class="fa fa-trash"></i></button>
                                                    </form>
                                                    </td>
                                                    @endforeach
                                                </tr>

                                                <tr class="mt-3">
                                                    <td colspan="5" align="right"><i class="fas fa-coins"></i> Total Harga</td>
                                                    <td><b>Rp.{{number_format($total)}}</b></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        @else
                                        Tidak Ada Obat Yang Masuk Keranjang
                                        @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <H4><i class="fas fa-shopping-cart"></i> Konfirmasi Check Out</H4>
                                    @if(!empty($keranjang))
                                    <form action=" {{ url('/add-konfirmasi')}}/{{ $keranjang->id }} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table ">
                                        <tr>
                                            <td><strong>Nama Pembeli</strong></td>
                                            <td>:</td>
                                            <td><input class="form-control" type="text"  value="{{Session::get('nama')}} " ReadOnly></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pilih Metode Pembayaran</strong></td>
                                            <td>:</td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                    <select name="metode_pembayaran" id="select" type="select" class="form-control">
                                                            <option value="1" name="metode_pembayaran" type="select"> Transfer</option>
                                                            <option value="2" name="metode_pembayaran" type="select"> Bayar Ditempat</option>

                                                    </select>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>No HP</strong></td>
                                            <td>:</td>
                                            <td><input class="form-control" type="number" name="no_telepon" value="{{$keranjang->pembeli->no_hp}}" required><small>*Isi dengan Nomor Handphone yang masih aktif</small></td>
                                        </tr>
                                    </table>
                                    <div class="col-12 float-right" align="right">
                                        <tr>
                                            <td>
                                                <button type="submit" class="btn btn-primary text-black py-2 px-3"><i class="fas fa-cart-plus"></i>  Checkout</button>
                                            </td>
                                        </tr>
                                    </div>
                                    </form>
                                    @else
                                        Tidak Ada Obat Yang Masuk Keranjang
                                    @endif

                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Jenis Section -->


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
