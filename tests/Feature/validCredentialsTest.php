<?php
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class validCredentialsTest extends TestCase
{
    use RefreshDatabase;
    public function test_user_can_login_with_correct_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('Turjoy91'),
            'email' => 'italo.donoso@ucn.cl',
        ]);
        $response = $this->post(route('login.store'), [
            'password' => $user->password,
            'email' => $user->email,
        ]);
        $response->assertRedirect(route('routes.index'));
        $this->assertAuthenticatedAs($user);

    }
}
