<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function checkIfExists($data)
    {
        // TODO: Implement checkIfExists() method.
    }

    public function searchData($data)
    {
        // TODO: Implement searchData() method.
    }

    public function index()
    {
        return City::with('cinemas')->get();
    }

    public function store($data)
    {
        $city = new City();

        $city->name = $data['name'];
        $city->display_name = $data['display_name'];
        $city->lat = $data['lat'];
        $city->lng = $data['lon'];

        $city->save();
    }

    public function update($city, $data)
    {
        // TODO: Implement update() method.
    }
}
