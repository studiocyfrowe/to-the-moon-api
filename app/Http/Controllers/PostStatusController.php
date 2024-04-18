<?php

namespace App\Http\Controllers;

use App\Models\PostStatus;
use App\Http\Requests\StorePostStatusRequest;
use App\Http\Requests\UpdatePostStatusRequest;
use App\Repositories\PostStatusRepository;
use App\Services\PostStatusService;
use App\Traits\ResponseDataTrait;

class PostStatusController extends Controller
{
    use ResponseDataTrait;
    public PostStatusRepository $postStatusRepository;
    public PostStatusService $postStatusService;

    public function __construct(PostStatusRepository $postStatusRepository, PostStatusService $postStatusService)
    {
        $this->postStatusRepository = $postStatusRepository;
        $this->postStatusService = $postStatusService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $res = $this->postStatusRepository->getAll();
        return response()->json($res, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $this->postStatusService->createPostStatus();
    }

    /**
     * Display the specified resource.
     */
    public function show(PostStatus $postStatus)
    {
        $postStatus = PostStatus::where('id', '=', $postStatus->id)->first();
        return $this->getData($postStatus, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostStatus $postStatus)
    {
        $this->postStatusRepository->removeItem($postStatus);
    }
}
