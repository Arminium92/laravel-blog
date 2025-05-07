@extends('layouts.app')
@section('content')
    <h1>My Posts</h1>
    <hr>
    <hr>
    @foreach ($posts as $post)
        <h2>{{ $post->title }}</h2>
        <p>Created at: {{ $post->jalaliDate }}</p>
        <p>Body: {{ $post->body }}</p>
        <p>Category: {{ $post->category->name ?? 'No Category' }}</p>

        @if (auth()->user()->isAdmin() || $post->user_id === auth()->id())
            <button><a href="{{ route('posts.edit', $post->id) }}">Edit</a></button>
            <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endif

        <hr>
    @endforeach
@endsection
