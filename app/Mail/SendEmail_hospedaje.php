<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_hospedaje extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $encabezado;

    public $inicio;
    public $fin;
    public $costo;
    public $nombre_hotel;
    public $tipo_habitacion;
    public $dias;
    public $capacidad_hab;
    public $banio_privado;
    public $aire_acondicionado_habitacion;

    public function __construct($subject,$encabezado,$fecha_inicio, $fecha_fin, $costo, $nombre_hotel, $tipo_habitacion, $dias, $capacidad_hab, $banio_privado, $aire_acondicionado_habitacion )
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
        $this->costo = $costo;
        $this->nombre_hotel = $nombre_hotel;
        $this->tipo_habitacion = $tipo_habitacion;
        $this->dias = $dias;
        $this->capacidad_hab = $capacidad_hab;
        $this->banio_privado = $banio_privado;
        $this->aire_acondicionado_habitacion = $aire_acondicionado_habitacion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject=$this->sub;
        $e_encab = $this->encabezado;
        $e_inicio=$this->inicio;
        $e_fin=$this->fin;
        $e_costo=$this->costo;
        $e_nom_hot=$this->nombre_hotel;
        $e_tip_hab=$this->tipo_habitacion;
        $e_dias=$this->dias;
        $e_capa_hab=$this->capacidad_hab;
        $e_ban_pr=$this->banio_privado;
        $e_air=$this->aire_acondicionado_habitacion;

        return $this->view('mail.sendemail_hospedaje',compact("e_encab","e_inicio", "e_fin", "e_costo", "e_nom_hot","e_tip_hab","e_dias","e_capa_hab","e_ban_pr","e_air"))->subject($e_subject);
    }
}