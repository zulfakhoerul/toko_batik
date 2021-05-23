@extends('pembeli.template')

@section('title', 'Detail Produk')

@section('content')

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
@endsection
