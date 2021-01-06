<?php

namespace App\Repository\Interfaces;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Http\Requests\PostCreateRequest;
use App\Http\Requests\PostUpdateRequest;

interface PostRepositoryInterface
{
   public function getAllPublished() : ?Collection;

   public function getLatestPublished() : ?Collection;

   public function getSinglePublished(String $slug) : ?Model;

   public function getAll() : ?Collection;

   public function store(PostCreateRequest $request) : ?Model;

   public function getById(Int $id) : ?Model;

   public function destroy(Int $id) : void;

   public function edit(PostUpdateRequest $request) : ?Model;

}