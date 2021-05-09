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
                $notif = \App\Keranjang::where('pembeli_id', Session::get('id'))->where('status',0)->count();
            }

            ?>
            <a href="{{url('pembeli/keranjang')}}"><i class="fa fa-shopping-cart"></i>
                @if(!empty($notif))
                <span class="badge badge-danger align-top" style="font-size: 10px; margin-left:-8px; margin-top:-13px; border-radius:100px; padding:5px;">{{ $notif }}</span>
                @endif
            </a>
          </li>
          <li><a href="{{url('pembeli/riwayat_beli')}}"><i class="fas fa-bell"></i></a></li>
          <li><a href="#"> {{Session::get('nama')}}
        </a></li>
        <li class="book-a-table text-center"><a href="{{('/logout')}}"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
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
                        <a href="{{ url('pembeli/riwayat_Beli') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                            @if($pemesanan->status==1)
                                <div class="card-body">
                                    <h3 style="color : green">Pemesanan Sukses</h3>
                                    <h5>Pemesanan anda sudah dicheck out selanjutnya untuk pembayaran silahkan transfer
                                    di rekening <strong>Bank BRI Nomer Rekening : <strong style="color: blue">
                                    0165-0107-0111-508</strong> atas nama <strong style="color: blue">Dr. Ani</strong> </strong>
                                    dengan nominal : <strong style="color: blue">Rp. {{ number_format($total)}}</strong><br>
                                    </h5>

                                </div>
                                @elseif($pemesanan->status==2)
                                <div class="card-body">
                                    <h5 style="color : blue">Menunggu Konfirmasi dari pihak Apotek Enggal Sae</h5>
                                </div>
                                @elseif($pemesanan->status==3)
                                <div class="card-body">
                                    <h3 style="color : green">Pembayaran Sukses</h3>
                                    <h5>Bukti Pembayaran sudah di konfirmasi, Silahkan ambil pemesanan obat pada Apotek Enggal Sae
                                    di<i class="fas fa-map-marker-alt"></i><strong style="color: blue"> Jalan Raya Jatibarang (Apotek Enggal Sae)</strong>
                                </div>
                                @elseif($pemesanan->status==4)
                                <div class="card-body">
                                    <h3 style="color : green">Selesai</h3>
                                    <h5>Pesanan Anda Telah Selesai, Terimakasih^^
                                </div>
                                @elseif($pemesanan->status==5)
                                <div class="card-body">
                                    <h3 style="color : red"><i class="fas fa-exclamation-triangle"></i> Pemesanan Di Batalkan</h3>
                                    @if(!empty($pemesanan->ket_batal))
                                    <p>{{$pemesanan->ket_batal}}</p>
                                    @else
                                    <p> Dibatalkan secara otomatis </p>
                                    @endif
                                </div>
                                @endif
                            </div>
                    </div>
                    <div class="col-7 mt-3">
                        <div class="card">
                            <div class="card-body">
                                <H4><i class="fas fa-clipboard"></i> Detail Pemesanan</H4>
                            <div class="outtable">
                                    <table class="table table-responsive">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th><center>Foto</center></th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah Beli</th>
                                            <th>Harga</th>
                                            <th>Jumlah Harga</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $no = 1;
                                        ?>
                                        @foreach($pms as $pms)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{$pms->produk->nama}}</td>
                                                <td>{{$pms->keranjang->qty}}</td>
                                                <td>Rp {{number_format($pms->keranjang->jumlah_harga)}}</td>
                                            </tr>
                                        @endforeach
                                            <tr class="mt-3">
                                                <td><a href="{{url ('/pembeli/cetak_pdf')}}/{{$pemesanan->id}}" class="btn btn-primary"><i class="fas fa-file-pdf"></i> PDF</a></td>
                                                <td colspan="4" align="right"><i class="fas fa-coins"></i> Total Yang Harus Di Bayar :</td>
                                                <td>Rp</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-5 mt-3">
                        <div class="card">
                            <div class="card-body">
                            @if($pemesanan->status == 1)
                                <H4><i class="fas fa-mobile-alt"></i> Upload Bukti Transfer</H4>

                                <form action="{{ url('buktiTf')}}/{{ $pemesanan->id }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table class="table">
                                    <tr>
                                        <td><strong>Atas Nama</strong> </td>
                                        <td width="15px">:</td>
                                        <td><input class="form-control" value="{{Session::get('nama')}} " ReadOnly></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Bukti Pembayaran</strong></td>
                                        <td>:</td>
                                        <td><input type="file" id="bukti_tf" name="bukti_tf" class="form-control-file" required></td>
                                    </tr>
                                </table>
                                <div class="col-12 float-right" align="right">
                                    <tr>
                                        <td>
                                            <button type="submit" class="btn btn-primary"><i class="fas fa-mobile-alt"></i>  Upload</button>
                                        </td>
                                    </tr>
                                </div>
                                </form>
                               @elseif($pemesanan->status == 2)
                                <div>
                                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                                    <table class="table">
                                        <tr>
                                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                                            <td>:</td>
                                            <td>{{ $pemesanan->waktu}}</td>
                                        </tr>
                                    </table>
                                </div>
                                @elseif($pemesanan->status == 3)
                                <div>
                                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                                    <table class="table">
                                        <tr>
                                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                                            <td>:</td>
                                            <td>{{ $pemesanan->waktu}}</td>
                                        </tr>
                                    </table>
                                </div>
                                @elseif($pemesanan->status == 4)
                                <div>
                                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                                    <table class="table">
                                        <tr>
                                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                                            <td>:</td>
                                            <td>{{ $pemesanan->waktu}}</td>
                                            <td>
                                                <p></p>
                                            </td>
                                        </tr>
                                    </table>
                                    <p>Terimakasih sudah berbelanja di Apotek kami^^</p>
                                </div>
                                @elseif($pemesanan->status == 5)
                                <div>
                                    <h4><i class="fas fa-calendar"></i> Detail Tanggal</h4>
                                    <table class="table">
                                        <tr>
                                            <td><i class="fas fa-calendar-plus"></i> Tanggal Pembelian</td>
                                            <td>:</td>
                                            <td>{{ $pemesanan->waktu}}</td>
                                        </tr>
                                    </table>
                                    <p>Pemesanan Produk Di Batalkan dikarenakan belum membayar atau melakukan konfirmasi kepada pihak
                                    Apotek Enggal Sae sampai tanggal <strong style="color: red">{{ $pemesanan->waktu }}</strong></p>
                                </div>
                                @endif

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
