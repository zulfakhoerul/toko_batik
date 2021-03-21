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
                                    <th>total harga</th>
                                    <th>Nama Pembeli</th>
                                    <th>Tanggal</th>
                                    <th>Metode</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                <tr>
                                    <td>{{++$i}}</td>
                                    <td>{{$payment->order->keranjang->produk->nama}}</td>
                                    <td>{{$payment->order->keranjang->qty}}</td>
                                    <td>@currency($payment->order->total_harga)</td>
                                    <td>{{$payment->order->keranjang->pembeli->nama}}</td>
                                    <td>@date($payment->tanggal)</td>
                                    <td>{{$payment->metode}}</td>
                                    <td>{{$payment->foto}}</td>
                                    <td>
                                        <button type="submit">Diterima</button>
                                        <button type="submit">Ditolak</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        
            {{-- Modal edit --}}
            {{-- @foreach ($datas as $data)
            <div class="modal fade" id="edit-data-{{$data->id_admin}}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin Puskesmas</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{url('editadminpuskes', $data->id_admin)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" id="username" name="username"
                                        value="{{$data->username}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{$data->nama}}">
                                </div>
                                
                                <label>Jenis Kelamin</label>
                                <br>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="laki-laki"
                                        {{ ($data->jk=="laki-laki")? "checked" : "" }}>
                                    <label class="form-check-label" for="jk1">Laki - Laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jk2" value="perempuan"
                                        {{ ($data->jk=="perempuan")? "checked" : "" }}>
                                    <label class="form-check-label" for="jk2">Perempuan</label>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat"
                                        rows="2">{{$data->alamat}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="puskes">puskesmas</label>
                                    <select class="select2-single-placeholder form-control" name="puskes" id="puskes">
                                        @foreach ($puskes as $item)
                                        <option value="{{$item->id_puskesmas}}">{{$item->nama_puskesmas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password-edit" name="password"
                                        placeholder="Masukan Password">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach --}}
        {{-- Akhir Modal edit--}}    
@endsection