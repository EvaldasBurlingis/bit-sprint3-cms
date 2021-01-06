<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function render_all_posts_page()
    {
        Post::factory()->count(20)->create();

        $response = $this->get('/posts');

        $response->assertSuccessful();
        $response->assertViewHas('posts');
    }

    /** @test */
    public function render_post_page_successfully()
    {

        Post::factory()->create([
            'slug'     => 'my-test-post',
            'status_id' => 1
        ]);

        $response = $this->get('/posts/my-test-post');

        $response->assertSuccessful();
    }

    /** @test */
    public function post_page_has_content()
    {

        $post = Post::factory()->create([
            'slug'     => 'my-test-post',
            'status_id' => 1
        ]);

        $response = $this->get('/posts/my-test-post');
        
        $response->assertViewHasAll(['post' => $post]);
    }
    
}
