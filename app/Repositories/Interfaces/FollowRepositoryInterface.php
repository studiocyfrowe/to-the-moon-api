<?php

namespace App\Repositories\Interfaces;

interface FollowRepositoryInterface
{
    public function checkIfFollowExists($followed);

    public function getFollowedUsersBySingleUser($user);

    public function getFollowingUsersOfSingleUser($user);

    public function followUser($authUser, $user);
}
