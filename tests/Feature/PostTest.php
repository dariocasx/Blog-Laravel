<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Post;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_post_can_be_listed()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user, 'api')->getJson('/api/posts');
        $response->assertStatus(200);
    }

    public function test_post_can_be_shown()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user, 'api')->getJson('/api/posts/' . $post->id);
        $response->assertStatus(200);
    }

    public function test_post_can_be_created()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->postJson('/api/posts', [
            'user_id' => $user->id,
            'title' => 'Test Post',
            'content' => 'Teste de post',
        ]);
        $response->assertStatus(201);
    }

    public function test_post_can_be_updated()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user, 'api')->putJson('/api/posts/' . $post->id, [
            'title' => 'Actualizacion de titulo',
        ]);
        $response->assertStatus(200);
    }

    public function test_post_can_be_deleted()
    {
        $user = User::factory()->create();
        $post = Post::factory()->create(['user_id' => $user->id]);
        $response = $this->actingAs($user, 'api')->deleteJson('/api/posts/' . $post->id);
        $response->assertStatus(200);
    }
}