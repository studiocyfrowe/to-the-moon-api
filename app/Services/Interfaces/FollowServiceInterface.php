<?php

namespace App\Services\Interfaces;

interface FollowServiceInterface
{
    public function followUser($followed);

    public function unFollowUser($followed);

    public function getFollowedUsers($user);

    public function getFollowingUsers($user);
}
