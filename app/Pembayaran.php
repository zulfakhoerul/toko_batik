<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';

    protected $fillable = [
        'pemesanan_id',
        'metode',
        'foto',
        'tanggal',
        'status'
    ];

    public function order(){
        return $this->hasOne('App\Pemesanan', 'id');
    }
}
