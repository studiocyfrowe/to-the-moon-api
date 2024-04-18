<?php

namespace App\Repositories\Interfaces;

interface PostRepositoryInterface
{
    public function store($data, $status);

    public function update($post, $data);

    public function remove($post);
}
