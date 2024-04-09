<?php

namespace App\Repositories\Interfaces;

interface PostStatusRepositoryInterface
{
    public function getAll();

    public function storeItem($data);

    public function editItem($data);

    public function removeItem($postStatus);
}
