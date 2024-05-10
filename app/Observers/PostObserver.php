<?php

namespace App\Observers;

use App\Models\Post;
use App\Traits\GetAuthIdTrait;

class PostObserver
{
    use GetAuthIdTrait;

    public function creating(Post $post)
    {
        $post->user_id = $this->getUserId();
    }
}
