<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserDetailsRequest;
use App\Models\User;
use App\Services\FollowService;
use App\Traits\GetAuthIdTrait;
use App\Traits\ResponseDataTrait;
use App\Traits\ResponseFollowDataTrait;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use ResponseStatusTrait, ResponseDataTrait, GetAuthIdTrait, ResponseFollowDataTrait;
    public FollowService $followService;

    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    public function getDataProfile(): \Illuminate\Http\JsonResponse
    {
        return response()->json(auth()->user(), 200);
    }

    public function getFollowedUsersByAuthUser()
    {
        $res = $this->followService->getFollowedUsers($this->getUserId());
        $count_users = count($res);
        return $this->getFollows($count_users, $res);
    }

    public function getFollowingUsersByAuthUser() : JsonResponse
    {
        $res = $this->followService->getFollowingUsers($this->getUserId());
        $count_users = count($res);
        return $this->getFollows($count_users, $res);
    }

    public function updateUserDetails(UpdateUserDetailsRequest $request)
    {
        $getDetailsMe = User::where('id', '=', $this->getUserId()->id)->first();

        $getDetailsMe->first_name = $request->first_name;
        $getDetailsMe->last_name = $request->last_name;
        $getDetailsMe->save();

        return response()->json([
            'status' => 'User has been updated!'
        ], 200);
    }
}
