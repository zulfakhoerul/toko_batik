<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    protected $table = 'penjualan';

    protected $fillable = [
        'pemesanan_id',
        'tanggal',
        'pendapatan',
    ];

    public function pemesanan(){
        return $this->hasOne('App\Pemesanan', 'id');
    }
}
