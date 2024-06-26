<?php

namespace App\Repositories;

use App\Models\Cinema;
use App\Repositories\Interfaces\CinemaRepositoryInterface;

class CinemaRepository extends BaseRepository implements CinemaRepositoryInterface
{
    public function checkIfExists($data)
    {
        return Cinema::where('id', '=', $data)
            ->exists();
    }

    public function searchData($data)
    {
        return Cinema::where('id', '=', $data)
            ->with(['cinemaType', 'city', 'movies'])
            ->first();
    }

    public function index()
    {
        return Cinema::with(['cinemaType', 'city', 'movies'])
            ->get();
    }

    public function store($data, $cinemaType, $city)
    {
        $cinema = new Cinema();

        $cinema->name = $data->name;
        $cinema->description = $data->description;
        $cinema->phone_number = $data->phone_number;
        $cinema->email_address = $data->email_address;
        $cinema->website_address = $data->website_address;
        $cinema->location_address = $data->location_address;
        $cinema->city_id = $city->id;
        $cinema->cinema_type_id = $cinemaType->id;

        $cinema->save();
    }

    public function update($cinema, $data)
    {
        // TODO: Implement update() method.
    }

    public function getTopRatedCinema()
    {
        // TODO: Implement getTopRatedCinema() method.
    }

    public function getRandomCinemaLimit($limit)
    {
        return Cinema::with(['cinemaType', 'city', 'movies'])
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }
}
