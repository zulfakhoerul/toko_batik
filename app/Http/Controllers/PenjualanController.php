<?php

namespace App\Http\Controllers;

use App\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $datas = Penjualan::with('pemesanan')->get();
        return view('admin.penjualan', compact('datas'))->with('i');
    }
}
