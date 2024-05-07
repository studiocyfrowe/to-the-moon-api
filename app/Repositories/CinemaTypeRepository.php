<?php

namespace App\Repositories;

use App\Models\CinemaType;
use App\Repositories\Interfaces\CinemaTypeRepositoryInterface;

class CinemaTypeRepository extends BaseRepository implements CinemaTypeRepositoryInterface
{
    public function checkIfExists($data)
    {
        return CinemaType::where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return CinemaType::where('id', '=', $data)->with('cinemas')->first();
    }

    public function getAll()
    {
        return CinemaType::with('cinemas')->get();
    }

    public function create($data)
    {
        $cinemaType = new CinemaType();
        $cinemaType->name = $data->name;
        $cinemaType->save();
    }

    public function edit($cinemaType, $data)
    {
        // TODO: Implement edit() method.
    }
}
