<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
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

        $request->session()->flash('success', 'Blog post created successfully');
        
        return view('admin.posts.new');
    }

    /**
     * Delete post
     */
    public function destroy($id)
    {
        $this->postRepository->destroy($id);

        return redirect('/dashboard')->with('success', 'Post has been deleted');
    }

    /**
     * Show post
     */
    public function show($id)
    {
        $post = $this->postRepository->getById($id);

        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Edit post
     */
    public function edit(PostUpdateRequest $request)
    {
        $post = $this->postRepository->edit($request);
     
        $request->session()->flash('success', 'Blog post edited successfully');
        
        return view('admin.posts.show', ['post' => $post]);
    }
}
