<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCinemaRequest;
use App\Models\CinemaType;
use App\Models\City;
use App\Services\GetCoordinatesService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected GetCoordinatesService $coordinatesService;

    public function __construct(GetCoordinatesService $coordinatesService)
    {
        $this->coordinatesService = $coordinatesService;
    }

    public function store(Request $request)
    {
        return $this->coordinatesService->index($request->location_address);
    }
}
