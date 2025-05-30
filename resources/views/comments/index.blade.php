@extends('layouts.app')
@section('content')
    <div>
        <h1>Comments List</h1>
        @if (session('create'))
            <span>{{ session('create') }}</span>
        @endif

        @if (session('update'))
            <span>{{ session('update') }}</span>
        @endif

        @if (session('delete'))
            <span>{{ session('delete') }}</span>
        @endif

        @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach
        <hr>
        @if (Auth::user()->is_admin)
            <form action="">
                @csrf
                <input type="text" name="keyword" id="keyword" placeholder="search comment">
                <input type="submit" value="search">
            </form>
            <ul>

                @if (!empty($error))
                    <p class="text-red-500">{{ $error }}</p>
                @endif

                @foreach ($comments as $comment)
                    <li>
                        <a href="{{ route('comments.show', $comment->id) }}">{{ $comment->body }}
                            <span>
                                | {{ $comment->created_at }}
                            </span>| <span>{{ $comment->author }}</span>
                        </a><span>|</span>
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('comments.edit', $comment->id) }}">Edit</a> |
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endif

                    </li>
                @endforeach
            @else
                <p>You are not allowed to see all comments</p>
            </ul>
        @endif

    </div>
@endsection
