<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        $orders = Pemesanan::orderBy('id', 'desc')->get();
        return view('admin.pemesanan',compact('orders'))->with('i');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Pemesanan $pemesanan)
    {
        //
    }

    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }
    
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}