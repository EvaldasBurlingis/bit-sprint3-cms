<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class AdminPostControllerTest extends TestCase
{

    use RefreshDatabase;

    /** @test */
    public function guest_cannot_access_dashboard()
    {
        $response = $this->get('/dashboard');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_access_dashboard()
    {
        $user = User::factory()->create();
        
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertSuccessful();
    }

    /** @test */
    public function authenticated_user_can_see_all_posts()
    {
        $posts = Post::factory()->count(10)->create();
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $this->assertDatabaseCount('posts', 10);
        $this->assertCount(10, $response->data('posts'));
        $response->assertViewHas('posts');
        $posts->assertEquals($response->data('posts'));
    }

    /** @test */
    public function guest_cannot_see_create_post_page()
    {
        $response = $this->get('/dashboard/posts/new');

        $response->assertRedirect('/login');
    }

    /** @test */
    public function authenticated_user_can_see_create_post_form()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard/posts/new');

        $response->assertSuccessful();
    }

    /** @test */
    public function authenticated_user_can_submit_new_post()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $post = [
            'title'     => 'test title',
            'body'      => 'test body',
            'status_id' => 1
        ];

        $response = $this->actingAs($user)->post('/dashboard/posts/new', [$post]);

        // $response->dumpSession();

        // $response->assertSuccessful();
        $this->assertDatabaseCount('posts', 1);
    }
}
