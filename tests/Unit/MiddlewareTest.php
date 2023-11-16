<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MiddlewareTest extends TestCase
{

    public function testMiddlewareRedirectsToLogin()
    {
        $response = $this->get('/add/route');
        $response->assertRedirect('/login');
    }
}
