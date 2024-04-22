<?php

namespace App\Repositories\Interfaces;

interface RegisteredUserRepositoryInterface
{
    public function createUser($data);

    public function updateUser($user, $data);
}
