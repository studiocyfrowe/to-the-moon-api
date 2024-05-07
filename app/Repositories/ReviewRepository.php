<?php

namespace App\Repositories;

use App\Models\Review;
use App\Repositories\Interfaces\ReviewRepositoryInterface;

class ReviewRepository extends BaseRepository implements ReviewRepositoryInterface
{
    public function checkIfExists($data)
    {
        return Review::where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return Review::where('id', '=', $data)->with('user')->exists();
    }

    public function getAll()
    {
        return Review::with('user')->get();
    }

    public function create($data)
    {
        // TODO: Implement create() method.
    }

    public function edit($review, $data)
    {
        // TODO: Implement edit() method.
    }
}
