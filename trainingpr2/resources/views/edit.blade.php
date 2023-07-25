@extends('layouts.app')

@section('content')
    <h1>Edit Article</h1>

    <form method="POST" action="{{ route('articles.update', $article->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" value="{{ $article->title }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="full_text">Full Text</label>
            <textarea id="full_text" name="full_text" class="form-control">{{ $article->full_text }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control-file">
            @if ($article->image)
                <img src="{{ asset('storage/' . str_replace('public/', '', $article->image)) }}" alt="{{ $article->title }}" width="200">
            @endif
        </div>

        <!-- Add the dropdown for selecting the category -->
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $article->category_id === $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Article</button>
    </form>
@endsection
