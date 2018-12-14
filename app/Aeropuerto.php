<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
    protected $fillable = [
        'nombre_aeropuerto', 'direccion_aeropuerto', 'telefono_aeropuerto', 'pagina_web',
    ];

    public function ciudades(){
        return $this ->belongsTo('App\Ciudad');
    }

    public function vuelos(){
        return $this ->hasMany('App\Vuelo');
    }
}
