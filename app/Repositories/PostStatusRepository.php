<?php

namespace App\Repositories;

use App\Models\PostStatus;
use App\Repositories\Interfaces\PostStatusRepositoryInterface;

class PostStatusRepository implements PostStatusRepositoryInterface
{
    public function getAll()
    {
        return PostStatus::with('posts')->get();
    }

    public function storeItem($data)
    {
        $postStatus = new PostStatus();
        $postStatus->name = $data;
        $postStatus->save();
    }

    public function removeItem($postStatus)
    {
        $postStatus->delete();
    }
}
