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
    public $seguro;
    public $dias;
    public $beneficios;

    public function __construct($subject,$encabezado,$fecha_inicio, $fecha_fin, $seguro, $dias, $beneficios)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
        $this->seguro = $seguro;
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
        $e_seguro=$this->seguro;
        $e_dias=$this->dias;
        $e_beneficios=$this->beneficios;

        return $this->view('mail.sendemail_seguro',compact("e_encab","e_inicio", "e_fin", "e_seguro","e_dias","e_beneficios"))->subject($e_subject);
    }
}