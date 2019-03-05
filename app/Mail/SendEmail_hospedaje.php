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
    public $hotel;
    public $habitacion;
    public $dias;

    public function __construct($subject,$encabezado,$fecha_inicio, $fecha_fin, $costo, $hotel, $habitacion, $dias)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
        $this->costo = $costo;
        $this->hotel = $hotel;
        $this->habitacion = $habitacion;
        $this->dias = $dias;
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
        $e_hotel=$this->hotel;
        $e_habi=$this->habitacion;
        $e_dias=$this->dias;

        return $this->view('mail.sendemail_hospedaje',compact("e_encab","e_inicio", "e_fin", "e_costo", "e_hotel","e_habi","e_dias"))->subject($e_subject);
    }
}