<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\RegisteredUserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisteredUserRepository implements RegisteredUserRepositoryInterface
{
    public function createUser($data)
    {
        $user = new User();

        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;
        $user->email = $data->email;
        $user->password = bcrypt($data->password);

        $user->save();

        return $user;
    }
}
