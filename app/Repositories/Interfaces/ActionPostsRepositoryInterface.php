<?php

namespace App\Repositories\Interfaces;

interface ActionPostsRepositoryInterface
{
    public function storePostByUser($data, $post_status);

    public function editPostByUser($data, $post);

    public function removePostOfUser($post);
}
