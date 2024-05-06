<?php

namespace App\Http\Controllers;

use App\Models\CinemaType;
use App\Http\Requests\StoreCinemaTypeRequest;
use App\Http\Requests\UpdateCinemaTypeRequest;
use App\Repositories\CinemaTypeRepository;
use App\Services\CinemaTypeService;

class CinemaTypeController extends Controller
{
    public CinemaTypeRepository $cinemaTypeRepository;
    public CinemaTypeService $cinemaTypeService;

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
        return $res ? response()->json($res, 200) : null;
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
        $res = $this->cinemaTypeRepository->getSingle($cinemaType->id);
        return $res ? response()->json($res, 200) : null;
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
        //
    }
}
