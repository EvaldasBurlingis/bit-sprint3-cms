<?php

namespace App\Repository\Interfaces;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
   public function getAllPublished() : ?Collection;

   public function getSinglePublished(String $slug) : ?Model;
}