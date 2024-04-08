<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public FollowService $followService;

    public function __construct(FollowService $followService)
    {
        $this->followService = $followService;
    }

    public function getFollowUser(User $user)
    {

    }
}
