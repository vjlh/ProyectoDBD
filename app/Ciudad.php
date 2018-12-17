<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{

    protected $table = 'ciudades';

    protected $fillable = [
        'nombre_ciudad', 'idioma_ciudad', 'id_pais', 
    ];

    public function paises(){
        return $this ->belongsTo(Pais::class, 'id_pais');
    }

    public function restricciones(){
        return $this ->hasMany(Restriccion::class);
    }

    public function aeropuertos(){
        return $this ->hasMany(Aeropuerto::class);
    }
}
