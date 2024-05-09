<?php

namespace App\Repositories\Interfaces;

interface MovieRepositoryInterface
{
    public function index();

    public function store($data);

    public function update();
}
