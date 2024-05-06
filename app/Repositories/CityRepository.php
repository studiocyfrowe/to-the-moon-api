<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository implements CityRepositoryInterface
{
    public function index()
    {
        return City::with('cinemas')->get();
    }

    public function store($data)
    {
        $city = new City();

        $city->name = $data->name;
        $city->lat = $data->lat;
        $city->lng = $data->lng;

        $city->save();
    }

    public function update($city, $data)
    {
        // TODO: Implement update() method.
    }

    public function remove($city)
    {
        // TODO: Implement remove() method.
    }
}
