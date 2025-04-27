@extends('layouts.app')

@section('content')
    <div>
        <h1>Edit Category</h1>
        @foreach ($errors->all() as $error)
            <li>
                {{ $error }}
            </li>
        @endforeach
        <hr>
        <form action="{{ route('categories.update', $category->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="name">category Name:</label>
                <br>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" required>
                <br><br>
            </div>
            <button type="submit">Update</button>
        </form>
        <hr>
        @if (session('update'))
            <div>{{ session('update') }}</div>
        @endif
    </div>
@endsection
