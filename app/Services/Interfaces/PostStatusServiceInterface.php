<?php

namespace App\Services\Interfaces;

interface PostStatusServiceInterface
{
    public function createPostStatus();

    public function setPostStatusDefault();

    public function changeStatus($post, $postStatus);
}
