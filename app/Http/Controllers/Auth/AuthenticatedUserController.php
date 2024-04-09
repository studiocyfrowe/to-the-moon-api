<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Traits\GetAuthIdTrait;
use App\Traits\ResponseDataTrait;
use App\Traits\ResponseFollowDataTrait;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\Request;

class AuthenticatedUserController extends Controller
{
    use ResponseStatusTrait;
    public function store(LoginRequest $loginRequest)
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'token' => $token
        ], 200);
    }


    public function logout() : \Illuminate\Http\JsonResponse
    {
        auth()->logout(true);
        return $this->getMessage();
    }
}
