@extends('layouts.app')

@section('content')
    <div>
        <h1>Post Details</h1>
        <hr>
        <h2>{{ $post->title }}</h2>
        <p>{{ $post->body }}</p>
        <p>Created at: {{ $post->created_at }}</p>
        <span>Tag: {{ $post->category->name ?? 'No Category' }}</span>
    </div>
@endsection
