@extends('layouts.app')

@section('content')
    <div>
        <h1>Posts</h1>
        <hr>

        <form action="">
            <input type="text" name="keyword" id="keyword">
            <select name="category_id" id="category_id">
                <option value="">Select category</option>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <input type="submit" value="search">
        </form>

        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>|
                    <span>{{ $post->jalaliDate }}</span>
                    <a href="{{ route('posts.edit', $post->id) }}">Edit</a> |
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form> | Category: {{ $post->category->name ?? 'No Category' }}

                </li>
            @endforeach
        </ul>
        @if (session('delete'))
            <div>{{ session('delete') }}</div>
        @endif
        @if (session('update'))
            <div>{{ session('update') }}</div>
        @endif
        @if (session('comment-error'))
            <div>
                <h2 class="text-red-500">{{ session('comment-error') }}</h2>
            </div>
        @endif
    </div>
@endsection
