<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
    protected $fillable = [
        'nombre_restriccion', 'descripcion_restriccion', 'sancion_restriccion',
    ];

    public function ciudades(){
        return $this ->belongsTo('App\Ciudad');
    }
}
