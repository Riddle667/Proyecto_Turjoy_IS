<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class LogoutTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;


    public function testLogout()
    {
        $this->post('login/store', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
        ]);

        $this->get('logout');
        $this->assertTrue(Auth::check());



    }
}
