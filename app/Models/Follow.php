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

    public function followingsBelongs()
    {
        return $this->belongsTo(User::class, 'user_following_id');
    }
}
