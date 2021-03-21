<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'keranjang_id',
        'tanggal',
        'status',
        'total_harga'
    ];

    public function keranjang(){
        return $this->hasOne('App\Keranjang', 'id');
    }
}
