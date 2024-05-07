<?php

namespace App\Repositories\Interfaces;

interface CinemaRepositoryInterface
{
    public function index();

    public function store($data, $cinemaType, $city);

    public function update($cinema, $data);
}
