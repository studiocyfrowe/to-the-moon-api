<?php

namespace App\Repositories\Interfaces;

interface UsersSearchRepositoryInterface
{
    public function checkUserExists($user);
    public function searchUserByUniqueNickname($user);
}
