<?php

namespace App\Http\Controllers;

use App\Repository\Interfaces\PostRepositoryInterface;


class HomeController extends Controller
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
    public function index()
    {
        $posts = $this->postRepository->getLatestPublished();

        return view('homepage.index', [
            'posts' => $posts
        ]);
    }
}
