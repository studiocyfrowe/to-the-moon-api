<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\PostStatusRepositoryInterface;
use App\Services\PostStatusService;
use App\Traits\GetAuthIdTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class PostRepository implements PostRepositoryInterface
{
    use GetAuthIdTrait;

    public function store($data, $status)
    {
        return DB::table('posts')->insert([
            'title' => $data->title,
            'the_excerpt' => $data->the_excerpt,
            'body_text' => $data->body_text,
            'user_id' => $this->getUserId()->id,
            'post_status_id' => $status,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }

    public function update($post, $data)
    {
        return Post::where('id', '=', $post->id)->first();

//        $post->title = $data->title;
//        $post->the_excerpt = $data->the_excerpt;
//        $post->body_text = $data->body_text;
//
//        $post->save();
    }

    public function remove($post)
    {
        // TODO: Implement remove() method.
    }
}
