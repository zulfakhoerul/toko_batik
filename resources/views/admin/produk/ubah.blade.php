@extends('admin.template')

@section('content')

<div class="container-fluid" id="container-wrapper">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Produk</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item">Produk</li>
            <li class="breadcrumb-item active" aria-current="page">Ubah</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card mb-4">
                <form action="{{route('produk.update', $produk->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm col-form-label">Nama</label>
                            <div class="col-sm-9">
                            <input name="nama" type="text" class="form-control" id="inputEmail3" value="{{$produk->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm col-form-label">Deskripsi</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi">{{$produk->deskripsi}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm col-form-label">Tipe</label>
                            <div class="col-sm-9">
                            <input type="text" name="tipe" class="form-control" id="inputEmail3" placeholder="Tipe Batik" value="{{$produk->tipe}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm col-form-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="stok" value="{{$produk->stok}}"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm col-form-label">Harga</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="harga" value="{{$produk->harga}}" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <input type="file" class="form-control" name="foto"/>
                            </div>
                        </div>
                        <div class="form-group row" style="margin-left: 15px">
                            <a class="fancybox-effects-a" href="{{ url('/assets/img/produk/'.$produk->foto) }}">            
                                <img class="mx-auto d-block img-responsive" width="135px" height="120px" 
                                    src="{{ url('/assets/img/produk/'.$produk->foto) }}">
                            </a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
                        <a href="{{route('produk.index')}}" class="btn btn-warning btn-sm">Batal</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4"></div>
    </div>
</div>

@endsection
