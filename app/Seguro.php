<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $fillable = [
        'precio_seguro', 'tipo_seguro', 'precio_ticket', 'num_pasajeros_seguro',
    ];

    public function beneficios_seguros(){
        return $this ->belongsTo('App\Beneficio_Seguro');
    }
}
