<?php

namespace App\Repositories;

use App\Models\City;
use App\Repositories\Interfaces\CityRepositoryInterface;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function checkIfExists($data)
    {
        return City::where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return City::where('id', '=', $data)->with('cinemas')->first();
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
        $city->name = $data['name'];
        $city->save();
    }
}
