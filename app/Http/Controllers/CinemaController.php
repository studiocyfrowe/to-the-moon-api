<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\Cinema;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;
use App\Models\CinemaType;
use App\Models\City;
use App\Repositories\CinemaRepository;
use App\Repositories\CinemaTypeRepository;
use App\Repositories\CityRepository;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;

class CinemaController extends Controller
{
    use GetMessageTrait;
    use ResponseDataTrait;
    protected CinemaRepository $cinemaRepository;
    protected CinemaTypeRepository $cinemaTypeRepository;
    protected CityRepository $cityRepository;

    public function __construct(CinemaRepository $cinemaRepository,
                                CityRepository $cityRepository,
                                CinemaTypeRepository $cinemaTypeRepository)
    {
        $this->cinemaRepository = $cinemaRepository;
        $this->cityRepository = $cityRepository;
        $this->cinemaTypeRepository = $cinemaTypeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->cinemaRepository->index();
        return $this->getData($res);
    }

    public function getRandomCinemas()
    {
        $res = $this->cinemaRepository->getRandomCinemaLimit(5);
        return $this->getData($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCinemaRequest $request, CinemaType $cinemaType, City $city)
    {
        if ($this->cityRepository->checkIfExists($city->id)
            && $this->cinemaTypeRepository->checkIfExists($cinemaType->id)) {
            $this->cinemaRepository->store($request, $cinemaType, $city);
        } else {
            $this->responseMessage(ResponseMessagesEnum::REQUIRED_PARAM, ResponseStatusEnum::UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Cinema $cinema)
    {
        if ($this->cinemaRepository->checkIfExists($cinema->id)) {
            $res = $this->cinemaRepository->searchData($cinema->id);
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
    public function update(UpdateCinemaRequest $request, Cinema $cinema)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cinema $cinema)
    {
        //
    }
}
