<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Requests\TicketsRequest;

class TicketsController extends Controller
{

    public function index()
    {
        $ticket = Ticket::all();
        return $ticket;
    }

    public function create()
    {
        //
    }

    public function store(TicketsRequest $request)
    {
        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $ticket = Ticket::create($request->all());
            $ticket->save();
            return $ticket;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function show($id)
    {
        $ticket = Ticket::find($id);
        if($ticket != NULL)
            return $ticket;
        else
            return "El ticket con el id ingresado no existe o fue eliminado"; 
    
    }

    public function edit(Ticket $ticket)
    {
        //
    }

    public function update(TicketsRequest $request, $id)
    {
        $ticket = Ticket::find($id);
        try{
            $id_reserva = $request->get('id_reserva');
            \App\Reserva::find($id_reserva)->id;

            $ticket->fill($request->all());
            $ticket->save();
            return $ticket;
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if($ticket!=NULL)
        {
            $ticket->delete();
            Ticket::destroy($id);
            return "Se ha eliminado el ticket de la DB";
        }
        
        else
            return "El ticket con el id ingresado no existe o fue eliminado"; 

    }
}
