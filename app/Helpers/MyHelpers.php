<?php

function makeMessages()
{

    $messages = [
        
        'email.required' => 'Debe ingresar su correo electrónico para iniciar sesión',
        'email.email' => 'El formato del correo ingresado es incorrecto',
        'password.required' => 'Debe ingresar su contraseña para iniciar sesión',
        'document.required' => 'Debe seleccionar un archivo para cargar',
        'document.max' => 'El archivo no debe pesar más de 5MB',
        'document.mimes' => 'El archivo debe ser de tipo xlsx',

    ];

    return $messages;
}
