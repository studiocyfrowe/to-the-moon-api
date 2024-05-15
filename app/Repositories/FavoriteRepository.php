<?php

namespace App\Repositories;

use App\Models\Favorite;
use App\Repositories\Interfaces\FavoriteRepositoryInterface;

class FavoriteRepository extends BaseRepository implements FavoriteRepositoryInterface
{
    public function index($user)
    {
        return Favorite::where('user_id', '=', $user)
            ->with([
            '   user', 'movie'
            ])->get();
    }

    public function create($movie)
    {
        $favorite = new Favorite();
        $favorite->movie_id = $movie->id;
        $favorite->save();
    }

    public function remove()
    {
        // TODO: Implement remove() method.
    }

    public function checkIfExists($data)
    {
        return Favorite::where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        // TODO: Implement searchData() method.
    }
}
