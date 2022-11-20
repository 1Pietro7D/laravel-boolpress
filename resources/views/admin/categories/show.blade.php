@extends('layouts.dashboard')

@section('content')
    <h1>{{ $category->name }}</h1>

    @foreach ($category->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>

    @endforeach
    <div class="mt-3">
        <a href="{{ route('admin.categories.edit', $category->id) }}">Edit Category</a>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin.categories.index') }}">BACK TO THE CATEGORIES LIST</a>
    </div>
    <div>
        <form class="mt-3" method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Do you really want to delete this category?')" type="submit" value="Delete">
        </form>
    </div>
@endsection
