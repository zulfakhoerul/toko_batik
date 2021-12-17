<?php

namespace App\Http\Controllers;

use App\Kota;
use App\Keranjang;
use App\Pembayaran;
use App\Pembeli;
use App\Pemesanan;
use App\Produk;
use App\RiwayatPemesanan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Session;
use PDF;

class PembelianController extends Controller
{
    public function index()
    {
        $produk = Produk::all();
        return view('/pembeli/DashboardPembeli', compact('produk'));
    }

    public function detail($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('/pembeli/detail_produk', compact('produk'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $produk = Produk::where('nama', 'like', "%" . $cari . "%")->paginate();

        // mengirim data pegawai ke view index
        return view('/pembeli/DashboardPembeli', compact('produk'));
    }

    public function beliProduk(Request $request, $id)
    {
        $this->validate($request, [
            'qty' => 'required|min:1|integer',
            'jumlah_harga' => 'required'
        ], [
            'qty.required' => '*Harus isi jumlah beli terlebih dahulu',
            'qty.min' => 'Tidak boleh kosong atau minus 1'
        ]);
        $produk = Produk::where('id', $id)->first();

        $keranjang = Keranjang::all();


        //validasi apakah MELEBIHI STOK
        if ($request->qty > $produk->stok) {
            alert()->info('Melebihi Stok Yang Ada !!!!!', 'Peringatan!');
            return redirect('pembeli/detail_produk' . $id);
        }
        $cek_keranjang = Pemesanan::where('pembeli_id', Session::get('id'))->where('status', 0)->first();
        if (empty($cek_keranjang)) {
            $keranjang = new Pemesanan();
            $keranjang->pembeli_id =  Session::get('id');
            // $keranjang->produk_id = $produk->id;
            // $keranjang->qty = $request->qty;
            // $keranjang->jumlah_harga = $produk->harga*$request->qty;
            $keranjang->status = 0;
            $keranjang->save();
        }

        $pemesanan_baru = Pemesanan::where('pembeli_id', Session::get('id'))->where('status', 0)->first();

        $cek_pemesanan = Keranjang::where('produk_id', $produk->id)->where('pemesanan_id', $pemesanan_baru->id)->first();
        if (empty($cek_pemesanan)) {
            $pemesanan = new Keranjang();
            $pemesanan->pemesanan_id = $pemesanan_baru->id;
            $pemesanan->produk_id = $produk->id;
            $pemesanan->status = 0;
            $pemesanan->qty = $request->qty;
            $pemesanan->jumlah_harga = $produk->harga * $request->qty;
            // $pemesanan->jumlah_harga = $produk->harga*$request->qty;
            $pemesanan->save();
        } else {
            $pemesanan = Keranjang::where('produk_id', $produk->id)->where('pemesanan_id', $pemesanan_baru->id)->first();
            if ($pemesanan->qty + $request->qty > $produk->stok) {
                alert()->error('Barang yang masuk keranjang melebihi stok yang ada', 'Gagal');
                return redirect('pembeli/detail_produk' . $id);
            }
            $pemesanan->qty = $pemesanan->qty + $request->qty;

            $harga_pemesanan_baru = $produk->harga * $request->qty;
            $pemesanan->jumlah_harga = $pemesanan->jumlah_harga + $harga_pemesanan_baru;
            $pemesanan->update();
        }

        alert()->success('Masuk Ke Dalam Keranjang', 'Berhasil');
        return redirect('pembeli/DashboardPembeli');
    }

    public function index_checkOut()
    {
        $pembeli   = Pembeli::where('id', Session::get('id'))->first();
        $produk   = Produk::all();
        $pemesanan = Pemesanan::where('pembeli_id', Session::get('id'))->where('status', 0)->first();
        if (!empty($pemesanan)) {
            $pemesanan = Pemesanan::where('pembeli_id', Session::get('id'))->where('status', 0)->first();
            $keranjang = Keranjang::where('pemesanan_id', $pemesanan->id)->get();
            $total = Keranjang::where('pemesanan_id', $pemesanan->id)->sum('jumlah_harga');
            $cities = Kota::all();
            return view('pembeli/keranjang', compact('pemesanan', 'keranjang', 'total', 'cities'));
        }
        return view('pembeli/keranjang', compact('pemesanan', 'produk', 'pembeli'));
    }

    public function deleteKeranjang($id)
    {
        $keranjang = Keranjang::where('id', $id)->first();

        $keranjang->delete();
        alert()->info('Produk Pada Keranjang Telah Di Hapus', 'Hapus');
        return redirect('pembeli/keranjang');
    }

    public function konfirmasi(Request $request, $id)
    {
        $pemesanan = Pemesanan::where('pembeli_id', Session::get('id'))->where('status', 0)->first();
        $keranjang = Keranjang::where('pemesanan_id', $id)->get();
        //$total = Keranjang::where('pemesanan_id', $id)->sum('jumlah_harga');

        $pemesanan_id = $id;

        if ($request->metode_pembayaran == "1") {
            $pemesanan->metode_pembayaran = "1";
            $pemesanan->status = 1;
        } else if ($request->metode_pembayaran == "2") {
            $pemesanan->metode_pembayaran = "2";
            $pemesanan->status = 2;
        }
        $pemesanan->tanggal = Carbon::now();
        $pemesanan->no_hp = $request->no_hp;
        $pemesanan->total_harga = $request->total;
        $pemesanan->update();

        $keranjang = Keranjang::where('pemesanan_id', $pemesanan_id)->get();
        foreach ($keranjang as $keranjang) {
            $produk = Produk::where('id', $keranjang->produk_id)->first();
            $produk->stok = $produk->stok - $keranjang->qty;
            $produk->update();
        }

        $riwayat = new RiwayatPemesanan();
        $riwayat->pembeli_id = Session::get('id');
        $riwayat->pemesanan_id = $pemesanan->id;
        $riwayat->save();

        alert()->success('Sukses Check Out', 'Success');
        return redirect('pembeli/riwayat_beli');
    }

    public function tampilRiwayat()
    {
        $pemesanan = Pemesanan::where('pembeli_id', Session::get('id'))->where('status','!=',0)->get()->sortBy('status');

        //Proses pembatalan dalam 1 hari
        $now = Carbon::now()->format('y-m-d');
        $selesai = Pemesanan::all();

        foreach ($selesai as $batal) {
            $selisih_hari = $batal->created_at->diffInDays($now);

            if ($selisih_hari >= 1 && $batal->status == 1) {
                $update_batal = Pemesanan::find($batal->id);
                $update_batal->status = 5;
                $update_batal->save();
            }
        }

        return view('pembeli/riwayat_beli', compact('pemesanan', 'now', 'selesai'));
    }

    public function riwayatDetail($id)
    {
        $pemesanan = Pemesanan::where('id', $id)->first();
        //$pembayaran = ModelPembayaran::where('id_pembayaran', $pemesanan->id_pembayaran)->get();
        $keranjang  = Keranjang::where('pemesanan_id', $pemesanan->id)->get();
        $total = Keranjang::where('pemesanan_id', $id)->sum('jumlah_harga');
        $pembayaran = Pembayaran::get();
        Artisan::call('view:clear');


        return view('pembeli/riwayat_detail', compact('pembayaran', 'pemesanan', 'total', 'keranjang'));
    }

    public function buktiTf(Request $request, $id)
    {

        $pemesanan = Pemesanan::where('id', $id)->where('pembeli_id', Session::get('id'))->where('status',1)->first();
        $pembayaran = Pembayaran::where('pemesanan_id', $pemesanan->id)->get();
        $total = Keranjang::where('pemesanan_id', $id)->sum('jumlah_harga');


        $file = $request->file('foto');
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'bukti_tf';
        $file -> move($tujuan_upload,$nama_file);

        $tanggal = Carbon::now();

        $pembayaran = new Pembayaran();
        $pembayaran->pemesanan_id = $pemesanan->id;
        $pembayaran->metode = $pemesanan->metode_pembayaran;
        $pembayaran->foto = $nama_file;
        $pembayaran->tanggal = $tanggal;
        $pembayaran->status = 1;
        $pembayaran->save();


        $pemesanan->status=2;
        $pemesanan->update();

        alert()->success('Sukses Upload Bukti Transfer', 'Success');
        return redirect('/pembeli/riwayat_beli');
    }

    public function cetak_pdf($id)
    {
        $produk             = Produk::all();
        $pemesanan        = Pemesanan::where('id', $id)->first();
        $keranjang = Keranjang::where('pemesanan_id', $id)->get();
        $total = Keranjang::where('pemesanan_id', $id)->sum('jumlah_harga');

        $size = array(0,0,450,500);
        $pdf = PDF::loadview('/pembeli/PemesananPDF',compact('produk', 'pemesanan', 'keranjang', 'total'))->setPaper($size);
        return $pdf->stream('cetak-pemesanan-pdf.pdf');
    }
}
