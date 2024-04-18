<?php

namespace App\Services;

use App\Models\UserLocation;
use App\Services\Interfaces\UserLocationServiceInterface;
use Illuminate\Support\Facades\Http;

class UserLocationService implements UserLocationServiceInterface
{
    public UrlBuilderService $urlBuilderService;

    public function __construct(UrlBuilderService $urlBuilderService)
    {
        $this->urlBuilderService = $urlBuilderService;
    }

    public function searchLocation($keyword)
    {
        $get_url = $this->urlBuilderService->create($keyword);

        $res = Http::get($get_url);
        $api_result = $res->json();
        $get = $api_result[0];

        return $get;
    }

    public function createLocation($keyword, $user)
    {
        $location = $this->searchLocation($keyword);

        $user_location = new UserLocation();

        $user_location->name = $location['name'];
        $user_location->lat = $location['lat'];
        $user_location->lng = $location['lon'];
        $user_location->user_id = $user->id;

        $user_location->save();

        return $user_location;
    }
}
