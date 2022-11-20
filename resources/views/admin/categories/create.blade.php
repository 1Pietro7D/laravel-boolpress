@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
        <div>
            <label for="name">Category name:</label>
            <input type="text" name="name" maxlength="30" required value="{{ old('name', '') }}">
        </div>
        <div>
            <input type="submit" value="Create">
        </div>
    </form>

@endsection
