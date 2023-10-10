<?php

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
