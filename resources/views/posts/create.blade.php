@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Post</h1>
        @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <hr>
        <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div>
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" required>
                <br><br>
            </div>
            <div>
                <label for="body">Body</label>
                <br>
                <textarea name="body" id="body" required></textarea>
                <br><br>
            </div>
            <div>
                <label for="category_id">Category</label>
                <br>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                <br><br>
            </div>
            <button type="submit">Create Post</button>
        </form>
    </div>
@endsection
