<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    
    public function getAllPublished()
    {
        $posts = Post::where('status', 'published')->get();

        return view('posts.all', [
            'posts' => $posts
        ]);
    }
}
