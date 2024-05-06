<?php

namespace App\Services;

use App\Enum\CinemaTypesEnum;
use App\Repositories\CinemaTypeRepository;
use App\Services\Interfaces\CinemaTypeServiceInterface;

class CinemaTypeService implements CinemaTypeServiceInterface
{
    public CinemaTypeRepository $cinemaTypeRepository;

    public function __construct(CinemaTypeRepository $cinemaTypeRepository)
    {
        $this->cinemaTypeRepository = $cinemaTypeRepository;
    }

    public function createType()
    {
        $cinema_types = array(
            CinemaTypesEnum::ARTHOUSE,
            CinemaTypesEnum::MULTIPLEX
        );

        foreach ($cinema_types as $type) {
            $this->cinemaTypeRepository->create($type);
        }
    }
}
