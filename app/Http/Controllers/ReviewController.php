<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\Movie;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Repositories\MovieRepository;
use App\Repositories\ReviewRepository;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;

class ReviewController extends Controller
{
    use ResponseDataTrait;
    use GetMessageTrait;
    protected ReviewRepository $reviewRepository;
    protected MovieRepository $movieRepository;

    public function __construct(ReviewRepository $reviewRepository,
                                MovieRepository $movieRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Movie $movie)
    {
        if ($this->movieRepository->checkIfExists($movie->id)) {
            $res = $this->reviewRepository->getReviewsOfMovie($movie->id);
            return $this->getData($res);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request, Movie $movie)
    {
        if ($this->movieRepository->checkIfExists($movie->id)) {
            $this->reviewRepository->create($request, $movie);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        if ($this->reviewRepository->checkIfExists($review->id)) {
            $this->reviewRepository->searchData($review->id);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
