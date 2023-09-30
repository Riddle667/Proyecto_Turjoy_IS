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

        $this->validate($request , [
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8']
        ],$messages);

        if(!auth()->attempt($request->only('email','password'),$request->rename))
        {
            return back()->with('message','Las credenciales son incorrectas');
        }

        return redirect()->route();
    }
}
