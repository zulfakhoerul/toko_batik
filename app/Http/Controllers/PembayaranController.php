<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $payments = Pembayaran::orderBy('id', 'desc')->get();
        return view('admin.pembayaran', compact('payments'))->with('i');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $payment = Pembayaran::find($id);
        if($request->has('diterima')){
            $payment->update(['status' => 'diterima']);
            Pemesanan::whereId($payment->pemesanan_id)->update(['sedang dikirim']);
        }elseif($request->has('ditolak')){
            $payment->update(['status' => 'ditolak']);
            Pemesanan::whereId($payment->pemesanan_id)->update(['ditolak']);
        }
        return redirect()->back()->with('success', 'Data berhasil ditambah');
    }
}
