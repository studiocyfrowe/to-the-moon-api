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
        return Review::where('id', '=', $data)->with('movie')->exists();
    }

    public function getReviewsOfMovie($movie)
    {
        return Review::where('movie_id', '=', $movie)->with('movie')->get();
    }

    public function create($data, $movie)
    {
        $review = new Review();

        $review->review_content = $data->review_content;
        $review->rate = $data->rate;
        $review->movie_id = $movie->id;

        $review->save();
    }

    public function edit($review, $data)
    {
        // TODO: Implement edit() method.
    }
}
