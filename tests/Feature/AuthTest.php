<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register()
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Carla Duarte', 
            'email' => 'carla.duarte@hotmail.com',
            'password' => 'password123', 
        ]);

        $response->assertStatus(201); // se verifica que el usuario fue creado correctamente
    }

    public function test_user_can_login()
    {
        // registramos el usuario
        $this->postJson('/api/register', [
            'name' => 'Luis Calderón', 
            'email' => 'luis.calderon@hotmail.com', 
            'password' => 'password456',
        ]);

        // hace login
        $response = $this->postJson('/api/login', [
            'email' => 'luis.calderon@hotmail.com', 
            'password' => 'password456',
        ]);

        $response->assertStatus(200); // verifica que se haya autenticado correctamente
    }
}
