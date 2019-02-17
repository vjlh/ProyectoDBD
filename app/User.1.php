<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'apellido_usuario', 
        'fecha_nacimiento', 
        'num_documento_usuario', 
        'pais_usuario',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function administradores(){
        return $this ->hasOne(Administrador::class);
    }

    public function historiales(){
        return $this ->hasMany(Historial::class);
    }

    public function reservas(){
        return $this ->hasMany(Reserva::class);
    }

}
