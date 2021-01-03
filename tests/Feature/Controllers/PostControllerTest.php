<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function visitor_can_see_all_posts_page()
    {

        $posts = new EloquentCollection([
            Post::factory()->create(),
            Post::factory()->create(),
            Post::factory()->create(),
        ]);

        $response = $this->get('/posts');

        $response->assertStatus(200);
        $this->assertCount(3, $response->data('posts'));
        $posts->assertEquals($response->data('posts'));
    }
}
