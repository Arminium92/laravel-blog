@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Post</h1>
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
        <form action="{{ route('posts.update', $post->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="title">Title</label>
                <br>
                <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}" required>
                <br><br>
            </div>
            <div>
                <label for="body">Body</label>
                <br>
                <textarea name="body" id="body" required>{{ old('body', $post->body) }}</textarea>
                <br><br>
            </div>
            <div>
                <label for="category_id">Category</label>
                <br>
                <select name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <br><br>
            </div>
            <button type="submit">Update Post</button>
        </form>
        @if (session('create'))
            <div>{{ session('create') }}</div>
        @endif
    </div>
    </div>
@endsection
