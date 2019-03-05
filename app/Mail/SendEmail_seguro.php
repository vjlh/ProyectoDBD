<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_seguro extends Mailable
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
    public $tipo;
    public $personas;
    public $destino;
    public $dias;
    public $beneficios;

    public function __construct($subject,$encabezado,$fecha_inicio, $fecha_fin, $costo, $tipo, $personas, $destino, $dias, $beneficios)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
        $this->costo = $costo;
        $this->tipo = $tipo;
        $this->personas = $personas;
        $this->destino = $destino;
        $this->dias = $dias;
        $this->beneficios = $beneficios;
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
        $e_tipo=$this->tipo;
        $e_personas=$this->personas;
        $e_dias=$this->dias;
        $e_destino=$this->destino;
        $e_beneficios=$this->beneficios;

        return $this->view('mail.sendemail_seguro',compact("e_encab","e_inicio", "e_fin", "e_costo", "e_tipo","e_personas","e_destino","e_dias","e_beneficios"))->subject($e_subject);
    }
}