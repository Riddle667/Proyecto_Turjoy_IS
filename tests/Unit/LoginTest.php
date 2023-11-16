<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;


class LoginTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;
    public function testSuccessLogin()
    {
        $response = $this->post('login/store', [
            'email' => 'italo.donoso@ucn.cl',
            'password' => 'Turjoy91',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('add/route');
    }
}
