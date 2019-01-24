<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hospedaje extends Model
{
	protected $table = 'hospedajes';
    protected $fillable = [
        'nombre_hospedaje', 'cadena_hospedaje', 'estrellas_hospedaje', 'estacionamiento_hospedaje', 'ubicacion',
        'piscina_hospedaje', 'sauna_hospedaje', 'zona_infantil_hospedaje', 'gimnasio_hospedaje', 'cantidad_disponible'
    ];

    public function habitaciones(){
        return $this ->hasMany(Habitacion::class);
    }
}
