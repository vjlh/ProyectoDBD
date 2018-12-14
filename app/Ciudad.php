<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $fillable = [
        'nombre_ciudad', 'idioma_ciudad',
    ];

    public function paises(){
        return $this ->belongsTo('App\Pais');
    }

    public function restricciones(){
        return $this ->hasMany('App\Restriccion');
    }

    public function aeropuertos(){
        return $this ->hasMany('App\Aeropuerto');
    }
}
