<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipaje extends Model
{
	protected $table = 'equipajes';
    protected $fillable = [
        'ancho', 'alto', 'largo', 'tipo_equipaje', 'restricciones_equipaje','id_pasajero',
    ];

    public function pasajeros(){
        return $this ->belongsTo(Pasajero::class, 'id_pasajero');
    }
}
