<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $table = 'produk';
    protected $primaryKey   = 'id'; // primary key tabel
    protected $fillable     = ['nama',
                                'deskripsi',
                                'stok',
                                'harga',
                                'tipe',
                                'foto']; //field tabel

    public function Keranjang() {
        return $this->belongsToMany(Keranjang::class,'keranjang','produk_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function Pemesanan() {
        return $this->belongsToMany(Pemesanan::class,'pemesanan','keranjang_id','produk_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }
}
