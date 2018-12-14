<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
    protected $fillable = [
        'nombre_hospedaje', 'cadena_hospedaje', 'estrellas_hospedaje', 'estacionamiento_hospedaje',
        'piscina_hospedaje', 'sauna_hospedaje', 'zona_infantil_hospedaje', 'gimnasio_hospedaje',
    ];

    public function habitaciones(){
        return $this ->hasMany('App\Habitacion');
    }
}
