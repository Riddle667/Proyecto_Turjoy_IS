<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class FailedPassLoginTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function testFailedLogin()
    {
        $response = $this->post('login/store', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy911231',
        ]);

        $response->assertStatus(401);
        $this->assertFalse(Auth::check());
    }
}
