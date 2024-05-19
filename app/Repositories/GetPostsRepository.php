<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\GetPostsRepositoryInterface;
use App\Traits\GetAuthIdTrait;

class GetPostsRepository implements GetPostsRepositoryInterface
{
    use GetAuthIdTrait;

    public function getAllPosts()
    {
        return Post::with([
                'user', 'postStatus'
            ])->get();
    }
    public function getAllOfAuthUser()
    {
        return Post::where('user_id', '=', $this->getUserId())
            ->with([
                'user', 'postStatus'
            ])->get();
    }

    public function getAllOfSingleUser($user)
    {
        // TODO: Implement getAllOfSingleUser() method.
    }

    public function getPostDetails($post)
    {
        return Post::where('id', '=', $post->id)
            ->with([
                'user', 'postStatus'
            ])->first();
    }
}
