<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';

    protected $fillable = [
        'pembeli_id',
        'produk_id',
        'qty',
        'jumlah_harga',
        'status'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class,'produk_id');
    }

    public function pembeli() {
        return $this->belongsTo(Pembeli::class,'pembeli_id');
    }
}
