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
        Produk::create([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "tipe" => $request->tipe,
            "stok" => $request->stok,
            "harga" => $request->harga
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
        $produk->update([
            "nama" => $request->nama,
            "deskripsi" => $request->deskripsi,
            "tipe" => $request->tipe,
            "stok" => $request->stok,
            "harga" => $request->harga
        ]);

        return redirect()->route('produk.index');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return redirect()->route('produk.index');
    }
}
