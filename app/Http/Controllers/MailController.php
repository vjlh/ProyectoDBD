<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Mail\SendEmail;


use Illuminate\Http\Request;




class MailController extends Controller
{
    
    public function home(){
        return view('mail');
    }

    public function sendmail(){
        $id_usuario = auth()->id();
        $usuario = User::find($id_usuario);
        $email = $usuario->email;
        $subject = "blabla";
        $message = "holi";
        
        Mail::to($email)->send(new SendEmail($subject,$message));

    }



}
