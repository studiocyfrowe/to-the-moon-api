<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UsersSearchRepositoryInterface;

class UserSearchRepository implements UsersSearchRepositoryInterface
{
    public function checkUserExists($user)
    {
        return User::where('nickname', '=', $user)->exists();
    }

    public function searchUserByUniqueNickname($user)
    {
        return User::where('nickname', '=', $user)->first();
    }
}
