<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $fillable = [
        'fecha_cambio',
    ];

    public function users(){
        return $this ->belongsTo('App\User');
    }
}
