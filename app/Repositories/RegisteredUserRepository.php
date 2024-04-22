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

    public function updateUser($user, $data)
    {
        $user->first_name = $data->first_name;
        $user->last_name = $data->last_name;

        $imageProfile = time().'.'.$data->image_profile_url->extension();
        $user->image_profile_url = $data->image_profile_url->move(public_path('images/profiles'), $imageProfile);

        $coverPhoto = time().'.'.$data->cover_photo_url->extension();
        $user->cover_photo_url = $data->cover_photo_url->move(public_path('images/covers'), $coverPhoto);

        $user->fav_quote = $data->fav_quote;

        $user->save();
    }
}
