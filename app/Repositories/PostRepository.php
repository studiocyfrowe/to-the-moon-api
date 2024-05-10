<?php

namespace App\Repositories;

use App\Models\Post;
use App\Repositories\Interfaces\PostRepositoryInterface;
use App\Repositories\Interfaces\PostStatusRepositoryInterface;
use App\Services\PostStatusService;
use App\Traits\GetAuthIdTrait;
use Carbon\Carbon;
use Faker\Provider\Base;
use Illuminate\Support\Facades\DB;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    use GetAuthIdTrait;

    public function checkIfExists($data)
    {
        return DB::table('posts')->where('id', '=', $data)->exists();
    }

    public function searchData($data)
    {
        return DB::table('posts')->where('id', '=', $data)
            ->with([
                'user'
            ])
            ->first();
    }

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
        $post = DB::table('posts')->where('id', '=', $data)->first();

        $post->title = $data->title;
        $post->the_excerpt = $data->the_excerpt;
        $post->body_text = $data->body_text;

        $post->save();
    }

    public function remove($post)
    {
        // TODO: Implement remove() method.
    }
}
