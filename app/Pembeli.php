<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey   = 'id';
    protected $fillable     = ['nama', 'email', 'password', 'no_hp', 'alamat',];

    public function Keranjang() {
        return $this->belongsToMany(Keranjang::class,'keranjang','id','pembeli_id');//model_tabel_yang_mau_disambungin, nama_tabel_perantara, foreignkey1_pada_tabel_penghubung, foreignkey2_pada_tabel_penghubung)
    }

}
