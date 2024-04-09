<?php

namespace App\Repositories;

use App\Models\Follow;
use App\Repositories\Interfaces\FollowRepositoryInterface;

class FollowRepository implements FollowRepositoryInterface
{
    public function checkIfFollowExists($followed)
    {
        return Follow::where('user_following_id', '=', auth()->user()->id)
            ->where('user_followed_id', '=', $followed->id)
            ->exists();
    }

    public function getFollowedUsersBySingleUser($user)
    {
        return Follow::where('user_following_id', '=', $user->id)
            ->with('followedBelongs')
            ->get();
    }

    public function getFollowingUsersOfSingleUser($user)
    {
        return Follow::where('user_followed_id', '=', $user->id)
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
