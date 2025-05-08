@extends('layouts.app')
@section('content')
    <h1>My Comments</h1>
    <hr>
    <hr>
    @foreach ($comments as $comment)
        <h2>{{ $comment->author }}</h2>
        <p>Created at: {{ $comment->jalaliDate }}</p>
        <p>Body: {{ $comment->body }}</p>

        @if (auth()->user()->isAdmin() || $comment->user_id === auth()->id())
            <button><a href="{{ route('comments.edit', $comment->id) }}">Edit</a></button>
            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif

        <hr>
    @endforeach
@endsection
