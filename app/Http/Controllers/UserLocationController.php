<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLocationRequest;
use App\Services\UrlBuilderService;
use App\Services\UserLocationService;
use App\Traits\GetAuthIdTrait;
use Illuminate\Http\JsonResponse;

class UserLocationController extends Controller
{
    use GetAuthIdTrait;
    private static string $url_format = 'json';
    public UserLocationService $userLocationService;

    public function __construct(UserLocationService $userLocationService)
    {
        $this->userLocationService = $userLocationService;
    }

    public function create(UserLocationRequest $request) : JsonResponse
    {
        $data = array(
            'q' => $request->location_name,
            'format' => self::$url_format
        );

        $res = $this->userLocationService->createLocation($data, $this->getUserId());
        return response()->json($res, 200);
    }
}
