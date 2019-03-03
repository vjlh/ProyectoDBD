<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $sub;
    public $inicio;
    public $fin;

    public function __construct($subject,$fecha_inicio,$fecha_fin)
    {
        $this->sub = $subject;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject=$this->sub;
        $e_inicio=$this->inicio;
        $e_fin=$this->fin;
        return $this->view('mail.sendemail',compact("e_inicio", "e_fin"))->subject($e_subject);
    }
}
