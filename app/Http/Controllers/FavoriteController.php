<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\Favorite;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;
use App\Models\Movie;
use App\Repositories\FavoriteRepository;
use App\Repositories\MovieRepository;
use App\Traits\GetAuthIdTrait;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;

class FavoriteController extends Controller
{
    use ResponseDataTrait, GetAuthIdTrait, GetMessageTrait;
    protected FavoriteRepository $favoriteRepository;

    protected MovieRepository $movieRepository;

    public function __construct(FavoriteRepository $favoriteRepository,
                                MovieRepository $movieRepository)
    {
        $this->favoriteRepository = $favoriteRepository;
        $this->movieRepository = $movieRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->favoriteRepository->index($this->getUserId());
        return $this->getData($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Movie $movie)
    {
        if ($this->movieRepository->checkIfExists($movie->id)) {
            $this->favoriteRepository->create($movie);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Favorite $favorite)
    {
        if ($this->favoriteRepository->checkIfExists($favorite->id)) {
            $favorite->delete();
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }
}
