<?php

namespace App\Services;

use App\Enum\PostStatusEnum;
use App\Models\PostStatus;
use App\Repositories\GetPostsRepository;
use App\Repositories\PostRepository;
use App\Repositories\PostStatusRepository;
use App\Services\Interfaces\PostStatusServiceInterface;

class PostStatusService implements PostStatusServiceInterface
{
    public PostStatusRepository $postStatusRepository;
    public GetPostsRepository $getPostsRepository;

    public function __construct(PostStatusRepository $postStatusRepository,
                                GetPostsRepository $getPostsRepository)
    {
        $this->postStatusRepository = $postStatusRepository;
        $this->getPostsRepository = $getPostsRepository;
    }

    public function createPostStatus()
    {
        $post_statuses = array(
            PostStatusEnum::PUBLISHED,
            PostStatusEnum::DRAFT,
            PostStatusEnum::HIDDEN
        );

        foreach ($post_statuses as $status) {
            $this->postStatusRepository->storeItem($status);
        }
    }

    public function setPostStatusDefault()
    {
        return PostStatus::latest('id')->first();
    }

    public function changeStatus($post, $postStatus)
    {
        $postDetails = $this->getPostsRepository->getPostDetails($post);
        $postDetails->post_status_id = $postStatus->id;

        $postDetails->save();
    }
}
