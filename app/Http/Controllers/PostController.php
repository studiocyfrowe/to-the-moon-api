<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\ActionPostsRepository;
use App\Repositories\GetPostsRepository;
use App\Traits\ResponseDataTrait;

class PostController extends Controller
{
    use ResponseDataTrait;
    public GetPostsRepository $getPostsRepository;

    public function __construct(GetPostsRepository $getPostsRepository)
    {
        $this->getPostsRepository = $getPostsRepository;
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
