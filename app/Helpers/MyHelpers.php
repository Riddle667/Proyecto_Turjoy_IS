<?php

use App\Models\Ticket;
use Illuminate\Support\Str;
use Carbon\Carbon;

function makeMessages()
{

    $messages = [
        'email.email'   => 'El formato del correo ingresado es incorrecto',
        'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión',
        'password.required' => 'Debe ingresar su contraseña para iniciar sesión',
        'document.required' => 'Debe seleccionar un archivo para cargar',
        'document.max' => 'El tamaño máximo del archivo a cargar no puede superar los 5 megabytes',
        'document.mimes' => 'El archivo seleccionado no es Excel con extensión .xlsx',
        'initDate.required' => 'El campo fecha de inicio es requerido',
        'initDate.date' => 'El campo fecha de inicio debe ser una fecha válida',
        'endDate.required' => 'El campo fecha de término es requerido',
        'endDate.date' => 'El campo fecha de término debe ser una fecha válida',
        'endDate.after_or_equal' => 'La fecha de inicio a consultar no puede ser mayor que la fecha de término de la consulta',
    ];

    return $messages;
}

function validDate($date)
{
    $actualDate = date("d-m-Y");
    $verifyDate = Carbon::parse($date);

    if ($verifyDate->lessThan($actualDate)) {
        return true;
    }

    return false;
}

function generateReservationNumber()
{
    do {
        $letters = substr(str_shuffle(str_repeat($x='ABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil(4/strlen($x)) )),1,4);
        $numbers = substr(str_shuffle(str_repeat($x='0123456789', ceil(2/strlen($x)) )),1,2);

        $code = $letters . $numbers;

        $response = Ticket::where('code', $code)->first();
    } while ($response);

    return $code;
}

function validPayMethod($method)
{
    if ($method === "Tarjeta de Débito" || $method === "Tarjeta de Crédito" || $method === "Efectivo" || $method === "Transferencia") {
        return true;
    } else {
        return false;
    }
}
