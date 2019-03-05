<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_vuelo extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $encabezado;

    public $cod;
    public $fecha;
    public $hora;
    public $origen;
    public $destino;
    public $costo;
    public $asientos;

    public function __construct($subject,$encabezado,$cod,$fecha, $hora, $origen, $destino, $costo, $asientos)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->cod = $cod;
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->origen = $origen;
        $this->destino = $destino;
        $this->costo = $costo;
        $this->asientos = $asientos;
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
        $e_cod = $this->cod;
        $e_fecha=$this->fecha;
        $e_hora=$this->hora;
        $e_origen=$this->origen;
        $e_destino=$this->destino;
        $e_costo=$this->costo;
        $e_asientos=$this->asientos;

        return $this->view('mail.sendemail_vuelo',compact("e_encab","e_cod","e_fecha", "e_hora", "e_origen", "e_destino","e_costo","e_asientos"))->subject($e_subject);
    }
}