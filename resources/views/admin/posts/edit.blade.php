@extends('layouts.dashboard')

@section('content')
    @if ($errors->any())
        <h2>Form errors: please fill all spaces correctly!</h2>
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="P" action="{{ route('admin.posts.update', $post->id) }}">
        @csrf
        @method('PATCH')
        {{-- title --}}
        <div>
            <label for="title">Title:</label>
            <input required maxlength="255" type="text" name="title" value="{{ old('title', $post->title) }}">
            @error('title')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>
         {{-- categories --}}
         <div>
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id">
                <option value="">Nothing</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $category->id) ? 'selected' : '' }} >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        {{-- Content --}}
        <div>
            <label for="content">Content:</label>
            <textarea required name="content" cols="30" rows="10">{{ old('content', $post->content) }}</textarea>
            @error('content')
                <div class="my-2 bg-danger text-white">
                    {{ $message }}
                </div>
            @enderror
        </div>

         {{-- Tags --}}
         @if ($errors->any())
         <div>
            <h3>Tags:</h3>
            @foreach ($tags as $tag)
                <input
                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}">
                <label for="tags[]">{{ $tag->name }}</label>
            @endforeach
        </div>
        @else
        <div>
            <h3>Tags:</h3>
            @foreach ($tags as $tag)
                <input
                {{ $post->tags->contains($tag) ? 'checked' : '' }}
                type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}">
                <label for="tags[]">{{ $tag->name }}</label>
            @endforeach
        </div>
        @endif
        {{-- versione alternativa --}}
        {{-- <div>
            <h3>Tags:</h3>
            @foreach ($tags as $tag)
                <label for="tags[]">{{ $tag->name }}</label>
                @if($errors->any())
                <input
                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
                type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}">
                @else
                <input
                {{ $post->tags->contains($tag) ? 'checked' : '' }}
                type="checkbox" name="tags[]" id="tags[]" value="{{ $tag->id }}">
                @endif
            @endforeach
        </div> --}}

        <input type="submit" value="Apply changes">
    </form>
    <div class="mt-5">
        <a href="{{ route('admin.posts.index') }}">BACK TO THE POSTS LIST</a>
    </div>
@endsection
