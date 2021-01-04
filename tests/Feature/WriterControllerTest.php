<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class WriterController extends TestCase
{

    use RefreshDatabase;


    /** @test */
    public function only_authenticated_users_can_access_dashboard()
    {   
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect('/login');
    }
    
    /** @test */
    public function render_writer_dashboard()
    {   
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)
                        ->get('/dashboard');

        $response->assertStatus(200);
    }

    /** @test */
    public function writer_can_create_new_post()
    {   


        $response->assertStatus(201);
        $this->assertDatabaseCount('posts', 1);
        $this->assertDatabaseHas('posts', [
            'title' => $post->title
        ]);
    }
}
