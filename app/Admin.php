<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use Notifiable;

    protected $table = 'admin';

    protected $fillable = [
        'email', 
        'nama',
        'no_hp',
        'alamat',
        'password', 
    ];

    protected $hidden = ['password', 'remember_token'];

    /* public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    } */
}
