<?php

namespace App\Models;

use App\Models\PostStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    const EXCERPT_LENGTH = 150;

    protected $fillable = [
        'title',
        'body',
        'status_id',
        'user_id',
        'slug'
    ];

    public function status()
    {
        return $this->hasOne(PostStatus::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function excerpt()
    {
        return Str::limit($this->body, Post::EXCERPT_LENGTH);
    }
}
