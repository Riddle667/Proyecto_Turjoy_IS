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
        return view('layouts.tickets', [
            'message' => null,
            'ticket' => $ticket,
        ]);
    }

    public function show(Request $request)
    {

        $code = $request->search;
        if (!$code) {
            return view('layouts.tickets', [
                'message' => ' Debe proporcionar un código de reserva',
                'ticket' => null,
            ]);
        }
        $ticket = Ticket::where('code', "=", $code)->first();

        if (!$ticket) {
            return view('layouts.tickets', [
                'message' => ' La reserva ' . $code . ' no existe en el sistema',
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
            'code' => $ticket->code,
        ]);
    }

    public function showReport(){

        $tickets = Ticket::all();

        return view('report', [
            'tickets' => $tickets,
        ]);
    }

    public function searchByDate(Request $request){

        $messages = makeMessages();
        $this->validate($request, [
            'initDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:initDate'],
        ], $messages);

        $initDate = $request->initDate;
        $endDate = $request->endDate;

        $tickets = Ticket::whereBetween('reservation_date', [$initDate, $endDate])->orderBy('reservation_date', 'asc')->get();

        if ($tickets->count() == 0){
            return back()->with('message', 'no se encontraron reservas dentro del rango seleccionado');
        }

        return view('report', [
            'tickets' => $tickets,
        ]);
    }
}
