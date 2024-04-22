<?php

namespace App\Http\Controllers;

use App\Enum\ResponseStatusEnum;
use App\Models\Follow;
use App\Models\User;
use App\Repositories\FollowRepository;
use App\Repositories\UserSearchRepository;
use App\Services\FollowService;
use App\Traits\GetMessageTrait;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    use GetMessageTrait;
    public FollowService $followService;
    public UserSearchRepository $userSearchRepository;
    public FollowRepository $followRepository;

    public function __construct(FollowService $followService,
                                UserSearchRepository $userSearchRepository,
                                FollowRepository $followRepository)
    {
        $this->followService = $followService;
        $this->userSearchRepository = $userSearchRepository;
        $this->followRepository = $followRepository;
    }

    public function getFollowUser(User $user)
    {
        $checkFollow = $this->followRepository->checkIfFollowExists($user);

        $followed = $this->userSearchRepository->searchUserById($user);

        if (auth()->user()->id == $user->id) {
            $this->responseMessage('You cannot follow yourself',
                ResponseStatusEnum::BAD_REQUEST);
        }

        if (!$checkFollow) {
            $this->followService->followUser($followed);
        } else {
            $this->responseMessage('User is already followed',
                ResponseStatusEnum::BAD_REQUEST);
        }
    }

    public function getUnFollowUser(User $user)
    {
        $followed = $this->userSearchRepository->searchUserById($user->id);
        if ($followed) {
            $this->followService->unFollowUser($followed);
        } else {
            $this->responseMessage('User not found',
                ResponseStatusEnum::BAD_REQUEST);
        }
    }
}
