<?php

namespace App\Repositories;

use App\Models\Follow;
use App\Repositories\Interfaces\FollowRepositoryInterface;

class FollowRepository implements FollowRepositoryInterface
{
    public function checkIfFollowExists($followed)
    {
        return Follow::where('user_following_id', '=', auth()->user()->id)
            ->where('user_followed_id', '=', $followed)
            ->first();
    }

    public function getFollowedUsersBySingleUser($user)
    {
        return Follow::where('user_following_id', '=', $user)
            ->with('followedBelongs')
            ->get();
    }

    public function getFollowingUsersOfSingleUser($user)
    {
        return Follow::where('user_followed_id', '=', $user)
            ->with('followingBelongs')
            ->get();
    }

    public function followUser($authUser, $user)
    {
        $follow = new Follow();

        $follow->user_following_id = $authUser->id;
        $follow->user_followed_id = $user->id;

        $follow->save();
    }
}
