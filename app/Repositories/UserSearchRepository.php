<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UsersSearchRepositoryInterface;

class UserSearchRepository extends BaseRepository
{
    public function checkIfExists($data)
    {
        return User::where('nickname', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return User::where('nickname', '=', $data)->first();
    }
}
