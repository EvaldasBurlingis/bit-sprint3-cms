<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\Interfaces\PostRepositoryInterface;
use Illuminate\Support\Collection;

class PostRepository implements PostRepositoryInterface
{
    public function getAllPublished() : Collection
    {
        return Post::where('status', 'published')->get();
    }

    public function getSinglePublished(String $slug) : Post
    {
        return Post::where('slug', '=', $slug)->where('status', 'published')->first();
    }
}