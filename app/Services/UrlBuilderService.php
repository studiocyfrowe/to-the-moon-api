<?php

namespace App\Services;

use App\Services\Interfaces\UrlBuilderServiceInterface;

class UrlBuilderService implements UrlBuilderServiceInterface
{
    public function create($args)
    {
        $BASE_URL = env('NOMIMATIM_URL');
        $query = $BASE_URL . http_build_query($args);
        return $query;
    }
}
