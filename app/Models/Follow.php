<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    public function followed()
    {
        return $this->hasOne(User::class);
    }

    public function followedBelongs()
    {
        return $this->belongsTo(User::class, 'user_followed_id');
    }

    public function followingBelongs()
    {
        return $this->belongsTo(User::class, 'user_following_id');
    }
}
