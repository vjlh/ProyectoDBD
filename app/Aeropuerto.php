<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeropuerto extends Model
{
	protected $table = 'aeropuertos';
    protected $fillable = [
        'nombre_aeropuerto', 'direccion_aeropuerto', 'telefono_aeropuerto', 'pagina_web', 'id_ciudad',
    ];

    public function ciudades(){
        return $this ->belongsTo(Ciudad::class, 'id_ciudad');
    }

    public function vuelos(){
        return $this ->hasMany(Vuelo::class);
    }
}
