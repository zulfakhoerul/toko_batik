<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';

    protected $fillable = [
        'pembeli_id',
        'tanggal',
        'metode_pembayaran',
        'no_hp',
        'status',
        'total_harga'
    ];


    public function pembeli() {
        return $this->belongsTo(Pembeli::class,'pembeli_id');
    }

}
