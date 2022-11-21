@extends('layouts.dashboard')

@section('content')
    <form action="{{ route('admin.tags.update', $tag->slug) }}" method="POST">
    @csrf
    @method('PUT')

        <div @error('name') class="is-invalid" @enderror>
            <label for="name">Tag name:</label>
            <input type="text" name="name"  maxlength="30" required value="{{ old('name', $tag->name) }}">
        </div>
        <div>
            <input type="submit" value="Update">
        </div>
    </form>
@endsection
