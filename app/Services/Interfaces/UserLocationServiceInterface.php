<?php

namespace App\Services\Interfaces;

interface UserLocationServiceInterface
{
    public function searchLocation($keyword);

    public function createLocation($keyword, $user);
}
