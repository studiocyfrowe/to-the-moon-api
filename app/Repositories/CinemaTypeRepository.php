<?php

namespace App\Repositories;

use App\Models\CinemaType;
use App\Repositories\Interfaces\CinemaTypeRepositoryInterface;

class CinemaTypeRepository implements CinemaTypeRepositoryInterface
{
    public function getAll()
    {
        return CinemaType::with('cinemas')->get();
    }

    public function getSingle($cinemaType)
    {
        return CinemaType::where('id', '=', $cinemaType)->with('cinemas')->get();
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

    public function delete($cinemaType)
    {
        //
    }
}
