<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Log::info('Visited Comments List');
        $searchQuery = $request->keyword;
        $error = '';

        if ($searchQuery) {
            $comments = Comment::where('author', 'LIKE', '%' . $searchQuery . "%")->get();
            if($comments->isEmpty()) {
                $error = 'Author does not exist.';
            }
            // dd($comments);
        } else {
            $comments = Comment::all();
        }
        return view('comments.index', compact('comments', 'error'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {


        $comment = new Comment();
        $comment->author = $request->author;
        $comment->body = $request->body;
        $comment->post_id = $request->post_id;
        $comment->user_id = Auth::id();

        $comment->save();

        return redirect()->back()->with('success_comment', 'Comment added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $user = Auth::user();
        if (!$user->is_admin && $comment->user_id !== $user->id) {
            return abort('403', 'Action is unauthorized!');
        }
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $user = Auth::user();
        if (!$user->is_admin && $comment->user_id !== $user->id) {
            return abort('403', 'Action is unauthorized!');
        }
        $comment->author = $request->author;
        $comment->body = $request->body;
        $comment->save();

        return redirect()->route('comments.index')->with('update', 'Comment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $user = Auth::user();
        if (!$user->is_admin && $comment->user_id !== $user->id) {
            return abort('403', 'Action is unauthorized!');
        }
        $comment->delete();
        return redirect()->route('comments.index')->with('delete', 'Comment deleted successfully.');
    }

    public function userComments()
    {
        $userId = Auth::id();
        $comments = Comment::where('user_id', $userId)->get();
        return view('comments.user-comments', compact('comments'));
    }

    public function inertiaIndex() {
        $comments = Comment::latest()->get();

        return Inertia::render('comments/Index', compact('comments'));
    }
}
