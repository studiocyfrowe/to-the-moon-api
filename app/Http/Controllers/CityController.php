<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\City;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Repositories\CityRepository;
use App\Services\GetCoordinatesService;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;
use Illuminate\Support\Facades\Http;

class CityController extends Controller
{
    use GetMessageTrait;
    use ResponseDataTrait;
    protected CityRepository $cityRepository;
    protected GetCoordinatesService $cityCoordinatesService;

    public function __construct(CityRepository        $cityRepository,
                                GetCoordinatesService $cityCoordinatesService)
    {
        $this->cityRepository = $cityRepository;
        $this->cityCoordinatesService = $cityCoordinatesService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->cityRepository->index();
        return $this->getData($res);
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
        if ($this->cityRepository->checkIfExists($city->id)) {
            $res = $this->cityRepository->searchData($city->id);
            return $res ? $this->getData($res) : $this->responseMessage(ResponseMessagesEnum::ERROR,
                ResponseStatusEnum::BAD_REQUEST);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCityRequest $request, City $city)
    {
        if ($this->cityRepository->checkIfExists($city->id)) {
            $cityItem = $this->cityRepository->searchData($city->id);
            $this->cityRepository->update($cityItem, $request);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        if ($this->cityRepository->checkIfExists($city->id)) {
            $res = $this->cityRepository->searchData($city->id);
            $res->delete();
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }
}
