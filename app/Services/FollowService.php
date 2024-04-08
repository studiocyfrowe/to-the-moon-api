<?php

namespace App\Services;

use App\Models\Follow;
use App\Services\Interfaces\FollowServiceInterface;

class FollowService implements FollowServiceInterface
{
    public function followUser($followed)
    {
        $follow = new Follow();

        $follow->user_following_id = auth()->user()->id;
        $follow->user_followed_id = $followed->id;

        $follow->save();
    }

    public function unFollowUser()
    {
        // TODO: Implement unFollowUser() method.
    }

    public function getFollowingUsers()
    {
        // TODO: Implement getFollowingUsers() method.
    }
}
