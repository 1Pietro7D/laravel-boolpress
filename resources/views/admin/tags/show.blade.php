@extends('layouts.dashboard')

@section('content')
    <h1>{{ $tag->name }}</h1>

    @foreach ($tag->posts as $post)
        <div>
            <a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a>
        </div>

    @endforeach
    <div class="mt-3">
        <a href="{{ route('admin.tags.edit', $tag->slug) }}">Edit tag</a>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin.tags.index') }}">BACK TO THE TAGS LIST</a>
    </div>
    <div>
        <form class="mt-3" method="POST" action="{{ route('admin.tags.destroy', $tag->slug) }}">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Do you really want to delete this tag?')" type="submit" value="Delete">
        </form>
    </div>
@endsection
