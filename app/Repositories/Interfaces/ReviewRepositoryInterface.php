<?php

namespace App\Repositories\Interfaces;

interface ReviewRepositoryInterface
{
    public function getAll();

    public function create($data);

    public function edit($review, $data);
}
