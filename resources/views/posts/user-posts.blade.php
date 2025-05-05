@extends('layouts.app')
@section('content')
<h1>My Posts</h1>
<hr><hr>
@foreach ($posts as $post )
<h2>{{$post->title}}</h2>
<p>Created at: {{$post->jalaliDate}}</p>
<p>Body: {{$post->body}}</p>
<p>Category: {{$post->category->name ?? 'No Category'}}</p>
<hr>
@endforeach
@endsection