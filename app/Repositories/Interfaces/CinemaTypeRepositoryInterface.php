<?php

namespace App\Repositories\Interfaces;

interface CinemaTypeRepositoryInterface
{
    public function getAll();

    public function getSingle($cinemaType);

    public function create($data);

    public function edit($cinemaType, $data);

    public function delete($cinemaType);
}
