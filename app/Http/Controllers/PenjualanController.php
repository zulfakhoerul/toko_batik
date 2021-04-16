<?php

namespace App\Http\Controllers;

use App\Pembayaran;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        
        return view('admin.penjualan');
    }
}
