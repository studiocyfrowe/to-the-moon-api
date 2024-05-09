<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\Cinema;
use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Repositories\MovieRepository;
use App\Services\CinemaMovieService;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    use ResponseDataTrait;
    use GetMessageTrait;
    protected MovieRepository $movieRepository;
    protected CinemaMovieService $cinemaMovieService;

    public function __construct(MovieRepository $movieRepository,
                                CinemaMovieService $cinemaMovieService)
    {
        $this->movieRepository = $movieRepository;
        $this->cinemaMovieService = $cinemaMovieService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->movieRepository->index();
        return $this->getData($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->movieRepository->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        if ($this->movieRepository->checkIfExists($movie->id)) {
            $res = $this->movieRepository->searchData($movie->id);
            return $res ? $this->getData($res) : $this->responseMessage(ResponseMessagesEnum::ERROR,
                ResponseStatusEnum::BAD_REQUEST);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    public function attachMovieToCinema(Movie $movie, Cinema $cinema)
    {
        if ($this->movieRepository->checkIfExists($movie->id)) {
            $this->cinemaMovieService->attachMovieToCinema($movie, $cinema);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        //
    }
}
