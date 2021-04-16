<?php

namespace App\Http\Controllers;

use App\Pembeli;
use App\Pemesanan;
use App\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        
        $pembeli    = Pembeli::count();
        $transaksi  = Pembayaran::count();
        $pendapatan = Pemesanan::where('status', '!=', 'ditolak')->sum('total_harga');
        
        return view('admin.dashboard', compact('pembeli', 'transaksi', 'pendapatan'));
    }
}
