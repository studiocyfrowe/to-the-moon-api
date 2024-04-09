<?php

namespace App\Traits;

trait ResponseFollowDataTrait
{
    public function getFollows($count, $users)
    {
        return response()->json([
            'count' => $count,
            'users' => $users
        ], 200);
    }
}
