<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Http\Requests\SearchUserRequest;
use App\Models\User;
use App\Repositories\UserSearchRepository;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;
use Illuminate\Http\Request;

class UserController extends Controller
{
    use GetMessageTrait;
    use ResponseDataTrait;
    protected UserSearchRepository $userSearchRepository;

    public function __construct(UserSearchRepository $userSearchRepository)
    {
        $this->userSearchRepository = $userSearchRepository;
    }

    public function searchUser(SearchUserRequest $request)
    {
        $nickname = $request->query('nickname');

        if ($request->validated()) {
            if ($this->userSearchRepository->checkIfExists($nickname)) {
                $res = $this->userSearchRepository->searchData($nickname);
                return $res ? $this->getData($res) : $this->responseMessage(ResponseMessagesEnum::ERROR, ResponseStatusEnum::BAD_REQUEST);
            } else {
                return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND, ResponseStatusEnum::NOT_FOUND);
            }
        } else {
            return response()->json(ResponseMessagesEnum::REQUIRED_PARAM, ResponseStatusEnum::UNPROCESSABLE_ENTITY);
        }
    }
}
