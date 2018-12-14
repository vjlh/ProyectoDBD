<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $fillable = [
        'nombre_beneficio', 'descripcion_beneficio', 'precio_beneficio',
    ];

    public function beneficios_seguros(){
        return $this ->belongsTo('App\Beneficio_Seguro');
    }

}
