@extends('layouts.app')
@section('content')

    <div>


        <h1>{{ $article->title }}</h1>
        <p>{{ $article->full_text }}</p>
        @if ($article->image)
            <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}" alt="{{ $article->title }}" height="400px"/>
        @endif
    </div>
    <a href="{{ route('home') }}" class="btn btn-success">View All Articles</a>

@endsection
