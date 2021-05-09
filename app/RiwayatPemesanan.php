<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatPemesanan extends Model
{
    protected $table = 'riwayat_pemesanan';
    protected $primaryKey   = 'id';
    protected $fillable     = ['pembeli_id', 'pemesanan_id'];

    public function pembeli() {
        return $this->belongsTo(Pembeli::class,'pembeli_id');
    }

    public function pemesanan() {
        return $this->belongsTo(Pemesanan::class,'pemesanan_id');
    }

    public function Produk() {
        return $this->belongsToMany(Produk::class,'pemesanan','keranjang_id','produk_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
