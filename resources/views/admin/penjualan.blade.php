@extends('admin.template')

@section('title', 'Penjualan')
    
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Penjualan</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Penjualan</li>
            </ol>
        </div>

        <div class="row">
            <!-- Datatables -->
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
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
                                    <th>Jumlah Barang</th>
                                    <th>Pendapatan</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>{{++$i}}</th>
                                        <td>{{$data->pemesanan_id}}</td>
                                        <td>@currency($data->pendapatan)</td>
                                        <td>@month($data->tanggal)</td>
                                    </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          
@endsection