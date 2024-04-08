<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\UserPostsRepository;
use App\Traits\ResponseDataTrait;

class PostController extends Controller
{
    use ResponseDataTrait;
    public UserPostsRepository $userPostsRepository;

    public function __construct(UserPostsRepository $userPostsRepository)
    {
        $this->userPostsRepository = $userPostsRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function indexOfUser()
    {
        $res = $this->userPostsRepository->getPostsOfUser();
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
