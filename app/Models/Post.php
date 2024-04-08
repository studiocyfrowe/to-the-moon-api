<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'the_excerpt',
        'body_text',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postStatus()
    {
        return $this->belongsTo(PostStatus::class, 'post_status_id');
    }
}
