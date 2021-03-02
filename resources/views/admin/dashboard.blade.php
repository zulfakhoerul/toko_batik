@extends('admin.template')

@section('title', 'Dashboard')
    
@section('content')

    <div class="container-fluid" id="container-wrapper">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="./">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>

        <div class="row mb-3">
            <!-- Earnings (Annual) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Pembeli
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"></div>
                                <div class="mt-2 mb-0 text-muted text-xs"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clinic-medical fa-2x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- New User Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Transaksi
                                </div>
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"></div>
                                <div class="mt-2 mb-0 text-muted text-xs"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-uppercase mb-1">
                                    Penjualan
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">a</div>
                                <div class="mt-2 mb-0 text-muted text-xs"></div>
                            </div>
                            <div class="col-auto">
                                <i class="fa fa-user fa-2x" aria-hidden="true"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
@endsection