<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\CinemaType;
use App\Http\Requests\StoreCinemaTypeRequest;
use App\Http\Requests\UpdateCinemaTypeRequest;
use App\Repositories\CinemaTypeRepository;
use App\Services\CinemaTypeService;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;

class CinemaTypeController extends Controller
{
    use GetMessageTrait;
    use ResponseDataTrait;
    protected CinemaTypeRepository $cinemaTypeRepository;
    protected CinemaTypeService $cinemaTypeService;

    public function __construct(CinemaTypeRepository $cinemaTypeRepository,
    CinemaTypeService $cinemaTypeService)
    {
        $this->cinemaTypeRepository = $cinemaTypeRepository;
        $this->cinemaTypeService = $cinemaTypeService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->cinemaTypeRepository->getAll();
        return $this->getData($res);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->cinemaTypeService->createType();
    }

    /**
     * Display the specified resource.
     */
    public function show(CinemaType $cinemaType)
    {
        if ($this->cinemaTypeRepository->checkIfExists($cinemaType->id)) {
            $res = $this->cinemaTypeRepository->searchData($cinemaType->id);
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
    public function update(UpdateCinemaTypeRequest $request, CinemaType $cinemaType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CinemaType $cinemaType)
    {
        if ($this->cinemaTypeRepository->checkIfExists($cinemaType->id)) {
            $res = $this->cinemaTypeRepository->searchData($cinemaType->id);
            $res->delete();
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }
}
