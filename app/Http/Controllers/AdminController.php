<?php

namespace App\Http\Controllers;

use App\Pembeli;
use App\Pemesanan;
use App\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pembeli    = Pembeli::count();
        $transaksi  = Pembayaran::where('status', '=', 4)->count();
        $pendapatan = Pemesanan::where('status', '!=', 5)->sum('total_harga');
    
        return view('admin.dashboard', compact('pembeli', 'transaksi', 'pendapatan'));
    }
}
