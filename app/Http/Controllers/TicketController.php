<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Route;

class TicketController extends Controller
{
    public static function getOccupiedSeats($routeId, $date)
    {
        $occupiedSeats = 0;
        Ticket::where('route_id', $routeId)->where('reservation_date', $date)->sum('seats', $occupiedSeats);

        return $occupiedSeats;
    }

    public function store(Request $request)
    {
        // Generar el numero de reserva
        $code = generateReservationNumbers();
        // Modificar request
        $request->request->add(['code' => $code]);

        // Validar
        $makeMessages = makeMessages();
        $this->validate($request, [
            'seat' => ['required'],
            'total' => ['required'],
            'date' => ['date', 'required'],
        ], $makeMessages);

        //  Verificamos si la fecha ingresada es mayor a la fecha actual.
        $invalidDate = validDate($request->date);
        if ($invalidDate) {
            return back()->with('message', 'La fecha debe ser igual o mayor a '.date('d-m-Y'));
        }

        // Crear la reserva
        $ticket = Ticket::create([
        'code' => $request->code,
        'seat' => $request->seat,
        'date' => $request->date,
        'total' => $request->total,
        'travel_id' => $request->routeId,
        ]);

        return redirect()->route('generate.pdf', [
            'id' => $ticket->id,
        ]);
    }
}
