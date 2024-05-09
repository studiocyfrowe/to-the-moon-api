<?php

namespace App\Repositories\Interfaces;

interface ReviewRepositoryInterface
{
    public function getReviewsOfMovie($movie);

    public function create($data, $movie);

    public function edit($review, $data);
}
