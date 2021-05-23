@extends('pembeli.template')

@section('title', 'Riwayat Pemesanan')

@section('content')

    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="why-us">
        <div class="col-md-12 mt-5">
            <div class="card" >
                <div class="card-body">
            <div class="container">
                <a href="{{ url('pembeli/DashboardPembeli') }}" class="btn_2"><i class="fas fa-arrow-left"></i> Kembali</a><br><br>

                <div class="col-12">
                    <div class="card" style="box-shadow: 2px 5px 5px  rgba(128, 128, 128, 0.247);">
                        <div class="card-body">
                            <H4><i class="fas fa-shopping-cart"></i> Riwayat Pemesanan</H4>

                                <table class="table">

                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Status</th>
                                        <th>Detail</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $no = 1;
                                    ?>
                                    @foreach($pemesanan as $pemesanan)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $pemesanan->tanggal}}</td>
                                            <td>
                                                @if($pemesanan->metode_pembayaran == 1)
                                                <span>Transfer</span>
                                                @else
                                                <span>Bayar Ditempat</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pemesanan->status == 1)
                                                <span class="badge badge-warning">Sudah Pesan & Menunggu Pembayaran</span>
                                                @elseif($pemesanan->status == 2)
                                                <span class="badge text-white" style="background-color: blue">Menunggu Konfirmasi</span>
                                                @elseif($pemesanan->status == 3)
                                                <span class="badge text-white" style="background-color: #3f6ad8">Menunggu di ambil</span>
                                                @elseif($pemesanan->status == 4)
                                                <span class="badge badge-success"> Selesai</span>
                                                @elseif($pemesanan->status == 5)
                                                <span class="badge badge-danger"> Dibatalkan</i></span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('history')}}/{{ $pemesanan->id}}" class="btn btn-primary"><i class="fa fa-info"></i> Detail</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>
<!-- End Jenis Section -->


  @endsection
