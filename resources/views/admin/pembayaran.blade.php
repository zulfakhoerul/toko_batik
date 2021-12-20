@extends('admin.template')

@section('title', 'Konfirmasi Pembayaran')
    
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Konfirmasi Pembayaran</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Konfirmasi Pembayaran</li>
            </ol>
        </div>

        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
                    </div>
                    {{-- alert --}}
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h6><i class="fas fa-check"></i><b> Berhasil!</b></h6>
                                {{ session('success') }}
                            </div>
                        @endif
                        @if($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
    
                    <div class="table-responsive p-3">
                        <table class="table align-items-center table-flush" id="dataTable">
                            <thead class="thead-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                    <th>Nama Pembeli</th>
                                    <th>Tanggal</th>
                                    <th>Metode</th>
                                    <th>Bukti TF</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($payments as $payment)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$payment->pemesanan->keranjang->produk->nama}}</td>
                                    <td>{{$payment->pemesanan->keranjang->qty}}</td>
                                    <td>@currency($payment->pemesanan->total_harga)</td>
                                    <td>{{$payment->pemesanan->keranjang->pembeli->nama}}</td>
                                    <td>@date($payment->tanggal)</td>
                                    <td>{{$payment->metode}}</td>
                                    <td>
                                        <a class="fancybox-effects-a" 
                                            href="{{ url('/assets/img/'.$payment->foto) }}">
                                            
                                            <img class="mx-auto d-block img-responsive" 
                                                width="135px" height="120px" 
                                                src="{{ url('/assets/img/'.$payment->foto) }}">
                                        </a>
                                    </td>
                                    <td>
                                        @if(!in_array([4, 5], $payment->status))
                                            <form action="{{route('updateStatusPembayaran', $payment->id)}}" 
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-primary" name="diterima" type="submit">
                                                    Diterima
                                                </button>
                                                <button class="btn btn-danger" name="ditolak" type="submit">
                                                    Ditolak
                                                </button>
                                          </form>
                                        @else
                                            {{$payment->status}}
                                        @endif
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="9">Data kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
@endsection