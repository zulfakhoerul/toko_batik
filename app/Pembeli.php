<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey   = 'id';
    protected $fillable     = ['nama_pembeli', 'email', 'password', 'no_hp', 'alamat',];

    public function Pemesanan() {
        return $this->belongsToMany(Pemesanan::class,'pemesanan','id','pembeli_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

    public function Riwayat() {
        return $this->belongsToMany(RiwayatPemesanan::class,'riwayat_pemesanan','id','pembeli_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

}
