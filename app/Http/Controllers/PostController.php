<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Repository\Interfaces\PostRepositoryInterface;

class PostController extends Controller
{
    private $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }
    
    /**
     * Display all published posts
     * 
     * @return \Illuminate\View\View
     */
    public function getAllPublished()
    {
        $posts = $this->postRepository->getAllPublished();

        return view('posts.all', [
            'posts' => $posts
        ]);
    }


    /**
     * Display single published post by slug
     * 
     * @return \Illuminate\View\View
     */
    public function getSinglePublished($slug)
    {   
        $post = $this->postRepository->getSinglePublished($slug);

        return view('posts.post', [
            'post' => $post
        ]);
    }

    /**
     * Create new post
     * 
     * @return \Illuminate\View\View
     */
    public function store(PostCreateRequest $request)
    {
        $post = $this->postRepository->store($request);

    }
}
