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

    ];

    return $messages;
}

function validDate($date)
{
    $fechaActual = date("d-m-Y");
    $fechaVerificar = Carbon::parse($date);

    if ($fechaVerificar->lessThan($fechaActual)) {
        return true;
    }

    return false;
}

function generateReservationNumber()
{
    do {
        $letters = Str::random(4); // Genera 2 letras aleatorias
        $letters = strtoupper($letters); // Convierte las letras a mayúsculas
        $numbers = mt_rand(10, 99); // Genera 2 números aleatorios

        $code = $letters . $numbers;

        $response = Ticket::where('code', $code)->first();
    } while ($response);

    return $code;
}
