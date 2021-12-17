<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';

    protected $primaryKey = 'id_provinsi';

    protected $fillable = ['id_provinsi', 'nama_provinsi'];

    public $timestamps = false;
}