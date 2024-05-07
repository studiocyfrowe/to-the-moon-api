<?php

namespace App\Services;

use App\Services\Interfaces\GetCoordinatesServiceInterface;
use App\Traits\ResponseDataTrait;
use Illuminate\Support\Facades\Http;

class GetCoordinatesService implements GetCoordinatesServiceInterface
{
    use ResponseDataTrait;
    public function index($query)
    {
        $base_URL = env('NOMIMATIM_URL');
        $response = Http::get($base_URL, [
            'q' => $query,
            'format' => env('HTTP_CLIENT_FORMAT'),
            'limit' => 1
        ]);

        $data = $response->json();
        return $data[0];
    }
}
