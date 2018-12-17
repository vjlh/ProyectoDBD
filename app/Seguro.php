<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
    protected $fillable = [
        'precio_seguro', 'tipo_seguro', 'precio_ticket', 'num_pasajeros_seguro',
    ];

    public function beneficios(){
        return $this ->belongsToMany(Beneficio::class, 'beneficios_seguros', 'id_beneficio', 'id_seguro');
    }
}
