@extends('pembeli.template')

@section('title', 'Keranjang')

@section('content')

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
                                                    <td colspan="5" align="right"><i class="fas fa-coins"></i> Subtotal barang: </td>
                                                    <td><b>{{$total}}</b></td>
                                                </tr>
                                                <input type="hidden" id="subtotal" value="{{$total}}">
                                                <tr class="mt-3">
                                                    <td colspan="5" align="right"><i class="fas fa-coins"></i> Subtotal ongkos kirim: </td>
                                                    <td><span id="ongkir"></b></td>
                                                </tr>

                                                <tr class="mt-3">
                                                    <td colspan="5" align="right"><i class="fas fa-coins"></i> Total Harga</td>
                                                    <td><input class="form-control" type="text" id="total" ReadOnly></td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                        @else
                                        Tidak Ada Yang Masuk Keranjang
                                        @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="card">
                                <div class="card-body">
                                    <H4><i class="fas fa-shopping-cart"></i> Konfirmasi Check Out</H4>
                                    @if(!empty($pemesanan))
                                    <form action=" {{ url('/add-konfirmasi')}}/{{ $pemesanan->id }} " method="post" enctype="multipart/form-data">
                                    @csrf
                                    <table class="table ">
                                        <tr>
                                            <td><strong>Nama Pembeli: </strong></td>
                                            <td><input class="form-control" type="text"  value="{{Session::get('nama')}} " ReadOnly></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Pilih Metode Pembayaran</strong></td>
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
                                            
                                            <td><input class="form-control" type="number" name="no_hp" value="{{$pemesanan->pembeli->no_hp}}" required><small>*Isi dengan Nomor Handphone yang masih aktif</small></td>
                                        </tr>
                                        <tr>
                                            <td>Kota tujuan</td>
                                            <td>
                                                <div class="form-group row">
                                                    
                                                    <select type="text" class="form-control" id="destination" name="destination">
                                                        <option value="">Pilih Kota Tujuan</option>
                                                        @foreach ($cities as $city)
                                                            <option value="{{ $city->id_kota }}">
                                                                {{ $city->tipe }} - {{ $city->nama_kota }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Lengkap Pengiriman</td>
                                            <td>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <textarea name="full_address" class="form-control" 
                                                            id="full_address"></textarea>
                                                    </div>
                                                </div>
                                            </td>
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


 @endsection
