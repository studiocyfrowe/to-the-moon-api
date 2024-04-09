<?php

namespace App\Http\Controllers;

use App\Models\PostStatus;
use App\Http\Requests\StorePostStatusRequest;
use App\Http\Requests\UpdatePostStatusRequest;
use App\Repositories\PostStatusRepository;
use App\Traits\ResponseDataTrait;

class PostStatusController extends Controller
{
    use ResponseDataTrait;
    public PostStatusRepository $postStatusRepository;

    public function __construct(PostStatusRepository $postStatusRepository)
    {
        $this->postStatusRepository = $postStatusRepository;
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
    public function store(StorePostStatusRequest $request)
    {
        $postStatus = new PostStatus();

        $postStatus->name = $request->name;
        $postStatus->save();

        return $this->getData($postStatus);
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
     * Update the specified resource in storage.
     */
    public function update(UpdatePostStatusRequest $request, PostStatus $postStatus)
    {
        $postStatus = PostStatus::where('id', '=', $postStatus->id)->first();

        $postStatus->name = $request->name;
        $postStatus->save();

        return response()->json([
            'status' => 'Post Status has been updated!'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostStatus $postStatus)
    {
        $this->postStatusRepository->removeItem($postStatus);
    }
}
