<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio_Seguro extends Model
{
    public function beneficios()
    {
        return $this->hasMany('App\Beneficio');
    }

    public function seguros()
    {
        return $this->hasMany('App\Seguro');
    }
}
