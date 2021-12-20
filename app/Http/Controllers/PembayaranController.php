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
        $payments = DB::table('pembayaran')
                        ->join('pemesanan', 'pemesanan.id', '=', 'pembayaran.pemesanan_id')
                        ->join('keranjang', 'keranjang.pemesanan_id', '=', 'pemesanan.id')
                        ->join('produk', 'produk.id', 'keranjang.produk_id')
                        ->join('pembeli', 'pembeli.id', 'pemesanan.pembeli_id')
                        ->select('pembayaran.*', 'pemesanan.metode_pembayaran', 'pemesanan.status', 'keranjang.qty', 
                            'pemesanan.total_harga', 'produk.nama', 'pembeli.nama_pembeli')
                        ->get();
                        //dd($payments);
        return view('admin.pembayaran', compact('payments'))->with('i');
    }

    public function store(Request $request)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $payment = DB::table('pembayaran')->join('pemesanan', 'pemesanan.id', 'pembayaran.pemesanan_id')
                        ->where('pembayaran.id', $id)->first();
        //dd($payment);
        if($request->has('diterima')){
            Pembayaran::where('id',$id)->update([
                'status' => '4'
            ]);
            Pemesanan::where('id', $payment->pemesanan_id)->update(['status' => 4]);
            //dd(Penjualan::where('tanggal', date('Y-m-d'))->exists());
            if(Penjualan::whereYear('tanggal', date('Y'))->whereMonth('tanggal', date('m'))->exists() == TRUE){
                $penjualan = Penjualan::where('tanggal', date('Y-m-d'))->first();
                dd($payment);
                $sum = $penjualan->pendapatan + $payment->pemesanan->total_harga;
                Penjualan::whereId($penjualan->id)->update(['pendapatan' => $sum]);
            }else{
                Penjualan::create([
                    'pemesanan_id' => $payment->pemesanan_id,
                    'tanggal'      => date('Y-m-d'),
                    'pendapatan'   => $payment->total_harga,
                ]);
            }
        }else if($request->has('ditolak')){
            $payment->update(['status' => 'ditolak']);
            Pemesanan::whereId($payment->pemesanan_id)->update(['status' => 'ditolak']);
        }
        return redirect()->back()->with('success', 'Status berhasil diubah');
        
    }
}
