<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\CityRepository;
use App\Services\GetCityCoordinatesService;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    protected CityRepository $cityRepository;
    protected GetCityCoordinatesService $cityCoordinatesService;

    public function __construct(CityRepository $cityRepository,
                                GetCityCoordinatesService $cityCoordinatesService)
    {
        $this->cityRepository = $cityRepository;
        $this->cityCoordinatesService = $cityCoordinatesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->cityRepository->index();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCityRequest $request)
    {
        $name = $request->query('name');
        $city_result = $this->cityCoordinatesService->index($name);
        $this->cityRepository->store($city_result);
    }

    /**
     * Display the specified resource.
     */
    public function show(City $city)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        //
    }
}
