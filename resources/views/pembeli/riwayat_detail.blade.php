@extends('pembeli.template')

@section('title', 'Riwayat Pemesanan Detail')

@section('content')

    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="why-us">
        <div class="col-md-12 mt-5">
            <div class="card" >
                <div class="card-body">
                    <div class="container">
                        <a href="{{ url('pembeli/riwayat_beli') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

                    <div class="row">

                        <div class="col-12">
                            <div class="card">
                            @if($pemesanan->status==1)
                                <div class="card-body">
                                    <h3 style="color : green">Pemesanan Sukses</h3>
                                    <h5>Pemesanan anda sudah dicheck out selanjutnya untuk pembayaran silahkan transfer
                                    di rekening <strong>Bank BRI Nomer Rekening : <strong style="color: blue">
                                    0165-0107-0111-508</strong> atas nama <strong style="color: blue">Zulfa</strong> </strong>
                                    dengan nominal : <strong style="color: blue">Rp. {{ number_format($total)}}</strong><br>
                                    </h5>

                                </div>
                                @elseif($pemesanan->status==2)
                                <div class="card-body">
                                    <h5 style="color : blue">Menunggu Konfirmasi dari pihak toko Batik Paoman</h5>
                                </div>
                                @elseif($pemesanan->status==3)
                                <div class="card-body">
                                    <h3 style="color : green">Pembayaran Sukses</h3>
                                    <h5>Bukti Pembayaran sudah di konfirmasi, Silahkan ambil pemesanan produk batik pada toko Batik Paoman
                                    di<i class="fas fa-map-marker-alt"></i><strong style="color: blue"> Jalan Raya Paoman Sindang Indramayu</strong>
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
                                        @foreach($keranjang as $keranjang)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ url('/assets/img/produk/'.$keranjang->produk->foto) }}" class="rounded mx-auto d-block img-fluid" ></td>
                                                <td>{{$keranjang->produk->nama}}</td>
                                                <td>{{$keranjang->qty}}</td>
                                                <td>{{$keranjang->produk->harga}}</td>
                                                <td>Rp {{number_format($keranjang->jumlah_harga)}}</td>
                                            </tr>
                                        @endforeach
                                            <tr class="mt-3">
                                                <td><a href="{{url ('/pembeli/cetak_pdf')}}/{{$pemesanan->id}}" class="btn btn-primary"><i class="fas fa-file-pdf"></i> PDF</a></td>
                                                <td colspan="4" align="right"><i class="fas fa-coins"></i> Total Yang Harus Di Bayar :</td>
                                                <td>Rp.{{number_format($total)}}</td>
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
                                        <td><input type="file" id="foto" name="foto" class="form-control-file" required></td>
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
                                            <td>{{ $pemesanan->tanggal}}</td>
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
                                            <td>{{ $pemesanan->tanggal}}</td>
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
                                            <td>{{ $pemesanan->tanggal}}</td>
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
                                            <td>{{ $pemesanan->tanggal}}</td>
                                        </tr>
                                    </table>
                                    <p>Pemesanan Produk Di Batalkan dikarenakan belum membayar atau melakukan konfirmasi kepada pihak
                                    Toko Batik Paoman <strong style="color: red">{{ $pemesanan->tanggal }}</strong></p>
                                </div>
                                @endif

                            </div>
                        </div>
                    </div>

        </div>
    </section>
<!-- End Jenis Section -->
 @endsection
