<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_paquete extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $encabezado;

    public $personas;
    public $costo;
    public $paquete;
    public $asientos_ida;
    public $asientos_vuelta;
    public $check_ida;
    public $check_vuelta;

    public function __construct($subject,$encabezado,$personas,$costo, $paquete, $asientos_ida, $asientos_vuelta,$check_ida,$check_vuelta)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->personas = $personas;
        $this->costo = $costo;
        $this->paquete = $paquete;
        $this->asientos_ida = $asientos_ida;
        $this->asientos_vuelta = $asientos_vuelta;
        $this->check_ida = $check_ida;
        $this->check_vuelta = $check_vuelta;
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
        $e_pers=$this->personas;
        $e_costo=$this->costo;
        $e_paquete=$this->paquete;
        $e_asientos_ida=$this->asientos_ida;
        $e_asientos_vuelta=$this->asientos_vuelta;
        $e_check_ida=$this->check_ida;
        $e_check_vuelta=$this->check_vuelta;

        return $this->view('mail.sendemail_paquete',compact("e_encab","e_pers","e_costo", "e_paquete", "e_asientos_ida","e_asientos_vuelta","e_check_ida","e_check_vuelta"))->subject($e_subject);
    }
}