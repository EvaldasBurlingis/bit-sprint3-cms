<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Repository\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPublished() : Collection
    {
        return Post::where('status_id', 1)->get();
    }

    public function getSinglePublished(String $slug) : Post
    {
        return Post::where('slug', '=', $slug)->where('status_id', 1)->first();
    }

    public function store(PostCreateRequest $request) : Post
    {
       $post =  Post::create([
            'title'     => $request->title,
            'body'      => $request->body,
            'user_id'   => Auth::id(),
            'status_id' => $request->status_id,
            'slug'      => Str::slug($request->title, '-')
        ]);

        return $post;
    }
}