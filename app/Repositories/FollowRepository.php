<?php

namespace App\Repositories;

use App\Models\Follow;
use App\Repositories\Interfaces\FollowRepositoryInterface;

class FollowRepository implements FollowRepositoryInterface
{
    public function checkIfFollowExists($following, $followed)
    {
        $getFollow = Follow::where('user_following_id', '=', auth()->user()->id)
            ->where('user_followed_id', '=', $followed->id)
            ->first();

        return $getFollow;
    }

    public function getFollowedUsersBySingleUser($user)
    {
        // TODO: Implement getFollowedUsersBySingleUser() method.
    }
}
