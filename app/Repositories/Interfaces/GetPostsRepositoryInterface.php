<?php

namespace App\Repositories\Interfaces;

interface GetPostsRepositoryInterface
{
    public function getAllOfAuthUser();

    public function getAllOfSingleUser($user);

    public function getPostDetails($post);
}
