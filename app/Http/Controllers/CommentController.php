<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
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
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|min:3',
            'body' => 'required|string|min:20|max:300',
        ]);

        $comment = new Comment();
        $comment->author = $request->author;
        $comment->body = $request->body;

        $comment->save();

        return redirect()->route('comments.index')->with('create', 'Comment created successfully.');
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
        return view('comments.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        $request->validate([
            'author' => 'required|string|min:3',
            'body' => 'required|string|min:20|max:300',
        ]);

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
        $comment->delete();
        return redirect()->route('comments.index')->with('delete', 'Comment deleted successfully.');
    }
}
