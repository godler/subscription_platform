<?php

namespace App\Http\Controllers;

use App\Actions\Post\PostCreator;
use App\Http\Requests\CreatePostRequest;
use App\Http\Resources\PostResource;
use Illuminate\Http\JsonResponse;


class PostController extends Controller
{
    public function __construct(private PostCreator $creator)
    {
    }

    /**
     * @param  CreatePostRequest  $request
     * @return JsonResponse
     */
    public function store(CreatePostRequest $request): JsonResponse
    {
        $post = $this->creator->create($request->toArray());

        if($post)
        {
            return response()->json(new PostResource($post));
        }

        return response()->json(['message' => 'Something went wrong']);
    }
}
