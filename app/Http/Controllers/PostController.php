<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\PostStatus;
use App\Repositories\ActionPostsRepository;
use App\Repositories\GetPostsRepository;
use App\Repositories\PostRepository;
use App\Services\PostStatusService;
use App\Traits\GetAuthIdTrait;
use App\Traits\ResponseDataTrait;

class PostController extends Controller
{
    use ResponseDataTrait, GetAuthIdTrait;
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
        return $res ? $this->getData($res) : null;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $status = $this->postStatusService->setPostStatusDefault();
        $this->postRepository->store($request, $status->id);

        return response()->json('Success', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $res = $this->getPostsRepository->getPostDetails($post);
        return response()->json($res, 200);
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
        $res = $this->postRepository->update($request, $post);
        return response($res, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
