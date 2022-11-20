@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Category name:</label>
            <input type="text" name="name"  maxlength="30" required value="{{ old('name', $category->name) }}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
@endsection
