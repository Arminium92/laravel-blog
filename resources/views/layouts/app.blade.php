<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CRUD APP</title>
    </head>

    <body>
        <nav>
            <a href="/">Home</a> |
            <a href="{{route('posts.index')}}">Posts</a> |
            <a href="{{route('categories.index')}}">Categories</a> |
            <a href="{{route('posts.create')}}">Create Post</a> |
            <a href="{{route('categories.create')}}">Create Tag</a> |
            <a href="/">Login</a> |
            <a href="/">Register</a> |
        </nav>

        @yield('content')
    </body>

</html>
