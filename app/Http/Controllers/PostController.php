<?php

namespace App\Http\Controllers;

use App\Enum\ResponseMessagesEnum;
use App\Enum\ResponseStatusEnum;
use App\Models\Movie;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostStatus;
use App\Repositories\ActionPostsRepository;
use App\Repositories\GetPostsRepository;
use App\Repositories\PostRepository;
use App\Services\PostStatusService;
use App\Traits\GetAuthIdTrait;
use App\Traits\GetMessageTrait;
use App\Traits\ResponseDataTrait;
use App\Traits\ResponseStatusTrait;

class PostController extends Controller
{
    use ResponseDataTrait, GetAuthIdTrait, GetMessageTrait;
    public GetPostsRepository $getPostsRepository;
    public PostStatusService $postStatusService;
    public PostRepository $postRepository;

    public function __construct(GetPostsRepository $getPostsRepository,
                                PostStatusService $postStatusService,
                                PostRepository $postRepository)
    {
        $this->getPostsRepository = $getPostsRepository;
        $this->postStatusService = $postStatusService;
        $this->postRepository = $postRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function indexOfUser()
    {
        $res = $this->getPostsRepository->getAllOfAuthUser();
        return $this->getData($res);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request, Movie $movie)
    {
        $status = $this->postStatusService->setPostStatusDefault();
        $this->postRepository->store($request, $status->id, $movie);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if ($this->postRepository->checkIfExists($post->id)) {
            $res = $this->getPostsRepository->getPostDetails($post);
            return $res ? $this->getData($res) : $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    public function changeStatus(Post $post, PostStatus $postStatus)
    {
        $this->postStatusService->changeStatus($post, $postStatus);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        if ($this->postRepository->checkIfExists($post->id)) {
            $this->postRepository->update($request, $post->id);
        } else {
            return $this->responseMessage(ResponseMessagesEnum::NOT_FOUND,
                ResponseStatusEnum::NOT_FOUND);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
