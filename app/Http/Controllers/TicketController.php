<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;

class TicketController extends Controller
{
    public static function getOccupiedSeats($routeId, $date)
    {
        $occupiedSeats = 0;
        Ticket::where('route_id', $routeId)->where('reservation_date', $date)->sum('seats', $occupiedSeats);

        return $occupiedSeats;
    }
}
