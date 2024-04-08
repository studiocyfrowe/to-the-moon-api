<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\UserPostsRepositoryInterface;

class UserPostsRepository implements UserPostsRepositoryInterface
{
    public function getPostsOfUser()
    {
        $res = Post::where('user_id', '=', auth()->user()->id)
            ->with([
                'user', 'post_status'
            ])
            ->get();

        return $res;
    }

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
        // TODO: Implement removePostOfUser() method.
    }
}
