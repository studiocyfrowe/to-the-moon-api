<?php

namespace App\Services\Interfaces;

interface FollowServiceInterface
{
    public function followUser($followed);

    public function unFollowUser();

    public function getFollowingUsers();
}
