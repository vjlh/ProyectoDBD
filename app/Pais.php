<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{

    protected $table = 'paises';

    protected $fillable = [
        'nombre_pais', 'moneda_pais', 
    ];

    public function ciudades(){
        return $this ->hasMany(Ciudad::class);
    }
}
