<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Http\Requests\SearchUserRequest;
use App\Models\User;
use App\Repositories\UserSearchRepository;
use App\Traits\GetMessageTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use GetMessageTrait;
    protected $userSearchRepository;

    public function __construct(UserSearchRepository $userSearchRepository)
    {
        $this->userSearchRepository = $userSearchRepository;
    }

    public function searchUser(SearchUserRequest $request)
    {
        $nickname = $request->query('nickname');

        if ($request->validated()) {
            if ($this->userSearchRepository->checkUserExists($nickname)) {
                $res = $this->userSearchRepository->searchUserByUniqueNickname($nickname);
                return $res ? response()->json($res, 200) : $this->responseMessage(ResponseMessagesEnum::ERROR, 400);
            } else {
                return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND, 404);
            }
        } else {
            return response()->json('Nickname is required', 400);
        }
    }
}
