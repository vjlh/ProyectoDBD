<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio_Seguro extends Model
{
    protected $table = 'beneficios_seguros';
    protected $fillable = [
    	'id_beneficio', 'id_seguro',
    ];

    public function beneficio(){
        return $this ->belongsTo(Beneficio::class, 'id_beneficio');
    }

    public function seguro(){
        return $this ->belongsTo(Seguro::class, 'id_seguro');
    }
}
