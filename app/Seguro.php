<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguro extends Model
{
	protected $table = 'seguros';
    protected $fillable = [
        'precio_seguro', 'tipo_seguro', 'precio_ticket', 'numero_pasajeros_seguros',
    ];

    public function beneficios(){
        return $this ->belongsToMany(Beneficio::class, 'beneficios_seguros', 'id_beneficio', 'id_seguro');
    }
}
