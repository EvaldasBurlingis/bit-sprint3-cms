<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    
    /**
     * Display single published post by slug
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $posts = $this->postRepository->getAllPublished();

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Display single published post by slug
     * 
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {   
        $post = $this->postRepository->getSinglePublished($slug);

        return view('posts.show', ['post' => $post]);
    }
}
