<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipaje extends Model
{
    protected $fillable = [
        'ancho', 'alto', 'largo', 'tipo_equipaje', 'restricciones_equipaje',
    ];

    public function pasajeros(){
        return $this ->belongsTo('App\Pasajero');
    }
}
