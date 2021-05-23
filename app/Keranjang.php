<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = [
        'pemesanan_id',
        'produk_id',
        'qty',
        'jumlah_harga',
        'status'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class,'produk_id');
    }

    public function Pemesanan() {
        return $this->belongsTo(Pemesanan::class,'pemesanan_id');
    }

}
