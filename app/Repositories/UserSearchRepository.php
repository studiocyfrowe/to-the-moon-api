<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UsersSearchRepositoryInterface;

class UserSearchRepository implements UsersSearchRepositoryInterface
{
    public function searchUserById($userID)
    {
        $user = User::where('id', '=', $userID)->first();
        return $user;
    }
}
