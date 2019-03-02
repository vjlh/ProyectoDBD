<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
	protected $table = 'seguros';
    protected $fillable = [
        'precio_seguro', 'tipo_seguro', 'destino_seguro', 'numero_pasajeros_seguros','fecha_inicio_seguro','fecha_fin_seguro'
    ];

    public function beneficios(){
        return $this ->belongsToMany(Beneficio::class, 'beneficios_seguros', 'id_beneficio', 'id_seguro');
    }
}
