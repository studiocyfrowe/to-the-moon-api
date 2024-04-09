<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\GetPostsRepositoryInterface;
use App\Traits\GetAuthIdTrait;

class GetPostsRepository implements GetPostsRepositoryInterface
{
    use GetAuthIdTrait;
    public function getAllOfAuthUser()
    {
        return Post::where('user_id', '=', $this->getUserId()->id)
            ->with([
                'user', 'post_status'
            ])->get();
    }

    public function getAllOfSingleUser($user)
    {
        // TODO: Implement getAllOfSingleUser() method.
    }

    public function getPostDetails($post)
    {
        // TODO: Implement getPostDetails() method.
    }
}
