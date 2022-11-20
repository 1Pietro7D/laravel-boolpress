@extends('layouts.dashboard')

@section('content')
    <h1 class="py-2">
        Title: {{ $post->title }}
    </h1>
    <p class="py-2">
        Content: {{ $post->content }}
    </p>
    @if( $post->category )
    <p class="py-2">
        Category: {{ $post->category->name }}
    </p>
    @else
    <p>
        Nothing category
    </p>
    @endif
    <div>
        <img src="{{ asset('storage/' . $post->cover_path) }}" alt="{{ $post->title }}">
    </div>
    <div>
        Tags:
        @foreach ($post->tags as $tag)
            <span>{{ $tag->name }}</span>
        @endforeach
    </div>
    <div class="mt-3">
        <a href="{{ route('admin.posts.edit', $post->slug) }}">Edit Post</a>
    </div>
    <div>
        <form class="mt-3" method="POST" action="{{ route('admin.posts.destroy', $post->slug) }}">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Do you really want to delete this post?')" type="submit" value="Delete">
        </form>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
