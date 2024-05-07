<?php

namespace App\Repositories;

abstract class BaseRepository
{
    abstract public function checkIfExists($data);

    abstract public function searchData($data);

}
