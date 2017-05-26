<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $table = "pensiones";
    protected $fillable = ["title", "description", "price", "direction", "rules", "city", "alone", "near", "longitude", "latitude", "telefone", "visits"];

    public function imagenes(){
    	return $this->hasMany('App\Imagen');
    }

    public function favoritos(){
    	return $this->belongsToMany('App\Pension', 'favoritos');
    }
}
