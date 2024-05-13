<?php

namespace App\Repositories\Interfaces;

interface FavoriteRepositoryInterface
{
    public function index($user);

    public function create($movie);

    public function remove();
}
