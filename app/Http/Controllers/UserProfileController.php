<?php

namespace App\Http\Controllers;

use App\Traits\ResponseStatusTrait;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use ResponseStatusTrait;
    public function getDataProfile(): \Illuminate\Http\JsonResponse
    {
        return response()->json(auth()->user(), 200);
    }

    public function logout() : \Illuminate\Http\JsonResponse
    {
        auth()->logout(true);
        return $this->getMessage();
    }
}
