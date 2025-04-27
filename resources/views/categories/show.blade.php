@extends('layouts.app')

@section('content')
    <div>
        <h1>Category Details</h1>
        <hr>
        <h2>{{ $category->name }}</h2>
        <p>Created at: {{ $category->created_at }}</p>
        <div>Related Posts
            <ul>
                @foreach ($category->posts as $post)
                    <li><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
