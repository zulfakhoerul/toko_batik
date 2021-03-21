<?php

namespace App\Http\Controllers;

use App\Pembeli;
use App\Pemesanan;
use App\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        $data = [
            'pembeli'    => Pembeli::count(),
            'transaksi'  => Pembayaran::count(),
            'pendapatan' => Pemesanan::sum('total_harga')
        ];
        return view('admin.dashboard',compact('data'));
    }
}
