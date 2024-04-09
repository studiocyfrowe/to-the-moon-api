<?php

namespace App\Http\Controllers;

use App\Models\Follow;
use App\Models\User;
use App\Repositories\FollowRepository;
use App\Repositories\UserSearchRepository;
use App\Services\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
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
        //check user is already followed
        $checkFollow = $this->followRepository->checkIfFollowExists($user);

        //check user if not found
        $followed = $this->userSearchRepository->searchUserById($user);

        //check user cannot follow himself
        if (auth()->user()->id == $user->id) {
            return response()->json([
                'data' => 'You cannot follow yourself'
            ], 400);
        }

        if (!$checkFollow) {
            $this->followService->followUser($followed);
        } else {
            return response()->json([
                'data' => 'User is already followed'
            ], 404);
        }
    }

    public function getUnFollowUser(User $user)
    {
        $followed = $this->userSearchRepository->searchUserById($user->id);
        if ($followed) {
            $this->followService->unFollowUser($followed);
        } else {
            return response()->json([
                'data' => 'User not found'
            ], 404);
        }
    }
}
