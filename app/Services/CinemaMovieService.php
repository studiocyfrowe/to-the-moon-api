<?php

namespace App\Services;

use App\Services\Interfaces\CinemaMovieServiceInterface;

class CinemaMovieService implements CinemaMovieServiceInterface
{
    public function attachMovieToCinema($movie, $cinema)
    {
        $movie->cinemas()->attach($cinema);
    }

    public function attachCinemaToMovie($cinema, $movie)
    {
        $cinema->movies()->attach($movie);
    }
}
