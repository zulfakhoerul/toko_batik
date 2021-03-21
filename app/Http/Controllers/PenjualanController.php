<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $date = Pembayaran::first()->value('tanggal');
        
        $data = [
            'i'   => 0,
            'qty' => '',
            'pendapatan' => Pemesanan::sum('total_harga'),
            'bulan' => date('F', strtotime($date))
        ];

        return view('admin.penjualan', compact('data'));
    }
}
