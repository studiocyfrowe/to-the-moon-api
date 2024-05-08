<?php

namespace App\Observers;

use App\Http\Requests\StoreCinemaRequest;
use App\Models\Cinema;
use App\Services\GetCoordinatesService;

class CinemaObserver
{
    protected GetCoordinatesService $coordinatesService;

    public function __construct(GetCoordinatesService $coordinatesService)
    {
        $this->coordinatesService = $coordinatesService;
    }

    public function creating(Cinema $cinema)
    {
        $cinema_coordinates = $this->coordinatesService->index($cinema->location_address);
        $cinema->cinema_lat = $cinema_coordinates['lat'];
        $cinema->cinema_lng = $cinema_coordinates['lon'];
    }
}
