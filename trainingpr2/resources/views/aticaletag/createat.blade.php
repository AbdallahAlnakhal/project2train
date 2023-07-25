
@extends('layouts.app')

@section('content')
    <h1>Article Tags</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Assign Tag to Article</h2>
    <form method="POST" action="{{ route('article_tags.store') }}">
        @csrf
        <div class="form-group">
            <label for="article_id">Article:</label>
            <select name="article_id" id="article_id" class="form-control" required>
                <option value="">Select Article</option>
                @foreach($articles as $article)
                    <option value="{{ $article->id }}">{{ $article->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tag_id">Tag:</label>
            <select name="tag_id" id="tag_id" class="form-control" required>
                <option value="">Select Tag</option>
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Assign Tag</button>
    </form>
@endsection
