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
        $postStatus->name = $data->name;
        $postStatus->save();
    }

    public function editItem($data)
    {
        // TODO: Implement editItem() method.
    }

    public function removeItem($postStatus)
    {
        $postStatus->delete();
    }
}
