<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $ticket = Ticket::create($request->all());
        $ticket->save();
        return $ticket;
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

    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return "";
    }
}
