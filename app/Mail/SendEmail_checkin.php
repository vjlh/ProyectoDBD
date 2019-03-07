<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail_checkin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $encabezado;

    public $vuelo;
    public $asientos;
    public $pasajeros;
    

    public function __construct($subject,$encabezado,$vuelo,$asientos, $pasajeros)
    {
        $this->sub = $subject;
        $this->encabezado = $encabezado;
        $this->vuelo = $vuelo;
        $this->asientos = $asientos;
        $this->pasajeros = $pasajeros;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sub = $this->sub;
        $encabezado = $this->encabezado;
        $vuelo = $this->vuelo;
        $asientos = $this->asientos;
        $pasajeros = $this->pasajeros;

        return $this->view('mail.sendemail_checkin',compact("encabezado","vuelo","asientos", "pasajeros"))->subject($sub);

    }
}