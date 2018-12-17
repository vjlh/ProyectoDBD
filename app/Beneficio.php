<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
	protected $table = 'beneficios';
    protected $fillable = [
        'nombre_beneficio', 'descripcion_beneficio', 'precio_beneficio',
    ];

    public function seguros(){
        return $this ->belongsToMany(Seguro::class, 'beneficios_seguros', 'id_beneficio', 'id_seguro');
    }

}
