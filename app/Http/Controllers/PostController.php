<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info('Visited Posts List');
        // dd($request->all());
        $searchQuery = $request->keyword;
        $searchCat = $request->category_id;
        

        $posts = Post::all();
        $categories = Category::all();
        if ($searchQuery) {
            $posts = Post::where('title', 'LIKE', '%' . $searchQuery . '%')->get();
        }
        if ($searchQuery && $searchCat) {
            $posts = Post::where('title', 'LIKE', '%' . $searchQuery . '%')->where('category_id', '=', $searchCat)->get();
        }
        // dd($posts);

        return view('posts.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        $post->save();

        return redirect()->route('posts.index')->with('create', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string|min:3',
            'body' => 'required|string|max:100',
        ]);

        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;

        return redirect()->route('posts.index')->with('update', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('delete', 'Post deleted successfully.');
    }
}
