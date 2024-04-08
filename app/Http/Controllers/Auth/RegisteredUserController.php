<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Repositories\RegisteredUserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public RegisteredUserRepository $registeredUserRepository;

    public function __construct(RegisteredUserRepository $registeredUserRepository)
    {
        $this->registeredUserRepository = $registeredUserRepository;
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        $this->registeredUserRepository->createUser($request);

        return response()->json([
            'status' => 'User has been created!'
        ], 200);
    }
}
