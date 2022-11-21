@extends('layouts.dashboard')
{{-- trovi lo yield a riga 119 --}}

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.tags.create') }}">Add new Tag</a>
    </div>
    <h2>
        Tags List:
    </h2>

    <ol>
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('admin.tags.show', $tag->slug) }}">{{ $tag->name }}</a>
            </li>
        @endforeach
    </ol>
@endsection
