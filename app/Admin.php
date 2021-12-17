<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
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
