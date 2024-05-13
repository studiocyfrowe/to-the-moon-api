<?php

namespace App\Repositories\Interfaces;

interface CinemaRepositoryInterface
{
    public function index();

    public function getTopRatedCinema();

    public function getRandomCinemaLimit($limit);

    public function store($data, $cinemaType, $city);

    public function update($cinema, $data);
}
