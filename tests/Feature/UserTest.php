<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tymon\JWTAuth\Facades\JWTAuth;  

class UserTest extends TestCase
{
    use RefreshDatabase;

    // funcion para generar un token de usuario
    protected function authenticate(User $user)
    {
        // se genera el token JWT para el usuario
        $token = JWTAuth::fromUser($user);

        // se establece la cabecera Authorization con el token JWT
        return $this->withHeaders([
            'Authorization' => 'Bearer ' . $token
        ]);
    }

    public function test_user_can_be_listed()
    {
        // se crea un usuario
        $user = User::factory()->create();
        
        // se autentica al usuario con JWT
        $response = $this->authenticate($user)->getJson('/api/users');

        // se verifica que la respusta tenga status 200
        $response->assertStatus(200);
    }

    public function test_user_can_be_shown()
    {
        // se crea un usuario
        $user = User::factory()->create();
        
        // se autentica al usuario con JWT
        $response = $this->authenticate($user)->getJson('/api/users/' . $user->id);

        // se verifica que la respusta tenga status 200
        $response->assertStatus(200);
    }

    public function test_user_can_be_updated()
    {
        // se crea un usuario
        $user = User::factory()->create();

        // se autentica al usuario con JWT
        $response = $this->authenticate($user)->putJson('/api/users/' . $user->id, [
            'name' => 'Nombre actualizado',
        ]);

        // se verifica que la respusta tenga status 200
        $response->assertStatus(200);
    }

    public function test_user_can_be_deleted()
    {
        // se crea un usuario
        $user = User::factory()->create();

        // se autentica al usuario con JWT
        $response = $this->authenticate($user)->deleteJson('/api/users/' . $user->id);

        // se verifica que la respusta tenga status 200
        $response->assertStatus(200);
    }
}
