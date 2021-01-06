<?php

namespace App\Models;

use App\Models\PostStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Te7aHoudini\LaravelTrix\Traits\HasTrixRichText;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasTrixRichText;

    const EXCERPT_LENGTH = 150;

    protected $guarded = [];

    public function status()
    {
        return $this->belongsTo(PostStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function excerpt()
    {
        return Str::limit($this->trixRichText->first()->content, Post::EXCERPT_LENGTH);
    }
}
