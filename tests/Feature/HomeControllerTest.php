<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;


class HomeControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function render_homepage_successfully()
    {
        $response = $this->get('/');

        $response->assertSuccessful();
    }

    /** @test */
    public function homepage_has_posts()
    {
        $posts = new EloquentCollection([
            Post::factory()->create(['status_id' => 1]),
            Post::factory()->create(['status_id' => 1]),
            Post::factory()->create(['status_id' => 1]),
        ]);

        $response = $this->get('/');
        
        $response->assertStatus(200);
        $this->assertCount(3, $response->data('posts'));
        $posts->assertEquals($response->data('posts'));
    }

}
