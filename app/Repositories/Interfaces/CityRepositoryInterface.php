<?php

namespace App\Repositories\Interfaces;

interface CityRepositoryInterface
{
    public function index();

    public function store($data);

    public function update($city, $data);

    public function remove($city);
}
