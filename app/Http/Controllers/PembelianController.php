<?php

namespace App\Http\Controllers;

use App\Keranjang;
use App\Pembeli;
use App\Pemesanan;
use App\Produk;
use Session;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index(){
        $produk = Produk::all();
        return view('/pembeli/DashboardPembeli', compact('produk'));
    }

    public function detail($id){
        $produk = Produk::where('id', $id)->first();
        return view('/pembeli/detail_produk', compact('produk'));
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    		// mengambil data dari table pegawai sesuai pencarian data
        $obat = ModelObat::where('nama_obat','like',"%".$cari."%")->paginate();

    		// mengirim data pegawai ke view index
		return view('/Pasien/DashboardPasien', compact('obat'));
    }

    public function beliProduk(Request $request, $id){
        $this->validate($request, [
            'qty' => 'required|min:1|integer',
            'jumlah_harga' => 'required'
        ],[
            'qty.required' => '*Harus isi jumlah beli terlebih dahulu',
            'qty.min' => 'Tidak boleh kosong atau minus 1'
        ]);
        $produk = Produk::where('id', $id)->first();

        $keranjang = Keranjang::all();


        //validasi apakah MELEBIHI STOK
        if($request->qty > $produk->stok){
            alert()->info('Melebihi Stok Yang Ada !!!!!', 'Peringatan!');
            return redirect('pembeli/detail_produk'.$id);
        }
        $cek_pemesanan = Keranjang::where('pembeli_id', Session::get('id'))->where('produk_id', $produk->id)->where('status', 0)->first();
        if(empty($cek_pemesanan)){
            $pemesanan = new Keranjang();
            $pemesanan->pembeli_id =  Session::get('id');
            $pemesanan->produk_id = $produk->id;
            $pemesanan->qty = $request->qty;
            $pemesanan->jumlah_harga = $produk->harga*$request->qty;
            $pemesanan->status = 0;
            $pemesanan->save();
        }

        $pemesanan_baru = Keranjang::where('pembeli_id', Session::get('id'))->where('status',0)->first();

        $cek_pemesanan_detail = Keranjang::where('produk_id', $produk->id)->first();
        if(empty($cek_pemesanan_detail)){
            $pemesanan_detail = new Keranjang();
            $pemesanan_detail->produk_id = $produk->id;
            $pemesanan_detail->qty = $request->qty;
            $pemesanan_detail->jumlah_harga = $produk->harga*$request->qty;
            $pemesanan_detail->save();
        }else{
            $pemesanan_detail = Keranjang::where('produk_id', $produk->id)->first();
            if($pemesanan_detail->qty + $request->qty > $produk->stok ){
                alert()->error('Barang yang masuk keranjang melebihi stok yang ada','Gagal');
                return redirect('pembeli/detail_produk'.$id);
            }
            $pemesanan_detail->qty = $pemesanan_detail->qty+$request->qty;

            $harga_pemesanan_detail_baru = $produk->harga * $request->qty;
            $pemesanan_detail->jumlah_harga = $pemesanan_detail->jumlah_harga+$harga_pemesanan_detail_baru;
            $pemesanan_detail->update();
        }

            alert()->success('Masuk Ke Dalam Keranjang', 'Berhasil');
            return redirect('pembeli/DashboardPembeli');
        }

        public function index_checkOut()
        {
            $pembeli   = Pembeli::where('id', Session::get('id'))->first();
            $produk   = Produk::all();
            $keranjang = Keranjang::where('pembeli_id', $pembeli->id)->where('status',0)->get();
            if(!empty($keranjang))
            {
                $krnjg = Keranjang::where('pembeli_id', $pembeli->id)->get();
                $total = Keranjang::where('pembeli_id', $pembeli->id)->where('status', 0)->sum('jumlah_harga');
                return view('pembeli/keranjang', compact('keranjang', 'krnjg','total','pembeli'));
            }
            return view('pembeli/keranjang', compact('keranjang','produk','pembeli','total'));
        }

        public function deleteKeranjang($id)
        {
            $keranjang = Keranjang::where('id', $id)->first();

            $keranjang->delete();
            alert()->info('Produk Pada Keranjang Telah Di Hapus', 'Hapus');
            return redirect('pembeli/keranjang');
        }

}
