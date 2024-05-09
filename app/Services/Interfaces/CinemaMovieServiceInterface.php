<?php

namespace App\Services\Interfaces;

interface CinemaMovieServiceInterface
{
    public function attachMovieToCinema($movie, $cinema);

    public function attachCinemaToMovie($cinema, $movie);
}
