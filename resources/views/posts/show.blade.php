@extends('layouts.app')

@section('content')
    <div>
        <h1>Post Details</h1>
        <hr>
        @if ($post->cover)
            <img src="{{ asset('storage/' . $post->cover) }}" alt="Cover Image" style="max-width: 300px;">
        @endif
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Created at: {{ $post->created_at }}</p>
        <span>Tag: {{ $post->category->name ?? 'No Category' }}</span>

    </div>
    <hr>
    <hr>
    {{-- Add Comment Form --}}
    <div>
        <h3>Add A comment!</h3>
        <hr>
        <form action="{{ route('comments.store') }}" method="post">
            @csrf
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
            <label for="author">Name:</label>
            <br>
            <input type="text" name="author" id="author" required placeholder="John Doe">
            <br><br>
            <label for="body">Comment:</label>
            <br>
            <textarea name="body" id="body" required placeholder="Write your comment here"></textarea>
            <br><br>
            <button type="submit">Submit</button>
        </form>
    </div>
    <hr>
    <hr>
    {{-- Comments List --}}
    <div>
        <h3>Comments:</h3>
        <hr>
        @if ($post->comments->count() > 0)
            @foreach ($post->comments as $comment)
                <div>
                    <p><strong>{{ $comment->author }}</strong></p>
                    <p>{{ $comment->body }}</p>
                </div>
                <hr>
                <hr>
            @endforeach
        @else
            <p>No comments yet.</p>
        @endif
    </div>
@endsection
