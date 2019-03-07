<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\ContactoEmail;
use Illuminate\Support\Facades\Mail;


class MailController extends Controller
{

    public function sendmail(Request $request){

        Mail::to('aerolineag8@gmail.com')->send(new ContactoEmail($request ));
    }
}
