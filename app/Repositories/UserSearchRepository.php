<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UsersSearchRepositoryInterface;

class UserSearchRepository implements UsersSearchRepositoryInterface
{
    public function searchUserById($userID)
    {
        return User::where('id', '=', $userID->id)->first();
    }
}
