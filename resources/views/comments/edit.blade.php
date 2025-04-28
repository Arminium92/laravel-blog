@extends('layouts.app')
@section('content')
    <div>
        <h1>EditComment</h1>
        @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach
        <hr>
        <form action="{{ route('comments.update', $comment->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="author">Author:</label>
            <br>
            <input type="text" id="author" name="author" required value="{{ old('author', $comment->author) }}">
            <br><br>
            <label for="body">Content:</label>
            <br>
            <textarea id="body" name="body" required>
                {{ old('body', $comment->body) }}</textarea>
            <br><br>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection
