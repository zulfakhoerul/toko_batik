<?php

namespace App\Http\Controllers;

use App\Pembeli;
use App\Pembayaran;
use App\Penjualan;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $pembeli    = Pembeli::count();
        $transaksi  = Pembayaran::where('status', '=', 4)->count();
        $pendapatan = Penjualan::value('pendapatan');
    
        return view('admin.dashboard', compact('pembeli', 'transaksi', 'pendapatan'));
    }
}
