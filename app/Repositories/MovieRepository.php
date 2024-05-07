<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Repositories\Interfaces\MovieRepositoryInterface;

class MovieRepository extends BaseRepository implements MovieRepositoryInterface
{
    public function checkIfExists($data)
    {
        return Movie::where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return Movie::where('id', '=', $data)->with([
            'reviews', 'cinema'
        ])->first();
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
