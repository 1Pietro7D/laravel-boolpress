@extends('layouts.dashboard')
{{-- trovi lo yield a riga 119 --}}

@section('content')
    <div class="mb-5">
        <a href="{{ route('admin.categories.create') }}">Add new Category</a>
    </div>
    <h2>
        Categories List:
    </h2>

    <ol>
        @foreach ($categories as $category)
            <li>
                <a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a>
            </li>
        @endforeach
    </ol>
@endsection
