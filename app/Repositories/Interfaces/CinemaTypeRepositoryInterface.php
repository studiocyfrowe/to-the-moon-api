<?php

namespace App\Repositories\Interfaces;

interface CinemaTypeRepositoryInterface
{
    public function getAll();

    public function create($data);

    public function edit($cinemaType, $data);
}
