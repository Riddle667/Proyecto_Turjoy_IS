<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $messages = makeMessages();

        $this->validate($request, [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], $messages);

        if (!auth()->attempt($request->only('email', 'password'), $request->rename)) {
            return back()->with('message', 'Usuario no registrado o contraseña incorrecta');
        }

        return redirect()->route('routes.index');
    }
}
