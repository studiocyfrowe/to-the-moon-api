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
            'reviews', 'cinemas'
        ])->first();
    }

    public function index()
    {
        return Movie::with([
            'reviews', 'cinemas'
        ])->get();
    }

    public function store($data)
    {
        $movie = new Movie();

        $movie->title = $data->title;
        $movie->director = $data->director;
        $movie->year_release = $data->year_release;
        $movie->description = $data->description;

        $movie->save();
    }

    public function update()
    {
        // TODO: Implement update() method.
    }
}
