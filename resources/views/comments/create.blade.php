@extends('layouts.app')
@section('content')
    <div>
        <h1>Add New Comment</h1>
        @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach
        <hr>
        <form action="{{ route('comments.store') }}" method="POST">
            @csrf
            <label for="author">Author:</label>
            <br>
            <input type="text" id="author" name="author" required>
            <br><br>
            <label for="body">Content:</label>
            <br>
            <textarea id="body" name="body" required></textarea>
            <br><br>
            <button type="submit">Save</button>
        </form>
    </div>
@endsection
