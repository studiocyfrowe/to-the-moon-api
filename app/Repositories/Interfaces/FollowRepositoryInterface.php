<?php

namespace App\Repositories\Interfaces;

interface FollowRepositoryInterface
{
    public function checkIfFollowExists($following, $followed);

    public function getFollowedUsersBySingleUser($user);
}
