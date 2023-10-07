<?php

function makeMessages()
{

    $messages = [
        'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión',
        'password.required' => 'Debe ingresar su contraseña para iniciar sesión',
        'document.required' => 'Debe seleccionar un archivo para cargar',
        'document.max' => 'el tamaño máximo del archivo a cargar no puede superar los 5 megabytes',
        'document.mimes' => 'el archivo seleccionado no es Excel con extensión .xlsx',

    ];

    return $messages;
}
