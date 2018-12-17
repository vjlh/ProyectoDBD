<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restriccion extends Model
{
	protected $table = 'restricciones';
    protected $fillable = [
        'nombre_restriccion', 'descripcion_restriccion', 'sancion_restriccion', 'id_restriccion',
    ];

    public function ciudades(){
        return $this ->belongsTo(Ciudad::class, 'id_restriccion');
    }
}
