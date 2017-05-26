<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{
    
    protected $fillable = ["name", "email", "password", "imagen"];

    public function pensiones(){
    	return $this->hasMany('App\Pension');
    }

    public function favoritos(){
    	return $this->belongsToMany('App\Pension', 'favoritos');
    }

}
