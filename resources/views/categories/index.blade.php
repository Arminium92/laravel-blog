@extends('layouts.app')

@section('content')
    <div>
        <h1>Categories</h1>
        <hr>
        @if (Auth::user()->is_admin)
            <ul>
                @foreach ($categories as $category)
                    <li><a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>|
                        @if (Auth::user()->is_admin)
                            <a href="{{ route('categories.edit', $category->id) }}">Edit</a> |
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        @endif
                    </li>
                @endforeach
            </ul>
        @else
            <p>You Are Not allowed to add categories</p>
        @endif
        @if (session('delete'))
            <div>{{ session('delete') }}</div>
        @endif
        @if (session('update'))
            <div>{{ session('update') }}</div>
        @endif
        @if (session('create'))
            <div>{{ session('create') }}</div>
        @endif

    </div>
@endsection
