@extends('layouts.app')

@section('content')
    <div>
        <h1>Create Category</h1>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
        <hr>
        @if (Auth::user()->is_admin)
            <form action="{{ route('categories.store') }}" method="post">
                @csrf
                <div>
                    <label for="name">Category Name:</label>
                    <br>
                    <input type="text" name="name" id="name" required>
                    <br><br>
                </div>
                <button type="submit">Create</button>
            </form>
        @else
            <p>You Are Not allowed to add categories</p>
        @endif

    </div>
@endsection
