<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Repository\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    
    public function getAllPublished()
    {
        $posts = $this->postRepository->getAllPublished();

        return view('posts.all', [
            'posts' => $posts
        ]);
    }

    public function getSinglePublished($slug)
    {   
        $post = $this->postRepository->getSinglePublished($slug);

        return view('posts.post', [
            'post' => $post
        ]);
    }
}
