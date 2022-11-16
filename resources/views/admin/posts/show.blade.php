@extends('layouts.dashboard')

@section('content')
    <div class="py-2">
        Title: {{ $post->title }}
    </div>
    <div class="py-2">
        Content: {{ $post->content }}
    </div>
    <div class="mt-3">
        <a href="{{ route('admin.posts.edit', $post->id) }}">Edit Post</a>
    </div>
    <div>
        <form class="mt-3" method="POST" action="{{ route('admin.posts.destroy', $post->id) }}">
            @csrf
            @method('DELETE')
            <input onclick="return confirm('Do you really want to delete this post?')" type="submit" value="Delete">
        </form>
    </div>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
