<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\UserSearchRepository;
use App\Services\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public FollowService $followService;
    public UserSearchRepository $userSearchRepository;

    public function __construct(FollowService $followService,
                                UserSearchRepository $userSearchRepository)
    {
        $this->followService = $followService;
        $this->userSearchRepository = $userSearchRepository;
    }

    public function getFollowUser(User $user)
    {
        $followed = $this->userSearchRepository->searchUserById($user->id);
        if ($followed) {
            $this->followService->followUser($followed);
        } else {
            return response()->json([
                'data' => 'User not found'
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
