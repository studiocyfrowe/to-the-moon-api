<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\ActionPostsRepositoryInterface;

class ActionPostsRepository implements ActionPostsRepositoryInterface
{
    public function storePostByUser($data, $post_status)
    {
        $post = new Post();

        $post->title = $data->title;
        $post->the_excerpt = $data->the_excerpt;
        $post->body_text = $data->body_text;
        $post->post_status_id = $post_status->id;
        $post->user_id = auth()->user()->id;

        $post->save();

        return $post;
    }

    public function editPostByUser($data, $post)
    {
        // TODO: Implement editPostByUser() method.
    }

    public function removePostOfUser($post)
    {
        $post->delete();
    }
}
