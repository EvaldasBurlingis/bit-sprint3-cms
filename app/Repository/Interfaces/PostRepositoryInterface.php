<?php

namespace App\Repository\Interfaces;

use App\Http\Requests\PostCreateRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
   public function getAllPublished() : ?Collection;

   public function getSinglePublished(String $slug) : ?Model;

   public function store(PostCreateRequest $request) : ?Model;
}