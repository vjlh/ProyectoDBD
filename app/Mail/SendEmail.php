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
    public $costo;
    public $air;
    public $model;
    public $patent;
    public $puntua;
    public $asien;
    public $puert;

    public function __construct($subject,$fecha_inicio, $fecha_fin, $costoFinal, $aire, $modelo, $patente, $puntuacion, $asientos, $puertas )
    {
        $this->sub = $subject;
        $this->inicio = $fecha_inicio;
        $this->fin = $fecha_fin;
        $this->costo = $costoFinal;
        $this->air = $aire;
        $this->model = $modelo;
        $this->patent = $patente;
        $this->puntua = $puntuacion;
        $this->asien = $asientos;
        $this->puert = $puertas;
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
        $e_costo=$this->costo;
        $e_air=$this->air;
        $e_model=$this->model;
        $e_patent=$this->patent;
        $e_puntua=$this->puntua;
        $e_asien=$this->asien;
        $e_puert=$this->puert;

        return $this->view('mail.sendemail',compact("e_inicio", "e_fin", "e_costo", "e_air","e_model","e_patent","e_puntua","e_asien","e_puert"))->subject($e_subject);
    }
}
