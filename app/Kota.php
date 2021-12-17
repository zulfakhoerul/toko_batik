<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';

    protected $primaryKey = 'id_kota';

    protected $fillable = [
        'nama_kota',
        'tipe',
        'kodepos', 
        'id_provinsi',
        'id_kota'
    ];

    public $timestamps = false;

    public function provinsi(){
        return $this->belongsTo('App\Provinsi', 'id_provinsi');
    }
}