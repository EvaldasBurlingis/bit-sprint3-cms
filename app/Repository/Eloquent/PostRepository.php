<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Repository\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPublished() : Collection
    {
        return Post::where('status_id', 1)->latest()->get();
    }

    public function getLatestPublished() : Collection
    {
        return Post::where('status_id', 1)
                ->latest('updated_at')
                ->take(10)
                ->get();
    }

    public function getSinglePublished(String $slug) : Post
    {
        return Post::where('slug', '=', $slug)->where('status_id', 1)->first();
    }

    public function getAll() : Collection
    {
        return Post::all();
    }

    public function store(PostCreateRequest $request) : Post
    {
       $post = Post::create([
            'title'             => $request->title,
            'post-trixFields'   => request('post-trixFields'),
            'user_id'           => Auth::id(),
            'status_id'         => $request->status_id,
            'slug'              => Str::slug($request->title, '-')
        ]);

        return $post;
    }

    public function edit(PostUpdateRequest $request) : Post
    {
        Post::find($request->id)
            ->update([
                'title'             => $request->title,
                'post-trixFields'   => request('post-trixFields'),
                'status_id'         => $request->status_id,
                'slug'              => Str::slug($request->title, '-')
            ]);

        $post = Post::find($request->id);

        return $post;
    }

    public function destroy(Int $id): void
    {
        Post::destroy($id);
    }

    public function getById(Int $id): ?Post
    {
        $post = Post::find($id);

        return $post;
    }


}