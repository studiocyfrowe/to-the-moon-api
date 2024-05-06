<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Http\Requests\StoreCinemaRequest;
use App\Http\Requests\UpdateCinemaRequest;

class CinemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCinemaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cinema $cinema)
    {
        //
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
