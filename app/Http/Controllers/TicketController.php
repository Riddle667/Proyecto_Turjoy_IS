<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function search()
    {
        return view('layouts.tickets');
    }

    public function show($code)
    {
        $ticket = Ticket::find($code);

        if(!$ticket){
            return redirect()->route('search.ticket')->with('error','La ruta ingresada no existe');
        }

        return redirect()->route('search.ticket',[
            'ticket' => $ticket
        ]);
    }

}
