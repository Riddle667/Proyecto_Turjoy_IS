<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Route;
use App\Models\Voucher;

class TicketController extends Controller
{
    public function search()
    {
        $ticket = null;
        return view('layouts.tickets',[
            'message' => null,
            'ticket' => $ticket,
        ]);
    }
 
    public function show(Request $request)
    {
 
        $code = $request->search;
        $ticket = Ticket::where('code', "=", $code)->first();

        if (!$ticket) {
            return view('layouts.tickets', [
                'message' => ' Debe proporcionar un código de reserva',
                'ticket' => $ticket,
            ]);
        }
        $voucher = Voucher::where('ticket_id', $ticket->id)->first();
        return view('layouts.tickets', [
            'message' => null,
            'ticket' => $ticket,
            'voucher' => $voucher,
        ]);

    }

    public static function getOccupiedSeats($routeId, $date)
    {
        $occupiedSeats = Ticket::where('route_id', $routeId)->where('reservation_date', $date)->sum('seats');

        return $occupiedSeats;
    }

    public function store(Request $request)
    {
        // Generar el numero de reserva
        $code = generateReservationNumber();

        // Validar
        $makeMessages = makeMessages();
        $this->validate($request, [
            'seats' => ['required'],
            'baseValue' => ['required'],
            'date' => ['date', 'required'],
        ], $makeMessages);


        //  Verificamos si la fecha ingresada es mayor a la fecha actual.
        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back()->with('message', 'La fecha debe ser igual o mayor a ' . date('d-m-Y'));
        }

        // Crear la reserva
        $ticket = Ticket::create([
            'route_id' => $request->routeId,
            'code' => $code,
            'reservation_date' => $request->date,
            'seats' => $request->seats,
            'total' => $request->baseValue * $request->seats,
            'user_id' => "NULL",
        ]);
        
        return redirect()->route('generate.pdf', [
            'id' => $ticket->id,
        ]);

    }
}
