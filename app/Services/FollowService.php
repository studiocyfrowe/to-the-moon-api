<?php

namespace App\Services;

use App\Models\Follow;
use App\Repositories\FollowRepository;
use App\Services\Interfaces\FollowServiceInterface;
use App\Traits\GetAuthIdTrait;
use Illuminate\Http\JsonResponse;

class FollowService implements FollowServiceInterface
{
    use GetAuthIdTrait;
    public FollowRepository $followRepository;

    public function __construct(FollowRepository $followRepository)
    {
        $this->followRepository = $followRepository;
    }

    public function followUser($followed)
    {
        $this->followRepository->followUser($this->getUserId(), $followed);
    }

    public function unFollowUser($followed)
    {
        $getFollow = $this->followRepository->checkIfFollowExists(
            $this->getUserId()->id,
            $followed
        );

        $getFollow->delete();
    }

    public function getFollowedUsers($user)
    {
        $getFollowed = $this->followRepository->getFollowedUsersBySingleUser($user);
        return $getFollowed;
    }

    public function getFollowingUsers($user)
    {
        $getFollowings = $this->followRepository->getFollowingUsersOfSingleUser($this->getUserId());
        return $getFollowings;
    }
}
