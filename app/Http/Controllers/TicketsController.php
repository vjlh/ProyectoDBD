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
        return $ticket;
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
        $ticket->delete();
        return "Se ha eliminado el ticket de la DB";
    }
}
