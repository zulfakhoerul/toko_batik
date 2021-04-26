<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Pembayaran;
use App\Penjualan;
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
            Pemesanan::where('id', $payment->pemesanan_id)->update(['status' => 'sedang dikirim']);
            Penjualan::create([
                'pemesanan_id' => $payment->pemesanan_id,
                'tanggal'      => date('Y-m-d'),
                'pendapatan'   => $payment->pemesanan->total_harga,
            ]);
        }else if($request->has('ditolak')){
            $payment->update(['status' => 'ditolak']);
            Pemesanan::whereId($payment->pemesanan_id)->update(['status' => 'ditolak']);
        }
        return redirect()->back()->with('success', 'Status berhasil diubah');
    }
}
