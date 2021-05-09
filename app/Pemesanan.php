<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'keranjang_id',
        'tanggal',
        'no_hp',
        'status',
        'total_harga'
    ];

    public function keranjang() {
        return $this->belongsTo(Keranjang::class,'keranjang_id');
    }

}
