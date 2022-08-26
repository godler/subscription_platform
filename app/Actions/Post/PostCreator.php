<?php

namespace App\Actions\Post;

use App\Events\PostCreated;
use App\Models\Post;

class PostCreator
{

    public function create(array $attributes)
    {
        $post = Post::create($attributes);

        if($post){

            PostCreated::dispatch($post);

            return $post;
        }
    }
}
