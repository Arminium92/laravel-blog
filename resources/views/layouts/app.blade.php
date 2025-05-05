<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>CRUD APP</title>
    </head>

    <body>
        <nav style="width:screen; background-color: grey; padding: 2rem; display: flex; justify-content: space-evenly;">
            <a href="/" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Home</a> |
            <a href="{{ route('posts.index') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Posts</a> |
            <a href="{{ route('categories.index') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Categories</a> |
            <a href="{{ route('posts.create') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Create Post</a> |
            <a href="{{ route('categories.create') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Create Category</a> |
            <a href="{{ route('comments.index') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Comments</a> |
          
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer; border:none;">Logout</button>
            </form> |
            <a href="{{ route('dashboard') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">Dashboard</a> |
            <a href="{{ route('user-posts') }}" style="text-decoration: none; padding: .5rem 1rem; background-color: lightgray; border-radius: .3rem; cursor: pointer;">My posts</a>
        </nav>

        @yield('content')
    </body>

</html>
