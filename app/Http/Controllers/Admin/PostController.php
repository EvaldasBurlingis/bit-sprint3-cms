<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
     * Show all posts
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $posts = $this->postRepository->getAll();

        return view('admin.dashboard', ['posts' => $posts]);
    }

    /**
     * Show create post page
     * 
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.posts.new');
    }

    /**
     * Create new post
     */
    public function store(PostCreateRequest $request)
    {

        $this->postRepository->store($request);

    }
}
