<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::latest()->get();
        // return response()->json($posts);
        // return new PostResource($posts);
        return PostResource::collection($posts);
    }

    public function show(Post $post)
    {
        return new PostResource($post);
    }
}
