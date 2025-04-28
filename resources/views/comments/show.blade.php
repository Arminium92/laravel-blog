@extends('layouts.app')
@section('content')
    <div>
        <h1>Comment Details</h1>
        <hr>
        <p>Content: {{ $comment->body }}</p>
        <p>Author: {{ $comment->author }}</p>
        <p>Created At: {{ $comment->created_at }}</p>
    </div>
@endsection
