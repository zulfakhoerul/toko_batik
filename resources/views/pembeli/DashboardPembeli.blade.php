@extends('pembeli.template')

@section('title', 'Dashboard')

@section('content')


    <!-- ======= Jenis Section ======= -->
    <section id="jenis" class="why-us">
      <div class="container mt-5">

        <div class="section-title">
          <h2>Mari berbelanja <span>Batik Paoman</span></h2>

        </div>
        <div class="mt-1">
            <center>
                <form action="/pembeli/DashboardPembeli/cari" method="GET">
                    <input class="btn btn-light col-10" type="text" name="cari" placeholder="Cari Nama Produk .." value="{{ old('cari') }}" style="box-shadow: 2px 5px rgba(128, 128, 128, 0.247);">
                    <button class="btn btn-warning col-1"><i class="fa fa-search"></i></button>
                </form>
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
@endsection
