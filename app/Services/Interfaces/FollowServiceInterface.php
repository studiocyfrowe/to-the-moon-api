<?php

namespace App\Services\Interfaces;

interface FollowServiceInterface
{
    public function followUser($followed);

    public function unFollowUser($followed);

    public function getFollowingUsers();
}
