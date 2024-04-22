<?php

namespace App\Http\Controllers;

use App\Enum\ResponseStatusEnum;
use App\Http\Requests\UpdateUserDetailsRequest;
use App\Models\User;
use App\Repositories\RegisteredUserRepository;
use App\Services\FollowService;
use App\Traits\GetAuthIdTrait;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;
use App\Traits\ResponseFollowDataTrait;
use App\Traits\ResponseStatusTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    use ResponseStatusTrait, ResponseDataTrait, GetAuthIdTrait, ResponseFollowDataTrait, GetMessageTrait;
    public FollowService $followService;
    public RegisteredUserRepository $registeredUserRepository;

    public function __construct(FollowService $followService, RegisteredUserRepository $registeredUserRepository)
    {
        $this->followService = $followService;
        $this->registeredUserRepository = $registeredUserRepository;
    }

    public function getDataProfile(): \Illuminate\Http\JsonResponse
    {
        return $this->getData(auth()->user());
    }

    public function getFollowedUsersByAuthUser() : JsonResponse
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
        $authUser = $this->getUserId();
        $getDetailsMe = User::where('id', '=', $authUser->id)->first();

        $this->registeredUserRepository->updateUser($getDetailsMe, $request);

        $this->responseMessage('User has been updated!',
            ResponseStatusEnum::SUCCESS);
    }
}
