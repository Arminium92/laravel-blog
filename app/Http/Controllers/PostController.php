<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

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
            $posts = Post::where('title', ' ', '%' . $searchQuery . '%')->get();
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
        $imageManager = new ImageManager(new Driver());

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::id();

        if ($request->hasFile('cover')) {
            // 1. Load the uploaded Image
            $image = $request->file('cover');
            // 2. Manipulate the image
            $img = $imageManager->read($image)
                ->scale(400, 300)->blur(30)->toPng();
            // 3. Save the image to storage
            $filename = 'uploads/' . uniqid() . '.png';
            Storage::disk('public')->put($filename, $img->toString());

            $post->cover = $filename;
        }

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
        $user = Auth::user();
        if (!$user->is_admin && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized action!');
        }
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $user = Auth::user();
        if (!$user->is_admin && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized action!');
        }
        $post->title = $request->title;
        $post->body = $request->body;
        $post->category_id = $request->category_id;
        if ($request->hasFile('cover')) {
            $post->cover = $request->file('cover')->store('uploads', 'public');
        }
        $post->save();

        return redirect()->route('posts.index')->with('update', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user = Auth::user();
        if (!$user->is_admin && $post->user_id !== $user->id) {
            abort(403, 'Unauthorized action!');
        }
        $post->delete();
        return redirect()->route('posts.index')->with('delete', 'Post deleted successfully.');
    }

    public function userPosts()
    {
        $userId = Auth::id();
        $posts = Post::where('user_id', $userId)->get();
        return view('posts.user-posts', compact('posts'));
    }

    public function inertiaIndex()
    {
        $posts = Post::latest()->get();
        return Inertia::render('posts/Index', compact('posts'));
    }

    public function inertiaShow(Post $post)
    {
        return Inertia::render('posts/show')->with(['post' => $post]);
    }
}
