<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produk;

class AdminProdukController extends Controller
{
    public function index()
    {
        $datas = Produk::all();
        return view('admin.produk.index', [
            "datas" => $datas
        ]);
    }

    public function create()
    {
        return view('admin.produk.tambah');
    }

    public function store(Request $request)
    {
        $file           = $request->file('foto');
        $nama_file      = $file->getClientOriginalName();
        $tujuan_upload  = public_path('/assets/img/produk');
        $file->move($tujuan_upload,$nama_file);

        Produk::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "tipe" => $request->tipe,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "foto" => $nama_file
        ]);

        return redirect()->route('produk.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin.produk.ubah', [
            "produk" => $produk
        ]);
    }

    public function update(Request $request, Produk $produk)
    {
        if(empty($request->foto)){
            $produk->foto = $produk->foto;
        }
        else{
            $path = '/assets/img/produk';
            unlink($path. $produk->foto); //menghapus file lama
            $file         = $request->file('foto'); // menyimpan data gambar yang diupload ke variabel $file
            $produk->foto = $file->getClientOriginalName();
            $file->move($path, $produk->foto); // isi dengan nama folder tempat kemana file diupload
        }

        $produk->update([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "tipe" => $request->tipe,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "foto" => $produk->foto
        ]);

        return redirect()->route('produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
