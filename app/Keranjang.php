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
        'status'
    ];

    public function produk(){
        return $this->hasOne('App\Produk', 'id');
    }

    public function pembeli(){
        return $this->hasOne('App\Pembeli', 'id');
    }
}
